<?php 

   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");
	
   $des_sexo = '';
	
 ?>


<div>
	<table width="950" height="58" class="table table-hover table-bordered" id="iddatatable">
		<thead style="background-color: #ccc;color: black; font-weight: bold;">
			
				<tr>
				  <td width="113" height="28" align="center">Rut</td>
				  <td width="259" height="28" align="center">Nombre</td>
				  <td width="125" height="28" align="center">Telefono</td>		
				  <td width="171" height="28" align="center">Email</td>
				  <td width="123" height="28" align="center">sexo</td>				 
				  <td width="41"  height="28" align="center">Editar</td>
				  <td width="56"  height="28" align="center">Eliminar</td>
			   </tr>
		
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		
		       <tr>
		       	<td colspan="7"></td>
		       </tr>
		       </tfoot>
		 <tbody>
			<?php 
				 $sql = "select * from clientes order by nombre";
				 $rs = $obj_conexion->query($sql);
				while($row=$rs->fetch_assoc())
                 {

					$datos = $row["id"]."||".
							 $row["rut"]."||".
							 $row["nombre"]."||".
							 $row["telefono"]."||".		
							 $row["email"]."||".					
							 $row["sexo"];

							 $sexo = $row["sexo"];

							 	if($sexo == 'M'){
							 		$des_sexo = 'MASCULINO';
							 	}

							 	if($sexo == 'F'){
							 		$des_sexo = 'FEMENINO';
							 	}

							 	if($sexo == 'O'){
							 		$des_sexo = 'INDEFINIDO';
							 	}
							 
			 ?>


			
			<tr>
			     <td height="28" align="left"><?php echo $row["rut"]?></td>
			     <td height="28" align="left"><?php echo $row["nombre"]?></td>			     			     
			     <td height="28" align="left"><?php echo $row["telefono"]?></td>
			     <td height="28" align="left"><?php echo $row["email"]?></td>
			     <td height="28" align="left"><?php echo $des_sexo?></td>
			     <td height="28" align="center"><span class="btn btn-warning btn-ms"  data-toggle="modal" data-target="#myModaleditarcliente" onclick="editadatos('<?php echo $datos ?>')">			     			     	
			     <i class="far fa-edit"></i><span></td>

			    <td height="28" align="center"><span class="btn btn-danger btn-xs" data-toggle="modal" onclick="siono('<?php echo $row["id"] ?>')">   	
			     	
			     <i class="far fa-trash-alt"></i></span></td>
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