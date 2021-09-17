<?php
    include('./conexion.php');
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $query = "select IdUsuario from tblusuario where Correo = '".$correo."' and Contrasenia = '".$contrasenia."'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        header('location:./dashboard.php');
    }else{
        header('location:./inicioAdmin.php?bandera=1');
    }


?>