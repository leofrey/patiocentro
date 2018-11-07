<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 $id_ =  $_POST["id_"];
 $nom_ = strtoupper($_POST["nom_"]);
 $use_ = $_POST["use_"];
 $pas_ = $_POST["pas_"]; 
 $per_ = $_POST["per_"];

 $sql = "UPDATE usuarios set usuario = '$use_', password = '$pas_', nombre = '$nom_', perfil = $per_ where id = $id_";

 echo $rs = $obj_conexion->query($sql);

 ?>