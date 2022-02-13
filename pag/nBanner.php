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
    <script src="https://cdn.tailwindcss.com"></script>
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php

    if ($_SESSION['IdNegocio'] == "Vacio") {
        ?>
            <h1>NO TIENES PERMITIDO EL ACCESO</h1>
        <?php
    }else{
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
        <br><br><br><br><br><br>
        <div class='md:container md:mx-auto p-10'>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form enctype='multipart/form-data' action="./editBanner.php?padre=1" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                            <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black-800 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700">Url</label>
                                            <input type="text" name="urlImagen" id="urlImagen" autocomplete="urlImagen" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black-800 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="im1" class="block text-sm font-medium text-gray-700">Foto Nueva del Banner</label>
                                            <input type="file" name="im1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>