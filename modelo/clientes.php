<?php

    $rut_ = $_POST['rut'];
	
	$valido = validarut($rut_);
	
	if($rut_ == ''){
		echo '1';
		exit;
	}			
		
		    if($valido == true)
			{
	          echo '1';
	          
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