<?php 

   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

   $id_ = 0;
   $id = 0;
	
 $sqt = "select id from campanas order by id desc limit 1";
 $rt = $obj_conexion->query($sqt);
 while($rot=$rt->fetch_assoc())
	{
      $id_ = $rot['id'];
    }

if(isset($_REQUEST["campana"])){
   $id=$_REQUEST["campana"];
}else{
   $id = $id_;
}


$tickets = 0;
$visitas = 0;
$plata = 0;

 $sqz = "select sum(numero_ticket) as ticket, sum(monto_boleta) as plata from log_visitas where id_campana = $id";
           $rz = $obj_conexion->query($sqz);   
                while($rew=$rz->fetch_assoc())
                {
                    $tickets = number_format($rew['ticket'],0);
                    $plata = '$ '.number_format($rew['plata'],0);
                 } 

$sqm = "select count(rut) as visitas from log_visitas where id_campana = $id";
           $rm = $obj_conexion->query($sqm);   
                while($rmw=$rm->fetch_assoc())
                {
                    $visitas = number_format($rmw['visitas'],0);
                 } 

                 $tickets = str_replace(',','.',$tickets);	
				 $visitas = str_replace(',','.',$visitas);
				 $plata = str_replace(',','.',$plata);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
       <link href="../librerias/fontawesome/css/all.css" rel="stylesheet">      
	
</head>
<body>
  <table width="600" height="100" border="1" align="center" cellpadding="0" cellspacing="0">
       <tr>
        <td align="center" bgcolor="#CCCCCC"><i class="fas fa-user"></i> Visitas</td>
        <td align="center" bgcolor="#CCCCCC"><i class="fas fa-ticket-alt"></i> Ticket</td>
        <td align="center" bgcolor="#CCCCCC"><i class="fas fa-dollar-sign"></i> Ventas</td>
      </tr>
  <tr>
    <td align="center" width="200"><?php echo $visitas?></td>
    <td align="center" width="200"><?php echo $tickets?></td>
    <td align="center" width="200"><?php echo $plata?></td>
  </tr>
</table>
</body>
</html>