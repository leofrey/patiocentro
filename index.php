<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
  <link rel="shortcut icon" href="librerias/patio.png" />
	 <link rel="stylesheet" type="text/css" href="librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="librerias/bootstrap.css">
	  
      <link rel="stylesheet" type="text/css" href="librerias/alertify.css">
     <link rel="stylesheet" type="text/css" href="librerias/default.css">
    <link rel="stylesheet" type="text/css" href="index.css"> 
    <link href="librerias/fontawesome/css/all.css" rel="stylesheet"> 
    
      
	 <script src="librerias/jquery.min.js"></script>
	  <script src="librerias/popper.min.js" "></script>
	  <script src="librerias/bootstrap.min.js"></script>	 
	  <script src="librerias/alertify.js"></script>
	  <script src="controlador/valida_usuario.js"></script>
	
	  
</head>
<body>
   <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-header" align="left">
              <img src="librerias/patio.png" align="center">
              <h5 class="card-title text-center">LOGIN</h5>
          </div>
          <div class="card-body">
          
            
              <div class="form-label-group">
                <input type="text" id="inputuser" autocomplete="off" class="form-control input-sm" placeholder="Usuario" autofocus>
                <label for="inputuser"></label>
              </div>

              <div class="form-label-group">
                <input type="password"  id="inputPass" autocomplete="off" class="form-control input-sm" placeholder="Password">
                <label for="inputPass"></label>
              </div>

           </div>
             <div class="card-footer" align="right">
              <div id="boton">
              <button class="btn btn-lg btn-success btn-block text-uppercase" id="btnlogin"><i class="fas fa-key"></i></button>
              </div>
               <div id="procesar" align="center"><img src="librerias/proceso.gif"></div>
             </div> 
           
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

 $('#procesar').css("display", "none");  
  

    
      $('#btnlogin').click(function(){

            user = $('#inputuser').val();
            pass = $('#inputPass').val();
           
            if(user == ''){
            	alertify.error("Debe ingresar nombre de usuario");         
              $('#inputuser').focus();   	
            	return false;
            }

            if(pass == ''){
            	alertify.error("Debe ingresar Password");
              $('#inputPass').focus(); 
            	return false;
            }

             $('#procesar').css("display", "block");
             $('#boton').css("display", "none");

              setTimeout (valida_usuario(user,pass), 10000);  

         });


});
</script>	