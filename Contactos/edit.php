<?php
include('../config/config.php');
include_once('../config/functions.php');
include('Contact.php');
$c = new Contact();
$data = mysqli_fetch_object($c->getOne($_GET['id']));
$now = isset($data->sessionDate) ? $data->sessionDate : '';

if (isset($_POST) && !empty($_POST)) {
    $_POST['Image'] = $data->Image;
    if ($_FILES['Image']['name'] !== '') {
        $_POST['Image'] = saveImage($_FILES); // Asegúrate de tener la función saveImage() implementada
    }
    $update = $c->update($_POST);
    if ($update) {
        $error = '<div class="alert alert-success" role="alert">Contacto modificado correctamente</div>';
    } else {
        $error = '<div class="alert alert-danger" role="alert">Error al modificar el contacto</div>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Modificar Lista de Contactos</title>
</head>

<body>
    <?php include('../menu.php') ?>
    <div class="container">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5">Modificar Contacto</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="Nombres" id="Nombres" placeholder="Nombre Contacto" required class="form-control" value="<?= $data->Nombres ?>" />
                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
                </div>
                <div class="col">
                    <input type="text" name="Apellidos" id="Apellidos" placeholder="Apellido Contacto" required class="form-control" value="<?= $data->Apellidos ?>" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="Email" id="Email" placeholder="Email Contacto" required class="form-control" value="<?= $data->Email ?>" />
                </div>
                <div class="col">
                    <input type="number" name="Celular" id="Celular" placeholder="Numero celular contacto" required class="form-control" value="<?= $data->Celular ?>" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="Pais" id="Pais" placeholder="Pais Contacto" required class="form-control" value="<?= $data->Pais ?>" />
                </div>
                <div class="col">
                    <input type="text" name="Reunion" id="Reunion" placeholder="Duracion de la reunion" required class="form-control" value="<?= $data->Reunion ?>" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="file" name="Image" id="Image" class="form-control" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <textarea name="Asunto" id="Asunto" placeholder="Asesoramiento, consulta, Quiero info, ..." required class="form-control"></textarea>
                    <b>Debes separar los diferentes tipos de consulta con una coma</b>
                </div>
            </div>

            <button class="btn btn-success">Modificar</button>
        </form>
    </div>
</body>

</html>