<?php 
   require ("../conexion/conexion.php");
  header ("Content-Type:text/html; charset=utf-8");

 $sqx = ("select * from perfiles order by cod_perfil");

	 $rx = $obj_conexion->query($sqx);
				
               
	$HTML='<select class="form-control" id="listaperfiles">';
	while($rok=$rx->fetch_assoc())
	{
		//if ($i==0)
		//	$seleccionado=' ';
		//else
        $HTML.="<option value='".$rok["cod_perfil"]."'";			    	
		$HTML.=">".$rok["des_perfil"]."</option>";
	}
	$HTML.='</select>';
	
	echo $HTML;

 ?>