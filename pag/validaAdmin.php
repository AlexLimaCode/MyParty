<?php
    include('./conexion.php');
    session_start();
    $_SESSION['IdNegocio'] = "Vacio";
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $query = "select IdUsuario from tblusuario where Correo = '".$correo."' and Contrasenia = '".$contrasenia."'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        
        $query = "select IdNegocio from tblusuario where Correo = '".$correo."' and Contrasenia = '".$contrasenia."'";
        $result = mysqli_query($conn, $query);
        $id ="";
        while ($row = mysqli_fetch_row($result)){
            $id = $row[0];
        }
        $_SESSION['IdNegocio'] = $id;
        if($id>0){
            header("location:./dashboard.php?accion=".$id);
        }else{
            header('location:./dashboard.php?accion=0');
        }
        
    }else{
        header('location:./inicioAdmin.php?bandera=1');
    }


?>