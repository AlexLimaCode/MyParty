<?php

include('./pag/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="img/logo_transparent.ico" type="image/x-icon">
    <link rel="icon" href="img/logo_transparent.ico" type="image/x-icon">
    <title>MyParty</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-dark sticky-top nav-text">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo_transparent.png" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./pag/servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./pag/publicarme.php">Publicarme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./pag/inicioAdmin.php">Panel de control</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <svg viewBox="0 0 960 300">
            <symbol id="s-text">
            <text text-anchor="middle" x="50%" y="80%">MyParty</text>
            </symbol>
            
            <g class = "g-ants">
            <use xlink:href="#s-text" class="text-copy"></use>
            <use xlink:href="#s-text" class="text-copy"></use>
            <use xlink:href="#s-text" class="text-copy"></use>
            <use xlink:href="#s-text" class="text-copy"></use>
            <use xlink:href="#s-text" class="text-copy"></use>
            </g>
        </svg>
    </div>
    <section>
        <div class="container">
            <?php
            $imagenes = array();
            $imagen = array();
            $query = 'select Ruta, Descripcion, s.IdServicio from tblimagenservicio t, tblservicios s where t.IdServicio = s.IdServicio order by IdImagenServicio';
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result)>0) {
                while ($row=mysqli_fetch_array($result)){
                    array_push($imagen, $row[0], $row[1], $row[2]);
                    array_push($imagenes, $imagen);
                    foreach ($imagen as $i => $value) { array_pop($imagen); }
                }
            }
            $n=0;
            if (mysqli_num_rows($result)>0) {
                $n = mysqli_num_rows($result)/3; //me da el numero de renglones
            }
            
            // echo('<pre>');
            // var_dump($imagenes);
            // echo('</pre>');
      
            // echo $imagenes[0][1];
            $j=0;
            $i=0;

            ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php
            while($i < $n) {
                if ($j==0) {
                    echo "<div class='row'>";
                        echo "<div class='col-md'>";
                        echo "<a href='./pag/servicios.php?padre=".$imagenes[$j][2]."'>";
                        echo " <img src='./img/servicios/".$imagenes[$j][0]."' style='width: 500px; height: 200px;' class='img-fluid rounded '>";
                        echo "</a>";
                        echo "<br> <br>";
                        echo "<div class='text-center fw-bolder'>";
                        echo "<h1>".$imagenes[$j][1]."</h1>";
                        echo "</div>";    
                        echo "</div>";
                        echo "<br> <br>";
                }
                else if ($j%3!=0 ) {
                    
                    echo "<div class='col-md'>";
                    echo "<a href='./pag/servicios.php?padre=".$imagenes[$j][2]."'>";
                    echo " <img src='./img/servicios/".$imagenes[$j][0]."' style='width: 500px; height: 200px;' class='img-fluid rounded '>";
                    echo "</a>";
                    echo "<br> <br>";
                    echo "<div class='text-center fw-bolder'>";
                    echo "<h1>".$imagenes[$j][1]."</h1>";
                    echo "</div>";    
                    echo "</div>";
                    echo "<br> <br>";
                    
                }else{
                    if($j==9){
                        echo "</div>";
                        $i++;
                    }else{
                        echo "</div>";
                        $i++;
                        echo "<div class='row'>";
                            echo "<div class='col-md'>";
                            echo "<a href='./pag/servicios.php?padre=".$imagenes[$j][2]."'>";
                            echo " <img src='./img/servicios/".$imagenes[$j][0]."' style='width: 500px; height: 200px;' class='img-fluid rounded '>";
                            echo "</a>";
                            echo "<br> <br>";
                            echo "<div class='text-center fw-bolder'>";
                            echo "<h1>".$imagenes[$j][1]."</h1>";
                            echo "</div>";
                            echo "</div>";
                            echo "<br> <br>";
                    }
                }
                $j++;
            }

            ?>
        </div>
    </section>
    <br><br><br><br>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-md">
                    <div class="text-center">
                        <h1 class="interlineado">¿Quienes somos?</h1>
                    </div>
                    <p class="interlineado">MyParty es una plataforma dedicada a promover servicios para eventos sociales, tales como:</p>
                    <p class="interlineado">- Salones</p>
                    <p class="interlineado">- Dj's</p>
                    <p class="interlineado">- Banqueterias</p>
                    <p class="interlineado">- Grupos Musicales</p>
                    <p class="interlineado">- Entretenimiento</p>
                    <p class="interlineado">Y mucho más</p>
                    
                </div>
                <div class="col-md">
                    <img src="./img/logo_transparent.png" alt="" class="img-fluid">
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md">
                    <img src="./img/22.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md">
                    <div class="text-center">
                        <h1 class="interlineado">Nuestra Misión</h1>
                    </div>
                    <p class="text-justify">Promover los servicios ofrecidos por las empresas de tu localidad para que los usuarios encuentren lo necesario para tener la fiesta de sus sueños.</p>
                    <div class="text-center">
                        <h1 class="interlineado">Nuestra Visión</h1>
                    </div>
                    <p>Ser la empresa de busqueda de servicios locales mas rapida y confiable del país.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md"></div>
                <div class="col-md"></div>
                <div class="col-md"></div>
            </div>
        </section>
    </div>
    <br><br>
    <footer>
        <div class="container-fluid bg-dark">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md mt-5">
                    <a href="index.html">
                        <img src="../img/logo_transparent.png" width="250">
                    </a>
                </div>
                <div class="col-md mt-5 text-white">
                    <br><br>
                    <a href="./servicios.php" class="text-white text-decoration-none"><h6>Servicios</h6></a><br>
                    <a href="./publicarme.php" class="text-white text-decoration-none"><h6>Publicarme</h6></a><br>
                    <a href="./contacto.php" class="text-white text-decoration-none"><h6>Contacto</h6></a><br>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>