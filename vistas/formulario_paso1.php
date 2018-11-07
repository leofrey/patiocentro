<?php
require ("../conexion/conexion.php");
header ("Content-Type:text/html; charset=utf-8");

$hoy = date('Y-m-d');


?>

<head>
	
	<title>CONCURSOS</title>
	<link rel="shortcut icon" href="../librerias/patio.png" />
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="../librerias/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="../librerias/alertify.css">
      <link rel="stylesheet" type="text/css" href="../librerias/default.css">
      <link rel="stylesheet" type="text/css" href="../index.css">
       <link href="../librerias/fontawesome/css/all.css" rel="stylesheet"> 
      
	  <script src="../librerias/jquery.min.js"></script>
	  <script src="../librerias/popper.min.js" "></script>
	  <script src="../librerias/bootstrap.min.js"></script>
	  <script src="../librerias/jquery.dataTables.min.js"></script>
	  <script src="../librerias/dataTables.bootstrap4.min.js"></script>
	  <script src="../librerias/alertify.js"></script>
</head>

<div class="container">
    <div class="row">
      <div class="mx-auto">
        <div class="card card-signin my-5">
        	<div class="card-header">
        		<img src="../librerias/patio.png" align="center">
        		<h5 class="card-title text-center">CAMPAÑAS DISPONIBLES</h5>
        	</div>	
          <div class="card-body">            
	             <table class="table table-striped mx-auto" id="iddatatable">
						<thead style="background-color: #ccc;color: black; font-weight: bold;">				
							<tr>
							  <td align="center">Campaña</td>
							  <td align="center">Fecha Creacion</td>
							  <td align="center">Fecha Termino</td>
							  <td align="center">Seleccionar</td>				 
						    </tr>
						</thead>

					     <tfoot style="background-color: #ccc;color: white; font-weight: bold;">			
					       <tr>
					       	<td colspan="4"></td>
					       </tr>
					     </tfoot>
		         <tbody>
		 	<?php
		 	     
                 $sql = "select id, nombre, date_format(fecha_creacion,'%d/%m/%Y') as fecha_creacion, date_format(fecha_final,'%d/%m/%Y') as fecha_final from campanas where estado_vigencia = 'A' and fecha_final >= CURDATE()";
                 $rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {

             ?>

		             <tr>
		                 <td align="left"><?php echo $row["nombre"]?></td>
		                 <td align="center"><?php echo $row["fecha_creacion"]?></td>
		                  <td align="center"><?php echo $row["fecha_final"]?></td>
		 <td align="center"><span class="btn btn-warning btn-ms" onclick="pasaformulario('<?php echo $row["id"]?>')"><i class="far fa-check-circle"></i></span>	
					 </tr>
             <?php       

                 } 	
		 	?>
		 	   </tbody>		 	   
	        </table>
	         </div>
	        <div class="card-footer" align="right">
	         <button class="btn btn-danger" onclick="volver()" id="btnvolver">Cerrar aplicacion</button>
	     </div>
        
        </div>
      </div>
    </div>
  </div>

 
<script type="text/javascript">
	function pasaformulario(id){
			id = id;			
		  var url =  'formulario_paso2.php?id='+id;
          window.location.href=url; 
	}

	function volver()
	{						
		  var url =  '../index.php';
          window.location.href=url; 
	}
</script>