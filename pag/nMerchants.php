<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>New Merchants</title>
</head>
<body>
    <nav id="header" class="bg-gray-900 fixed w-full z-10 top-0 shadow">
		<div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
				
			<div class="w-1/2 pl-2 md:pl-0">
				<a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="#"> 
					<i class="fas fa-moon text-blue-400 pr-3"></i> MyParty Admin Dashboard
				</a>
            </div>
			<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-900 z-20" id="nav-content">
				<ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
					<li class="mr-6 my-2 md:my-0">
                        <a href="dashboard.php" class="block py-1 md:py-3 pl-1 align-middle text-blue-400 no-underline hover:text-gray-100 border-b-2 border-blue-400 hover:border-blue-400">
                            <i class="fas fa-home fa-fw mr-3 text-blue-400"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
					<li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-pink-400">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Active Merchants</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">New Merchants</span>
                        </a>
                    </li>
				</ul>
			</div>
			
		</div>
	</nav>
    <br><br><br><br><br>
    <!-- TABLE -->
    <div class="w-full p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-600">New Merchants</h5>
            </div>
            <div class="p-5">
                <table class="w-full p-5 text-gray-700">
                    <thead>
                        <tr>
                            <th class="text-left text-gray-600">Nombre</th>
                            <th class="text-left text-gray-600">Servicio Ofrecido</th>
                            <th class="text-left text-gray-600">Categoria</th>
                            <th class="text-left text-gray-600">Activar / Desactivar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Obi Wan Kenobi</td>
                            <td>Light</td>
                            <td>Jedi</td>
                        </tr>
                        <tr>
                            <td>Greedo</td>
                            <td>South</td>
                            <td>Scumbag</td>
                        </tr>
                        <tr>
                            <td>Darth Vader</td>
                            <td>Dark</td>
                            <td>Sith</td>
                        </tr>                                   
                    </tbody>
                </table>

                <p class="py-2"><a href="#" class="text-white">See More issues...</a></p>

            </div>
        </div>
    </div>
    <!--- FIN TABLE    -->

</body>
</html>