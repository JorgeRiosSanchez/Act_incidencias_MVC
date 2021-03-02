<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        .error {
            color:darkred;
        }
    </style>
</head>
<body>
    <h1>Incidencias</h1>
    <p><strong>Registro de nuevo usuario</strong></p>
    <form action="./index.php?action=register" method="post">
        <label for="name">Nombre:</label><br/>
        <input type="text" name="name" id="name" size="25" value="<?= isset($name) ? $name : "" ?>"/> <strong class='error'><?= isset($errorNameMessage) ? $errorNameMessage : "" ?></strong><br/>
        <label for="surname">Apellidos:</label><br/>
        <input type="text" name="surname" id="surname" size="50" value="<?= isset($surname) ? $surname : "" ?>"/> <strong class='error'><?= isset($errorSurnameMessage) ? $errorSurnameMessage : "" ?></strong><br/>
        <label for="userName">Nombre de usuario:</label><br/>
        <input type="text" name="username" id="username" size="50" value="<?= isset($username) ? $username : "" ?>"/> <strong class='error'><?= isset($errorUsernameMessage) ? $errorUsernameMessage : "" ?></strong><br/>
        <label for="password">Contraseña:</label><br/>
        <input type="password" name="password" id="password" size="25" value="<?= isset($password) ? $password : "" ?>"/> <strong class='error'><?= isset($errorPasswordMessage) ? $errorPasswordMessage : "" ?></strong><br/>
        <input type="submit" value="Register"/>
    </form>
    <form action="./index.php" method="get">
        <input type="submit" value="Go back"/>
    </form>
</body>
</html>
