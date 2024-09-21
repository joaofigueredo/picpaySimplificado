<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>

    <h1>transferencia realizada!</h1>
    <p>Olá {{ $destinatario }}!.</p>
    <p>
        Você recebeu uma transferência no valor de R${{ $valor }} realizado por {{ $remetente }}!
    </p>

</body>

</html>