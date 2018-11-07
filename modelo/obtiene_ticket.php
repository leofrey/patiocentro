<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

$monto = $_POST['monto'];
$tic_ = 0;
$log_ = 0;

$sqz = "select monto_inicial from parametros_ticket order by monto_inicial asc limit 1";
 $rz = $obj_conexion->query($sqz);
 while($rzw=$rz->fetch_assoc())
	{
      $inicial_ = $rzw['monto_inicial'];           
    }


   if($inicial_ > $monto){
   	 $tic_ = 0;
   	 echo $tic_;
   	 exit;
   } 

$sql = "select numero_ticket from parametros_ticket where monto_inicial <= $monto and monto_final >= $monto";
 $rs = $obj_conexion->query($sql);
 while($row=$rs->fetch_assoc())
	{
      $tic_ = $row['numero_ticket'];
      $log_ = 1;
    }

if($log_==0){

 $sqx = "select numero_ticket from parametros_ticket order by monto_final desc limit 1";
 $rx = $obj_conexion->query($sqx);
 while($rew=$rx->fetch_assoc())
	{
      $tic_ = $rew['numero_ticket'];      
    }
}


echo $tic_;

?>