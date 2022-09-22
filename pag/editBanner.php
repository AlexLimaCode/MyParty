<?php

    include('conexion.php');

    session_start();

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
    if($padre == 1){ //Subiendo imagen
        $nombre = $_POST["nombre"];
        $urlImagen = $_POST["urlImagen"];


        $id = 0;
        $query = "INSERT INTO tblimagenesbanner(Nombre, UrlImagen, Estado) VALUES ('".$nombre."','".$urlImagen."', 1)";
        $result = mysqli_query($conn,$query);
        $query = "select IdImagenBanner from tblimagenesbanner order by IdImagenBanner desc limit 1";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)){
                $id = $row[0];
            }
        }else{
            $id = $id + 1;
        }
        //imagen
        $imagen=$_FILES['im1']['name'];
        $tipo = $_FILES['im1']['type'];
        $temp = $_FILES['im1']['tmp_name'];
        //$imagen = "imagen-".$id;
        //echo $imagen."\n";
        move_uploaded_file($temp,'../img/banner/'.$id.'-'.$imagen);
        $sql = "update tblimagenesbanner set Imagen = '".$id."-".$imagen."' where IdImagenBanner = ".$id;
        
        mysqli_query($conn, $sql);
        header("Location: nBanner.php");
    }else{
        $arreglo = $_POST['chk'];
        for ($i=0; $i < count($arreglo); $i++) {
            if($padre == 2){
                $query = "update tblimagenesbanner set Estado = 1 where IdImagenBanner = '".$arreglo[$i]."'";
            }else{
               $query = "update tblimagenesbanner set Estado = 0 where IdImagenBanner = '".$arreglo[$i]."'";
            }
            mysqli_query($conn, $query);
        }
        header('location:./aBanner.php');
    }

?>