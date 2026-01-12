<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error 429</title>
    <style>
        * {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(../IMG/fundo_matrix.png);
}

.container {
    display: flex;
    align-items: center;
    justify-content: space-around;
    border-radius: 15px;
    background-color: black;
    box-shadow: 20px 20px 6px -1px rgba(28,130,45,0.9);
-webkit-box-shadow: 20px 20px 6px -1px rgba(28,130,45,0.9);
-moz-box-shadow: 20px 20px 6px -1px rgba(28,130,45,0.9);
    margin-top: 50px;
    height: 580px;
    width: 900px;
}

.box {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    flex-direction: column;
}

.title {
    color: #1C822D;
}

.title:hover {
    transition: 0.5s;
    width: 350px;
    color:yellow;
}

.text {
    width: 350px;
    color: #1C822D;
}

.text:hover {
    transition: 0.5s;
    width: 350px;
    color:yellow;
}

.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 15px 40px;
    display: inline-block;
    margin-top: 10px;
    border-radius: 100px;
    transition: all .2s;
    position: relative;
    background-color: #1C822D;
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white {
    background-color: #fff;
    color: black;
}

.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}

.btn-white::after {
    background-color: yellow;
}

.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}

@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}

    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <center>
                <div class="title">
                    <h1>ERRO 429</h1>
                </div>
            </center>
            <center>
                <div class="text">

                    <h3>Você exedeu o número de solicitações, por favor, tente novamente mais tarde</h3>
                </div>
            </center>
            <center>
                <div class="text-box">
                    <a href="/" class="btn btn-white btn-animate">voltar ao inicio</a>
                </div>
            </center>
        </div>
    </div>
    </div>
</body>

</html>