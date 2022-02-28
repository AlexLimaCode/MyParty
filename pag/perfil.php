<?php
    //Modulo del usuario donde desplegaremos
    /**
     * Datos
     * Eventos
     * Tickets
     * Likes
    **/

    include('conexion.php');
    include('funciones.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>My perfil</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Bienvenido a MyParty nombre de usuario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="#">Datos Personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis Likes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis boletos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Inicio</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>