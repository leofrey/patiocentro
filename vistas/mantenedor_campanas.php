<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

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
	  <script src="../controlador/mantenedor_campanas.js"></script>

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
            <h3>Campañas</h3>         
          </div>
          <div class="card-body">
            
				  	     <form>
						  <div class="row">
						  	  <div class="col">
						      <span class="btn btn-outline-success" id="btnnuevoinst" data-toggle="modal" data-target="#myModalnuevocampana">Nueva Campaña <i class="far fa-plus-square"></i>
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
 <div class="modal fade" id="myModalnuevocampana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Nueva Campaña</h4>           
      </div>
      	<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="nombretxt"></label>
            	<input type="text" id="nombretxt" class="form-control input-sm" maxlength="50" placeholder="Nombre Campaña">                
              </div>

              <div class="form-label-group">
            	<label for="iniciotxt"></label>
            	<input type="date" id="iniciotxt" class="form-control input-sm" maxlength="10" placeholder="Fecha Inicio">               
              </div>

              <div class="form-label-group">
            	<label for="fintxt"></label>
            	<input type="date" id="fintxt" class="form-control input-sm" maxlength="10" placeholder="Fecha Termino">               
              </div>

               <div class="form-label-group">
            	<label for="detalletxt">Detalles</label>
            	<textarea id="detalletxt" class="form-control input-sm" maxlength="500" placeholder="Detalles campaña"> </textarea>             
              </div>

               
            </div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnguardar" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<!-- Modal EDITAR CAMPAÑA -->
 <div class="modal fade" id="myModaleditarcampana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Editar Campaña</h4>           
      </div>
      	<div class="modal-body">	
					
      		  <div class="form-label-group">
            	<label for="nombretxte">Nombre campaña</label>
            	<input type="hidden" name="idtxt" id="idtxt">
            	<input type="text" id="nombretxte" class="form-control input-sm" maxlength="50" placeholder="Nombre Campaña">                
              </div>

              <div class="form-label-group">
            	<label for="iniciotxte">Fecha Inicio</label>
            	<input type="text" id="iniciotxte" class="form-control input-sm" maxlength="10" placeholder="Fecha Inicio">               
              </div>

              <div class="form-label-group">
            	<label for="fintxte">Fecha Fin</label>
            	<input type="text" id="fintxte" class="form-control input-sm" maxlength="10" placeholder="Fecha Termino">               
              </div>

              <div class="form-label-group">
            	<label for="detalletxte">Detalles</label>
            	<textarea id="detalletxte" class="form-control input-sm" maxlength="500" placeholder="Detalles campaña"> </textarea>             
              </div>

               <div class="form-label-group">
            	<label for="cmbestadoe">Estado</label>
            	<select class="form-control input-sm" id="cmbestadoe">
					    <option value="O" selected="selected">Seleccione Estado</option>
					    <option value="A">Vigente</option>
					    <option value="C">Cerrada</option>					    
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
       
		 $('#mostrar').load('../modelo/lista_campanas.php');
		
	
   

   $('#btnactualiza').click(function(){
        
         id_ = $('#idtxt').val();
         nom_ = $('#nombretxte').val();
         ini_ = $('#iniciotxte').val();
         fin_ = $('#fintxte').val();  
         det_ = $('#detalletxte').val();
         est_ = $('#cmbestadoe').val();


        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre de campaña');         
          return false;
        }

         if(ini_==''){
          alertify.alert('Error','Debe ingresar fecha de inicio de campaña');         
          return false;
        }

         if(fin_==''){
          alertify.alert('Error','Debe ingresar fecha de termino de campaña ');         
          return false;
        }

        if(est_ == 'O'){
         alertify.alert('Error','Debe seleccionar estado de campaña ');         
          return false;
        }      

         
       guardaeditar();
   });

    $('#btnguardar').click(function(){     

         nom_ = $('#nombretxt').val();
         ini_ = $('#iniciotxt').val();
         fin_ = $('#fintxt').val();  
         det_ = $('#detalletxt').val();

        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre de campaña');         
          return false;
        }

         if(ini_==''){
          alertify.alert('Error','Debe ingresar fecha de inicio de campaña');         
          return false;
        }

         if(fin_==''){
          alertify.alert('Error','Debe ingresar fecha de termino de campaña ');         
          return false;
        }

        if( (new Date(ini_).getTime() >= new Date(fin_).getTime()))
        {
         alertify.alert('Error','La fecha inicial no puede ser mayor o igual a la fecha final ');         
         return false;
        }

      guardanuevo();
   });

   


  	});





	   

</script>