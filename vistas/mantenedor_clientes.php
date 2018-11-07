<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

?>
<head>
	<title>Mantenedor clientes</title>
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
	  <script src="../controlador/mantenedor_clientes.js"></script>

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
            <h3>Clientes</h3>         
          </div>
          <div class="card-body">
            
				  	     <form>
						  <div class="row">
						  	  <div class="col">
						      <span class="btn btn-outline-success" id="btnnuevoinst" data-toggle="modal" data-target="#myModalnuevocliente">Nuevo Cliente <i class="far fa-plus-square"></i>
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


<!-- Modal NUEVO CLIENTE -->
 <div class="modal fade" id="myModalnuevocliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>           
      </div>
      			<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="ruttxt"></label>
            	<input type="text" id="ruttxt" onkeyup="formatCliente(this)" onblur="valida_rut_cliente();" class="form-control input-sm" maxlength="12" placeholder="Rut cliente">  
               <div id="procesar" align="center"><img src="../librerias/proceso.gif"></div>             
              </div>

              <div class="form-label-group">
            	<label for="nombretxt"></label>
            	<input type="text" id="nombretxt" class="form-control input-sm" maxlength="50" placeholder="Nombre cliente">               
              </div>

              <div class="form-label-group">
            	<label for="telefonotxt"></label>
            	<input type="text" id="telefonotxt" class="form-control input-sm" maxlength="20" placeholder="Telefono">               
              </div>

              <div class="form-label-group">
            	<label for="emailtxt"></label>
            	<input type="text" id="emailtxt" class="form-control input-sm" maxlength="50" placeholder="Email">               
              </div>

              <div class="form-label-group">
            	<label for="selsexo"></label>
            	<select class="form-control input-sm" id="selsexo">
					    <option value="O" selected="selected">Seleccione Sexo</option>
					    <option value="M">Masculino</option>
					    <option value="F">Femenino</option>					    
					</select>               
              </div>


      			</div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnguardar" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<!-- Modal EDITAR CLIENTE -->
 <div class="modal fade" id="myModaleditarcliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>           
      </div>
      	<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="ruttxte">Rut Cliente</label>
            	<input type="hidden" name="idtxt" id="idtxt">
            	<input type="text" id="ruttxte" disabled="" onkeyup="formatClientee(this)" class="form-control input-sm" maxlength="12" placeholder="Rut cliente">                
              </div>

              <div class="form-label-group">
            	<label for="nombretxte">Nombre Cliente</label>
            	<input type="text" id="nombretxte" class="form-control input-sm" maxlength="50" placeholder="Nombre cliente">               
              </div>

              <div class="form-label-group">
            	<label for="telefonotxte">Telefono</label>
            	<input type="text" id="telefonotxte" class="form-control input-sm" maxlength="10" placeholder="Telefono">               
              </div>

              <div class="form-label-group">
            	<label for="emailtxte">E-Mail</label>
            	<input type="text" id="emailtxte" class="form-control input-sm" maxlength="50" placeholder="Email">               
              </div>

              <div class="form-label-group">
            	<label for="selsexoe">Sexo</label>
            	<select class="form-control input-sm" id="selsexoe">
					    <option value="O" selected="selected">Seleccione Sexo</option>
					    <option value="M">Masculino</option>
					    <option value="F">Femenino</option>					    
				</select>               
              </div>


      			</div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnactualiza" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<script type="text/javascript">

function formatCliente(ruttxt)
{ruttxt.value=ruttxt.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}

function formatClientee(ruttxte)
{ruttxte.value=ruttxte.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}
</script>



<script type="text/javascript">
	
	$(document).ready(function(){
       
     $('#procesar').css("display", "none");   
		 $('#mostrar').load('../modelo/lista_clientes.php');
		
	
   

   $('#btnactualiza').click(function(){
        
         rut_ = $('#ruttxte').val();
         nom_ = $('#nombretxte').val();
         tel_ = $('#telefonotxte').val();  
         ema_ = $('#emailtxte').val();
         sex_ = $('#selsexoe').val();

        if(rut_==''){
          alertify.alert('Error','Debe ingresar rut del cliente');         
          return false;
        }

         if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre del cliente');         
          return false;
        }

         if(tel_==''){
          alertify.alert('Error','Debe ingresar telefono del cliente');         
          return false;
        }

         if(ema_==''){
          alertify.alert('Error','Debe ingresar E-Mail del cliente');         
          return false;
        }

       guardaeditar();
   });

    $('#btnguardar').click(function(){     

         rut_ = $('#ruttxt').val();
         nom_ = $('#nombretxt').val();
         tel_ = $('#telefonotxt').val();  
         ema_ = $('#emailtxt').val();
         sex_ = $('#selsexo').val();

        if(rut_==''){
          alertify.alert('Error','Debe ingresar rut del cliente');         
          return false;
        }

         if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre del cliente');         
          return false;
        }

         if(tel_==''){
          alertify.alert('Error','Debe ingresar telefono del cliente');         
          return false;
        }

         if(ema_==''){
          alertify.alert('Error','Debe ingresar E-Mail del cliente');         
          return false;
        }

      guardanuevo();
   });

   


  	});





	   

</script>