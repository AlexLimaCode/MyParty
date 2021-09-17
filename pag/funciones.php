<?php


function MenuRecursivo($usuario, $fActual, $permiso, $hijo, $nivel){
	include("conexion.php");
	$nombre='';
	$papa='';
	$archivo='';
	$query = "select IdFormulario from formularios where IdFormularioPadre=".$fActual;
	$result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){ //TIENE HIJOS
    	$hijo = true;
		if($nivel == 0){	//ESTA EN MENU PRINCIPAL
			while ($row=mysqli_fetch_array($result)) {
				$fActual = $row[0];
				$query2 = "select DescripcionPermiso, NivelJerarquico from tipopermiso s, permisos p, formularios f, trabajadores t where t.IdTrabajador = p.IdTrabajador and f.IdFormulario = p.IdFormulario and s.IdTipoPermiso = p.IdTipoPermiso and p.IdTrabajador=".$usuario." and f.IdFormulario =".$fActual;
				$result2 = mysqli_query($conn,$query2);
				if(mysqli_num_rows($result2)>0){
					while ($row=mysqli_fetch_array($result2)) {
						$permiso = $row[0];
						$nivel = $row[1];
					}
				}
				if($permiso == 'Permitido'){
					MenuRecursivo($usuario, $fActual, $permiso, $hijo, $nivel);
				}
			}
		}else{
			$query2 = "select DescripcionFormulario from formularios where IdFormulario=".$fActual;
			$result2 = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result2)>0){
				while($row=mysqli_fetch_array($result2)){
					$nombre = $row[0];
				}
				echo"<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>".$nombre."</a>";
				echo"<ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
				while ($row=mysqli_fetch_array($result)) {
					$fActual = $row[0];
					MenuRecursivo($usuario, $fActual, $permiso, $hijo, $nivel);
				}
				echo"</ul>";
				echo"</li>"; 
			}
			
		}  
	}else{
		$hijo = false;
		$query2 = "select DescripcionFormulario, Archivo, IdFormularioPadre from formularios where IdFormulario=".$fActual;
		$result2 = mysqli_query($conn,$query2);
		while($row=mysqli_fetch_array($result2)){
			$nombre = $row[0];
			$archivo = $row[1];
			$papa = $row[2];
		}
        echo"<li><a class='dropdown-item' href='".$archivo."?padre=".$papa."'>".$nombre."</a></li><hr>";
	}

}


