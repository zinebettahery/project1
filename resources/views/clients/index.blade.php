<!-- users.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Liste des clients</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Code Postal</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->codepostal }}</td>
                    <td>{{ $user->tele }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
