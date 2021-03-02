<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen</title>
    <link rel="stylesheet" type="text/css" href="assets/styleTable.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<h1>INCIDENCIAS</h1>
<p>Bienvenido <?= $_SESSION["userName"] ?> con usuario tipo <strong><?= $_SESSION["userType"] ?></strong> - <a href="./index.php?action=logout">Salir</a></p>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Listado de incidencias</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="./index.php?action=getCreate" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Añadir nuevo préstamo</span></a>
                    </div>
                </div>
            </div>
            <table class='table table-striped table-hover'>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(count($tickets) === 0){
                    echo "<tr>
                            <td>NO SUCH DATA TO SHOW</td>
                          </tr>";
                } else {
                    foreach ($tickets as $ticket) {
                        echo "<tr>
                            <td>".$ticket->category."</td>
                            <td><a href='./index.php?action=selectTicket&ticketId={$ticket->id}'>".$ticket->id." - ".$ticket->title."</a></td>
                            <td>".$ticket->priority."</td>
                            <td>".$ticket->status."</td>
                          </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>