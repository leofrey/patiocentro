<?php

require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");

 
 $rut_ = $_POST["rut_"];
 $nom_ = strtoupper($_POST["nom_"]);
 $tel_ = $_POST["tel_"]; 
 $ema_ = $_POST["ema_"];
 $sex_ = $_POST["sex_"];


 $valido = validarut($rut_);
	
				
		
		    if($valido == true)
			{
	         

  $sqx = "select * from clientes where rut ='". $rut_."'";
  $rx = $obj_conexion->query($sqx);
  while($roe=$rx->fetch_assoc())
    {
      echo 'RUT INGRESADO YA EXISTE';
      exit;
    }	

 $sql = "INSERT INTO clientes (rut, nombre, telefono, email, sexo) VALUES('".$rut_."', '".$nom_."', '".$tel_."', '".$ema_."','".$sex_."')";

 echo $rs = $obj_conexion->query($sql);
       
}else{
  echo 'ERROR:::: RUT INGRESADO NO ES VALIDO';
  exit;
} 

 function validarut($rut)
  {
    
    		
	if(strpos($rut,"-")==false){
	 $RUT[0] = substr($rut,0, -1);
	 $RUT[1] = substr($rut, -1);
	 }
	 else
	 {
	  $RUT = explode("-", trim($rut));
	//  $RUT[0] = substr($rut,0, -1);
	//  $RUT[1] = substr($rut, -1);
	}
		
	//$rut2 = str_replace("-","",$RUT[0]);
	$elRut = str_replace(".","",trim($RUT[0]));
	
	if(!is_numeric($elRut)){
		return false;
		exit;
	}
	
	$factor = 2;
	
	$suma = 0;	
	for($i = strlen($elRut)-1; $i >= 0; $i--)
	{	
	  $factor = $factor > 7 ? 2 : $factor;
	  $suma += $elRut{$i}*$factor++;
	   
	}
	
	$resto = $suma % 11;
	$dv = 11 - $resto;
	
	if($dv == 11){
	 $dv = 0;
	}else if($dv == 10){
	  $dv = "k";
	}else{
	 $dv = $dv;
	}
	
	if($dv == trim(strtolower($RUT[1]))){
	    return true;
		
	}else{
	   return false;
	   
	}   	   
	  
  }

 ?>