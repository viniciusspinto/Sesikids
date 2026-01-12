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
        <iframe src="https://viniciusspinto.github.io/Artropodes1/" frameborder="0" width="1600px" height="800px"></iframe>
    </div>
    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    <script src="./script.js"></script>
</body>
</html>