function CreaTabla($TituloMalla,$result, $Titulos, $ini, $Link, $Parametro, $RegXPag, $ConEliminacion, $padre){
  
	// Obtenemos el nombre del primer campo de la tabla que vamos a desplegar	
	$info_campo = mysqli_fetch_fields($result);
	$i=0;
	foreach ($info_campo as $valor) {
		if ($i==0){
			$info = $valor->name;	
		}
		$i=$i+1;
	}
    $Columnas = $i;   
	
	if ($result && mysqli_num_rows($result)>0){
		if ($ConEliminacion==true){
			$Extiende = $Columnas + 1;
		}	
		else{
			$Extiende = $Columnas;
		}	
  		//  desplegamos el titulo de la malla
  		echo "<table class = 'Arial11 table' width='100%' border='1' cellpadding='2' align='center' style='border-collapse: collapse' bgcolor='#E2EBF4'>";
  		echo "<tr><td class='table-primary' colspan='$Extiende' align='center'><b>".$TituloMalla."</b></td></tr>";

  		//  desplegamos todas las paginas de la malla
		echo "<tr><td colspan='$Extiende' align='left'>";
		$x = (mysqli_num_rows($result) / $RegXPag);
		$Residuo = (mysqli_num_rows($result) % $RegXPag);
		$ParteEntera = (int)$x;
		if ($Residuo == 0) $ParteEntera = $ParteEntera - 1 ;
		$i = 0;
		echo "<b> Numero de Registros : ".mysqli_num_rows($result).">&nbsp;&nbsp;&nbsp;&nbsp;</b>Paginas :&nbsp;";
		while (($i) <= $ParteEntera){
			
      		echo "<a class='liga_verde' href=".$Link."?padre=".$padre."&pag=".(($i * $RegXPag)+$RegXPag)."&".$Parametro.">".(($i * $RegXPag)+1)."-".(($i * $RegXPag)+$RegXPag)."</a>&nbsp;&nbsp;";
	  		$i++;
		} 
		echo "</td></tr>";
	
		// desplegamos los nombres de los encabezados de las columnas
    	echo "<tr bgcolor='9EBCDA'>";
    	for ($i=0;$i<$Columnas;$i++){
	  		if ($i==0)
	    		echo "<td width='5%'><b>".$Titulos[$i]."</b></td>";
	  		else
        		echo "<td><b>".$Titulos[$i]."</b></td>";
    	}	 
		if ($ConEliminacion==true){
			echo "<td><button value='GuardarImp' name='GuardarImp' onClick='clickEliminaRegistros()'>";
			echo "<img src='../images/borrar.gif' border='0'></button></td>";
		}	
		echo "</tr>";
	
		// desplegamos los registros 
		$Inicio = $ini + 1 ;
		$Final = $ini + $RegXPag;
		$Reg = 1;
		$non = "1";
		$Renglon = 1;

		while ($row=mysqli_fetch_array($result)){
	  		if (($Reg >= $Inicio) && ($Reg <= $Final)){
				//CONTROLAMOS LOS COLORES DE REGISTRO PARA LA TABLA
		  		if ($non=="1"){
		    		echo '<tr  bgcolor="#CBDBEB" onMouseOver="uno(this,\'cccccc\');" onMouseOut="dos(this,\'CBDBEB\');">';
					$non = "0";
				}
				else{
					echo '<tr  onMouseOver="uno(this,\'cccccc\');" onMouseOut="dos(this,\'E2EBF4\');">';
					$non = "1";
				}	
	    		for ($i=0;$i<$Columnas;$i++){
	      			if ($i==0)
		    			echo "<td width='5%'>".$Reg."</td>";
		  			elseif ($i==1){
		     	     	if (EsFecha($row[$i])){//LO MANDO A LA FUNCION FECHA
				          	if(EsFecha_hora($row[$i])){	
					           echo "<td><a class='liga_verde' href=".$Link."?".$info."=".$row[$i-1]."&".$Parametro."&padre=".$padre.">".CambFecHor_a_Normal($row[$i])."</a></td>";
					        }
					        else{
					               echo "<td><a class='liga_verde' href=".$Link."?".$info."=".$row[$i-1]."&".$Parametro."&padre=".$padre.">".cambiaf_a_normal($row[$i])."</a></td>";
						    }  
				        }	
					    else{
							
							echo "<td><a class='liga_verde' href=".$Link."?".$info."=".$row[$i-1]."&pag=".($Inicio+9)."&padre=".$padre.">".$row[$i]."</a></td>";
						}
				   	}
		  			else{ 
		    			if (EsFecha($row[$i])){
				     		if(EsFecha_hora($row[$i])){
					     		echo "<td>".CambFecHor_a_Normal($row[$i])."</td>"; 
					   		}
					  		else{
					      		echo "<td>".cambiaf_a_normal($row[$i])."</td>";
							}  
				   		}	
			    		elseif($row[$i]=="0/")
				      		echo "<td> </td>";
		    			else
          					echo "<td>".$row[$i]."</td>";
		  			}	
				}	
				if ($ConEliminacion==true){
					echo "<td width='5%'><input type='checkbox' name='Casillas".$Renglon."' value='".$row[0]."'></td>";
				}	
				echo "</tr>";
				$Renglon++;
	  		}	
			if ($Renglon>$RegXPag){break;}
	  		$Reg++;
  		}
		echo "</table>";
  	} 
}

