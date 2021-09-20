<?php

    include('conexion.php');
    $accion="";
    if(isset($_POST["accion"])){
        $accion = trim($_POST["accion"]); 
        if ($accion == ""){
            if(isset($_GET["accion"])){
                $accion = $_GET["accion"];
                if ($accion == ""){
                    $accion = "";
                }
            }
        }else{ 
            if ($accion == ""){
                $accion = "";
            }
            if(isset($_GET["accion"])){ 
                $accion = $_GET["accion"];
                if ($accion == ""){
                    $accion = "";
                }
            }    
        }
    }
    $arreglo = $_POST['chk'];

    if ($accion == 1) { //ACTIVAMOS MERCHANTS
        for ($i=0; $i < count($arreglo); $i++) { 
          mysqli_query($conn, "update tblnegocios set IdEstatus = 1 where IdNegocio = '".$arreglo[$i]."'");  
        }
        header('location:./aMerchants.php');
    } else if($accion == 2){
        for ($i=0; $i < count($arreglo); $i++) { 
            mysqli_query($conn, "update tblnegocios set IdEstatus = 2 where IdNegocio = '".$arreglo[$i]."'");  
        }
        header('location:./nMerchants.php');
    }
    

?>