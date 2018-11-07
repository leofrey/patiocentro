<?php

	$cons_usuario="administrador";
    $cons_contra="campana2018";
    $cons_base_datos="campana";
    $cons_equipo="localhost";

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    exit;
}

mysqli_set_charset($obj_conexion,'utf8');


	
	
	
?>


