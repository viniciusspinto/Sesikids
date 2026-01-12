<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="header-left">
            <a href="{{ route('logout') }}">Sair</a>
        </div>

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

        <div class="header-right">
            <img src="{{ Auth::user()->image ? asset('img/' . Auth::user()->image) : asset('img/icone_sem_foto.jpg') }}" 
                alt="Foto de perfil">
        </div>
    </header>

    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi" style="
            width: 10%;
            height: 5%;
            position: fixed;
            bottom: 5px;
            right: 5px;
            opacity: 0.8;
        ">
    <main>
        <!-- Pesquisa -->
        <section class="pesquisa">
            <div class="botoes">
                <h1>Pesquisar Usuários</h1><br>
                <div class="links">
                    <a href="{{ route('login.create-user') }}" class="btn-pdf">Cadastrar</a>
                    <a href="{{ route('user.generate-pdf') }}" class="btn-pdf">Criar Pdf</a>
                </div>
            </div><br>
            <hr>

            <form action="{{ route('user.usuarioCadastrado') }}">
                <div class="inputs">
                    <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Pesquisar por nome">
                    <input type="text" name="email" id="email" value="{{ request('email') }}" placeholder="Pesquisar por email">

                    <div class="pesquisar-button">
                        <button type="submit" class="btn-pesquisa" style="font-size: 18px;">Pesquisar</button>
                        <a href="{{ url('generate-pdf-user?' . request()->getQueryString()) }}" class="btn-pesquisa">Pdf Pesquisa</a>
                        <a href="{{ route('user.usuarioCadastrado') }}" class="btn-limpar">Limpar</a>
                    </div>
                </div>
            </form>
        </section>

        <!-- Lista de Usuários -->
        <section class="usuarios-lista">
            @if (session("sucess"))
                <p class="sucesso">{{ session("sucess") }}</p>
            @endif

            @forelse($users as $Sist)
                <div class="card-usuario">
                    <div class="dados">
                        <span><strong>ID:</strong> {{ $Sist->id }}</span>
                        <span><strong>Nome:</strong> {{ $Sist->name }}</span>
                        <span><strong>Email:</strong> {{ $Sist->email }}</span>
                        <span><strong>Perfil:</strong> 
                            @forelse($Sist->getRoleNames() as $role)
                                <span class="badge">{{ $role }}</span>
                            @empty
                                <em>Sem perfil</em>
                            @endforelse
                        </span>
                    </div>

                    <div class="foto">
                        <img src="{{ $Sist->image ? asset('IMG/' . $Sist->image) : asset('IMG/icone_sem_foto.jpg') }}" 
                            alt="Foto de perfil">
                    </div>

                    <div class="acoes">
                        <a href="{{ route('user.show', ['user'=> $Sist->id ])}}" class="boston visualizar">👁 Visualizar</a>
                        <a href="{{ route('user.edit', ['user'=> $Sist->id ])}}" class="boston editar">✏ Editar</a>

                        <form action="{{ route('user.destroy', ['user'=> $Sist->id ])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="boston excluir">❌ Excluir</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Nenhum usuário encontrado.</p>
            @endforelse
        </section>
    </main>

    <!-- Rodapé -->

    <!-- Script SweetAlert -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.excluir').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: "Cuidado!",
                        text: "Deseja realmente excluir este usuário?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sim, excluir!",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
