<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script type="text/javascript" src="{{ asset('js/estilo.css') }}"></script>
</head>

<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.contas') }}">Lista Contas</a>
                </li>
            </ul>
        </div>

        <div class="navbar-nav">
            <a href="{{ route('logout') }}" class="btn btn-danger">Sair</a>
        </div>

    </nav>
    @endauth
    @if ($errors->any())
    <div class="alert alert-danger" id="error-message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('mensagemSucesso'))
    <div class="alert alert-success" id="error-message">
        {{ session('mensagemSucesso') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 5000 milissegundos = 5 segundos
    </script>
    {{ $slot }}
</body>

</html>