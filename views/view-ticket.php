<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>INCIDENCIAS</title>
</head>
<body>
    <header>
        <h1>INCIDENCIAS</h1>
    </header>
    <main>
        <h3>Detalle de la incidencia:</h3>
        <br>
            <?php
            if(isset($ticket)){
            ?>
                <p><strong><?= $ticket->id." - ".$ticket->title ?></strong></p></br>
                <p>Mensaje: <?= $ticket->message ?></p>
                <p>Category: <?= $ticket->category ?></p>
                <p>Status: <?= $ticket->status?></p>
                <p>Priority: <?= $ticket->priority?></p>
                <?php
            } else {
            ?>
                <p>No hay datos del artículo solicitado</p>
            <?php
            }
            ?>
            <div>
                <a class="btn btn-primary" href='./index.php'>Volver</a>
            </div>
    </main>
</body>
</html>