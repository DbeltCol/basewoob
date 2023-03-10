<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Hola {{ ucfirst($user->name )}}</h3>

    <br>

    <p>El código de acceso es: {{ $data->token }}</p>

    <p>Solo puedes obtener un token a la vez, tiene una vigencia de 30 minutos.</p>

</body>
</html>
