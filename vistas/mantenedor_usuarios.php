<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

?>
<head>
	<title>Mantenedor Usuarios</title>
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
	   <script src="../controlador/mantenedor_usuario.js"></script>

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
            <h3>Usuarios</h3>         
          </div>
          <div class="card-body">
            
				  	     <form>
						  <div class="row">
						  	  <div class="col">
						      <span class="btn btn-outline-success" id="btnnuevoinst" data-toggle="modal" data-target="#myModalnuevousuario">Nuevo Usuario <i class="far fa-plus-square"></i>
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


<!-- Modal NUEVO USUARIO -->
 <div class="modal fade" id="myModalnuevousuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>           
      </div>
      			<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="nombretxt"></label>
            	<input type="text" id="nombretxt" class="form-control input-sm" maxlength="50" placeholder="Nombre Personal">                
              </div>

              <div class="form-label-group">
            	<label for="usuariotxt"></label>
            	<input type="text" id="usuariotxt" class="form-control input-sm" maxlength="20" placeholder="Nombre de usuario">               
              </div>

              <div class="form-label-group">
            	<label for="passtxt"></label>
            	<input type="text" id="passtxt" class="form-control input-sm" maxlength="10" placeholder="Password">               
              </div>

              <div class="form-label-group">
            	<label for="listaperfiles"></label>
            	<div id="combo_perfiles"></div>               
              </div>


      			</div>
      <div class="modal-footer">
      	   <span class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i></span>
           <span class="btn btn-success" id="btnguardar" data-dismiss="modal"><i class="far fa-save"></i></span>      </div>
    </div>
</div>
</div>

<!-- Modal EDITAR USUARIO -->
 <div class="modal fade" id="myModaleditarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>           
      </div>
      			<div class="modal-body">	
					
      		 <div class="form-label-group">
            	<label for="nombretxte">Nombre Personal</label>
            	<input type="hidden" id="idtxt" class="form-control input-sm"> 
            	<input type="text" id="nombretxte" class="form-control input-sm" maxlength="50" placeholder="Nombre Personal">                
              </div>

              <div class="form-label-group">
            	<label for="usuariotxte">Nombre de Usuario</label>
            	<input type="text" id="usuariotxte" class="form-control input-sm" maxlength="20" placeholder="Nombre de usuario">               
              </div>

              <div class="form-label-group">
            	<label for="passtxte">Password</label>
            	<input type="text" id="passtxte" class="form-control input-sm" maxlength="10" placeholder="Password">               
              </div>

              <div class="form-label-group ">
            	<label for="listaperfiles">Perfil</label>
            	<div id="combo_perfilese"></div>               
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
       
		 $('#mostrar').load('../modelo/lista_usuarios.php');
		 $('#combo_perfiles').load('../modelo/lista_perfiles.php');
	
   

   $('#btnactualiza').click(function(){
        
         nom_ = $('#nombretxte').val();
         use_ = $('#usuariotxte').val();
         pas_ = $('#passtxte').val();  
         per_ = $('#listaperfilese').val();

        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre personal del usuario');         
          return false;
        }

         if(use_==''){
          alertify.alert('Error','Debe ingresar nombre de usuario');         
          return false;
        }

         if(pas_==''){
          alertify.alert('Error','Debe ingresar Password del usuario');         
          return false;
        }
       guardaeditar();
   });

    $('#btnguardar').click(function(){     

        nom_ = $('#nombretxt').val();
        use_ = $('#usuariotxt').val();
        pas_ = $('#passtxt').val();  
        per_ = $('#listaperfiles').val();

        if(nom_==''){
          alertify.alert('Error','Debe ingresar nombre personal del usuario');
          $('#nombretxt').focus();
          return false;
        }

         if(use_==''){
          alertify.alert('Error','Debe ingresar nombre de usuario');
          $('#usuariotxt').focus();
          return false;
        }

         if(pas_==''){
          alertify.alert('Error','Debe ingresar Password del usuario');
          $('#passtxt').focus();
          return false;
        }

      guardanuevo();
   });

   


  	});





	   

</script>

