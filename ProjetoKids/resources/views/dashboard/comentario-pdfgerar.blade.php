<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Relatório de Feedbacks</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <style>
        /* ajustes visuais locais para manter padrão das outras páginas */
        :root{ --accent:#5b21b6; --muted:#6b7280; --bg:#f7f7fb }
        body{background:var(--bg); font-family:Inter, "Open Sans", Arial, sans-serif; color:#111}
        .container-central{max-width:1100px;margin:36px auto;padding:22px;background:#fff;border-radius:10px;box-shadow:0 6px 20px rgba(2,6,23,0.06)}
        .rel-header{display:flex;flex-direction:column;align-items:center;margin-bottom:18px}
        .rel-title{color:var(--accent);font-size:20px;font-weight:700;margin:0}
        .rel-sub{color:var(--muted);margin-top:6px;font-size:13px}
        .rel-controls{display:flex;gap:12px;margin-top:14px;align-items:center}
        .btn-primary{background:linear-gradient(90deg,#5b21b6,#7c3aed);color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;font-weight:600}
        .search-inline{display:flex;align-items:center;background:#f3f4f6;padding:6px;border-radius:8px}
        .search-inline input{border:0;background:transparent;padding:6px 8px;outline:0}
        .cards{margin-top:20px;display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:14px}
        .card{background:#fff;border-radius:8px;padding:14px;border:1px solid #eef2ff;box-shadow:0 6px 18px rgba(15,23,42,0.03)}
        .card-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
        .meta strong{display:block}
        .meta small{color:var(--muted);font-size:12px}
        .avatar{width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#5b21b6,#7c3aed);color:#fff;font-weight:700}
        .rating{color:#f59e0b;font-weight:700}
        .empty{text-align:center;color:var(--muted);padding:26px}
        @media (max-width:640px){ .container-central{margin:18px 12px;padding:14px} .cards{grid-template-columns:1fr} }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="{{ route('logout') }}" class="link">Sair</a>
        </div>
        <div class="header-center">
            <a href="/painel" class="painel">Home</a>
            @can('index-role')
                <a href="{{ route('role.index') }}" class="painel">Perfis</a>
            @endcan
            @can('cadastrados-user')
                <a href="{{ route('user.usuarioCadastrado') }}" class="painel">Usuários</a>
            @endcan
            @can('create-user-login')
                <a href="{{ route('login.create-user') }}" class="painel">Cadastrar</a>
            @endcan
            @can('cadastrados-user')
                <a href="{{ route('dashboard.comentarios') }}" class="painel">Comentários</a>
            @endcan
        </div>
        <div class="header-right">
            <div class="img">
                <img src="{{ Auth::user()->image ? asset('img/' . Auth::user()->image) : asset('img/icone_sem_foto.jpg') }}" alt="Foto" style="width:44px;height:44px;border-radius:50%;">
            </div>
        </div>
    </header>

    <main class="container-central">
        <div class="rel-header">
            <h1 class="rel-title">Relatório de Feedbacks</h1>
            <div class="rel-sub">Visualização centralizada — gerado em {{ now()->format('d/m/Y H:i') }}</div>

            <div class="rel-controls" style="margin-top:12px">
                <form method="GET" action="" class="search-inline" style="border-radius:8px;">
                    <input type="search" name="q" placeholder="Pesquisar por nome ou descrição..." value="{{ request('q') ?? '' }}">
                    <button type="submit" class="btn" style="background:transparent;color:var(--accent);border:0;font-weight:600;padding:6px 8px">Buscar</button>
                </form>

                @if(Route::has('comentario-pdfgerar'))
                    <a href="{{ route('comentario-pdfgerar') }}" class="btn-primary" target="_blank">Gerar PDF</a>
                @endif
            </div>
        </div>

        @php
            $q = request('q') ? mb_strtolower(request('q')) : null;
            $filtered = collect($feedbacks ?? [])->filter(function($f) use($q){
                if(!$q) return true;
                return mb_strpos(mb_strtolower($f->name ?? ''), $q) !== false
                    || mb_strpos(mb_strtolower($f->descricao ?? ''), $q) !== false
                    || mb_strpos(mb_strtolower($f->user->name ?? ''), $q) !== false;
            })->values();
        @endphp

        @if($filtered->isEmpty())
            <div class="empty">Nenhum feedback encontrado.</div>
        @else
            <section class="cards" aria-live="polite">
                @foreach($filtered as $f)
                    <article class="card">
                        <div class="card-head">
                            <div style="display:flex;gap:12px;align-items:center">
                                <div class="avatar" aria-hidden="true">
                                    {{ strtoupper(substr($f->user->name ?? $f->name ?? 'U',0,1)) }}
                                </div>
                                <div class="meta">
                                    <strong>{{ $f->name ?? ($f->user->name ?? 'Usuário') }}</strong>
                                    <small>Enviado em {{ optional($f->created_at)->format('d/m/Y H:i') }}</small>
                                </div>
                            </div>

                            <div class="rating" aria-hidden="true">
                                {{ str_repeat('★', max(0, (int)($f->rating ?? 0))) }}
                            </div>
                        </div>

                        <div class="desc">
                            {{ $f->descricao }}
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </main>
</body>
</html>