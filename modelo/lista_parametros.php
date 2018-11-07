<?php 

   require ("../conexion/conexion.php");
   header ("Content-Type:text/html; charset=utf-8");
	
   	
 ?>


<div>
	<table width="397" height="20" class="table table-hover table-bordered" id="iddatatable">
		<thead style="background-color: #ccc;color: black; font-weight: bold;">
			
				<tr>
				  <td width="100" height="28" align="center">Inicial</td>
				  <td width="100" height="28" align="center">Final</td>
				  <td width="100" height="28" align="center">Ticket</td>		  			 
				  <td width="41"  height="28" align="center">Editar</td>
				  <td width="56"  height="28" align="center">Eliminar</td>
			   </tr>
		
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		
		       <tr>
		       	<td colspan="5"></td>
		       </tr>
		       </tfoot>
		 <tbody>
			<?php 
				 $sql = "select * from parametros_ticket order by monto_final desc";
				 $rs = $obj_conexion->query($sql);
				 $contar = 0;
				 $ena = 'disabled';
				while($row=$rs->fetch_assoc())
                 {

                 	if($contar == 0)
                 	{
                 		$ena = 'disabled';                 		
                 	}

				  	         $datos = $row["id"]."||".
							 $row["monto_inicial"]."||".
							 $row["monto_final"]."||".
							 $row["numero_ticket"];	

							 $ini = '$ '.number_format($row["monto_inicial"],0);
							 $fin = '$ '.number_format($row["monto_final"],0);
							 $tic = number_format($row["numero_ticket"],0);

							 $ini = str_replace(',','.',$ini);	
							 $fin = str_replace(',','.',$fin);
							 $tic = str_replace(',','.',$tic);
							
                     
							
							 
			 ?>


			
			<tr>
			     <td height="10" align="right"><?php echo $ini?></td>
			     <td height="10" align="right"><?php echo $fin?></td>		     			     
			     <td height="10" align="right"><?php echo $tic?></td>		
			     <?php
                      if($contar == 0){
			     ?>    
			     <td height="10" align="center"><span class="btn btn-warning btn-ms" data-toggle="modal" data-target="#myModaleditarparametro" onclick="editadatos('<?php echo $datos ?>')">			     			     	
			     <i class="far fa-edit"></i><span></td>

			    <td height="10" align="center"><span class="btn btn-danger btn-xs" data-toggle="modal" onclick="siono('<?php echo $row["id"] ?>')">   	
			     	
			     <i class="far fa-trash-alt"></i></span></td>
			     <?php
                    }

                    $contar = 1;
			     ?>
		    </tr>
		
	<?php 
	}
	 ?>	 
         </tbody>

	</table>

</div>
	

