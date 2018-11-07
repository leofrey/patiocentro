<!DOCTYPE html>
<html>
<?php
require ("../conexion/conexion.php");

$rut = $_GET["rut"];
$id =  $_GET["id"];

$nom_cliente = '';
$tel_cliente = '';
$ema_cliente = '';
$sex_cliente = '';
$nom_campana = '';

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
      }           

?>
<head>
	<title>Formulario de campañas</title>
	 <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/alertify.css">
      <link rel="stylesheet" type="text/css" href="../librerias/default.css">
      <link rel="stylesheet" type="text/css" href="../index.css">
      
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>	  
	  <script src="../librerias/alertify.js"></script>
</head>
<body>
 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $nom_campana?></h5>
           
            <div class="form-label-group">            	
            	<input type="hidden" name="id_campana" id="id_campana" value="<?php echo $id?>">
              </div>

              <div class="form-label-group">
               <label for="ruttxt">Rut cliente</label>
                <input type="text" id="ruttxt" disabled value="<?php echo $rut?>" class="form-control text-uppercase " maxlength="12" placeholder="Rut Cliente">               
              </div>       

              <div class="form-label-group">                
               <label for="nomtxttxt"></label>
                <input type="text" id="nomtxt" value="<?php echo $nom_cliente?>" class="form-control text-uppercase input-sm" maxlength="50" placeholder="Nombre Cliente" autofocus>                 
               <label for="nomtxt"></label>
              </div>

              <div class="form-label-group">
                 <input type="text" id="teltxt" value="<?php echo $tel_cliente?>" class="form-control text-uppercase input-sm" maxlength="20" placeholder="Telefono Cliente">
               <label for="teltxt"></label>
              </div> 

              <div class="form-label-group">
                 <input type="text" id="ematxt" value="<?php echo $ema_cliente?>" class="form-control input-sm" maxlength="50" placeholder="E-mail Cliente">
               <label for="ematxt"></label>
              </div> 

               <div class="form-label-group">
                 <input type="text" id="montotxt" class="form-control input-sm" onKeyPress="return valida_numeros(event)" maxlength="10" placeholder="Monto Boleta">
               <label for="montotxt"></label>
              </div> 



               <div class="form-label-group">
                 <div id="cmbtienda"></div></label>
              </div> 



              <button class="btn btn-lg btn-success text-uppercase" onclick="volver('<?php echo $id?>')" id="btnvolver">Finalizar</button>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
	function volver(id)
	{						
		 id = id;
		  var url =  'formulario_paso2.php?id='+id;
          window.location.href=url; 
	}


function valida_numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

$(document).ready(function(){
       
     $('#cmbtienda').load('../modelo/combo_tiendas.php');
});
</script>	