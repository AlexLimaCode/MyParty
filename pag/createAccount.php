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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Crear Cuenta</title>

    <!-- Styles -->
    <link href="./bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/favicon.png">
    <script language="javascript">
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
    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../img/logo_transparent.png" class="img-fluid"
                alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="validaUsuario.php?padre=2" enctype='multipart/form-data' method="post" class="form-container" name='principal'>
                    <br>
                    <!-- Email input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form3Example3">Correo Electronico</label>
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Ingresa un correo valido" name="correo" required />
                    </div>
                    <br>
                    <!-- Password input -->
                    <div class="form-outline">
                        <label class="form-label" for="form3Example4">Contraseña</label>
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Ingresa una contraseña para inciar sesión" name="contrasenia" required />
                    </div>
                    <br>
                    <!-- Name input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form3Example3">Nombre Completo</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Ingresa tu nombre completo" name="nombre" required />
                    </div>
                    <br>
                    <!-- telefono input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form3Example3">Numero Telefonico</label>
                        <input type="number" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Ingresa un numero telefonico valido" name="telefono" required/>
                    </div>
                    <br>
                    <div class='form-outline'>
                        <label class="form-label" for="form3Example4">Estado</label>
                        <?php
                        LlenaComboSaltado("select id, estado from estados order by id","algo","estado");
                        ?>
                    </div>
                    <br>
                    <div class='form-outline "'>
                        <label class="form-label" for="form3Example4">Municipio</label>
                        <select class='form-select' aria-label='Default select example' name="municipio" id="municipio" required>
                        </select>
                    </div>
                    <br>
                    <div class="form-outline ">
                        <label class="form-label" for="form3Example3">Sexo</label>
                        <select class='form-select' aria-label='Default select example' name="sexo" id="sexo" required>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                            <option value="3">No definido</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-outline ">
                        <label class="form-label" for="form3Example3">Edad</label>
                        <select class='form-select' aria-label='Default select example' name="edad" id="edad" required>
                            <?php
                                for ($i=13; $i < 100 ; $i++) { 
                                    echo "<option value='".$i."'>".$i."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <br>
                    <?php
                        echo "<input type='hidden' name='IdNegocio' value='".$IdNegocio."' />";
                    ?>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-success btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>
                    </div>
                </form>
                <?php
                    if($bandera != ""){
                        ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            Ya existe una cuenta con esos datos ó ingresaste mal tu nombre
                        </div>
                        <?php
                    }
                ?>
            </div>
            </div>
        </div>
        
    </section>
    <!-- Scripts -->
    <script src="../js/bootstrap.min.js"></script><!-- Bootstrap framework -->
    <script src="../js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="../js/swiper.min.js"></script><!-- Swiper for image and text sliders -->
    <script src="../js/aos.js"></script><!-- AOS on Animation Scroll -->
    <script src="../js/script.js"></script>  <!-- Custom scripts -->
</body>
</html>