x<?php

    include('conexion.php');

?>

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
    <title>Dashboard</title>
</head>
<body class="bg-black-alt font-sans leading-normal tracking-normal">

    
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
                        <a href="aMerchants.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-pink-400">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Active Merchants</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="nMerchants.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">New Merchants</span>
                        </a>
                    </li>
				</ul>
			</div>
			
		</div>
	</nav>
    <br><br>
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Servicio</th>
                    <th class="px-4 py-3">Categoria</th>
                    <th class="px-4 py-3">Estatus</th>
                    <th class="px-4 py-3">Fecha inicio</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                        //PRIMER COLUMNA
                        $query = "select IdNegocio, nombre, s.Descripcion, c.Descripcion, n.IdServicio, n.IdEstatus, fecha from tblnegocios n, tblservicios s, 
                        tblcategorias c where n.IdServicio = s.IdServicio and n.IdCategoria = c.IdCategoria order by IdNegocio asc";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_row($result)){
                            echo "<tr class='text-gray-700'>";
                            $result2 = mysqli_query($conn, "select Ruta from tblimagennegocio where IdNegocio = '".$row[0]."' order by IdImagenNegocio asc limit 1");
                            while($j = mysqli_fetch_array($result2)){
                                echo "<td class = 'px-4 py-3 border'>
                                <div class = 'flex items-center text-sm'>
                                <div class = 'relative w-8 h-8 mr-3 rounded-full md:block'>
                                <img class = 'object-cover w-full h-full rounded-full' src = '../img/negocios/".$row[4]."/".$row[0]."-".$row[1]."/".$j[0]."' loading='lazy'/>
                                <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                                </div>
                                <div>
                                <p class = 'font-semibold text-black'>".$row[1]."</p>
                                </div>
                                </div>
                                </td>";
                            }
                            echo "<td class='px-4 py-3 text-ms font-semibold border'>".$row[2]."</td>";
                            echo "<td class='px-4 py-3 text-ms font-semibold border'>".$row[3]."</td>";
                            if ($row[5] == 1) {
                                echo "<td class='px-4 py-3 text-xs border'><span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm'> Aceptado </span></td>";
                            } else {
                                echo "<td class='px-4 py-3 text-xs border'><span class='px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm'> Pendiente </span></td>";
                            }
                            
                            echo "<td class = 'px-4 py-3 text-sm border'>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?> 
                </tbody>
            </table>
            </div>
        </div>
    </section>
</body>
</html>