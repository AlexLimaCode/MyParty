<?php

    include('conexion.php');
    session_start();
    $IdNegocio = "";
    if(isset($_POST["IdNegocio"])){
        $IdNegocio = trim($_POST["IdNegocio"]); 
        if ($IdNegocio == ""){
            if(isset($_GET["IdNegocio"])){
                $IdNegocio = $_GET["IdNegocio"];
                if ($IdNegocio == ""){
                    $IdNegocio = "";
                }
            }
        }
    }    
    else{ 
        if ($IdNegocio == ""){
            $IdNegocio = "";
        }
        if(isset($_GET["IdNegocio"])){ 
            $IdNegocio = $_GET["IdNegocio"];
            if ($IdNegocio == ""){
                $IdNegocio = "";
            }
        }    
    }
    $votos = 0;
    $sql = "select count(*) from tblvotosnegocios where IdNegocio = '".$IdNegocio."'";
    $votosResult = mysqli_query($conn,$sql);
    if ($votosResult) {
        while ($row = mysqli_fetch_array($votosResult)){
            $votos = $row[0];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script language="javascript">
        $(document).ready(function(){
            $("#servicio").change(function () {
                $("#servicio option:selected").each(function () {
                    id_servicio = $(this).val();
                    $.post("./getCategoria.php", { id_servicio: id_servicio }, function(data){
                        $("#categoria").html(data);
                    });            
                });
            })
        });
        
    </script>
    <title>Especificaciones</title>
</head>
<body >
    <nav class="navbar navbar-expand-sm navbar-light sticky-top nav-text" style="background-color: #1B1438; border: 1px solid #eb3766;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo_transparent.png" width="150" height="150"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="color: #EB3766;" href="./aboutUs.html">MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FF6B4D;" href="./servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FCBE13;" href="./publicarme.php">Registrar <br>servicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #EB3766;" href="./loginUser.php">Quiero ser <br>MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FF6B4D;" href="./contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FCBE13;" href="./inicioAdmin.php">Área MyParty</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <?php   

        if($IdNegocio == ""){
            ?>

                <div class="container">
                    <div class='text-center'>
                        <h1>Selecciona un servicio primero</h1>
                    </div>
                </div>            

            <?php
        }else{
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <div id="c2" class="carousel slide" data-bs-ride="carousel">
                            <button class="carousel-control-prev" type="button" data-bs-target="#c2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <div class="container">
                                <div class="carousel-inner">
                                    <?php
                                        $j=1;
                                        $IdServicio = "";
                                        $nombre = "";
                                        $query = "select nombre, IdServicio from tblnegocios where IdNegocio = '".$IdNegocio."'";
                                        $result = mysqli_query($conn,$query);
                                        while ($row = mysqli_fetch_row($result)){
                                            $nombre = $row[0];
                                            $IdServicio = $row[1];
                                        }
                                        $query = "select Ruta from tblimagennegocio where IdNegocio = '".$IdNegocio."' order by IdImagenNegocio";
                                        $result = mysqli_query($conn,$query);
                                        while ($row = mysqli_fetch_row($result)){
                                            if($j==1){
                                                echo "<div class='carousel-item active'>"; 
                                            }else{
                                                echo "<div class='carousel-item'>";
                                            }
                                            //echo "../img/negocios/".$IdServicio."/".$IdNegocio."-".$nombre."/".$row[0]."";
                                            echo "<img class='galleryImg img-fluid rounded mServicio' src='../img/negocios/".$IdServicio."/".$IdNegocio."-".$nombre."/".$row[0]."'>";
                                            echo "</div>";
                                            $j++;
                                        }
                                    ?>
                                </div>
                            </div>
                            <button class="carousel-control-next" type="button" data-bs-target="#c2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md">
                        <?php
                            $query = "select Descripcion, Direccion, Telefono, Whatsapp, Facebook, Instagram, Correo from tblnegocios where IdNegocio = '".$IdNegocio."'";
                            $result = mysqli_query($conn, $query);
                            $descripcion="";
                            $direccion="";
                            $telefono="";
                            $whatsapp="";
                            $facebook="";
                            $instagram="";
                            $correo="";

                            $i=0;
                            while ($row = mysqli_fetch_row($result)) {
                                $descripcion=$row[0];
                                $direccion=$row[1];
                                $telefono=$row[2];
                                $whatsapp=$row[3];
                                $facebook=$row[4];
                                $instagram=$row[5];
                                $correo=$row[6];
                            }
                            ?>
                            <div class="text-center">
                                <?php
                                    echo "<h1 style='text-weight: 200px;'>".$nombre."</h1>";
                                ?>
                                <br>
                            </div>
                            <?php
                            echo "<h5 style='text-align: justify;'>".$descripcion."</h5>";
                            echo "<br>";
                            echo "<div style='display:flex'><img src='../img/ubicacion.png' alt='' style='width: 30px; height: 30px; margin-right: 10px;'><span><h6 style='margin-top: 10px; color: #FCBE13;'>Direccion: ".$direccion."</h6></span></div>";
                            echo "<br>";
                            echo "<h4>Contacto:</h4>";
                            echo "<br><a href='tel:+521".$telefono."' style='display:inline-block; text-decoration: none; margin-top:10px'><img src='../img/phone.png' alt='' style='width: 30px; height: 30px;'><span style='margin-left:10px'><p style='display:inline'>".$telefono."</p></span></a><br>";
                            if ($instagram != "NA") {
                                echo "<a href='".$instagram."' style='display:inline-block; text-decoration: none; margin-top:10px'><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'><span style='margin-left:10px'><p style='display:inline; font-size: 10px;'>".$instagram."</p></span></a><br>";
                            }
                            if ($facebook != "NA") {
                                echo "<a href='".$facebook."' style='display:inline-block; text-decoration: none; margin-top:10px'><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'><span style='margin-left:10px'><p style='display:inline ; font-size: 10px;'>".$facebook."</p></span></a><br>";
                            }
                            echo "<a href='https://api.whatsapp.com/send?phone=52".$whatsapp."' style='display:inline-block; text-decoration: none; margin-top:10px'><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'><span style='margin-left:10px'><p style='display:inline'>".$whatsapp."</p></span></a><br>";
                            echo "<a href='mailto:".$correo."' style='display:inline-block; text-decoration: none; margin-top:10px;'><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'><span style='margin-left:10px'><p style='display:inline'>".$correo."</p></a></span>";

                        ?>
                        <br>
                        <?php
                        if (isset($_SESSION['IdUsuario'])) {//El usuario ha iniciado sesion
                            $voted = 0;
                            $query = "select count(*) from tblvotosnegocios where IdUsuario = '".$_SESSION['IdUsuario']."' and IdNegocio = '".$IdNegocio."'";
                            //echo $query;
                            $result = mysqli_query($conn, $query);
                            if ($result){ //No dio like
                                while ($row = mysqli_fetch_row($result)){
                                    $voted = $row[0];
                                }
                                if ($voted == 0) {
                                    ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-3"><?php echo "<a href='like.php?IdNegocio=".$IdNegocio."'>";?><img src="../img/like.png" class="img-fluid"></a></div>
                                                <div class="col-3 text-center votos"><h1><?php echo $votos; ?></h1></div>
                                            </div>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-3"><img src="../img/like.png" class="img-fluid"></div>
                                                <div class="col-3 text-center votos"><h1><?php echo $votos; ?></h1></div>
                                            </div>
                                        </div>
                                    <?php
                                }
                                
                            }else{ //Ya ha dado like
                                ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3"><img src="../img/likeado.png" class="img-fluid"></div>
                                            <div class="col-3 text-center votos"><h1><?php echo $votos; ?></h1></div>
                                        </div>
                                    </div>
                                <?php                                
                            }
                        }else{//No ha iniciado sesion
                        ?>
                            <div class="container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3"><img src="../img/like.png" class="img-fluid"></div>
                                            <div class="col-3 text-center votos"><h1><?php echo $votos; ?></h1></div>
                                        </div>
                                    </div>
                                <br>
                                <?php echo "<a class='btn btn-primary' style='background-image: linear-gradient(#FF6B4D, #1B1438); border-color: #FF6B4D;' href='loginUser.php?IdNegocio=".$IdNegocio."'>Iniciar sesión para votar</a>" ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    
    <br><br>
    <footer>
        <div class="container-fluid" style="background-color: #1B1438; border: 1px solid #FCBE13;">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md mt-5">
                    <a href="../index.php">
                        <img src="../img/logo_transparent.png" width="250">
                    </a>
                </div>
                <div class="col-md mt-5 text-white">
                    <br><br>
                    <a href="./servicios.php" class="text-white text-decoration-none"><h6 style="color: #FF6B4D;">Servicios</h6></a><br>
                    <a href="./publicarme.php" class="text-white text-decoration-none"><h6 style="color: #FCBE13;">Registrar servicio</h6></a><br>
                    <a href="./contacto.php" class="text-white text-decoration-none"><h6 style="color: #EB3766;">Contacto</h6></a><br>
                </div>
                <div class="col-md mt-5 text-white">
                    <br><br>
                    <a href="#" class="text-white text-decoration-none"><h6 style="color: #EB3766;">Siguenos en</h6></a><br>
                    <div class="row text-center" style="justify-content: center; margin-bottom: 30px;">
                        <img src="../img/facebook.png" alt="" style="width: 50px; height: 30px;">
                        <img src="../img/instagram.png" alt="" style="width: 50px; height: 30px;">
                        <img src="../img/tiktok.png" alt="" style="width: 50px; height: 30px;">
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=527295955316" class="text-white text-decoration-none"><h6 style="color: #FF6B4D;">Agendar cita de servico </h6></a><br>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>