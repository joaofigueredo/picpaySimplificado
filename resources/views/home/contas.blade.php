<x-layout titulo="contas">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Saldo</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contas as $conta)
            <tr>
                <th scope="row">{{$conta->cpf}}</th>
                <td>{{$conta->name}}</td>
                <td>{{$conta->saldo}}</td>
                <td>{{$conta->email}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-layout>