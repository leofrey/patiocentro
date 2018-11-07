<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id_ =  $_POST["id_"];
 $rut_ = $_POST["rut_"];
 $nom_ = strtoupper($_POST["nom_"]);
 $tel_ = $_POST["tel_"]; 
 $ema_ = $_POST["ema_"];
 $sex_ = $_POST["sex_"];

 $sql = "UPDATE clientes set rut = '$rut_', nombre = '$nom_', telefono = '$tel_', email = '$ema_', sexo = '$sex_' where id = $id_";
 echo $rs = $obj_conexion->query($sql);

 ?>