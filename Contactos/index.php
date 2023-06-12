<?php
include('../config/config.php');
include('Contact.php');
$c = new Contact();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $remove = $c->remove($_GET['id']);
    if ($remove) {
        header('Location:' . ROOT . '/Contactos/index.php');
    } else {
        $msj = "<div class='alert alert-danger rol='alert'>Error al eliminar el contacto.</div>";
    }
}

$allContact = $c->getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Lista de Contactos</title>
</head>

<body>
    <?php include('../menu.php') ?>
    <div class="container">
        <h2 class="text-center mb-2">Lista de Contactos</h2>

        <div class="d-flex flex-wrap justify-content-center">
            <?php
            while ($contact = mysqli_fetch_object($allContact)) {
                $input = $contact->Reunion;

                echo "<div class='col-md-3 mb-3'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>
                    <img src='" . ROOT . "/images/$contact->Image' width='50' height='50' />
                    $contact->Nombres $contact->Apellidos
                    </h5>";
                    echo "<p><b>Asunto:</b></p>";
                    echo "<p>" . nl2br($contact->Asunto) . "</p>";
                    echo "<p><b>Duración:</b> $contact->Reunion</p>";                    
                echo "<div class='text-center'><a class='btn btn-success' href='" . ROOT . "Contactos/edit.php?id=$contact->id'>Modificar</a> - <a class='btn btn-danger' href='" . ROOT . "/Contactos/index.php?id=$contact->id'>Eliminar</a></div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='mx-3'></div>";
                
            }
            ?>
        </div>
    </div>
</body>

</html>

