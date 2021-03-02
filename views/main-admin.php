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
                </div>
            </div>
            <table class='table table-striped table-hover'>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                        $rowActionValue = $ticket->status === 'close' ? "<strong style='color: darkred'>CLOSED</strong>" : "<a href='./index.php?action=closeTicket&ticketId={$ticket->id}' class='btn btn-danger'><span>Close</span></a>";
                        echo "<tr>
                                <td>".$ticket->category."</td>
                                <td><a href='./index.php?action=selectTicket&ticketId={$ticket->id}'>".$ticket->id." - ".$ticket->title." - ".$ticket->userName."</a></td>
                                <td>".$ticket->priority."</td>
                                <td>".$ticket->status."</td>
                                <td>".$rowActionValue."</td>
                              </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        if(isset($_GET['closed']) && $_GET['closed']){
            echo "<strong style='color: darkred'>La incidencia ha sido cerrada satisfactoriamente.</strong><br>";
        }
        ?>
    </div>
</div>
</body>
</html>