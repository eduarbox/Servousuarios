<?php $url_base = "http://localhost/servousuarios/"; ?>

<!doctype html>
<html lang="es">

<head>
    <title>Servo Usuarios UVA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

      <!-- Enlace al archivo de estilos CSS de Bootstrap v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href='#' aria-current="page" onclick="window.location.href = '<?php echo $url_base; ?>index.php';"> SERVO USUARIOS <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/contacto/">Nuevo Usuario</a>
            </li>
        </ul>
    </nav>

    <main class="container">
    <br>

