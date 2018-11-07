<?php 
set_error_handler("warning", E_ALL);
$rut = $_POST["rut"];

$nom_cliente = '';
$$nom_sex = '';
$error = 0;

 file_get_contents('https://api.rutify.cl/rut/'.$rut);

                  if($error ==0){
                       $response = file_get_contents('https://api.rutify.cl/rut/'.$rut);
                       $response = json_decode($response);
                       $nom_cliente = ($response->nombre);
                       $sexo = ($response->sexo);
                           if($sexo == 1)
                           {
                               $nom_sex = 'M';              
                           }

                           if($sexo == 2)
                           {
                               $nom_sex = 'F';
                           }

                       $nom_cliente = strtoupper($nom_cliente);


                  }else
                  {
                       $nom_cliente = '';
                       $nom_sex = 'O';
                  }

                  $datos = $nom_cliente.'||'.$nom_sex;
                  echo $datos;

       function warning($errno, $errstr, $errfile, $errline, $errcontext) {
   //throw new Exception( $errstr );
           $error = 1;
}                          


 ?>