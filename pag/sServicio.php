
<?php
    include('conexion.php');
    include('funciones.php');
    $bandera = "";
    if(isset($_POST["bandera"])){
        $bandera = trim($_POST["bandera"]); 
        if ($bandera == ""){
            if(isset($_GET["bandera"])){
                $bandera = $_GET["bandera"];
                if ($bandera == ""){
                    $bandera = "";
                }
            }
        }
    }    
    else{ 
        if ($bandera == ""){
            $bandera = "";
        }
        if(isset($_GET["bandera"])){ 
            $bandera = $_GET["bandera"];
            if ($bandera == ""){
                $bandera = "";
            }
        }    
    }
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
        $(document).ready(function(){
            $("#estado").change(function () {
                $("#estado option:selected").each(function () {
                    id_estado = $(this).val();
                    $.post("./getMunicipio.php", { id_estado: id_estado }, function(data){
                        $("#municipio").html(data);
                    });            
                });
            })
        });
    </script>
    <title>Servicios</title>
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
        
    ?>
    <nav class="navbar navbar-expand-sm navbar-light sticky-top nav-text" style="background-color: #1B1438; border: 1px solid #eb3766;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo_transparent.png" width="150" height="150"></a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #EB3766;" href="./aboutUs.html">MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FF6B4D;" href="./servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FCBE13;" href="./publicarme.php">Registrar <br>servicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #EB3766;" href="./loginUser.php">Quiero ser <br>MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FF6B4D;" href="./contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FCBE13;" href="./inicioAdmin.php">Área MyParty</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    
  
    <div class="container">
    <div class="mb-3">
            <form method='post' enctype='multipart/form-data' action='./subirNegocio.php?padre=2' name='principal'>
            <div class='col-md-4'>
                <br>
                <h5 class="text-center" style='color:white;'>Selecciona el Estado:</h5>
                <?php
                LlenaComboSaltado("select id, estado from estados order by id","algo","estado");
                ?>
            </div>
            <div class='col-md-4'>
                <br>
                <h5 class="text-center" style='color:white;'>Selecciona el municipio:</h5>
                <select class='form-select' aria-label='Default select example' name="municipio" id="municipio" required>

                </select>
            </div>
            <br>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label" style="color:white;">Nombre del servicio (inicia con mayuscula)</label>
                <input type="text" class="form-control" id="validationDefault01" name="servicio" placeholder="Servicio" required>
            </div>
            <br>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label" style="color:white;">Nombre de la categoria (inicia con mayuscula)</label>
                <input type="text" class="form-control" id="validationDefault02" name="categoria" placeholder="Categoria" required>
            </div>
                <br>    
            <div class="col-md-4">
                    <label for="validationDefault01" class="form-label" style="color:white;">Nombre del negocio o servicio</label>
                    <input type="text" class="form-control" id="validationDefault01" name="name" placeholder="Nombre" required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label" style="color:white;">Descripción del negocio o servicio</label>
                    <input type="text" class="form-control" id="validationDefault02" name="des" minlength="10" maxlength="250" placeholder="Descripcion" required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label" style="color:white;">Dirección del negocio o servicio (en caso de ser necesario)</label>
                    <input type="text" class="form-control" id="validationDefault02" name="dire" minlength="10" maxlength="250" placeholder="Direccion" required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label" style="color:white;">Teléfono de Contacto</label>
                    <input type="number" class="form-control" id="validationDefault02" name="tel" placeholder="7222222222" required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label" style="color:white;">Whatsapp</label>
                    <input type="number" class="form-control" id="validationDefault02" name="wha" placeholder="7222222222" required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Link de Facebook (copia y pega)</label>
                    <input type="text" class="form-control" id="validationDefault03" name="face" minlength="10" maxlength="250" placeholder="Dejar en limpio si no tiene" >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Link de Instagram (copia y pega)</label>
                    <input type="text" class="form-control" id="validationDefault03" name="insta" minlength="10" maxlength="250" placeholder="Dejar en limpio si no tiene" >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Correo Electronico</label>
                    <input type="mail" class="form-control" id="validationDefault03" name="correo" placeholder="ejemplo@gmail.com" required >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Contraseña (Para ingresar a tu panel de control)</label>
                    <input type="password" class="form-control" id="validationDefault03" name="passwd" placeholder="******" required >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen de Perfil</label>
                    <input id='my-input' type='file' name='im0' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 1</label>
                    <input id='my-input' type='file' name='im1' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 2</label>
                    <input id='my-input' type='file' name='im2' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 3</label>
                    <input id='my-input' type='file' name='im3' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 4</label>
                    <input id='my-input' type='file' name='im4' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 5</label>
                    <input id='my-input' type='file' name='im5' required>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Imagen 6</label>
                    <input id='my-input' type='file' name='im6' required>
                </div>
                <br>
              <button class='btn btn-primary' type='submit' href='./subirNegocio.php?padre=2'>Registrar</button>
            </form>
            <?php
            if($bandera != ""){
                ?>
                <br>
                <div class="alert alert-danger" role="alert">
                    Ingresa los valores sin caracteres especiales ' , ; { } $ # " % & / ( ) @
                </div>
                <?php
            }
            ?>
        </div>
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
    
</body>
</html>