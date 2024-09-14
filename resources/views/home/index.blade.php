<x-layout titulo="Home">
    <div class="index">
        <form action="{{ route('home.transferencia') }}" method="get">
            @csrf
            @if(Auth::user()->usuario == 'usuario')
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Valor</span>
                </div>
                <input type="text" class="form-control" placeholder="Valor" name="valor" aria-label="Valor" aria-describedby="basic-addon1" autofocus>
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Opções</label>
                </div>
                <select class="custom-select" id="opcoes" name="opcoes">
                    <option value="1">Deposito</option>
                    <option value="2">Transferencia</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">CPF</span>
                </div>
                <input type="text" class="form-control" placeholder="CPF" aria-label="cpf" aria-describedby="basic-addon1" name="cpf">
            </div>

            <button type="submit" class="btn btn-primary" id="botaoConfirmar">Confirmar</button>
        </form>
    </div>
    @endif
    @if(Auth::user()->usuario == "lojista")
    <p>Não pode fazer transferencia!</p>
    @endif
    </div>
</x-layout>