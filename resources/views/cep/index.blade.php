<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>

<body>
    <form action="" method="post">
        @csrf

        <input type="text" name="cep">
        <button type="submit">Buscar CEP</button>



    </form>

    @isset($endereco)

    <p>Cidade: {{ $endereco ['localidade'] }}</p>
    <p>Rua: {{ $endereco ['logradouro'] }}</p>


    
    @endisset

</body>
</html>