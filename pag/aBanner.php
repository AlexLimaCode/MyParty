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
    <title>Banner management</title>
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
            <br><br>
            <form enctype='multipart/form-data' method="POST" action='editBanner.php' name='principal'>
            <!-- TABLE -->
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Nombre</th>
                                    <th class="px-4 py-3">Url</th>
                                    <th class="px-4 py-3">Estado</th>
                                    <th class="px-4 py-3">Activar</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php
                                        //PRIMER COLUMNA
                                        $query = "select IdImagenBanner, Nombre, UrlImagen, Estado from tblimagenesbanner order by IdImagenBanner asc";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_row($result)){
                                            echo "<tr><td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$row[1]."</p></td> \n";
                                            echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$row[2]."</p></td> \n";
                                            $estado = "";
                                            if ($row[3] == 1) {
                                                $estado = "Activo";
                                            }else{
                                                $estado = "Inactivo";
                                            }
                                            echo "<td class = 'px-4 py-3 text-sm border'> <p class = 'font-semibold text-black'>".$estado."</p></td> \n";
                                            echo "<td class = 'px-4 py-3 text-sm border'><input type='checkbox' name='chk[]' value='".$row[0]."'></td></tr>";
                                        }

                                    ?>                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="form-check">
                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="padre" value="2" id="flexRadioDefault1" checked>
                            <label class="form-check-label inline-block text-white-800" for="flexRadioDefault1">
                                Activar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="padre" value="3" id="flexRadioDefault2">
                            <label class="form-check-label inline-block text-white-800" for="flexRadioDefault2">
                                Desactivar
                            </label>
                        </div>
                        <button class ='flex-1 px-6 py-2 font-semibold select-none rounded-md text-white bg-indigo-500 hover:bg-indigo-600' type="submit">Enviar</button>
                    </div>
                </section>
            </form>
                    
            <!--- FIN TABLE    -->
            <?php
        }else{ 
            echo "<h1>NO TIENES PERMITIDO EL ACCESO</h1>";
        }
    ?>
</body>
</html>