<?php 

   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");
	
   $des_est = '';
	
 ?>


<div>
	<table width="950" height="58" class="table table-hover table-bordered" id="iddatatable">
		<thead style="background-color: #ccc;color: black; font-weight: bold;">
			
				<tr>
				  <td width="259" align="center">Nombre</td>
				  <td width="125" align="center">Direccion</td>
				  <td width="125" align="center">Encargado</td>	
				  <td width="171" align="center">Estado</td>				  				 
				  <td width="41" align="center">Editar</td>
				  <td width="56" align="center">Eliminar</td>
			   </tr>
		
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		
		       <tr>
		       	<td colspan="6"></td>
		       </tr>
		       </tfoot>
		 <tbody>
			<?php 
				 $sql = "select * from tiendas order by nombre";
				 $rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {

					$datos = $row["id"]."||".
							 $row["nombre"]."||".
							 $row["direccion"]."||".
							 $row["encargado"]."||".		
							 $row["estado"];		
							

							 $est_ = $row["estado"];

							 	if($est_ == 'A'){
							 		$des_est = 'ACTIVA';
							 	}

							 	if($est_ == 'C'){
							 		$des_est = 'INACTIVA';
							 	}

							 	
							 
			 ?>


			
			<tr>
			     <td align="left"><?php echo $row["nombre"]?></td>
			     <td align="left"><?php echo $row["direccion"]?></td>	     			     
			     <td align="left"><?php echo $row["encargado"]?></td>			     
			     <td align="left"><?php echo $des_est?></td>
			     <td align="center"><span class="btn btn-warning btn-ms"  data-toggle="modal" data-target="#myModaleditartienda" onclick="editadatos('<?php echo $datos ?>')">			     			     	
			    <i class="far fa-edit"></i> <span></td>

			    <td align="center"><span class="btn btn-danger btn-xs" data-toggle="modal" onclick="siono('<?php echo $row["id"] ?>')"> <i class="far fa-trash-alt"></i> 	
			     	
			     </span></td>
		    </tr>
		
	<?php 
	}
	 ?>	 
         </tbody>

	</table>

</div>
	

<script type="text/javascript">
			$(document).ready(function() {

				$.extend( true, $.fn.dataTable.defaults, {
				    "searching": true,
				    "ordering": false
				} );

				var idioma_espanol = {
								"sProcessing":     "Procesando...",
								"sLengthMenu":     "Mostrar _MENU_ registros",
								"sZeroRecords":    "No se encontraron registros",
								"sEmptyTable":     "No existen registros",
								"sInfo":           "_START_ al _END_  de _TOTAL_ registros",
								"sInfoEmpty":      "0 registros",
								"sInfoFiltered":   "( de _MAX_ registros)",
								"sInfoPostFix":    "",
								"sSearch":         "Buscar:",
								"sUrl":            "",
								"sInfoThousands":  ",",
								"sLoadingRecords": "Cargando...",
								"oPaginate": {
									"sFirst":    "Primero",
									"sLast":     "Último",
									"sNext":     "Siguiente",
									"sPrevious": "Anterior"
								},
								"oAria": {
									"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
									"sSortDescending": ": Activar para ordenar la columna de manera descendente"
								}
							}

			    $('#iddatatable').DataTable(
			    		{
            "language":idioma_espanol
        }
			    	);
			} );
</script>
