<x-layout titulo="Home">
    <div class="index">
        <form action="{{ route('home.transferencia') }}" method="get">
            @csrf
            @if(Auth::user()->usuario == 'usuario')
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Valor</span>
                </div>
                <input type="number" class="form-control" placeholder="Valor" name="valor" id="valor" aria-label="Valor" aria-describedby="basic-addon1"
                    autofocus>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Opções</label>
                </div>
                <select class="custom-select" id="opcoes" name="opcoes">
                    <option value="0">Selecione ...</option>
                    <option value="1">Deposito</option>
                    <option value="2">Transferencia</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">CPF</span>
                </div>
                <input type="text" class="form-control" placeholder="CPF" aria-label="cpf" aria-describedby="basic-addon1" name="cpf" id="cpf" disabled>
            </div>
            <script>
                document.getElementById('opcoes').addEventListener('change', function() {
                    var cpfField = document.getElementById('cpf');
                    var botaoConfirmar = document.getElementById('botaoConfirmar');
                    if (this.value == '1') {
                        cpfField.disabled = true;
                        cpfField.value = '';
                    } else if (this.value == '2') {
                        cpfField.disabled = false;
                    }

                    if (this.value == 0) {
                        botaoConfirmar.disabled = true;
                    } else {
                        botaoConfirmar.disabled = false;
                    }
                });
            </script>
            <button type="submit" class="btn btn-primary" id="botaoConfirmar" disabled>Confirmar</button>
        </form>
    </div>
    @endif
    @if(Auth::user()->usuario == "lojista")
    <p>Não pode fazer transferencia!</p>
    @endif
    </div>
</x-layout>