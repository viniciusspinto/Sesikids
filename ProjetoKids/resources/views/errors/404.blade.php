<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro 404 - Algo deu errado</title>
  <style>
    :root {
      --main-bg: linear-gradient(135deg, #b136a8, #f06b93);
      --card-bg: rgba(255, 255, 255, 0.15);
      --accent: #ffffff;
      --accent-dark: #e91e63;
      --shadow: rgba(0, 0, 0, 0.3);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: var(--main-bg);
      color: var(--accent);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .error-container {
      background-color: var(--card-bg);
      backdrop-filter: blur(10px);
      padding: 50px;
      border-radius: 25px;
      box-shadow: 0 0 30px var(--shadow);
      text-align: center;
      max-width: 700px;
      animation: fadeIn 1s ease-in-out;
    }

    h1 {
      font-size: 5rem;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.4rem;
      margin-bottom: 30px;
    }

    .btn {
      background-color: var(--accent);
      color: #b136a8;
      padding: 15px 30px;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      border-radius: 30px;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: var(--accent-dark);
      color: #fff;
    }

    .illustration {
      margin-top: 30px;
    }

    .illustration img {
      max-width: 300px;
      width: 100%;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
  </style>
</head>
<body>
    
  <div class="error-container">
    <h1>404</h1>
    <p>Oops! Algo inesperado aconteceu no servidor.<br>Estamos resolvendo isso rapidinho.</p>
    <div class="illustration">
      <img src="https://cdn-icons-png.flaticon.com/512/755/755014.png" alt="Erro 500">
      <br>
      <br>
      <br>
      <a href="/" class="btn">Voltar à Página Inicial</a>
    </div>
  </div>
</body>
</html>