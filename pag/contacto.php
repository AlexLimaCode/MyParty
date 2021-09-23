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
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="inicioAdmin.php">Panel de control</a>
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
					<h2 class="heading-section">Contactanos!</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Ingresa los datos</h3>
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
                                                <br><input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">Contacto rapido</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://api.whatsapp.com/send?phone=527295955316"><span class="bi bi-whatsapp"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>&nbsp&nbspWhatsapp:</span>&nbsp&nbsp+52 1 7295955316</p></a>
					          </div>
				            </div>
                            <div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="tel://7295955316"><span class="bi bi-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>&nbsp&nbspTelefono:</span>&nbsp&nbsp72959553166</p></a>
					          </div>
				            </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="admin@allmyparty.com"><span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>&nbsp&nbspEmail:</span>&nbsp&nbspadmin@allmyparty.com</p></a>
					          </div>
				            </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<a href="https://www.facebook.com/MyParty"><span class="bi bi-facebook"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>&nbsp&nbspFacebook:</span>&nbsp&nbspMyParty</p></a>
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
        <div class="container-fluid bg-dark">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md mt-5">
                    <a href="../index.html">
                        <img src="../img/logo_transparent.png" width="250">
                    </a>
                </div>
                <div class="col-md mt-5 text-white">
                    <br><br>
                    <a href="./servicios.php" class="text-white text-decoration-none"><h6>Servicios</h6></a><br>
                    <a href="./publicarme.php" class="text-white text-decoration-none"><h6>Publicarme</h6></a><br>
                    <a href="./contacto.php" class="text-white text-decoration-none"><h6>Contacto</h6></a><br>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>