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

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
        </tr>
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
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td >TOTAL</td>
            <td>$6,500.00</td>
        </tr>
        </tfoot>
    </table>

</body>
</html>