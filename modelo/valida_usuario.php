<?php
require ("../conexion/conexion.php");

$usuario = $_POST['user'];
$password = $_POST['pass'];

$sql = "select * from usuarios where usuario = '".$usuario."' and password = '".$password."'";
$rs = $obj_conexion->query($sql);

if($row=$rs->num_rows>0)
  {
    while($row=$rs->fetch_assoc())
      {
        echo $row["perfil"];
      }	
  }
 else{
 	echo "0";
 } 	
?>