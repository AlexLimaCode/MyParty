
<?php
    include('conexion.php');
    include('funciones.php');
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
        
    </script>
    <title>Publicarme</title>
</head>
<body>
    <?php
        $categoria = "";
        $servicio = "";
        $nServicio="";
        $nCategoria="";
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
        }else{ 
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
    ?>
    <nav class="navbar navbar-expand-sm navbar-light bg-dark sticky-top nav-text">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo_transparent.png" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./publicarme.php">Publicarme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="./contacto.php">Contacto</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="text-center">
            <h1>Bienvenido</h1>
            <h5>Presiona el boton para conocer las intrucciones y dar de alta tu negocio!</h5>
            <br>
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bienvenido a MyParty!
                        </div>
                        <div class="modal-body">
                            Nuestra intención es ayudarte a potenciar tu catalogo de clientes para que tus ventas incrementen
                        </div>    
                        <div class="modal-body">
                            ¿Listo para iniciar?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Hagamoslo!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Como funciona?
                        </div>
                        <div class="modal-body">
                            MyParty ayuda a promover a todos los proveedores de servicios y materiales para fiestas y eventos sociales. 
                        </div>
                        <div class="modal-body">
                            El costo de permanecia en la plataforma es de $200.00 MXN mensuales, 
                            no te preocupes el primer mes te lo regalamos nosotros
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">¿Como me doy de alta?</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel3">Modal 3</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Identifica el rol de tu negocio
                        </div>
                        <div class="modal-body">
                            MyParty se maneja por servicios y dentro de los servicios encontraras categorias, las cuales aumentan según nuestros nuevos clientes se den de alta.
                        </div>
                        <div class="modal-body">
                            Lo primero que debes de hacer es identificar la rama de tu servicio y despues seleccionar tu categoria.
                        </div>
                        <div class="modal-body">
                            En caso de que tu categoria o servicio no exista en nuestra plataforma, deberas llenar el formulario para nuevo servicio o categoria.
                        </div>
                        <div class="modal-body">
                            No te preocupes, es muy sencillo hacerlo!
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal" data-bs-dismiss="modal">¿Qué información debo proporcionar?</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel4">Modal 4</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            La información que deberas proporcionar es la siguiente:
                        </div>
                        <div class="modal-body">
                            - Nombre del servicio.
                        </div>
                        <div class="modal-body">
                            - Descripción del servicio (paquetes, promociones, etc.).
                        </div>
                        <div class="modal-body">
                            - Whatsapp.
                        </div>
                        <div class="modal-body">
                            - Link de Facebook.
                        </div>
                        <div class="modal-body">
                            - Link de Instagram.
                        </div>
                        <div class="modal-body">
                            - Telefono de contacto.
                        </div>
                        <div class="modal-body">
                            - Direccion (en caso de ser requerida).
                        </div>
                        <div class="modal-body">
                            - 1 imagen de perfil (logo).
                        </div>
                        <div class="modal-body">
                            - Maximo 6 imagenes del servicio (deberan ser archivos .png ó .jpg).
                        </div>
                        <div class="modal-body">
                            Con estos datos estaras a 1 paso de estar en la plataforma.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal" data-bs-dismiss="modal">Vamos por ello!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel5">Modal 3</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Despues de aceptar los terminos y condiciones de la plataforma, recibiras un correo electronico.
                        </div>
                        <div class="modal-body">
                            Este correo contendra toda la información para realizar tu deposito mensual en las cuentas indicadas o bien, realizarlo desde nuestra plataforma cuando se encuentre disponible la opción.
                        </div>
                        <div class="modal-body">
                            Deberas enviar una foto con el recibo de pago al Whatsapp o bien al correo indicado.
                        </div>
                        <div class="modal-body">
                            No te preocupes, tu servicio estara dado de alta el mismo dia de su registro en un horario de 10:00 am a 10:00 pm.
                        </div>
                        <div class="modal-body">
                            En caso de que la administración no reciba el pago del siguiente mes, tu servicio permanecera en reposo y no se reflejara en nuestra plataforma.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido.</button>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Iniciemos!</a>
            </div>
        </div>
        <br><br><br>
        <div class="container">
        <?php
      if ($servicio!="") {
        ?>
        <div class="mb-3">
            <form method='post' enctype='multipart/form-data' action='./subirNegocio.php?padre=1' name='principal'>
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
                    <input type="text" class="form-control" id="validationDefault03" name="face" minlength="10" maxlength="250" placeholder="Facebook" required >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Link de Instagram (copia y pega)</label>
                    <input type="text" class="form-control" id="validationDefault03" name="insta" minlength="10" maxlength="250" placeholder="Instagram" required >
                </div>
                <br>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label" style="color:white;">Correo Electronico</label>
                    <input type="mail" class="form-control" id="validationDefault03" name="correo" placeholder="ejemplo@gmail.com" required >
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
                <?php
                echo "<input type='hidden' value='".$servicio."' name='servicio'>";
                echo "<input type='hidden' value='".$categoria."' name='categoria'>";
                ?>
              <button class='btn btn-primary' type='submit' href='./subirNegocio.php?padre=1'>Registrar</button>
          </form>
        </div>
        <?php
        }else{
            ?>
            <form id="principal" name="principal">
                <div class="row">
                    <div class='col-md'>
                        <h5 class="text-center" style='color:white;'>Selecciona el Servicio:</h5>
                        <?php
                        LlenaComboSaltado("select IdServicio, Descripcion from tblservicios order by IdServicio","algo","servicio");
                        ?>
                    </div>
                    <div class='col-md'>
                    <h5 class="text-center" style='color:white;'>Selecciona la Categoria:</h5>
                        <select class='form-select' aria-label='Default select example' name="categoria" id="categoria" required>

                        </select>
                    </div>
                </div>
                <div>
                    <br><br>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md"><input type="submit" class="btn btn-primary" value='Seguir con la alta'></div>
                            <div class="col-md"><a href="./sServicio.php" class="btn btn-primary">Mi servicio no existe</a></div>
                            <div class="col-md"><a href="./sCategoria.php" class="btn btn-primary">Mi categoria no existe</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <?php
        }

         ?>
    </div>
    <br><br>
    <footer>
        <div class="container-fluid bg-dark">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md mt-5">
                    <a href="/index.html">
                        <img src="../img/logo_transparent.png" width="250">
                    </a>
                </div>
                <div class="col-md mt-5 text-white">
                    <br><br>
                    <a href="#" class="text-white text-decoration-none"><h6>Servicios</h6></a><br>
                    <a href="#" class="text-white text-decoration-none"><h6>Publicarme</h6></a><br>
                    <a href="#" class="text-white text-decoration-none"><h6>Contacto</h6></a><br>
                </div>
            </div>
        </div>
    </footer>
    <script>
      $(document).on("ready", function(){
          enviarData();
      });

      function enviarData(){
          $("#principal").on("submit", fuction(e)){
              e.preventDefault();
              var formulario = $(this).serialize();
              console.log( formulario );
          }
      }
    </script> 

    
</body>
</html>