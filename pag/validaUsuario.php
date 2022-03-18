<?php

    include('conexion.php');
    include('funciones.php');
    session_start();
    $_SESSION['IdUsuario'] = "";
    $padre = "";
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
    if ($padre == 1) { //Validar en la tabla de usuarios para el login
        $correo = $_POST["correo"];
        $contrasenia = $_POST["contrasenia"];
        $query = "select IdUsuario from tblusuarioscomun where correo='".$correo."' and contrasenia ='".$contrasenia."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
                $_SESSION['IdUsuario'] = $row["IdUsuario"];
            }
            if ($IdNegocio != "") {
                header('Location: muestraNegocio.php?IdNegocio='.$IdNegocio);
            }else{
                header('location: ../index.php');
            }
        }else{
            header("Location: loginUser.php?bandera=1&IdNegocio=".$IdNegocio);
        }

    }else{ //Validar los datos de registro
        $nombre = $_POST["nombre"];
        $contrasenia = $_POST["contrasenia"];
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        $municipio = $_POST["municipio"];
        $estado = $_POST["estado"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $arreglo = [$nombre];
        $bandera = "";
        $bandera = verificaDatos($arreglo);
        if ($bandera == ""){
            $query = "select IdUsuario from tblusuarioscomun where Correo = '".$correo."' or Nombre='".$nombre."'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result)>0){
                header("Location: createAccount.php?bandera=1&IdNegocio=".$IdNegocio);
            }else{
                $query = "INSERT INTO `tblusuarioscomun`(`Nombre`, `Correo`, `Telefono`, `Sexo`, `Edad`, `Contrasenia`, `IdEstado`, `IdMunicipio`) VALUES('".$nombre."', '".$correo."', '".$telefono."', '".$sexo."', '".$edad."', '".$contrasenia."', '".$estado."', '".$municipio."')";
                $result = mysqli_query($conn, $query);
                $query = "select IdUsuario from tblusuarioscomun order by IdUsuario desc limit 1";
                $result2 = mysqli_query($conn, $query);
                if (mysqli_num_rows($result2)>0) {
                    while ($row=mysqli_fetch_array($result2)){
                        $_SESSION['IdUsuario'] = $row["IdUsuario"];
                    }
                    if ($IdNegocio != "") {
                        header('Location: muestraNegocio.php?IdNegocio='.$IdNegocio);
                    }else{
                        header('location: ../index.php');
                    }
                }
            }
        }else{
            header('Location: createAccount.php?IdNegocio='.$IdNegocio.'&bandera='.$bandera);
        }
        

    }

?>