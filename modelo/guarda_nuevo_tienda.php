<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
 $nom_ = strtoupper($_POST["nom_"]);
 $dir_ = strtoupper($_POST["dir_"]);
 $enc_ = strtoupper($_POST["enc_"]); 
 

 
 
 $sql = "INSERT INTO tiendas (nombre, direccion, encargado) VALUES('".$nom_."', '".$dir_."', '".$enc_."')";
 
   echo $rs = $obj_conexion->query($sql);

 ?>
