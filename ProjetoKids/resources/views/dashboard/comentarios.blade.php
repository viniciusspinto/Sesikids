<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Comentários - Feedbacks</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <style>
        /* ajustes locais para manter identidade visual */
        body{background:#f7f7fb;margin:0;font-family:Inter, "Open Sans", Arial, sans-serif;color:#111}
        .wrap{max-width:1100px;margin:36px auto;padding:20px;background:#fff;border-radius:10px;box-shadow:0 6px 20px rgba(2,6,23,0.06)}
        .top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
        .title{color:#5b21b6;font-size:20px;font-weight:700;margin:0}
        .subtitle{color:#6b7280;margin-top:6px;font-size:13px}
        .controls{display:flex;gap:10px;align-items:center}
        .btn{background:linear-gradient(90deg,#5b21b6,#7c3aed);color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none;font-weight:600}
        .search{background:#f3f4f6;padding:6px;border-radius:8px;display:flex;align-items:center}
        .search input{border:0;background:transparent;padding:6px 8px;outline:0}
        table{width:100%;border-collapse:collapse;margin-top:18px}
        th,td{padding:12px;border-bottom:1px solid #eef2ff;text-align:left;vertical-align:top}
        th{background:#fafafa;color:#374151;font-weight:600}
        .empty{text-align:center;color:#6b7280;padding:30px}

        /* filtros por estrelas */
        .star-filter{display:flex;gap:8px;align-items:center}
        .star-btn{
            background:#fff;border:1px solid #e6e6f0;padding:6px 10px;border-radius:8px;cursor:pointer;color:#374151;text-decoration:none;display:inline-flex;align-items:center;gap:6px;font-weight:600
        }
        .star-btn:hover{box-shadow:0 4px 12px rgba(0,0,0,0.06)}
        .star-btn.active{background:linear-gradient(90deg,#5b21b6,#7c3aed);color:#fff;border-color:transparent}
        .star-symbol{color:#f59e0b;font-weight:700}
        @media(max-width:720px){ .top{flex-direction:column;align-items:flex-start} .controls{width:100%;justify-content:space-between} }
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
                <img src="{{ Auth::user()->image ? asset('img/' . Auth::user()->image) : asset('img/icone_sem_foto.jpg') }}" alt="Foto de perfil" style="width: 50px; height: 50px; border-radius: 100%;">
            </div>
        </div>
    </header>

    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">

    <main class="wrap" role="main">
        <div class="top">
            <div>
                <h1 class="title">Feedbacks / Comentários</h1>
                <div class="subtitle">Visualização centralizada — gerado em {{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <div class="controls">
                <form method="GET" action="{{ route('dashboard.comentarios') }}" class="search" aria-label="Pesquisar feedbacks" style="margin-right:8px">
                    <input type="search" name="q" placeholder="Pesquisar por nome ou descrição..." value="{{ request('q') ?? '' }}">
                    <button type="submit" style="background:transparent;border:0;color:#5b21b6;font-weight:700;padding:6px 8px">Buscar</button>
                </form>

                <!-- Filtro por estrelas -->
                @php
                    $params = request()->except(['page']);
                    $currentStars = request('stars');
                    // helper para montar url preservando outros parametros (q)
                    function starsUrl($params, $stars = null){
                        $p = $params;
                        if($stars === null){
                            unset($p['stars']);
                        } else {
                            $p['stars'] = $stars;
                        }
                        $query = http_build_query($p);
                        return url()->current() . ($query ? '?'.$query : '');
                    }
                @endphp

                <div class="star-filter" role="radiogroup" aria-label="Filtrar por avaliação">
                    <a href="{{ starsUrl($params, null) }}" class="star-btn {{ $currentStars === null ? 'active' : ( $currentStars === '' ? 'active' : '' ) }}">Todas</a>
                    @for($s=5;$s>=1;$s--)
                        <a href="{{ starsUrl($params, $s) }}" class="star-btn {{ (string)$currentStars === (string)$s ? 'active' : '' }}">
                            <span class="star-symbol">{{ str_repeat('★',$s) }}</span>
                        </a>
                    @endfor
                </div>

                @if(Route::has('comentario-pdfvisualizar'))
                    <a href="{{ route('comentario-pdfvisualizar') }}" class="btn" style="background:#111827;margin-left:8px">Visualizar Relatório</a>
                @endif
            </div>
        </div>

        @php
            $q = request('q') ? mb_strtolower(request('q')) : null;
            $stars = request('stars') !== null && request('stars') !== '' ? (int) request('stars') : null;
            $list = collect($feedbacks ?? []);
            if ($q) {
                $list = $list->filter(function($f) use($q){
                    return mb_strpos(mb_strtolower($f->name ?? ''), $q) !== false
                        || mb_strpos(mb_strtolower($f->descricao ?? ''), $q) !== false
                        || mb_strpos(mb_strtolower($f->user->name ?? ''), $q) !== false;
                })->values();
            }
            if ($stars !== null) {
                $list = $list->filter(function($f) use($stars){
                    return (int)($f->rating ?? 0) === $stars;
                })->values();
            }
        @endphp

        @if($list->isEmpty())
            <div class="empty">Nenhum feedback encontrado.</div>
        @else
            <div style="overflow:auto;margin-top:12px">
                <table role="table" aria-label="Lista de feedbacks">
                    <thead>
                        <tr>
                            <th style="width:140px">Data</th>
                            <th style="width:180px">Usuário</th>
                            <th>Nome</th>
                            <th style="width:120px">Avaliação</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $f)
                            <tr>
                                <td>{{ optional($f->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ $f->user->name ?? '-' }}</td>
                                <td>{{ $f->name ?? '-' }}</td>
                                <td>{{ str_repeat('★', max(0,(int)($f->rating ?? 0))) }}</td>
                                <td style="white-space:pre-wrap;line-height:1.4">{{ $f->descricao }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div style="text-align:center;margin-top:18px">
            <a href="{{ url()->previous() }}" class="painel" style="padding:8px 12px;border-radius:8px;text-decoration:none">Fechar</a>
        </div>
    </main>
</body>
</html>