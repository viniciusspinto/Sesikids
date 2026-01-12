<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="input">
    <div class="butoes">
    <a href="{{ route('user.usuarioCadastrado') }}">
    Voltar
    </a>
    
    <a href="{{ route('user.edit', ['user'=> $user->id ])}}" class="boston">Editar</a>

    <form action="{{ route('user.destroy', ['user'=> $user->id ])}}" method="POST" style="margin: 0; padding: 0;">
        @csrf
        @method('DELETE')
        <button type="submit" class="boston" id="exclui" onclick="">Excluir</button>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButton = document.querySelector('#exclui');
        
                if (deleteButton) {
                    deleteButton.addEventListener('click', function(event) {
                        event.preventDefault(); // Impede o envio padrão do formulário
        
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
                                Swal.fire({
                                    title: "Excluído!",
                                    text: "O usuário foi deletado com sucesso.",
                                    icon: "success",
                                    confirmButtonColor: "#3085d6",
                                }).then(() => {
                                    this.closest('form').submit(); // Envia o formulário após a confirmação
                                });
                            }
                        });
                    });
                }
            });
        </script>
    </form>
    </div>
    <h1>Visualizar Usuário</h1>

    @if (session("sucess"))
        <p style="color: #0f0">
            {{ session("sucess") }}
        </p>
    @endif

    @if ($user->image)
        <img src="{{ asset('img/' . $user->image) }}" alt="Foto de perfil" class="img-thumbnail" style="width: 200px; height: 200px; border-radius: 100%;">
    @else
        <img src="{{ asset('IMG/icone_sem_foto.jpg') }}" alt="s" class="img-thumbnail" style="width: 200px; height: 200px; border-radius: 100%;">
    @endif

    <br>

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    <span class="perfil" style="display: inline-block;">
                Perfil:
                <span class="classe_perfil" style="display: inline-block; margin-left: 6px;">
                    @forelse($user->getRoleNames() as $role)
                        <span class="badge badge-primary" style="margin-right: 4px;">{{ $role }}</span>
                    @empty
                    @endForelse
                </span>
            </span><br>
    
    Cadastrado em: {{\Carbon\Carbon::parse($user->created_at)->format('d/m/y H:i:s') }}<br>
    Atualizado em: {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/y H:i:s') }}<br>

    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
</div>
</body>
</html>


