<!DOCTYPE html>
<html>
<?php

set_error_handler("warning", E_ALL);
require ("../conexion/conexion.php");

$rut = $_GET["rut"];
$id =  $_GET["id"];

$nom_cliente = '';
$tel_cliente = '';
$ema_cliente = '';
$sex_cliente = '';
$nom_campana = '';
$tickets = 0;
$visitas = 0;
$error = 0;

$sql = "select * from campanas where id = $id";
$rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {
                 	$nom_campana = $row["nombre"];
                 }	

   if($nom_campana == ''){
          echo "USTED HA TRATADO DE ENGAÑAR AL SISTEMA, COMETIO UN ERROR GRAVE";
          exit;
         }        

if($rut !=''){
 $sqx = "select * from clientes where rut = '$rut'";
 $rx = $obj_conexion->query($sqx);   
                while($row=$rx->fetch_assoc())
                {
                	$nom_cliente = $row["nombre"];
                	$tel_cliente = $row["telefono"];
					        $ema_cliente = $row["email"];
					        $sex_cliente = $row["sexo"];
                } 

         if($nom_cliente == '')
         {
                      $rut_api = str_replace('.','',$rut);
                      $rut_api = str_replace('-', '', $rut_api);
                      file_get_contents('https://api.rutify.cl/rut/'.$rut);

                 if($error ==0)
                 {
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
                       $sexo = 'O';
                  }

           
         }     //fin if $nom_cliente=='';  

   $sqz = "select sum(numero_ticket) as ticket from log_visitas where rut = '$rut' and id_campana = $id";
           $rz = $obj_conexion->query($sqz);   
                while($rew=$rz->fetch_assoc())
                {
                    $tickets = $rew['ticket'];
                 } 

      $sqm = "select count(rut) as visitas from log_visitas where rut = '$rut' and id_campana = $id";
           $rm = $obj_conexion->query($sqm);   
                while($rmw=$rm->fetch_assoc())
                {
                    $visitas = $rmw['visitas'];
                 } 
          
          if($visitas > 0){
             $cadena_visitas = 'En esta promocion, has ganado '.$tickets.' cupones en '.$visitas.' visitas';
           }else{
            $cadena_visitas = 'Esta es tu primera participacion en esta promocion';
           }

                  
     }else{           
            $cadena_visitas = '';   
      } 

      function warning($errno, $errstr, $errfile, $errline, $errcontext) {
   //throw new Exception( $errstr );
           $error = 1;
}             

?>
<head>
	<title>CONCURSOS</title>
  <link rel="shortcut icon" href="../librerias/patio.png" />
	 <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/alertify.css">
      <link rel="stylesheet" type="text/css" href="../librerias/default.css">
      <link rel="stylesheet" type="text/css" href="../index.css">
       <link href="../librerias/fontawesome/css/all.css" rel="stylesheet"> 
      
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>	  
	  <script src="../librerias/alertify.js"></script>
	  <script src="../controlador/formularios_promotora.js"></script>

      <style type="text/css">
				<!--
				.Estilo1 {
					font-family: Arial, Helvetica, sans-serif;
					font-size: 36px;
				}
				.Estilo2 {
					font-family: Arial, Helvetica, sans-serif;
					font-weight: bold;
				}
				.Estilo3 {font-family: Arial, Helvetica, sans-serif}
				

        
         -->
       </style>

     

