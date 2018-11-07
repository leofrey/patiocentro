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

 $sqx = ("select * from campanas order by id");

	 $rx = $obj_conexion->query($sqx);
				
               
	$HTML='<select onchange="valida();" class="form-control" name="campana" id="campana">';
	while($rok=$rx->fetch_assoc())
	{
		//if ($i==0)
		//	$seleccionado=' ';
		//else
        $HTML.="<option value='".$rok["id"]."'";	
        if ($rok["id"] == $id){
		$HTML.=" selected='selected'";
				  }			    	
		$HTML.=">".$rok["nombre"]."</option>";
	}
	$HTML.='</select>';
	
	echo $HTML;

 ?>