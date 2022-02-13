<?php

include ('conexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Active Merchants</title>
</head>
<body>

    <?php
    if ($_SESSION["IdNegocio"] == 0) {
        ?>
        <nav id="header" class="bg-gray-900 fixed w-full z-10 top-0 shadow">
            <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
                
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
                        <li class="mr-6 my-2 md:my-0">
                            <a href="nBanner.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                                <i class="fa fa-image fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">New Banner Image</span>
                            </a>
                        </li>
                        <li class="mr-6 my-2 md:my-0">
                            <a href="aBanner.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                                <i class="fa fa-pencil fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Banner Images</span>
                            </a>
                        </li>
                        <li class="mr-6 my-2 md:my-0">
                            <a href="showUsers.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                                <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
        <br><br><br><br><br>
        
        <form method='post' enctype='multipart/form-data' action='./procesaMerchants.php' name='principal'>
        <!-- TABLE -->
            <section class="container mx-auto p-6 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Sexo</th>
                                <th class="px-4 py-3">Edad</th>
                                <th class="px-4 py-3">Estado</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                    //PRIMER COLUMNA
                                    $query = "select Nombre, Sexo, Edad, e.estado from tblusuarioscomun u, estados e where u.IdEstado = e.id order by IdUsuario asc";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_row($result)){
                                        echo "<tr><td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$row[0]."</p></td> \n";
                                        if ($row[1] == 1) {
                                            echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>Masculino</p></td> \n";
                                        }else if ($row[1] == 2) {
                                            echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>Femenino</p></td> \n";
                                        }else {
                                            echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>No definido</p></td> \n";
                                        }
                                        
                                        echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$row[2]." Años</p></td> \n";
                                        echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$row[3]."</p></td></tr>";
                                    }

                                ?>                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </form>
        <?php
    }else{ 
        echo "<h1>NO TIENES PERMITIDO EL ACCESO</h1>";
    }
    ?>
</body>
</html>