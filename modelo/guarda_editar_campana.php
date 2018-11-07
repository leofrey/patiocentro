<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id_ = $_POST["id_"];
 $nom_ = strtoupper($_POST["nom_"]);
 $ini_ = $_POST["ini_"];
 $fin_ = $_POST["fin_"]; 
 $det_ = $_POST["det_"];
 $est_ = $_POST["est_"];
 

 $nini_ = date('Y-m-d', strtotime($ini_));
 $nfin_ = date('Y-m-d', strtotime($fin_));
 


 
 $sql = "UPDATE campanas set nombre = '$nom_', fecha_inicio = '$nini_', fecha_final = '$nfin_', estado_vigencia = '$est_', detalles = '$det_' WHERE id = $id_";
 
 
   echo $rs = $obj_conexion->query($sql);

 ?>