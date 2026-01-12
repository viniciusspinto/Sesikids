<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sesi kids</title>
    <link rel="stylesheet" href="/css/pagina_inicial.css">
    <style>
        body{background-image: url("/img/2.jpg");}
    </style>
</head>

<body>
    <header>
        <a href="{{ route("login")}}">
            <button onclick="" class="botao">
                <h2>Sou Professor</h2>
            </button>
        </a>
        <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    </header>

    <div class="container">
        <a><img src="https://fontmeme.com/permalink/250311/61c41f729401a7ec65436f549479c64c.png" alt="fontes-pixeladas" border="0"></a>
        <button class="botao2">
            <a href="{{ route("user.menuJogos") }}">
                <img src="https://fontmeme.com/permalink/250311/922e7dfd91076e895973bd6e2ad24f96.png" alt="fontes-pixeladas">
            </a>
        </button>

    </div>
    <script src="./script.js"></script>
</body>

</html>
