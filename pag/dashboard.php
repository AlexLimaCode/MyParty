<?php

    include('conexion.php');
    session_start();
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

    <?php

        if ($_SESSION['IdNegocio'] == "") {
            ?>
                <h1>NO TIENES PERMITIDO EL ACCESO</h1>
            <?php
        }else if ($_SESSION['IdNegocio'] != 0){ 
            $query = "select Nombre, Descripcion, Direccion, Telefono, Whatsapp, Facebook, Instagram, Correo from tblnegocios where IdNegocio=".$_SESSION['IdNegocio'];
            $result = mysqli_query($conn, $query);
            $nombre;
            $dire;
            $des;
            $telefono;
            $whatsapp;
            $facebook;
            $instagram;
            $correo;
            while ($row = mysqli_fetch_row($result)){
                $nombre = $row[0];
                $des = $row[1];
                $dire = $row[2];
                $telefono = $row[3];
                $whatsapp = $row[4];
                $facebook = $row[5];
                $instagram = $row[6];
                $correo = $row[7];
            }
            ?>
            <div class='md:container md:mx-auto p-10'>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-white">Personal Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                RECUERDA QUE LO QUE MODIFIQUES AQUI, SE VERA REFLEJADO EN LA PAGINA PRINCIPAL
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $nombre?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last-name" class="block text-sm font-medium text-gray-700">Direccion</label>
                                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $dire?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email-address" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $des?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Correo</label>
                                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $correo?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last-name" class="block text-sm font-medium text-gray-700">Telefono</label>
                                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $telefono?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">Facebook</label>
                                                <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $facebook?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="state" class="block text-sm font-medium text-gray-700">Instagram</label>
                                                <input type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $instagram?>'>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="postal-code" class="block text-sm font-medium text-gray-700">Whatsapp</label>
                                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value='<?php echo $whatsapp?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }else{
            ?>
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
            <?php
        }


    ?>
    
</body>
</html>