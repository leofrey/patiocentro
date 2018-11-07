<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
 $nom_ = strtoupper($_POST["nom_"]);
 $use_ = $_POST["use_"];
 $pas_ = $_POST["pas_"]; 
 $per_ = $_POST["per_"];

 $sql = "INSERT INTO usuarios (usuario, password, nombre, perfil) VALUES('".$use_."', '".$pas_."', '".$nom_."', ".$per_.")";

 echo $rs = $obj_conexion->query($sql);

 ?>