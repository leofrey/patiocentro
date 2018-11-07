<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id_ = $_POST["id_"];
 $nom_ = strtoupper($_POST["nom_"]);
 $dir_ = strtoupper($_POST["dir_"]);
 $enc_ = strtoupper($_POST["enc_"]);  
 $est_ = $_POST["est_"];
 


 


 
 $sql = "UPDATE tiendas set nombre = '$nom_', direccion = '$dir_', encargado = '$enc_', estado = '$est_' WHERE id = $id_";
 
 
   echo $rs = $obj_conexion->query($sql);

 ?>