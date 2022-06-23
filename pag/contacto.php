<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo_transparent.ico" type="image/x-icon">
    <link rel="icon" href="../img/logo_transparent.ico" type="image/x-icon">
    <link href="./bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Contacto</title>
    <style>A {text-decoration: none;} </style>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light sticky-top nav-text" style="background-color: #1B1438; border: 1px solid #eb3766;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo_transparent.png" width="150" height="150"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="color: #EB3766;" href="./aboutUs.html">MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FF6B4D;" href="./servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #FCBE13;" href="./publicarme.php">Registrar <br>servicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" style="color: #EB3766;" href="./loginUser.php">Quiero ser <br>MyParty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FF6B4D;" href="./contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #FCBE13;" href="./inicioAdmin.php">Área MyParty</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Contactanos</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4 text-center">Ingresa los siguientes datos de solicitud,   para comentarios,  sugerencias o dudas. Te responderemos lo más rápido posible</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		
									<form method="POST" id="contactForm" name="contactForm" action="./sendEmail.php">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
                                                <br><input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<br><input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <br><input type="text" class="form-control" name="subject" id="subject" placeholder="Tema" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <br><textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Mensaje" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <br><input type="submit" value="Send Message" class="btn btn-primary" style="background-image: linear-gradient(#FF6B4D, #1B1438); border-color: #FF6B4D;">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch" style="background-color: #1B1438 !important">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4" style="background-color: #1B1438 !important">
									<h3 class="mb-4 mt-md-4">Contacto rapido</h3>
				        	<div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://api.whatsapp.com/send?phone=527295955316"><span><img src="../img/whatsapp.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbsp+52 1 7295955316</p></a>
					          </div>
				            </div>
                            <div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="tel://7295955316"><span><img src="../img/phone.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbsp72959553166</p></a>
					          </div>
				            </div>
				        	<div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="admin@allmyparty.com"><span><img src="../img/mail.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbspadmin@allmyparty.com</p></a>
					          </div>
				            </div>
				        	<div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://www.facebook.com/MyParty-102006598915618/?ref=pages_you_manage"><span><img src="../img/facebook.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbspMyParty</p></a>
					          </div>
				            </div>
							<div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://www.tiktok.com/@allmyparty"><span><img src="../img/tiktok.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbspTikTok</p></a>
					          </div>
				            </div>
							<div class="dbox w-100 d-flex align-items-start" style="margin-top: 20px">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://www.instagram.com/allmyparty_/?hl=es"><span><img src="../img/instagram.png" alt="" style="width: 50px; height: 50px;"></span>
				        		</div>
				        		<div class="text pl-3" style="margin-top: 10px">
					            <p>&nbsp&nbsp@_allMyParty</p></a>
					          </div>
				            </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


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