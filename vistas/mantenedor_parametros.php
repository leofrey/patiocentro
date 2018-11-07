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
      $disa = 'disabled';
    }

?>
<head>
	<title>Mantenedor Campañas</title>
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="../librerias/alertify.css">
      <link rel="stylesheet" type="text/css" href="../librerias/default.css">
      
      <link href="../librerias/fontawesome/css/all.css" rel="stylesheet"> 
      
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>
	  <script src="../librerias/jquery.dataTables.min.js"></script>
	  <script src="../librerias/dataTables.bootstrap4.min.js"></script>
	  <script src="../librerias/alertify.js"></script>
	  <script src="../controlador/mantenedor_parametros.js"></script>

     <style>
    .cuerpo {
       
          width:95% !important;
          margin:10px auto !important;         

      
}
   
      </style>
</head>
<body class="cuerpo">
	 <div class="row">
      <div class="col-sm-12">
        <div class="card card-signin my-3">
          <div class="card-header">
            <h3>Parametros</h3>         
          </div>
          <div class="card-body">
            
				  	     <form>
						  <div class="row">
						  	  <div class="col">
						      <span class="btn btn-outline-success" id="btnnuevoinst" data-toggle="modal" data-target="#myModalnuevoparametro">Nuevo Valor <i class="far fa-plus-square"></i>
						      </span>
						      </div>
						    
						  </div>
						</form>				  	
				     <br>
				      <div id="mostrar" align="center"></div>
				  </div>
			  </div>
		  </div>
	  </div>	
		
</body>


<!-- Modal NUEVO CAMPAÑA -->
 <div class="modal fade" id="myModalnuevoparametro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Nuevo Parametro</h4>           
      </div>
      	<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="desdetxt"></label>
            	<input type="text" id="desdetxt" <?php echo $disa?> value="<?php echo $monto_inicial?>" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="10" placeholder="Monto inicial">                
              </div>

              <div class="form-label-group">
            	<label for="hastatxt"></label>
            	<input type="text" id="hastatxt" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="10" placeholder="Monto Final">               
              </div>

              <div class="form-label-group">
            	<label for="tictxt"></label>
            	<input type="text" id="tictxt" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="3" placeholder="Tickets">               
              </div>

              
               
            </div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnguardar" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<!-- Modal EDITAR CAMPAÑA -->
 <div class="modal fade" id="myModaleditarparametro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Editar Parametros</h4>           
      </div>
      	<div class="modal-body">	
					
      		  <div class="form-label-group">
            	<label for="desdetxte"></label>
            	<input type="hidden" id="idtxt">
            	<input type="text" id="desdetxte" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="10" placeholder="Monto inicial">                
              </div>

              <div class="form-label-group">
            	<label for="hastatxte"></label>
            	<input type="text" id="hastatxte" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="10" placeholder="Monto Final">               
              </div>

              <div class="form-label-group">
            	<label for="tictxte"></label>
            	<input type="text" id="tictxte" onKeyPress="return valida_numeros(event)" class="form-control input-sm" maxlength="3" placeholder="Tickets">               
              </div>


      			</div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnactualiza" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>





<script type="text/javascript">

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
       
		 $('#mostrar').load('../modelo/lista_parametros.php');
 

   $('#btnactualiza').click(function(){
        
         id_ = $('#idtxt').val();
         des_ = $('#desdetxte').val();
         has_ = $('#hastatxte').val();
         tic_ = $('#tictxte').val();  
         var num1 = parseInt(des_);
         var num2 = parseInt(has_);

     

       if(des_==''){
          alertify.alert('Error','Debe ingresar Monto inicial del parametro');         
          return false;
        }

         if(has_==''){
          alertify.alert('Error','Debe ingresar Monto final del parametro');         
          return false;
        }

         if(tic_==''){
          alertify.alert('Error','Debe ingresar cantidad de tickets ');         
          return false;
        }

        if(num1 >= num2){   
      alertify.alert('Error', 'Monto inicial no puede ser mayor o igual al monto final');
      return false;
   }

         
       guardaeditar();
   });

    $('#btnguardar').click(function(){     

         des_ = $('#desdetxt').val();
         has_ = $('#hastatxt').val();
         tic_ = $('#tictxt').val();  
         var num1 = parseInt(des_);
         var num2 = parseInt(has_);

        
        if(des_==''){
          alertify.alert('Error','Debe ingresar Monto inicial del parametro');         
          return false;
        }

         if(has_==''){
          alertify.alert('Error','Debe ingresar Monto final del parametro');         
          return false;
        }

         if(tic_==''){
          alertify.alert('Error','Debe ingresar cantidad de tickets ');         
          return false;
        }

        if(num1 >= num2){   
         alertify.alert('Error', 'Monto inicial no puede ser menor o igual al monto final');
         return false;
        }

      guardanuevo();
   });

   


  	});





	   

</script>