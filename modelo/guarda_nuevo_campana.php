<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
 $nom_ = strtoupper($_POST["nom_"]);
 $ini_ = $_POST["ini_"];
 $fin_ = $_POST["fin_"]; 
 $det_ = $_POST["det_"];
 $hoy_ = date('Y-m-d');

 $nini_ = date('Y-m-d', strtotime($ini_));
 $nfin_ = date('Y-m-d', strtotime($fin_));
 $nhoy_ = date('Y-m-d', strtotime($hoy_));


 
 $sql = "INSERT INTO campanas (nombre, fecha_inicio, fecha_final, fecha_creacion, detalles) VALUES('".$nom_."', '".$nini_."', '".$nfin_."', '".$nhoy_."','".$det_."')";
 
   echo $rs = $obj_conexion->query($sql);

 ?>
