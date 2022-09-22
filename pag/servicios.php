<?php
    include('conexion.php');
    include('funciones.php');
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YNT59W3YDK"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YNT59W3YDK');
        </script>
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1809919959348751');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1809919959348751&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
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
    <link rel="shortcut icon" href="../img/logo_transparent.ico" type="image/x-icon">
    <link rel="icon" href="../img/logo_transparent.ico" type="image/x-icon">
    <title>Servicios</title>
    <style>
        .container{
            min-height: calc(100vh - 100px - 100px);
        }
    </style>
</head>
<body >
    <?php
        $padre = "";
        $categoria = "";
        $servicio = "";
        $nServicio="";
        $nCategoria="";
        if(isset($_POST["padre"])){
            $padre = trim($_POST["padre"]); 
            if ($padre == ""){
                if(isset($_GET["padre"])){
                    $padre = $_GET["padre"];
                    if ($padre == ""){
                        $padre = "";
                    }
                }
            }
        }    
        else{ 
            if ($padre == ""){
                $padre = "";
            }
            if(isset($_GET["padre"])){ 
                $padre = $_GET["padre"];
                if ($padre == ""){
                    $padre = "";
                }
            }    
        }
        if ($padre!="") {
            $servicio = $padre;
        }else{
            if(isset($_POST["servicio"])){
                $servicio = trim($_POST["servicio"]); 
                if ($servicio == ""){
                    if(isset($_GET["servicio"])){
                        $servicio = $_GET["servicio"];
                        if ($servicio == ""){
                            $servicio = "";
                        }
                    }
                }
            }    
            else{ 
                if ($servicio == ""){
                    $servicio = "";
                }
                if(isset($_GET["servicio"])){ 
                    $servicio = $_GET["servicio"];
                    if ($servicio == ""){
                        $servicio = "";
                    }
                }    
            }
            if(isset($_POST["categoria"])){
                $categoria = trim($_POST["categoria"]); 
                if ($categoria == ""){
                    if(isset($_GET["categoria"])){
                        $categoria = $_GET["categoria"];
                        if ($categoria == ""){
                            $categoria = "";
                        }
                    }
                }
            }    
            else{ 
                if ($categoria == ""){
                    $categoria = "";
                }
                if(isset($_GET["categoria"])){ 
                    $categoria = $_GET["categoria"];
                    if ($categoria == ""){
                        $categoria = "";
                    }
                }    
            }
        }
        $bandera = true;
    ?>
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

    
  
    <div class="container">
      <form id="principal" name="principal">
        <div class="row">
            <?php
                if ($servicio=="") {
                    ?>
                    <div class='col-md'>
                        <h5 class="text-center" style='color:white;'>Selecciona el Servicio:</h5>
                        <?php
                        LlenaComboSaltado("select IdServicio, Descripcion from tblservicios order by Descripcion asc","algo","servicio");
                        ?>
                    </div>
                    <div class='col-md'>
                    <h5 class="text-center" style='color:white;'>Selecciona la Categoria:</h5>
                        <select class='form-select' aria-label='Default select example' name="categoria" id="categoria" required style="background: #EB3766;color: white;">

                        </select>
                    </div>
                    <div class="text-center">
                        <br><br>
                        <input type="submit" class="btn btn-light" value='Buscar'>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class='col-md'>
                        <h5 class="text-center" style='color:white;'>Selecciona el Servicio:</h5>
                        <?php
                        LlenaComboSaltado("select IdServicio, Descripcion from tblservicios order by Descripcion asc","algo","servicio");
                        ?>
                    </div>
                    <div class='col-md'>
                    <h5 class="text-center" style='color:white;'>Selecciona la Categoria:</h5>
                        <select class='form-select' aria-label='Default select example' name="categoria" id="categoria" required style="background: #EB3766;color: white;">

                        </select>
                    </div>
                    <div class="text-center">
                        <br><br>
                        <input type="submit" class="btn btn-light" value='Buscar'>
                    </div>
                    <?php
                    if ($categoria!="") {
                        $query = "select s.Descripcion, c.Descripcion from tblcategorias c, tblserviciocategoria p, tblservicios s where c.IdCategoria = p.IdCategoria and s.IdServicio = p.IdServicio and s.IdServicio='".$servicio."' and c.IdCategoria='".$categoria."' order by c.Descripcion asc";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result)>0){
                            while ($row=mysqli_fetch_row($result)){
                                $nServicio = $row[0];
                                $nCategoria = $row[1];
                            }
                        }
                    }else{
                        $query = "select Descripcion from tblservicios where IdServicio=".$servicio;
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result)>0){
                            while ($row=mysqli_fetch_row($result)){
                                $nServicio = $row[0];
                            }
                        }
                    }
                    
                    ?>
                    <div class="text-center">
                        <br><br>
                        <?php
                        if ($nCategoria=="") {
                            ?>
                            <h1 class="text-center" style='color:white;'>Mostrando servicios de <?php echo $nServicio; ?></h1>
                            <br><br><br>
                            <section>
                                <div class="container">
                                    <?php
                                    $categoria = "";
                                    $query = "select IdCategoria from tblnegocios where IdServicio = '".$servicio."' and IdEstatus = 1 order by IdNegocio limit 1";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result)>0) {
                                        while ($row=mysqli_fetch_array($result)){
                                            $categoria = $row[0];
                                        }
                                    }else{
                                        $bandera = false;
                                    }
                                    $dato = array();
                                    $datos = array();
                                    $query = "select IdNegocio, Nombre, Whatsapp, Facebook, Instagram, Correo from tblnegocios where IdServicio = '".$servicio."' and IdCategoria='".$categoria."' and IdEstatus = 1 order by IdNegocio";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result)>0) {
                                        while ($row=mysqli_fetch_array($result)){
                                            array_push($dato, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                                            array_push($datos, $dato);
                                            foreach ($dato as $i => $value) { array_pop($dato); }
                                        }
                                    }else{
                                        $bandera = false;
                                    }
                                    if (!$bandera) {
                                       echo "<br><br><br><br>";
                                       echo "<div class='text-center'>";
                                       echo "<h1>Ups! Parece que aun no tenemos negocios para esta seccion</h1>";
                                       echo "</div>";
                                    }else{
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
                                        $imagen='';
                                        $id = '';
                                        if($n<1){
                                            $n=1;
                                        }
                                        ?>
                                    <br><br>
                                        <?php
                                        while($i < $n) {
                                            if ($j==0) {
                                                echo "<div class='row'>";
                                                    echo "<div class='col-md'>";
                                                    $id = $datos[$j][0];
                                                    $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row=mysqli_fetch_array($result)){
                                                        $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                    }
                                                    echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                    echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                    echo "</a>";
                                                    echo "<br> <br>";
                                                    echo "<div class='text-center fw-bolder'>";
                                                    echo "<h1>".$datos[$j][1]."</h1>";
                                                    echo "<span>";
                                                    if ($datos[$j][4]!="NA") {
                                                        echo "<a href='".$datos[$j][4]."'><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    if ($datos[$j][3]!="NA") {
                                                        echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "</span>";
                                                    echo "</div>";    
                                                    echo "</div>";
                                                    echo "<br> <br>";
                                            }else if(sizeof($datos)==$j){
                                                echo "</div>";
                                                $i++;
                                            }
                                            else if ($j%3!=0 ) {
                                                    echo "<div class='col-md'>";
                                                    $id = $datos[$j][0];
                                                    $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row=mysqli_fetch_array($result)){
                                                        $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                    }
                                                    echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                    echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                    echo "</a>";
                                                    echo "<br> <br>";
                                                    echo "<div class='text-center fw-bolder'>";
                                                    echo "<h1>".$datos[$j][1]."</h1>";
                                                    echo "<span>";
                                                    if ($datos[$j][4]!="NA") {
                                                        echo "<a href='".$datos[$j][4]."' ><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    if ($datos[$j][3]!="NA") {
                                                        echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "</span>";
                                                    echo "</div>";    
                                                    echo "</div>";
                                                    echo "<br> <br>";
                                                
                                            }else{
                                                if($j%3==0 && $j==sizeof($datos)){
                                                    echo "</div>";
                                                    $i++;
                                                }else{
                                                    echo "</div>";
                                                    $i++;
                                                    echo "<div class='row'>";
                                                        echo "<div class='col-md'>";
                                                        $id = $datos[$j][0];
                                                        $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row=mysqli_fetch_array($result)){
                                                            $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                        }
                                                        echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                        echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                        echo "</a>";
                                                        echo "<br> <br>";
                                                        echo "<div class='text-center fw-bolder'>";
                                                        echo "<h1>".$datos[$j][1]."</h1>";
                                                        echo "<span>";
                                                        if ($datos[$j][4]!="NA") {
                                                            echo "<a href='".$datos[$j][4]."' ><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                            echo "&nbsp&nbsp&nbsp";
                                                        }
                                                        if ($datos[$j][3]!="NA") {
                                                            echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                            echo "&nbsp&nbsp&nbsp";
                                                        }
                                                        echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                        echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                        echo "</span>";
                                                        echo "</div>";    
                                                        echo "</div>";
                                                    echo "<br> <br>";
                                                }
                                            }
                                            $j++;
                                        }
                                    }
                                    

                                    ?>
                                </div>
                            </section>
                            <?php
                        }else{
                            ?>
                            <h1 class="text-center" style='color:white;'>Mostrando servicios de <?php echo $nServicio; ?> con categoria de <?php echo $nCategoria; ?></h1>
                            <br><br><br>
                            <section>
                                <div class="container">
                                    <?php
                                    $dato = array();
                                    $datos = array();
                                    $query = "select IdNegocio, Nombre, Whatsapp, Facebook, Instagram, Correo from tblnegocios where IdServicio = '".$servicio."' and IdCategoria='".$categoria."' and IdEstatus = 1 order by IdNegocio";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result)>0) {
                                        while ($row=mysqli_fetch_array($result)){
                                            array_push($dato, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                                            array_push($datos, $dato);
                                            foreach ($dato as $i => $value) { array_pop($dato); }
                                        }
                                    }else{
                                        $bandera = false;
                                    }
                                    if (!$bandera) {
                                       echo "<br><br><br><br>";
                                       echo "<div class='text-center'>";
                                       echo "<h1>Ups! Parece que aun no tenemos negocios para esta seccion</h1>";
                                       echo "</div>";
                                    }else{
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
                                        $imagen='';
                                        $id = '';
                                        if($n<1){
                                            $n=1;
                                        }
                                        ?>
                                    <br><br>
                                        <?php
                                        while($i < $n) {
                                            if ($j==0) {
                                                echo "<div class='row'>";
                                                    echo "<div class='col-md'>";
                                                    $id = $datos[$j][0];
                                                    $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row=mysqli_fetch_array($result)){
                                                        $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                    }
                                                    echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                    echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                    echo "</a>";
                                                    echo "<br> <br>";
                                                    echo "<div class='text-center fw-bolder'>";
                                                    echo "<h1>".$datos[$j][1]."</h1>";
                                                    echo "<span>";
                                                    if ($datos[$j][4]!="NA") {
                                                        echo "<a href='".$datos[$j][4]."' ><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    if ($datos[$j][3]!="NA") {
                                                        echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "</span>";
                                                    echo "</div>";    
                                                    echo "</div>";
                                                    echo "<br> <br>";
                                            }else if(sizeof($datos)==$j){
                                                echo "</div>";
                                                $i++;
                                            }
                                            else if ($j%3!=0 ) {
                                                    echo "<div class='col-md'>";
                                                    $id = $datos[$j][0];
                                                    $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row=mysqli_fetch_array($result)){
                                                        $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                    }
                                                    echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                    echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                    echo "</a>";
                                                    echo "<br> <br>";
                                                    echo "<div class='text-center fw-bolder'>";
                                                    echo "<h1>".$datos[$j][1]."</h1>";
                                                    echo "<span>";
                                                    if ($datos[$j][4]!="NA") {
                                                        echo "<a href='".$datos[$j][4]."' ><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    if ($datos[$j][3]!="NA") {
                                                        echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                    }
                                                    echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                    echo "&nbsp&nbsp&nbsp";
                                                    echo "</span>";
                                                    echo "</div>";    
                                                    echo "</div>";
                                                    echo "<br> <br>";
                                                
                                            }else{
                                                if($j%3==0 && $j==sizeof($datos)){
                                                    echo "</div>";
                                                    $i++;
                                                }else{
                                                    echo "</div>";
                                                    $i++;
                                                    echo "<div class='row'>";
                                                        echo "<div class='col-md'>";
                                                        $id = $datos[$j][0];
                                                        $query = "select Ruta from tblimagennegocio where IdNegocio='".$id."' order by IdNegocio limit 1";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row=mysqli_fetch_array($result)){
                                                            $imagen = "../img/negocios/".$servicio."/".$datos[$j][0]."-".$datos[$j][1]."/".$row[0];
                                                        }
                                                        echo "<a href='muestraNegocio.php?IdNegocio=".$datos[$j][0]."'>";
                                                        echo " <img src='".$imagen."' style='width: 300px; height: 200px;' class='img-fluid rounded '>";
                                                        echo "</a>";
                                                        echo "<br> <br>";
                                                        echo "<div class='text-center fw-bolder'>";
                                                        echo "<h1>".$datos[$j][1]."</h1>";
                                                        echo "<span>";
                                                        if ($datos[$j][4]!="NA") {
                                                            echo "<a href='".$datos[$j][4]."' ><img src='../img/instagram.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                            echo "&nbsp&nbsp&nbsp";
                                                        }
                                                        if ($datos[$j][3]!="NA") {
                                                            echo "<a href='".$datos[$j][3]."' ><img src='../img/facebook.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                            echo "&nbsp&nbsp&nbsp";
                                                        }
                                                        echo "<a href='https://api.whatsapp.com/send?phone=52".$datos[$j][2]."' ><img src='../img/whatsapp.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                        echo "<a href='mailto:".$datos[$j][5]."' ><img src='../img/mail.png' alt='' style='width: 30px; height: 30px;'></a>";
                                                        echo "&nbsp&nbsp&nbsp";
                                                        echo "</span>";
                                                        echo "</div>";    
                                                        echo "</div>";
                                                    echo "<br> <br>";
                                                }
                                            }
                                            $j++;
                                        }
                                    }
                                    

                                    ?>
                                </div>
                            </section>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            ?>
            
        </div>
        </form>
    </div>
        <br><br>
    <footer>
        <div class="container-fluid" style="background-color: #1B1438; border: 1px solid #FCBE13;">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md mt-5">
                    <a href="index.php">
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
                    <div class="row text-center" style="width:50%;justify-content: center;margin-bottom: 30px;display: inline-flex;">
                        <div class="col-md">
                            <a href="https://www.facebook.com/MyParty-102006598915618/?ref=pages_you_manage">
                                <img src="../img/facebook.png" alt="" style="width: 30px; height: 30px;">
                            </a>
                        </div>
                        <div class="col-md">
                            <a href="https://www.instagram.com/allmyparty_/?hl=es">
                                <img src="../img/instagram.png" alt="" style="width: 30px; height: 30px;">
                            </a>
                        </div>
                        <div class="col-md">
                            <a href="https://www.tiktok.com/@allmyparty">
                                <img src="../img/tiktok.png" alt="" style="width: 30px; height: 30px;">
                            </a>
                        </div>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=527295955316" class="text-white text-decoration-none"><h6 style="color: #FF6B4D;">Agendar cita de servico </h6></a><br>
                </div>
            </div>
        </div>
    </footer>
      
    
    <script>
        $(document).on("ready", function(){
            enviarData();
        });

        function enviarData(){
            $("#principal").on("submit", fuction(e)){
                e.preventDefault();
                var formulario = $(this).serialize();
                console.log( formulario );
            }
        }
    </script>
    
</body>
</html>