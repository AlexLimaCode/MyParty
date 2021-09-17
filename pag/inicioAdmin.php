<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }



        .main-head{
            height: 150px;
            background: #FFF;
        
        }

        .sidenav {
            height: 100%;
            background-color: #000;
            overflow-x: hidden;
            padding-top: 20px;
        }


        .main {
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
        }

        @media screen and (max-width: 450px) {
            .login-form{
                margin-top: 10%;
            }

            .register-form{
                margin-top: 10%;
            }
        }

        @media screen and (min-width: 768px){
            .main{
                margin-left: 40%; 
            }

            .sidenav{
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }

            .login-form{
                margin-top: 80%;
            }

            .register-form{
                margin-top: 20%;
            }
        }


        .login-main-text{
            margin-top: 20%;
            padding: 60px;
            color: #fff;
        }

        .login-main-text h2{
            font-weight: 300;
        }

        .btn-black{
            background-color: #000 !important;
            color: #fff;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
        <?php
        $bandera="";
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

        if($bandera == 1){
            ?>
            <div class="sidenav">
                <div class="login-main-text">
                    <h2>MyParty<br> Inicio de Sesion</h2>
                    <p>Inicia Sesión con tu usuario de administración.</p>
                </div>
            </div>
            <div class="main">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                    <form method='post' enctype='multipart/form-data' action='./validaAdmin.php' name='principal'>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="mail" class="form-control" name="correo">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="contrasenia">
                        </div>
                        <button type="submit" class="btn btn-black">Login</button>
                    </form>
                    </div>
                </div>
                <br>
                <div class="alert alert-danger" role="alert">
                    Usuario o Contraseña Incorrectos!
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="sidenav">
                <div class="login-main-text">
                    <h2>MyParty<br> Inicio de Sesion</h2>
                    <p>Inicia Sesión con tu usuario de administración.</p>
                </div>
            </div>
            <div class="main">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                    <form method='post' enctype='multipart/form-data' action='./validaAdmin.php' name='principal'>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="mail" class="form-control" name="correo">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="contrasenia">
                        </div>
                        <button type="submit" class="btn btn-black">Login</button>
                    </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        
</body>
</html>