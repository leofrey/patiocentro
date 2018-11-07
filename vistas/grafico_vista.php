<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.css">	  
      <link rel="stylesheet" type="text/css" href="../librerias/default.css">
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>	 
	   <link href="../librerias/fontawesome/css/all.css" rel="stylesheet"> 
	   

     <style>
    .cuerpo {
     
          width:95% !important;
          margin:10px auto !important;
      
}
   
      </style>

    <script>
    	
    	function valida () 
			{
			div = document.getElementById('marco');
      div.style.display = '';	
			form1.action="../modelo/grafico_barra.php";
			form1.target="marco";
			form1.submit();   

      form1.action="../modelo/datos_para_grafico.php";
      form1.target="marco2";
      form1.submit();

         
			}	



    </script>
</head>
<body class="cuerpo">
	 <div class="row">
      <div class="col-sm-8">
        <div class="card card-signin my-3">
          <div class="card-header">
            <h3>Dashboard</h3>         
          </div>
          <div class="card-body">
	  <div class="form-label-group">
      <form name="form1" method="post" action="#">
            	<div id="combo_campana"></div>
			</form>		  
			<br>
			<br>					  	 
				  </div>
			  </div>
		  </div>
	  </div>
	  </div>
	  <iframe name="marco2"  align="center" id="marco2" width="80%" height="150" scrolling="no" frameborder="0" src="#"></iframe>   
 <iframe name="marco"  align="center" id="marco" width="80%" height="400" scrolling="no" frameborder="0" src="#"></iframe>    

 
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

       // $("#marco").hide();
      //  $('#mostrar').load('../modelo/grafico_barra.php');
        $('#combo_campana').load('../modelo/combo_campana.php');
        
        valida();


        

		});
</script>
