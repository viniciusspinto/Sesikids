<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Usuário</title>
</head>
<body>
    <header>
        <h1>Editar Usuário</h1>
    </header>

    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">

    <main>
        <div class="links-acoes">
            <a href="{{ route('user.show', ['user'=> $user->id ])}}">Voltar</a>
            <a href="{{ route('user.show', ['user'=> $user->id ])}}" class="boston">Visualizar</a>
        </div>

        <section>
            <form action="{{route('user.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="login"><h2>Formulário de Edição</h2></div>
                <div class="formulario">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <label for="fname">Nome:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name )}}">

                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email)}}">

                    <label for="password">Senha:</label>
                    <div class="mostrar">
                        <input type="password" class="input-senha" id="password" name="password">
                        <span role="button" class="olho" onclick="togglePassword('password', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>

                    <label for="password_confirmation">Confirmar Senha:</label>
                    <div class="mostrar">
                        <input type="password" class="input-senha" id="password_confirmation" name="password_confirmation">
                        <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>

                    <label for="roles">Perfil:</label>
                    <select name="roles" id="roles">
                        <option value="" disabled {{ old('roles', $userRoles ?? 'professor') == '' ? 'selected' : '' }}>Selecione</option>
                        @forelse($roles as $role)
                            @if($role != 'admin')
                                <option value="{{ $role }}" {{ old('roles', $userRoles ?? 'professor') == $role ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @else
                                @if(Auth::user()->hasRole('admin'))
                                    <option value="{{ $role }}" {{ old('roles', $userRoles ?? 'professor') == $role ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endif
                            @endif
                        @empty
                            <option value="" disabled>Nenhum papel encontrado</option>
                        @endforelse
                    </select>

                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image">

                    <button type="submit" id="envia" class="button">Salvar Alterações</button>
                </div>
            </form>
        </section>
    </main>


    <script>
        
    function togglePassword(inputId, element) {
        const input = document.getElementById(inputId);
        const icon = element.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }


        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.querySelector('#envia');
            if (submitButton) {
                submitButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: "Deseja salvar as alterações?",
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Salvar",
                        denyButtonText: "Não salvar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Salvo!", "As alterações foram salvas com sucesso.", "success").then(() => {
                                this.closest('form').submit();
                            });
                        } else if (result.isDenied) {
                            Swal.fire("Alterações não salvas", "Nenhuma alteração foi feita.", "info");
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>
