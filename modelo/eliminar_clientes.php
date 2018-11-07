<?php
require ("../conexion/conexion.php");

$id = $_POST['id'];

$sql = "delete from clientes where id = $id";
echo $rs = $obj_conexion->query($sql);
?>