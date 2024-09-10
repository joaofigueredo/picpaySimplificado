<x-layout titulo="criar">
    <form>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome" autofocus>
            </div>
            <div class="form-group col-md-4">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" placeholder="CPF">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
            <fieldset class="">
                <div class="row mx-3">
                    <label class="col-form-label col-sm-4 pt-0">Tipo</label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="lojista" value="lojista" checked>
                            <label class="form-check-label" for="lojista">
                                Lojista
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="usuario" value="usuario">
                            <label class="form-check-label" for="usuario">
                                usuario
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>


        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</x-layout>