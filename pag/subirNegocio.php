<?php

    include("conexion.php");


    $padre="";
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
    $fechaActual = date('Y-m-d');
    if ($padre==1) {    //ENCONTRO SU SERVICIO Y SU CATEGORIA
        $name = $_POST['name'];
        $des = $_POST['des']; 
        $dire = $_POST['dire']; 
        $tel = $_POST['tel']; 
        $wha = $_POST['wha']; 
        $face = $_POST['face']; 
        $insta = $_POST['insta']; 
        $correo = $_POST['correo']; 
        $servicio = $_POST['servicio'];
        $categoria = $_POST['categoria'];
        $passwd = $_POST['passwd']; 
        $id="";
        $carpeta="";
        
        $query = "insert into tblnegocios(IdCategoria, IdServicio, IdEstatus, Nombre, Descripcion, Direccion, Telefono, Whatsapp, Facebook
        , Instagram, Correo, fecha) values ('".$categoria."', '".$servicio."', 2, '".$name."', '".$des."', '".$dire."', '".$tel."', '".$wha."', 
        '".$face."', '".$insta."', '".$correo."', '".$fechaActual."')";
        //echo $query;
        //exit;
        $result = mysqli_query($conn, $query);
        $result = mysqli_query($conn, "select IdNegocio from tblnegocios order by IdNegocio desc limit 1");
        while ($row=mysqli_fetch_row($result)){
            $id = $row[0];
        }
        $contra = mysqli_query($conn, "insert into tblusuario (Correo, Contrasenia, IdNegocio) values('".$correo."', '".$passwd."', '".$id."')");
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name;
        mkdir($carpeta, 0777, true);

        $im0=$_FILES['im0']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im0']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im0."')";
        //echo $query;
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im0;
        //echo $carpeta;
        move_uploaded_file($temp,$carpeta);
        $im1=$_FILES['im1']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im1']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im1."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im1;
        move_uploaded_file($temp,$carpeta);
        $im2=$_FILES['im2']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im2']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im2."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im2;
        move_uploaded_file($temp,$carpeta);
        $im3=$_FILES['im3']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im3']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im3."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im3;
        move_uploaded_file($temp,$carpeta);
        $im4=$_FILES['im4']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im4']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im4."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im4;
        move_uploaded_file($temp,$carpeta);
        $im5=$_FILES['im5']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im5']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im5."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im5;
        move_uploaded_file($temp,$carpeta);
        $im6=$_FILES['im6']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im6']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im6."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im6;
        move_uploaded_file($temp,$carpeta);
        $msg = "Bienvenido a MyParty, tu servicio ha sido dado de alta con exito el dia ".$fechaActual." nos es muy grato que estes con nosotros. \r\nEl 1er mes es gratis, despues seran $200.00 MXN por mes que podras depositar a la cuenta: \r\nNumero de Tarjeta Bancomer 4152 3135 2834 4463
        \r\nCLABE interbancaria: 012180015400609360 \r\nY enviar una foto al whatsapp 7295955316 o bien enviar un correo electronico a admin@allmyparty.com";
        $msg = wordwrap($msg, 70, "\r\n");
        $mail = mail($correo, "BIENVENIDO A MyParty", $msg);
        header('location:./cargaExitosa.php');
        
        
    }else if($padre==2){
        $name = $_POST['name'];
        $des = $_POST['des']; 
        $dire = $_POST['dire']; 
        $tel = $_POST['tel']; 
        $wha = $_POST['wha']; 
        $face = $_POST['face']; 
        $insta = $_POST['insta']; 
        $correo = $_POST['correo']; 
        $servicio = $_POST['servicio'];
        $categoria = $_POST['categoria'];
        $passwd = $_POST['passwd'];
        $id="";
        $carpeta="";

        //INSERTO EL SERVICIO Y LA CATEGORIA
        $query = "insert into tblservicios(Descripcion) values ('".$servicio."')";
        $result = mysqli_query($conn, $query);
        $query = "select IdServicio from tblservicios order by IdServicio desc limit 1";
        $result = mysqli_query($conn, $query);
        while ($row=mysqli_fetch_row($result)){
            $servicio = $row[0];
        }
        $query = "insert into tblcategorias(Descripcion) values ('".$categoria."')";
        $result = mysqli_query($conn, $query);
        $query = "select IdCategoria from tblcategorias order by IdCategoria desc limit 1";
        $result = mysqli_query($conn, $query);
        while ($row=mysqli_fetch_row($result)){
            $categoria = $row[0];
        }

        $query = "insert into tblserviciocategoria(IdServicio, IdCategoria) values ('".$servicio."','".$categoria."')";
        $result = mysqli_query($conn, $query);
        
        $query = "insert into tblnegocios(IdCategoria, IdServicio, IdEstatus, Nombre, Descripcion, Direccion, Telefono, Whatsapp, Facebook
        , Instagram, Correo, fecha) values ('".$categoria."', '".$servicio."', 2, '".$name."', '".$des."', '".$dire."', '".$tel."', '".$wha."', 
        '".$face."', '".$insta."', '".$correo."','".$fechaActual."')";
        $result = mysqli_query($conn, $query);
        $result = mysqli_query($conn, "select IdNegocio from tblnegocios order by IdNegocio desc limit 1");
        while ($row=mysqli_fetch_row($result)){
            $id = $row[0];
        }
        $contra = mysqli_query($conn, "insert into tblusuario (Correo, Contrasenia, IdNegocio) values('".$correo."', '".$passwd."', '".$id."')");
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name;
        mkdir($carpeta, 0777, true);

        $im0=$_FILES['im0']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im0']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im0."')";
        //echo $query;
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im0;
        //echo $carpeta;
        move_uploaded_file($temp,$carpeta);
        $im1=$_FILES['im1']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im1']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im1."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im1;
        move_uploaded_file($temp,$carpeta);
        $im2=$_FILES['im2']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im2']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im2."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im2;
        move_uploaded_file($temp,$carpeta);
        $im3=$_FILES['im3']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im3']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im3."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im3;
        move_uploaded_file($temp,$carpeta);
        $im4=$_FILES['im4']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im4']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im4."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im4;
        move_uploaded_file($temp,$carpeta);
        $im5=$_FILES['im5']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im5']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im5."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im5;
        move_uploaded_file($temp,$carpeta);
        $im6=$_FILES['im6']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im6']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im6."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im6;
        move_uploaded_file($temp,$carpeta);
        
        $msg = "Bienvenido a MyParty, tu servicio ha sido dado de alta con exito el dia ".$fechaActual." nos es muy grato que estes con nosotros. \r\nEl 1er mes es gratis, despues seran $200.00 MXN por mes que podras depositar a la cuenta: \r\nNumero de Tarjeta Bancomer 4152 3135 2834 4463
        \r\nCLABE interbancaria: 012180015400609360 \r\nY enviar una foto al whatsapp 7295955316 o bien enviar un correo electronico a admin@allmyparty.com";
        $msg = wordwrap($msg, 70, "\r\n");
        $mail = mail($correo, "BIENVENIDO A MyParty", $msg);
        header('location:./cargaExitosa.php');
    }else{
        $name = $_POST['name'];
        $des = $_POST['des']; 
        $dire = $_POST['dire']; 
        $tel = $_POST['tel']; 
        $wha = $_POST['wha']; 
        $face = $_POST['face']; 
        $insta = $_POST['insta']; 
        $correo = $_POST['correo']; 
        $servicio = $_POST['servicio'];
        $categoria = $_POST['categoria'];
        $passwd = $_POST['passwd'];
        $id="";
        $carpeta="";

        //INSERTO EL SERVICIO Y LA CATEGORIA
        
        $query = "insert into tblcategorias(Descripcion) values ('".$categoria."')";
        $result = mysqli_query($conn, $query);
        $query = "select IdCategoria from tblcategorias order by IdCategoria desc limit 1";
        $result = mysqli_query($conn, $query);
        while ($row=mysqli_fetch_row($result)){
            $categoria = $row[0];
        }

        $query = "insert into tblserviciocategoria(IdServicio, IdCategoria) values ('".$servicio."','".$categoria."')";
        $result = mysqli_query($conn, $query);


        
        $query = "insert into tblnegocios(IdCategoria, IdServicio, IdEstatus, Nombre, Descripcion, Direccion, Telefono, Whatsapp, Facebook
        , Instagram, Correo, fecha) values ('".$categoria."', '".$servicio."', 2, '".$name."', '".$des."', '".$dire."', '".$tel."', '".$wha."', 
        '".$face."', '".$insta."', '".$correo."', '".$fechaActual."')";
        $result = mysqli_query($conn, $query);
        $result = mysqli_query($conn, "select IdNegocio from tblnegocios order by IdNegocio desc limit 1");
        while ($row=mysqli_fetch_row($result)){
            $id = $row[0];
        }
        $contra = mysqli_query($conn, "insert into tblusuario (Correo, Contrasenia, IdNegocio) values('".$correo."', '".$passwd."', '".$id."')");
        

        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name;
        mkdir($carpeta, 0777, true);

        $im0=$_FILES['im0']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im0']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im0."')";
        //echo $query;
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im0;
        //echo $carpeta;
        move_uploaded_file($temp,$carpeta);
        $im1=$_FILES['im1']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im1']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im1."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im1;
        move_uploaded_file($temp,$carpeta);
        $im2=$_FILES['im2']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im2']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im2."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im2;
        move_uploaded_file($temp,$carpeta);
        $im3=$_FILES['im3']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im3']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im3."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im3;
        move_uploaded_file($temp,$carpeta);
        $im4=$_FILES['im4']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im4']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im4."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im4;
        move_uploaded_file($temp,$carpeta);
        $im5=$_FILES['im5']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im5']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im5."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im5;
        move_uploaded_file($temp,$carpeta);
        $im6=$_FILES['im6']['name'];  //CREO UNA VARIABLE PARA ACCEDER AL FILE Y GUARDAR SU NOMBRE, YA QUE EN EL INPUT LO PIDO
        $temp = $_FILES['im6']['tmp_name'];
        $query = "Insert into tblimagennegocio(IdNegocio,Ruta) values('".$id."','".$im6."')";
        $resultado = mysqli_query($conn,$query);
        $carpeta = "../img/negocios/".$servicio."/".$id."-".$name."/".$im6;
        move_uploaded_file($temp,$carpeta);
        
        $msg = "Bienvenido a MyParty, tu servicio ha sido dado de alta con exito el dia ".$fechaActual." nos es muy grato que estes con nosotros. \r\nEl 1er mes es gratis, despues seran $200.00 MXN por mes que podras depositar a la cuenta: \r\nNumero de Tarjeta Bancomer 4152 3135 2834 4463
        \r\nCLABE interbancaria: 012180015400609360 \r\nY enviar una foto al whatsapp 7295955316 o bien enviar un correo electronico a admin@allmyparty.com";
        $msg = wordwrap($msg, 70, "\r\n");
        $mail = mail($correo, "BIENVENIDO A MyParty", $msg);
        header('location:./cargaExitosa.php');
    }
    

?>