<?php
    session_start();
    include('conexion.php');
    $IdNegocio = $_GET['IdNegocio'];

    $query = "INSERT INTO `tblvotosnegocios`(`IdNegocio`, `IdUsuario`) values ('".$IdNegocio."', '".$_SESSION['IdUsuario']."')";
    //echo $query;
    $result = mysqli_query($conn, $query);
    header('location: muestraNegocio.php?IdNegocio='.$IdNegocio);


?>