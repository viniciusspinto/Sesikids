<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <style>
        body {
    background: #f3f0fa;
    font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
}

.card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 16px rgba(126,87,194,0.13);
    padding: 2.5rem 2rem;
    margin: 40px auto;
    max-width: 850px;
}

.card-header {
    background: none;
    border-bottom: 1px solid #e1d8f7;
    padding-bottom: 1.2rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1.3rem;
    color: #6a0dad;
    font-weight: bold;
}

.btn, .btn-sm {
    border: none;
    border-radius: 7px;
    padding: 9px 20px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    margin-right: 8px;
    margin-bottom: 4px;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
}

.btn-info { background: #7e57c2; color: #fff; }
.btn-info:hover { background: #5e35b1; }

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1.5rem;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
}

.table th, .table td {
    padding: 14px 12px;
    border-bottom: 1px solid #ede7f6;
    text-align: left;
}

.table th {
    background: #ede7f6;
    color: #6a0dad;
    font-weight: bold;
}

.table-striped tbody tr:nth-child(odd) {
    background: #f8f6fc;
}

.badge {
    display: inline-block;
    padding: 7px 16px;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.textSucess, .text-bg-success {
    background: #4caf50;
    color: #fff;
}

.textDanger, .text-bg-danger {
    background: #e53935;
    color: #fff;
}

.alert {
    padding: 14px 22px;
    border-radius: 7px;
    margin-bottom: 1.2rem;
    font-size: 1.05rem;
    background: #ffcdd2;
    color: #b71c1c;
    text-align: center;
}

@media (max-width: 700px) {
    .card {
        padding: 1.2rem 0.5rem;
        max-width: 98vw;
    }
    .table th, .table td {
        padding: 9px 4px;
        font-size: 0.97rem;
    }
    .card-header {
        flex-direction: column;
        gap: 10px;
        font-size: 1.05rem;
        align-items: flex-start;
    }
}
    </style>
    <title></title>
</head>
<body>

    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
    <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Listar de Permissões : {{ $role->name }} </span>

                <span class="ms-auto">
                    @can('index-role')
                        <a href="{{ route('role.index') }}" class="btn btn-info btn-sm me-1"><i class="fa-solid fa-list"></i>
                            Perfil</a>
                    @endcan
                </span>
            </div>

            <div class="card-body">


                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros
                        @forelse ($permissions as $permission)
                            <tr>
                                <td class="d-none d-sm-table-cell">{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @if (in_array($permission->id, $rolePermissions ?? []))
                                        <span class="badge text-bg-success">Liberado</span>
                                    @else
                                        <span class="badge text-bg-danger">Bloqueado</span>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhuma permissão para o perfil encontrado!
                            </div>
                        @endforelse --}}

                        @forelse ($permissions as $permission)
                            <tr>
                                <td class="d-none d-sm-table-cell">{{$permission->id}}</td>
                                <td class="text-capitalize">{{$permission->name}}</td>
                                <td class="text-center">
                                    @if (in_array($permission->id, $rolePermissions ?? []))
                                        @can('update-role')
                                            <a href="{{route('role-permission.update', ['role' => $role->id, 'permission' => $permission->id])}}">
                                                <span class="badge textSucess">Liberado</span>
                                            </a>
                                        @else
                                            <span class="badge textSucess">Liberado</span>
                                        @endcan
                                    @else
                                        @can('update-role')
                                            <a href="{{route('role-permission.update', ['role' => $role->id, 'permission' => $permission->id])}}">
                                                <span class="badge textDanger">Bloqueado</span>
                                            </a>
                                        @else
                                            <span class="badge textDanger">Bloqueado</span>
                                        @endcan
                                    @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger" role="alert">
                                    Nenhuma permissão encontrada para o perfil!
                                </div>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>