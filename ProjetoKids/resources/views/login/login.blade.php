<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Página de Login</title>
</head>
<body>
    <header>
        <a href="{{ route('user.index') }}" class="link-2">Voltar</a>
        <h1 class="h1-titulo">Bem-vindo à nossa página de login para Professores</h1>
        <p style="color: #934ffa">.</p>
        <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    </header>
    <main>
        <section>
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                @method('POST')

                <div class="login"><h2>Login</h2></div>

                <div class="formulario">
                    <label for="fname">Email:</label>
                    <input placeholder="Digite seu E-mail" type="text" class="input-email" id="Email" name="email"><br>
                    
                    <label for="lname">Senha:</label>
                    <div class="mostrar">
                        <input placeholder="Digite sua Senha" type="password" class="input-senha" id="Senha" name="password">
                        <span role="button" class="olho" onclick="togglePassword('Senha', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div><br>
                    
                    <center><button class="button">Enviar</button><br></center>
                    <center>
                        <a href="{{ route('login.create-user')}}">Não tenho login</a>
                    </center>
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
