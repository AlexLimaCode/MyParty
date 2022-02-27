<?php

include('conexion.php');
include('funciones.php');

    $id_servicio = $_POST['id_servicio'];

    $query = "select IdServicioCategoria , c.Descripcion from tblcategorias c, tblserviciocategoria p, tblservicios s where c.IdCategoria = p.IdCategoria and s.IdServicio = p.IdServicio and p.IdServicio = '".$id_servicio."'  order by c.Descripcion asc";
    $result = mysqli_query($conn, $query);

    $html = "<option selected value=0>Selecciona la categoria</option>";
    while($row = mysqli_fetch_row($result)){
        $html = "<Option value=".$row[0].">".$row[1]."</option>";
        echo $html;
    }
    
?>