function CambFecHor_a_Normal($fecha){ 
    preg_match("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{2})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]." ".$mifecha[4].":".$mifecha[5]; 
    return $lafecha; 
} 

//Convierte fecha de mysql a normal 
function cambiaf_a_normal($fecha){ 
    preg_match("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
    return $lafecha; 
} 

//Convierte fecha de normal a mysql 
function cambiaf_a_mysql($fecha){ 
    preg_match( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
    return $lafecha; 
}


function EsFecha($Campo){
    if (substr($Campo,4,5)=="-" && substr($Campo,7,8)=="-" && substr($Campo,13,14)==":" && substr($Campo,16,17)==":" )  // este se ocupar� cuando la fecha tambien almacene la hora
	   {
	     return true;
	   }
	elseif (substr($Campo,4,5)=="-" && substr($Campo,7,8)=="-")
         return true;
}
function EsFecha_hora($Campo){
    if ($Campo[4] == "-" && $Campo[7] == "-" && $Campo[13] == ":" && $Campo[16] == ":")  // este se ocupar� cuando la fecha tambien almacene la hora
		 return true;
	 
}


// Funcion que llena un cuadro combinado con el query, el valor selected que debe de tener y el valor que cachara en post o get
function LlenaCombo($Sql,$descripcion,$valor){
	include('conexion.php');
	$result = mysqli_query($conn,$Sql);
	if (mysqli_num_rows($result)>0){
		$i=0;
		$j=0;
		echo"<select class='form-select' aria-label='Default select example' name='$valor'>";
	  	while ($row=mysqli_fetch_row($result)){
			if($row[$i]==$descripcion){
				echo "<Option selected value=".($j+1).">$row[$i]";
			}else{
				echo "<Option value=".($j+1).">$row[$i]";
			}
			$j++;	
		}
		echo"</select>";
	}else{
		echo "<h6 style='font-weight: bold;
		font-family: 'Gill Sans', 'Gill Sans MT',Calibri, 'Trebuchet MS', sans-serif;
		font-style: italic;'>NO HAY REGISTROS DISPONIBLES</h6>";
	}
		
		mysqli_free_result($result);
			
}
function LlenaComboSaltado($Sql,$descripcion,$valor){
	include('conexion.php');
	$result = mysqli_query($conn,$Sql);
	if (mysqli_num_rows($result)>0){
		$i=0;
		$j=0;
		echo"<select class='form-select' aria-label='Default select example' id='$valor' name='$valor'>";
        echo "<option selected value=0>Selecciona ".$valor."</option>";
	  	while ($row=mysqli_fetch_row($result)){
			if($row[$i]==$descripcion){
				echo "<Option selected value=".$row[0].">$row[1]";
			}else{
				echo "<Option value=".$row[0].">$row[1]";
			}
			$j++;	
		}
		echo"</select>";
		mysqli_free_result($result);
	}else{
		echo"<h4>NO HAY RESULTADOS DISPONIBLES</h4>";
	}
		
			
}
function LlenaComboNombres($Sql,$descripcion,$valor){
	include('conexion.php');
	$result = mysqli_query($conn,$Sql);
	if (mysqli_num_rows($result)>0){
		$i=0;
		$j=0;
		echo"<select class='form-select' aria-label='Default select example' name='$valor'>";
        
	  	while ($row=mysqli_fetch_row($result)){
			if($row[$i]==$descripcion){
				echo "<Option selected value=".$row[0].">".$row[1]." ".$row[2]." ".$row[3];
			}else{
				echo "<Option value=".$row[0].">".$row[1]." ".$row[2]." ".$row[3];
			}
			$j++;	
		}
		echo"</select>";
		mysqli_free_result($result);
	}else{
		echo"<h4>NO HAY RESULTADOS DISPONIBLES</h4>";
	}
		
			
}

function AsignaLote(){
	include('conexion.php');
	$pedido='';
	$lote='';
	$c1='';
	$c2='';
	$query = "select IdLoteProduccion from lotesproducicon where cantidad>0 LIMIT 1";
	$result = mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($result)){
		$lote = $row[0];
	}
	if (mysqli_num_rows($result)>0){ //LO QUE HACE EL QUERY ES MANDARME EL ULTIMO PEDIDO QUE SDE ASIGNO, PARA ASIGNAR UN LOTE.
		$query = "select IdPedido from pedidos order by IdPedido DESC LIMIT 1";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_array($result)){
				$pedido = $row[0];
			}
			juntalos($lote,$pedido,0,0);
		}
	}

	
}

function juntalos($lote,$pedido,$c1,$c2){
	echo "pedido = ".$pedido;
	include('conexion.php');
	$query = "select Cantidad from pedidos where IdPedido='".$pedido."'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			$c1 = $row[0];
		}
	}
	$query = "select Cantidad from lotesproducicon where IdLoteProduccion='".$lote."'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_array($result)){
			$c2 = $row[0];
		}
	}
	if($c1 - $c2==0 || $c2>$c1 ){
		$query = "Insert into pedidoslotes (IdPedido, IdLoteProduccion) values ('".$pedido."', '".$lote."')";
		$result = mysqli_query($conn,$query);
		$c2 = $c2 - $c1;
		$query = "update lotesproducicon set Cantidad='".$c2."' where IdLoteProduccion='".$lote."'";
		$result = mysqli_query($conn,$query);
	}else{
		$query = "select IdLoteProduccion from lotesproducicon where cantidad>0 LIMIT 1";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_array($result)){
				$lote = $row[0];
			}
			juntalos($lote,$pedido,$c1,$c2);
		}
	}
}

function transFallida(){
	?>
		<script>
			alert("Transancción fallida verifique los datos ingresados");
		</script>
	<?php
}

function transExitosa(){
	?>
		<script>
			alert("Transancción exitosa");
		</script>
	<?php
}