</head>
<body>
  
 <table width="783" height="221" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><img src="../librerias/patio.png" align="left"></td>
    <td height="24" colspan="5"><div align="center" class="Estilo1">  <?php echo $nom_campana?></div></td>
  </tr>
  <tr>
    <td height="24" colspan="6" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="24"><div align="center" class="Estilo2">Datos cliente </div></td>
     <td width="127" rowspan="9">&nbsp;</td>
      <td width="127" rowspan="9">&nbsp;</td>
       <td width="127" rowspan="9">&nbsp;</td>
    <td colspan="2"><div align="center" class="Estilo2">Datos Participacion </div></td>
  </tr>
  <tr>
    <td width="369" height="24"><span class="Estilo3">Rut</span></td>
    <td colspan="2"><span class="Estilo3">Monto Boleta </span></td>
  </tr>
  <tr>
    <td><input name="ruttxt" type="text" id="ruttxt"  disabled value="<?php echo $rut?>" size="50" maxlength="12" />
        <input type="hidden" id="idcampana" value="<?php echo $id?>">
        <input type="hidden" id="sexotxt" value="<?php echo $nom_sex?>">
    </td>
    <td colspan="2"><input name="monboltxt"  class="form-control text-uppercase input-sm" autocomplete="off" id="monboltxt" onBlur="saca_ticket()" onKeyPress="return valida_numeros(event)" type="text" size="50" maxlength="10" /></td>
  </tr>
  <tr>
    <td height="26"><span class="Estilo3">Nombre(apellido, apellido, nombre)</span></td>
    <td colspan="2"><span class="Estilo3">Tienda</span></td>
  </tr>
  <tr>
    <td height="36"><input name="nomtxt" autocomplete="off"  class="form-control text-uppercase input-sm" type="text" id="nomtxt" value="<?php echo $nom_cliente?>" size="50" maxlength="50" /></td>
    <td colspan="2"><div id="cmbtiendac"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td height="29"><span class="Estilo3">Telefono</span></td>
    <td colspan="2"><span class="Estilo3">Numero de tickets </span></td>
  </tr>
  <tr>
    <td><input name="teltxt" autocomplete="off" type="text"  class="form-control text-uppercase input-sm" id="teltxt" value="<?php echo $tel_cliente?>" onKeyPress="return valida_numeros(event)" size="50" maxlength="20" /></td>
    <td colspan="2"><input name="tictxt" disabled id="tictxt" type="text" />
     <span class="Estilo3">
      <button class="btn btn-warning" onclick="imprime_ticket()" id="btnimprimir"><i class="fas fa-print"></i></button>
    </span>
    </td>
  </tr>
  <tr>
    <td><span class="Estilo3">E-mail</span></td>
    <td colspan="2"><span class="Estilo3"></span></td>
  </tr>
  <tr>
    <td><input name="ematxt" autocomplete="off" type="text"  class="form-control text-uppercase input-sm" id="ematxt" value="<?php echo $ema_cliente?>" size="50" maxlength="50" />
   
    </td>
    <td width="174"><div align="center" class="Estilo3">
        <button class="btn btn-lg btn-warning text-uppercase" id="btnvalida">Validar</button>
    </div></td>
    <td width="192"><div align="center">
      
      <button class="btn btn-lg btn-success text-uppercase" onClick="volver('<?php echo $id?>')" id="btnfinal">Finalizar</button>      
      <button class="btn btn-lg btn-danger text-uppercase" onClick="volver('<?php echo $id?>')" id="btncancela">Cancelar</button>
    </div></td>
  </tr>
</table>



<?php if($rut != ''){?>
  <div class="container" align="center">
    <div class="row">
      <div class="col-sm-8 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-header" align="center">
            <h3><i class="fas fa-user"></i></h3>         
          </div>
          <div class="card-body" align="center">
            <h5 class="card-title text-center"><?php echo $cadena_visitas;?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>

</body>
</html>

<script type="text/javascript">



$(document).ready(function(){

	 $('#btnimprimir').attr('disabled', 'disabled');
	// $('#btnfinal').attr('disabled', 'disabled');   
	 $('#btnvalida').attr('disabled', 'disabled');   
	 $('#btncancela').css("display", "inline");
	 $('#btnfinal').css("display", "none");      
   $('#cmbtiendac').load('../modelo/combo_tiendas.php');

$('#btnvalida').click(function(){

    
    
    rut_ = $('#ruttxt').val();
    nom_ = $('#nomtxt').val();
    tel_ = $('#teltxt').val();
    ema_ = $('#ematxt').val();
    id_cam_ = $('#idcampana').val();
    mon_bol_ = $('#monboltxt').val();
    tienda_ = $('#cmbtienda').val();
    num_ticket = $('#tictxt').val();

   

        if(nom_ == ''){
        	alertify.alert('Error','Debe ingresar nombre cliente');         
          return false;        
        }

        if(tel_ == ''){
        	alertify.alert('Error','Debe ingresar telefono cliente');         
          return false;        
        }

        if(ema_ == ''){
        	alertify.alert('Error','Debe ingresar email cliente');         
            return false;        
        }

   

        valida();
        

    });

  

});
</script>	