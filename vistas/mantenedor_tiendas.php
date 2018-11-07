<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

?>
<head>
	<title>Mantenedor Tiendas</title>
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
	  <script src="../controlador/mantenedor_tiendas.js"></script>
    

     <style>
    .cuerpo {
      
          width:95% !important;
          margin:10px auto !important;
      
}
   
      </style>
</head>
<body class="cuerpo" >
	 <div class="row">
      <div class="col-sm-12">
        <div class="card card-signin my-3">
          <div class="card-header">
            <h3>Tiendas</h3>         
          </div>
          <div class="card-body">
            
				  	     <form>
						  <div class="row">
						  	  <div class="col">
						      <span class="btn btn-outline-success" id="btnnuevoinst" data-toggle="modal" data-target="#myModalnuevatienda">Nueva Tienda <i class="far fa-plus-square"></i>
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


<!-- Modal NUEVA TIENDA -->
 <div class="modal fade" id="myModalnuevatienda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Nueva Tienda</h4>           
      </div>
      	<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="nombretxt"></label>
            	<input type="text" id="nombretxt" class="form-control input-sm" maxlength="50" placeholder="Nombre Tienda">                
              </div>

              <div class="form-label-group">
            	<label for="diretxt"></label>
            	<input type="text" id="diretxt" class="form-control input-sm" maxlength="50" placeholder="Direccion">               
              </div>

              <div class="form-label-group">
            	<label for="encatxt"></label>
            	<input type="text" id="encatxt" class="form-control input-sm" maxlength="50" placeholder="Encargado">               
              </div>
               
            </div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnguardar" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<!-- Modal EDITAR TIENDA -->
 <div class="modal fade" id="myModaleditartienda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Editar Tienda</h4>           
      </div>
      	<div class="modal-body">	
					
      		   <div class="form-label-group">
              <label for="nombretxt">Nombre Tienda</label>
              <input type="hidden" name="idtxt" id="idtxt">
              <input type="text" id="nombretxte" class="form-control input-sm" maxlength="50" placeholder="Nombre Tienda">                
              </div>

              <div class="form-label-group">
              <label for="diretxte">Direccion</label>
              <input type="text" id="diretxte" class="form-control input-sm" maxlength="50" placeholder="Direccion">               
              </div>

              <div class="form-label-group">
              <label for="encatxte">Encargado</label>
              <input type="text" id="encatxte" class="form-control input-sm" maxlength="50" placeholder="Encargado">               
              </div>

               <div class="form-label-group">
            	<label for="cmbestadoe">Estado</label>
        <select class="form-control input-sm" id="cmbestadoe">
					    <option value="O" selected="selected">Seleccione Estado</option>
					    <option value="A">Activa</option>
					    <option value="C">Inactiva</option>					    
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
	
	$(document).ready(function(){
       
		 $('#mostrar').load('../modelo/lista_tienda.php');
		
	
   

   $('#btnactualiza').click(function(){
        
         id_ = $('#idtxt').val();
         nom_ = $('#nombretxte').val();
         dir_ = $('#diretxte').val();
         enc_ = $('#encatxte').val();           
         est_ = $('#cmbestadoe').val();


        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre de tienda');         
          return false;
        }

         if(dir_==''){
          alertify.alert('Error','Debe ingresar direccion de tienda');         
          return false;
        }

         if(enc_==''){
          alertify.alert('Error','Debe ingresar encargado de tienda ');         
          return false;
        }

        if(est_ == 'O'){
         alertify.alert('Error','Debe seleccionar estado de tienda ');         
          return false;
        }

         
       guardaeditar();
   });

    $('#btnguardar').click(function(){     

         nom_ = $('#nombretxt').val();
         dir_ = $('#diretxt').val();
         enc_ = $('#encatxt').val();  

        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre de tienda');         
          return false;
        }

         if(dir_==''){
          alertify.alert('Error','Debe ingresar direccion de tienda');         
          return false;
        }

         if(enc_==''){
          alertify.alert('Error','Debe ingresar encargado de tienda ');         
          return false;
        }

      guardanuevo();
   });

   


  	});





	   

</script>