<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estiloLogin.css') }}">

</head>

<body>
    <section class="vh-100">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Entre com um email válido" />
                            <label class="form-label" for="email">Email</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit">Login</button>
                        <div class="text-center text-lg-start mt-4 pt-2">

                            <p class="small fw-bold mt-2 pt-1 mb-0">Não tem uma conta? <a href="{{ route('users.create') }}" class="link-danger">Registrar</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>