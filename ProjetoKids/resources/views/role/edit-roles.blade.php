<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/role.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-4">
        <a href="{{route('role.index')}}" class="btn btn-success btn-sm me-1">Voltar</a>
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Perfis</h2>

        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Editar</span>

                <span class="ms-auto d-sm-flex flex-row">
                    @can('index-classe')
                        <a href="{{ route('role.index') }}" class="btn btn-info btn-sm me-1"><i class="fa-solid fa-list"></i>
                            Listar</a>
                    @endcan
                </span>
            </div>

            <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="name" class="form-label">Nome: </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nome do curso"
                            value="{{ old('name', $role->name) }}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning bt-sm">Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>
</html>