<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Pagina Login</title>

    <style>
        /* centraliza o título no header mantendo os links nas laterais */
        header{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 28px;
            background: linear-gradient(90deg,#7a37e6,#9b57ff);
            color: #fff;
            border-radius: 0 0 10px 10px;
        }
        .h1-titulo{
            z-index: 3;
            background: rgba(255,255,255,0.08);
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
        }
        .heade{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 2;
            pointer-events: none; /* não atrapalhar cliques laterais */
            width: calc(100% - 240px); /* evita overlap com botões laterais */
            color: #fff;
        }
        .heade *{ pointer-events: auto; } /* permite interação interna se necessário */

        /* adapta para telas pequenas */
        @media (max-width: 720px){
            header{ padding: 14px 16px; }
            .heade{ position: static; transform: none; width: 100%; margin: 6px 0; pointer-events: auto; }
        }
    </style>
</head>
<script src="js/fullscreen-toggle.js"></script>
<body>
    <header>
        <a href="{{ route('user.index') }}" class="h1-titulo">Voltar</a>
        <div class="heade">
            <h1>Bem-vindo à nossa página</h1>
            <h3 style="margin-top:6px;font-weight:600;">Crie sua conta!</h3>
        </div>

        {{-- mover o bloco de links @can para o final do header --}}
        @can('index-role')
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
        @endcan
    </header>
    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    <main>
        <section>
            <form action=" {{route("login.storage")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="login"><h2>Cadastro!</h2></div>
                <div class="formulario">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="formulario">
                <label for="fname">Nome:</label>
                <input 
                    placeholder="Digite seu Nome" 
                    type="text" 
                    class="input-email" 
                    id="Email" 
                    name="name" 
                    value="{{ old('name') ?? '' }}">

                <label for="fname">Email:</label>
                <input placeholder="Digite seu E-mail" type="email" class="input-email" id="Email" name="email" value="{{ old('email')}}">
            

                <label for="password">Senha:</label>
                <div class="mostrar">
                    <input placeholder="Digite sua Senha" type="password" class="input-senha" id="password" name="password" required>
                    <span role="button" class="olho" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>

                <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input placeholder="Confirme sua Senha" type="password" class="input-senha" id="password_confirmation" name="password_confirmation" required>
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image" class="input-image"><br>
                    
                    <center><button type="submit" class="button">Enviar</button><br></center><br>
                    <center>
                        <a href="{{ route("login") }}">Já tenho login</a> 
                    </center>
                </div>
            </div>
            </form>
        </section>
    </main>

    
        <script>
    function togglePassword(inputId, element) {
        const input = document.getElementById(inputId);
        const icon = element.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
</body>
</html>
```// filepath: c:\Users\3Dev\Documents\GitHub\Projeto_SesiKids\ProjetoKids\resources\views\login\create-user.blade.php
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Pagina Login</title>

    <style>
        /* centraliza o título no header mantendo os links nas laterais */
        header{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 25px 28px;
            background: linear-gradient(90deg,#7a37e6,#9b57ff);
            color: #fff;
        }
        .heade{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 2;
            pointer-events: none; /* não atrapalhar cliques laterais */
            width: calc(100% - 240px); /* evita overlap com botões laterais */
            color: #fff;
        }
        .heade *{ pointer-events: auto; } /* permite interação interna se necessário */

        /* adapta para telas pequenas */
        @media (max-width: 720px){
            header{ padding: 14px 16px; }
            .heade{ position: static; transform: none; width: 100%; margin: 6px 0; pointer-events: auto; }
        }
        a:hover {
            opacity: 0.8;
            text-decoration: underline;
            transition: 0.3s;
        }
    </style>
</head>
<script src="js/fullscreen-toggle.js"></script>
<body>
    <header>
        <a href="{{ route('user.index') }}" class="h1-titulo">Voltar</a>
        <div class="heade">
            <h1>Bem-vindo à nossa página</h1>
            <h3 style="margin-top:6px;font-weight:600;">Crie sua conta!</h3>
        </div>

        <p>.</p>

        {{-- mover o bloco de links @can para o final do header --}}
        @can('index-role')
        <div class="header-center" style="text-decoration: none; color: white; ">
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
        @endcan
    </header>
    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    <main>
        <section>
            <form action=" {{route("login.storage")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="login"><h2>Cadastro!</h2></div>
                <div class="formulario">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="formulario">
                <label for="fname">Nome:</label>
                <input 
                    placeholder="Digite seu Nome" 
                    type="text" 
                    class="input-email" 
                    id="Email" 
                    name="name" 
                    value="{{ old('name') ?? '' }}">

                <label for="fname">Email:</label>
                <input placeholder="Digite seu E-mail" type="email" class="input-email" id="Email" name="email" value="{{ old('email')}}">
            

                <label for="password">Senha:</label>
                <div class="mostrar">
                    <input placeholder="Digite sua Senha" type="password" class="input-senha" id="password" name="password" required>
                    <span role="button" class="olho" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>

                <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input placeholder="Confirme sua Senha" type="password" class="input-senha" id="password_confirmation" name="password_confirmation" required>
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image" class="input-image"><br>
                    
                    <center><button type="submit" class="button">Enviar</button><br></center><br>
                    <center>
                        <a style="color: #3f3f3f" href="{{ route("login") }}">Já tenho login</a> 
                    </center>
                </div>
            </div>
            </form>
        </section>
    </main>

    
        <script>
    function togglePassword(inputId, element) {
        const input = document.getElementById(inputId);
        const icon = element.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
</body>
</html>