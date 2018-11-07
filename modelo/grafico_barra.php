<?php 
require_once("../conexion/conexion.php");
require_once("../librerias/jpgraph-4.2.4/src/jpgraph.php");
require_once("../librerias/jpgraph-4.2.4/src/jpgraph_bar.php");

$nom_campana = '';
$datos[] = '';
$label[] = '';
$id_ = 0;
$id = 0;
//$id = $_POST['id'];
//$id=9;
$sqz = "select id from campanas order by id desc limit 1";
 $rz = $obj_conexion->query($sqz);
 while($roz=$rz->fetch_assoc())
	{
      $id_ = $roz['id'];
    }

if(isset($_REQUEST["campana"])){
   $id=$_REQUEST["campana"];
}else{
	$id = $id_;
}


$sqx = "SELECT nombre, date_format(fecha_inicio, '%d-%m-%Y') as fecha_inicio, date_format(fecha_final, '%d-%m-%Y') as fecha_final FROM campanas WHERE id=".$id."";
$rx = $obj_conexion->query($sqx);
 while($roe=$rx->fetch_assoc())
   {
      $nom_campana = 'Campaña '.$roe['nombre'].' Desde el '.$roe['fecha_inicio'].' hasta el '.$roe['fecha_final'];
   }	


$sql = "select visitas, date_format(fecha, '%d-%m-%Y') as fecha from visitas where campana = $id";
 $rs = $obj_conexion->query($sql);
 while($row=$rs->fetch_assoc())
   {
      $datos[] = $row['visitas'];
      $label[] = $row['fecha'];
   }	

   
 

 $graficos = new graph(800,400,'auto');
 $graficos -> SetScale("textint");
 $graficos -> title -> set($nom_campana); 
 $graficos -> xaxis -> SetTicklabels($label);
 $barplot1 = new BarPlot($datos); 
 $barplot1 -> SetFillGradient('#BE81F7', '#E3CEF6', GRAD_HOR);
 $barplot1 -> SetWidth(10);
 $graficos -> add($barplot1);
 $graficos -> Stroke();
 $graficos -> Stroke('graficos.png');
 echo $graficos;
 ?>
