<!DOCTYPE html>
    <html lang="es">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <title>Incidencias</title>
    </head>
    <body>
    <div class="wrapper fadeInDown">
        <a href="./index.php?action=registerNewUser"> Register here</a>
        <?php
        if(isset($_GET['registered']) && $_GET['registered']){
            echo "<strong style='color: #1c7430'>Usuario registrado satisfactoriamente.</strong><br>";
        }
        ?>
        <div id="formContent">
            <div class="fadeIn first">
                <img src="assets/images/icon.svg" id="icon" alt="User Icon" />
            </div>
            <form action="./index.php?action=login" method="post">
                <label for="username">Usuario:</label>
                <input type="text" id="username" class="fadeIn second" name="username" value="">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" class="fadeIn third" name="password" value="">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        </div>
        <?php
        if(isset($_GET['login']) && $_GET['login']==='failed'){
            echo "<strong style='color: darkred'>El usuario o contraseña no son válidos, inténtelo de nuevo.</strong><br>";
        }
        ?>
    </div>
</body>
</html>