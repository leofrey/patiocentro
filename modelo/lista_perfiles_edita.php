<?php 
   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id =  $_POST["id"];

 $sqx = ("select * from perfiles order by cod_perfil");

	 $rx = $obj_conexion->query($sqx);
				
               
	$HTML='<select class="form-control" id="listaperfilese">';
	while($rok=$rx->fetch_assoc())
	{
		//if ($i==0)
		//	$seleccionado=' ';
		//else
        $HTML.="<option value='".$rok["cod_perfil"]."'";	
        if ($rok["cod_perfil"] == $id){
		$HTML.=" selected='selected'";
				  }			    	
		$HTML.=">".$rok["des_perfil"]."</option>";
	}
	$HTML.='</select>';
	
	echo $HTML;

 ?>