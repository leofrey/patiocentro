<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id_ = $_POST["id_"];
 $des_ = $_POST["des_"];
 $has_ = $_POST["has_"];
 $tic_ = $_POST["tic_"]; 

  

 
 $sql = "UPDATE parametros_ticket set monto_inicial = $des_, monto_final = $has_, numero_ticket = $tic_ WHERE id = $id_";
 
 
   echo $rs = $obj_conexion->query($sql);

 ?>