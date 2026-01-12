{{-- filepath: c:\Users\3Dev\Documents\GitHub\Projeto_SesiKids\ProjetoKids\resources\views\user\comentario-pdf.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuários Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .user-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .user-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .user-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .user-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    @foreach ($users as $user)
        <div class="user-card">
            <h3>{{ $user->name }}</h3>
            <p>ID: {{ $user->id }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Cadastrado em: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/y H:i:s') }}</p>
        </div>
    @endforeach
</body>
</html>