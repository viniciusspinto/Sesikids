<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Bem-vindo!!</title>
    <style>
    :root{
        --accent:#5b21b6;
        --accent-2:#7c3aed;
        --muted:#6b7280;
        --bg:#f7f7fb;
        --input-bg:#ffffff;
        --shadow: 0 8px 28px rgba(91,33,182,0.10);
    }

    html,body{height:100%}
    body{
        background:var(--bg);
        font-family:Inter, "Open Sans", Arial, sans-serif;
        color:#0f172a;
        margin:0;
    }

    /* banner de boas-vindas */
    .welcome-banner{
        max-width:1100px;
        margin:18px auto;
        padding:16px 20px;
        border-radius:12px;

        background:linear-gradient(90deg, rgba(91,33,182,0.06), rgba(124,58,237,0.03));
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:16px;
        box-shadow:0 10px 30px rgba(91,33,182,0.06);
    }
    .welcome-left{ display:flex; align-items:center; gap:14px; }
    .welcome-avatar{
        width:56px; height:56px; border-radius:12px;
        background:linear-gradient(135deg,var(--accent),var(--accent-2));
        color:#fff; display:flex; align-items:center; justify-content:center;
        font-weight:700; font-size:18px;
    }
    .welcome-title{ margin:0; color:var(--accent); font-size:18px; font-weight:800; }
    .welcome-sub{ margin:0; color:var(--muted); font-size:13px; }
    .welcome-actions{ display:flex; gap:10px; align-items:center; }
    .btn-sm{ padding:8px 12px; border-radius:10px; font-weight:700; font-size:14px; text-decoration:none; color:#fff; background:linear-gradient(90deg,var(--accent),var(--accent-2)); box-shadow:0 8px 22px rgba(124,58,237,0.12); }
    @media (max-width:720px){ .welcome-banner{ flex-direction:column; align-items:flex-start } .welcome-actions{ width:100%; justify-content:space-between } }

    /* container */
    .feedback-container{
        max-width: 920px;
        margin:28px auto;
        padding:28px;
        background:#fff;
        border-radius:14px;
        box-shadow: 0 10px 30px rgba(2,6,23,0.04);
    }

    /* titles */
    h1{ color:var(--accent); margin:0 0 14px; font-size:22px; font-weight:700 }

    /* labels */
    label{ display:block; margin-bottom:8px; color:var(--muted); font-size:14px; font-weight:600 }

    /* ===== estilo tipo cartão com borda degradê (input/textarea/select) =====
       técnica: fundo branco + gradiente aplicado ao border-box com border transparente */
    .input, input[type="text"], textarea, select {
        width:100%;
        padding:12px 14px;
        padding-right:44px; /* espaço para ícone, caso use */
        font-size:15px;
        color:#0b1220;
        background:
            linear-gradient(#fff,#fff) padding-box,
            linear-gradient(90deg,var(--accent),var(--accent-2)) border-box;
        border:2px solid transparent;
        border-radius:12px;
        box-shadow: 0 6px 20px rgba(15,23,42,0.04);
        transition: transform .08s ease, box-shadow .15s ease, border-color .15s ease;
        -webkit-appearance:none;
        -moz-appearance:none;
        appearance:none;
    }

    /* placeholder */
    .input::placeholder,
    input::placeholder,
    textarea::placeholder {
        color:#9aa0b4;
        opacity:1;
    }

    /* foco com glow */
    .input:focus,
    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        transform: translateY(-1px);
        box-shadow: 0 18px 50px rgba(91,33,182,0.14);
    }

    /* textarea ajustes */
    textarea{ min-height:110px; resize:vertical; line-height:1.5 }

    /* botão padrão */
    .button{
        display:inline-block;
        background:linear-gradient(90deg,var(--accent),var(--accent-2));
        color:#fff;
        padding:12px 18px;
        border-radius:10px;
        border:0;
        font-weight:700;
        cursor:pointer;
        box-shadow: 0 10px 30px rgba(124,58,237,0.12);
        transition: transform .12s ease, box-shadow .12s ease;
    }
    .button:hover{ transform:translateY(-3px); box-shadow:0 20px 60px rgba(91,33,182,0.12) }

    /* helper: wrapper para inputs com ícone (se quiser usar) */
    .input-with-icon{ position:relative }
    .input-with-icon .right-icon{
        position:absolute;
        right:10px;
        top:50%;
        transform:translateY(-50%);
        width:36px;
        height:36px;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:linear-gradient(90deg,var(--accent),var(--accent-2));
        color:#fff;
        box-shadow:0 6px 18px rgba(91,33,182,0.12);
        cursor:pointer;
    }

    /* ===== estilos dos alertas "bonitos" ===== */
    .alert {
        display:flex;
        gap:12px;
        align-items:flex-start;
        padding:12px 14px;
        border-radius:12px;
        box-shadow: 0 8px 24px rgba(15,23,42,0.06);
        border:1px solid rgba(15,23,42,0.04);
        margin-bottom:16px;
        position:relative;
        overflow:hidden;
    }
    .alert .alert-icon{
        flex:0 0 44px;
        height:44px;
        width:44px;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:18px;
    }
    .alert .alert-content{ flex:1; }
    .alert .alert-content strong{ display:block; font-size:15px; margin-bottom:4px; }
    .alert .alert-content .msg{ color:#263244; font-size:14px; line-height:1.35; }
    .alert .alert-close{
        position:absolute;
        right:8px;
        top:8px;
        background:transparent;
        border:0;
        color:rgba(15,23,42,0.5);
        font-size:18px;
        cursor:pointer;
        padding:6px;
        border-radius:8px;
    }

    /* sucesso */
    .alert-success{
        background: linear-gradient(180deg, rgba(91,33,182,0.04), rgba(124,58,237,0.03));
        border-left:6px solid rgba(91,33,182,0.95);
    }
    .alert-success .alert-icon{ background:linear-gradient(90deg,var(--accent),var(--accent-2)); }

    /* erro */
    .alert-danger{
        background: linear-gradient(180deg, rgba(239,68,68,0.03), rgba(239,68,68,0.01));
        border-left:6px solid rgba(239,68,68,0.95);
    }
    .alert-danger .alert-icon{ background:linear-gradient(90deg,#ef4444,#fb7185); }

    /* lista de erros */
    .error-list{ margin:6px 0 0 18px; padding:0; color:#4a2a2a }
    .error-list li{ margin:6px 0; list-style:disc; font-size:14px }

    /* pequeno ajuste visual para ícone SVG */
    .alert .alert-icon svg{ display:block; width:20px; height:20px }

    /* responsivo */
    @media (max-width:640px){
        .feedback-container{ margin:14px; padding:18px }
        .input, input, textarea{ padding-right:40px }
    }
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

    <!-- Banner de boas-vindas -->
    <section class="welcome-banner" role="region" aria-label="Boas-vindas">
        <div class="welcome-left">
            <div class="welcome-avatar" aria-hidden="true">
                {{ strtoupper(mb_substr(Auth::user()->name ?? 'U',0,1)) }}
            </div>
            <div>
                <p class="welcome-title">Bem-vindo, {{ Auth::user()->name ?? 'Usuário' }}!</p>
                <p class="welcome-sub">Aqui você pode enviar feedbacks</p>
            </div>
        </div>
    </section>

    <div class="feedback-container">
        <h1>Enviar Feedback</h1>

        {{-- alerta de sucesso com aparência bonita --}}
        @if(session('success') || session()->has('feedback_sent'))
            <div class="alert alert-success" role="status">
                <div class="alert-icon" aria-hidden="true">
                    <!-- ícone de check -->
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M20 6L9 17l-5-5" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="alert-content">
                    <strong>Sucesso</strong>
                    <div class="msg">{{ session('success') ?? session('feedback_sent') ?? 'Feedback enviado com sucesso!' }}</div>
                </div>
                <button type="button" class="alert-close" aria-label="Fechar">×</button>
            </div>
        @endif

        {{-- erros de validação com aparência bonita --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="alert-icon" aria-hidden="true">
                    <!-- ícone de aviso -->
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M12 9v4" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 17h.01" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="alert-content">
                    <strong>Ocorreram erros</strong>
                    <div class="msg">Verifique e corrija os itens abaixo:</div>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="alert-close" aria-label="Fechar">×</button>
            </div>
        @endif

        <!-- formulário de envio de feedback (usuários autenticados) -->
        <form action="{{ route('feedback.store') }}" method="POST" style="margin-bottom:20px;">
            @csrf

            <label for="name">Nome</label>
            <input class="input" type="text" id="name" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" required aria-required="true"><br>
            <br>

            <label for="descricao">Descrição</label>
            <textarea class="input" id="descricao" name="descricao" rows="3" required aria-required="true">{{ old('descricao') }}</textarea><br>

            <br>
            <label for="rating">Avaliação</label>
            <select class="input" id="rating" name="rating" required aria-required="true">
                <option value="">Selecione</option>
                <option value="1" {{ old('rating')==1 ? 'selected' : '' }}>1 ★</option>
                <option value="2" {{ old('rating')==2 ? 'selected' : '' }}>2 ★★</option>
                <option value="3" {{ old('rating')==3 ? 'selected' : '' }}>3 ★★★</option>
                <option value="4" {{ old('rating')==4 ? 'selected' : '' }}>4 ★★★★</option>
                <option value="5" {{ old('rating')==5 ? 'selected' : '' }}>5 ★★★★★</option>
            </select><br><br>

            <button type="submit" class="button">Enviar Feedback</button>
        </form>
    </div>

    <script>
        // comportamento simples para fechar alertas
        document.addEventListener('click', function(e){
            if(e.target.matches('.alert-close')){
                const alert = e.target.closest('.alert');
                if(!alert) return;
                alert.style.transition = 'opacity .18s, transform .18s';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-8px)';
                setTimeout(()=> alert.remove(), 180);
            }
        });
    </script>
</body>
</html>