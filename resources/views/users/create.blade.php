<x-layout titulo="criar">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}" autofocus>
            </div>
            <div class="form-group col-md-4">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ old('cpf') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <fieldset class="">
                <div class="row mx-3">
                    <label class="col-form-label col-sm-4 pt-0">Tipo</label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcoes" id="usuario" value="usuario" checked>
                            <label class="form-check-label" for="usuario">
                                usuario
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcoes" id="lojista" value="lojista">
                            <label class="form-check-label" for="lojista">
                                Lojista
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('login') }}" class="btn btn-primary">Cancelar</button>
    </form>
</x-layout>