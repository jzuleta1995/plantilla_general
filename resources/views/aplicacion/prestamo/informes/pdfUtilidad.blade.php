<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
    <link rel="stylesheet" type="text/css" href="css/stylePdf.css">
</head>
<body>

<h1> HOLA</h1>

    <table>
        <thead>
        <th>id</th>
        <th>nombre</th>
        <th>apellido</th>

        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td> {{ $user-> id }}</td>
                <td> {{ $user-> nombre }}</td>
                <td> {{ $user-> apellido }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>