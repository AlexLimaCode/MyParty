<?php

    include('conexion.php');
    session_start();
    $name = $_POST['nombre'];
    $des = $_POST['descripcion']; 
    $dire = $_POST['direccion']; 
    $tel = $_POST['telefono']; 
    $wha = $_POST['whatsapp']; 
    $face = $_POST['facebook']; 
    $insta = $_POST['instagram']; 
    $correo = $_POST['correo']; 
    $carpeta = $_POST['carpeta'];
    $Idim0 = $_POST['Idim0'];
    $Idim1 = $_POST['Idim1'];
    $Idim2 = $_POST['Idim2'];
    $Idim3 = $_POST['Idim3'];
    $Idim4 = $_POST['Idim4'];
    $Idim5 = $_POST['Idim5'];
    $Idim6 = $_POST['Idim6'];
    $aViejo;
    //echo $_POST['im0'];
    
    $query = "update tblnegocios set Nombre = '".$name."', Descripcion = '".$des."', Direccion='".$dire."', Telefono = '".$tel."', 
    Whatsapp = '".$wha."', Facebook = '".$face."', Instagram = '".$insta."', Correo = '".$correo."' where IdNegocio = '".$_SESSION['IdNegocio']."'";
    $result = mysqli_query($conn, $query);

    $im0=$_FILES['im0']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im0){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im0']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim0."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im0."' where IdImagenNegocio ='".$Idim0."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im0);
    }
    
    $im1=$_FILES['im1']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im1){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im1']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim1."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im1."' where IdImagenNegocio ='".$Idim1."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im1);
    }
    $im2=$_FILES['im2']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im2){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im2']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim2."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im2."' where IdImagenNegocio ='".$Idim2."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im2);
    }
    $im3=$_FILES['im3']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im3){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im3']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim3."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im3."' where IdImagenNegocio ='".$Idim3."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im3);
    }
    $im4=$_FILES['im4']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im4){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im4']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim4."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im4."' where IdImagenNegocio ='".$Idim4."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im4);
    }
    $im5=$_FILES['im5']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im5){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im5']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim5."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im5."' where IdImagenNegocio ='".$Idim5."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im5);
    }
    $im6=$_FILES['im6']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
    if ($im6){  //SI CAMBIO LA IMAGEN
        $temp = $_FILES['im6']['tmp_name'];
        $query = "select Ruta from tblimagennegocio where IdImagenNegocio = '".$Idim6."'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($result)){ 
            $aViejo = $row[0];
        }
        unlink($carpeta."/".$aViejo);
        $query = "update tblimagennegocio set Ruta = '".$im6."' where IdImagenNegocio ='".$Idim6."'";
        $resultado = mysqli_query($conn,$query);
        move_uploaded_file($temp,$carpeta."/".$im6);
    }
    
    //header('location:./dashboard.php');




?>