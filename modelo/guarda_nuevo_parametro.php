<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
 $des_ = $_POST["des_"];
 $has_ = $_POST["has_"];
 $tic_ = $_POST["tic_"]; 
 

 
 
 $sql = "INSERT INTO parametros_ticket (monto_inicial, monto_final,numero_ticket) VALUES($des_,$has_,$tic_)";
 
   echo $rs = $obj_conexion->query($sql);

 ?>