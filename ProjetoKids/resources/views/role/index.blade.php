<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/role.css')}}">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-4">
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
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Perfil</h2>

        </div>

        <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">

        <div class="card mb-4 border-light shadow">



            <div class="card-header hstack gap-2">
                <span>Listar</span>
                @can('create-role')
                    <a href="{{ route('role.create') }}" class="btn btn-success btn-sm me-1">
                        Cadastrar</a>
                @endcan
            </div>

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

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros --}}
                        @forelse ($roles as $role)
                            <tr>
                                <th class="d-none d-sm-table-cell">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    @can('role-permission')
                                    <a href="{{route('role-permission.index', ['role' => $role->id])}}" class="btn btn-info btn-sm me-1 mb-1 mb-md-0"><i
                                            class="fa-solid fa-list"></i> Permissões</a>
                                    @endcan 

                                    @can('edit-role')
                                        <a href="{{ route('role.edit', ['role' => $role->id]) }}"
                                            class="btn btn-warning btn-sm me-1 mb-1 mb-md-0">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>
                                    @endcan

                                    @can('destroy-role')
                                        <form method="POST"
                                            action="{{ route('role.destroy', ['role' => $role->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-1 mb-1 mb-md-0 btn-delete">
                                            <i class="fa-regular fa-trash-can"></i> Apagar
                                            </button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum perfil encontrado!
                            </div>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Adicione no final do body -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Confirmação de exclusão
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Cuidado!",
                text: "Deseja realmente excluir este usuário? Esta ação não pode ser desfeita!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });


    // Exibe mensagem de erro do backend (impossível deletar)
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: "{{ session('error') }}",
            confirmButtonColor: "#3085d6"
        });
    @endif

    // Exibe mensagem de sucesso do backend
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: "{{ session('success') }}",
            confirmButtonColor: "#3085d6"
        });
    @endif
});
</script>
</script>
</body>
</html>