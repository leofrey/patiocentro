<?php 

   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");
	

	
 ?>


<div>
	<table width="950" height="58" class="table table-hover table-bordered" id="iddatatable">
		<thead style="background-color: #ccc;color: black; font-weight: bold;">
			
				<tr>
				  <td width="259" align="center">Campaña</td>
				  <td width="125" align="center">Inicio</td>
				  <td width="125" align="center">Termino</td>	
				  <td width="125" align="center">Creada</td>	
				  <td width="125" align="center">Estado</td>				  				 
				  <td width="41" align="center">Editar</td>
				  <td width="56" align="center">Eliminar</td>
			   </tr>
		
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		
		       <tr>
		       	<td colspan="7"></td>
		       </tr>
		       </tfoot>
		 <tbody>
			<?php 
				 $sql = "select id, nombre, date_format(fecha_inicio,'%d-%m-%Y') as fecha_inicio, date_format(fecha_final,'%d-%m-%Y') as fecha_final, date_format(fecha_creacion,'%d-%m-%Y') as fecha_creacion, estado_vigencia, detalles from campanas order by id desc";
				 $rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {

					$datos = $row["id"]."||".
							 $row["nombre"]."||".
							 $row["fecha_inicio"]."||".
							 $row["fecha_final"]."||".		
							 $row["fecha_creacion"]."||".			
							 $row["detalles"]."||".		
							 $row["estado_vigencia"];

							 $est_ = $row["estado_vigencia"];

							 	if($est_ == 'A'){
							 		$des_est = 'VIGENTE';
							 	}

							 	if($est_ == 'C'){
							 		$des_est = 'CERRADA';
							 	}

							 	
							 
			 ?>


			
			<tr>
			     <td align="left"><?php echo $row["nombre"]?></td>
			     <td align="left"><?php echo $row["fecha_inicio"]?></td>	     			     
			     <td align="left"><?php echo $row["fecha_final"]?></td>
			     <td align="left"><?php echo $row["fecha_creacion"]?></td>
			     <td align="left"><?php echo $des_est?></td>
			     <td align="center"><span class="btn btn-warning btn-ms"  data-toggle="modal" data-target="#myModaleditarcampana" onclick="editadatos('<?php echo $datos ?>')">			     			     	
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
