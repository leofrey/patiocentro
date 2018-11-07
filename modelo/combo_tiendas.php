<?php 
   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");
 $id = 0;

 $sql = "select id from campanas order by id desc limit 1";
 $rs = $obj_conexion->query($sql);
 while($row=$rs->fetch_assoc())
	{
      $id = $row['id'];
    }

 $sqx = ("select * from tiendas where estado = 'A' order by nombre");

	 $rx = $obj_conexion->query($sqx);
				
               
	$HTML='<select class="form-control" name="cmbtienda" id="cmbtienda">';
	while($rok=$rx->fetch_assoc())
	{
		$HTML.="<option value='".$rok["id"]."'";	        		    	
		$HTML.=">".$rok["nombre"]."</option>";
	}
	$HTML.='</select>';
	
	echo $HTML;

 ?>