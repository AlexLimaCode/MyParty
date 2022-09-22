<?php

include('conexion.php');
include('funciones.php');

    $id_estado = $_POST['id_estado'];

    $query = "select i.id , municipio from estados e, municipios m, estados_municipios i where m.id = i.municipios_id and e.id = i.estados_id and e.id = '".$id_estado."' order by i.id";
    $result = mysqli_query($conn, $query);

    $html = "<option selected value=0>Selecciona el municipio</option>";
    while($row = mysqli_fetch_row($result)){
        $html = "<Option value=".$row[0].">".$row[1]."</option>";
        echo $html;
    }
    
?>