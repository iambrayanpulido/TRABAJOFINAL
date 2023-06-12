<?php
include('../config/config.php');
include('Contact.php');

if (isset($_POST) && !empty($_POST)){
    $contact = new contact();

    if ($_FILES['Image']['name'] !== ''){
        $_POST['Image'] = $contact->saveImage($_FILES);
    }

    $save = $contact->save($_POST);
    if ($save){
        $error = '<div class="alert alert-success" role="alert">Contacto creado correctamente</div>'; 
    }else{
        $error = '<div class="alert alert-danger" role="alert">Error al crear el contacto</div>';
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Crear Contacto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poltawski+Nowy:ital,wght@0,500;1,400&family=Quicksand:wght@300&display=swap" rel="stylesheet"><!-- FUENTE DE LA PAGINA -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"><!-- CDN DE ICONOS DE BOOSTRAP -->
  <link rel="stylesheet" href="../ESTILOS CSS/style.css"> <!-- Enlace de archivo CSS personalizado -->
  <link rel="stylesheet" href="../ESTILOS CSS/mediaq1.css"> <!-- ENlace de archivo CSS renponsiv -->
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary barranav">
    <div class="container-fluid">
      <a class="navbar-brand" href="../INDEX.html"> <img src="../IMAGENES/LOGO.png" alt=  "" class="img-logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav textonav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../INDEX.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Marketing Int.html">Marketing internacional para principiantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Estrategias Mkt.html">Estrategias de marketing Internacional</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Contactanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>


    <div class="container">
        <?php 
            if (isset($error)){
                echo $error;
            }
        ?>
        <h2 class="text-center mb-5">Creacion agenda</h2>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="Nombres" id="Nombres" placeholder="Nombre Contacto" required class="form-control"/>
                </div>
                <div class="col">
                    <input type="text" name="Apellidos" id="Apellidos" placeholder="Apellido Contacto" required class="form-control"/>
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="Email" id="Email" placeholder="Email Contacto" required class="form-control"/>
            </div>
            <div class="col">
                <input type="text" name="Celular" id="Celular" placeholder="Número celular contacto" required class="form-control"/>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="text" name="Pais" id="Pais" placeholder="País Contacto" required class="form-control"/>
            </div>
            <div class="col">
                <input type="text" name="Reunion" id="Reunion" placeholder="Duración de la reunión" required class="form-control"/>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="file" name="Image" id="Image" class="form-control"/>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <textarea name="Asunto" id="Asunto" placeholder="Asesoramiento, consulta, Quiero info, ..." required class="form-control"></textarea>   
                <b>Debes separar los diferentes tipos de consulta con una coma</b>
            </div>
        </div>

        <button class="btn btn-success" type="submit">Registrar</button>
    </form>
</div>

 <!-- FOOTER -->

 <footer class="footer">
    <div class="container">
      <div class="row">
        <br>
        <div class="col-md-4">
          <br>
          <h3>BRAYAN STIVEN PULIDO AGUILAR</h3>
          <p>ID: 100117399</p>
          <p>MARKETING Y NEGOCIOS INTERNACIONALES</p>
          <p>DIPLOMADO EN DESARROLLO WEB CON ENFASIS EMPRESARIAL </p>
        </div>
        <div class="col-md-4">
          <br>
          <h3>Enlaces rápidos</h3>
          <ul>
            <li><a href="../INDEX.html">Inicio</a></li>
            <li><a href="../Estrategias Mkt.html">Estrategias de Marketing</a></li>
            <li><a href="../Contactos/add.php">Contacto</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <br>
          <h3>Síguenos en redes sociales</h3>
          <div class="social-icons">
            <a href="INDEX.html" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">&copy; 2023 Todos los derechos reservados</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
