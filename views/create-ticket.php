<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/styleCreate.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>INCIDENCIAS</title>
</head>
<body>
    <header>
        <h1>INCIDENCIAS</h1>
    </header>
    <main>
        <h3>Crear una incidencia:</h3>
        <br>
        <?= isset($idTicketInserted) ? '<p style="color: #1c7430">Incidencia creada satisfactoriamente con ID ='.$idTicketInserted.'</p>' : "" ?>
        <form class="form-create" action="./index.php" method="post" enctype="multipart/form-data">
            <label for="title">Título de la incidencia:</label>
            <input type="text" name="title" id="title" value="<?= isset($title)&&isset($errorTitleMessage) ? $title : "" ?>"/> <strong class="message"><?= isset($errorTitleMessage) ? $errorTitleMessage : "" ?></strong>
            <label for="category">Categoría:</label>
            <select name="category" id="category">
                <option value="technical" <?= isset($category) && $category === 'technical' ? 'selected' : "" ?>>Técnica</option>
                <option value="education" <?= isset($category) && $category === 'education' ? 'selected' : "" ?>>Educativa</option>
                <option value="communication" <?= isset($category) && $category === 'communication' ? 'selected' : "" ?>>Comunicación</option>
            </select>
            <strong class="message"><?= isset($errorCategoryMessage) ? $errorCategoryMessage : "" ?></strong>
            <label for="priority">Prioridad:</label>
            <select name="priority" id="priority">
                <option value="low" <?= isset($priority) && $priority === 'low' ? 'selected' : "" ?>>Baja</option>
                <option value="medium" <?= isset($priority) && $priority === 'medium' ? 'selected' : "" ?>>Media</option>
                <option value="high" <?= isset($priority) && $priority === 'high' ? 'selected' : "" ?>>Alta</option>
                <option value="urgent" <?= isset($priority) && $priority === 'urgent' ? 'selected' : "" ?>>Urgente</option>
            </select>
            <strong class="message"><?= isset($errorPriorityMessage) ? $errorPriorityMessage : "" ?></strong>
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message" cols="40" rows="10"><?= isset($message)&&isset($errorDataOperation) ? $message : "" ?></textarea></br>
            <div>
                <input class="btn btn-primary" type="submit" value="Guardar cambios"/>
                <a class="btn btn-danger" href='./index.php'>Volver</a>
            </div>
        </form>
    </main>
</body>
</html>