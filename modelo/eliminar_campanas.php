<?php
require ("../conexion/conexion.php");

$id = $_POST['id'];

$sqx = "delete from visitas where campana = $id";
mysqli_query($obj_conexion,$sqx);

$sqz = "delete from log_visitas where id_campana = $id";
mysqli_query($obj_conexion,$sqz);

$sql = "delete from campanas where id = $id";
echo $rs = $obj_conexion->query($sql);
?>