<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-sm table-striped   table-full-width table-hover align-middle" id="users">
        <thead class="bg-gradient-danger text-center">
            <tr>
                <th>ID</th>
                <th>Apellido y Nombre</th>
                <th>DNI</th>
                <th>Correo</th>
                <th>Tipo de usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type_user }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>