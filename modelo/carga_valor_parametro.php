<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

$monto_inicial = 1500;
$disa = '';

$sql = "select monto_final from parametros_ticket order by monto_final desc limit 1";
 $rz = $obj_conexion->query($sql);
 while($roz=$rz->fetch_assoc())
  {
      $monto_inicial = $roz['monto_final'] + 1;      
    }

    echo $monto_inicial;

?>