<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/jogos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Escolha um jogo</title>
</head>

<!-- Sala do ..... -->

<body>
    <header class="cabecario">
        <h1 class="titulo">Jogos de Biologia</h1>
        <a href="{{route("user.menuJogos")}}" id="sair" type="button">Sair</a>
        <p style="color: #215143">imagem logo</p>
    </header>
    <div class="containerJogos">
        <div class="jogo1">
            <div class="foto1">
                <img src="/img/artropodes.png" class="roblox-imagem" alt="">
                <center><h1 style="color:#093e0c">Artropodes</h1></center>
            </div><br><br>
            <a href="{{ route('user.artropodes') }}" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
        <div class="jogo2">
            <div class="foto2">
                <img src="/img/repteis.png" class="roblox-imagem" alt="">
                <center><h1 style="color:#093e0c">Repteis</h1></center>
            </div><br><br>
            <a href="{{ route('user.repteis') }}" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
        <div class="jogo3">
            <div class="foto3">
                <img src="/img/mamiferos.png" class="roblox-imagem" alt="">
                <center><h1 style="color:#093e0c">Mamiferos</h1></center>
            </div><br><br>
            <a href="{{ route('user.mamiferos') }}" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
        <div class="jogo4">
            <div class="foto4">
                <img src="/img/sim.png" class="roblox-imagem" alt="">
                <center><h1 style="color:#093e0c"></h1></center>
            </div><br><br>
            <a href="#" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
        <div class="jogo4">
            <div class="foto4">
                <img src="/img/sim.png" class="roblox-imagem" alt="">
            </div>
            <a href="#" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
        <div class="jogo4">
            <div class="foto4">
                <img src="/img/sim.png" class="roblox-imagem" alt="" background-color: white>
            </div>
            <a href="#" class="glow-on-hover" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Entrar</a>
        </div>
    </div>
    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    <script src="./script.js"></script>
</body>
</html>