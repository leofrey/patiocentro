<!DOCTYPE html>
<html>
<?php
require ("../conexion/conexion.php");

$id =  $_GET["id"];
$nom_campana = '';

$sql = "select * from campanas where id = $id";
$rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {
                 	$nom_campana = $row["nombre"];
                 }	

         if($nom_campana==''){
          header('location:formulario_paso1.php');
          exit;
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
      
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>	  
	  <script src="../librerias/alertify.js"></script>
	   <script src="../controlador/valida_cliente.js"></script>
</head>
<body>
 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-header">
            <button type="button" class="close" onclick="volver();" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>  
            <img src="../librerias/patio.png" align="center">         
            <h5 class="card-title text-center">INGRESO PARTICIPANTES</h5>             
          </div>  
          <div class="card-body">
           
            <div class="form-label-group">
            	<label for="campanatxt">Campaña Seleccionada</label>
            	<input type="hidden" name="id_campana" id="id_campana" value="<?php echo $id?>">
                <input type="text" id="campanatxt" value="<?php echo $nom_campana?>" class="form-control form-control-lg text-uppercase" disabled>                
              </div>

              <div class="form-label-group">
               <label for="ruttxt"></label>
                <input type="text" id="ruttxt" onkeyup="formatCliente(this)" class="form-control form-control-lg text-uppercase" maxlength="12" placeholder="Rut Cliente" autofocus>
               <label for="ruttxt"></label>
              </div>  

              <div id="procesar" align="center"><img src="../librerias/proceso.gif"></div>
                    

              
           
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
</body>
</html>

<script type="text/javascript">
  
  function formatCliente(ruttxt)
{ruttxt.value=ruttxt.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}

	function volver()
	{						
		  var url =  'formulario_paso1.php';
          window.location.href=url; 
	}

    $(document).ready(function(e){

          $('#procesar').css("display", "none");   

    	$("#ruttxt").keypress(function(e){

    		if(e.which == 13){
          $('#procesar').css("display", "block");   
          $('#ruttxt').attr('disabled', 'disabled');
    			rut = $("#ruttxt").val();
    			id = $('#id_campana').val();
    			valida_cliente(rut,id);
    		}
    	})

    });

</script>