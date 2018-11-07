function guardanuevo()
{
 
         rut_ = $('#ruttxt').val();
         nom_ = $('#nombretxt').val();
         tel_ = $('#telefonotxt').val();  
         ema_ = $('#emailtxt').val();
         sex_ = $('#selsexo').val();

     datos="rut_=" + rut_ + 
        "&nom_=" + nom_ +
        "&tel_=" + tel_ +
        "&ema_=" + ema_ +
        "&sex_=" + sex_;   

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_nuevo_cliente.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("cliente fue creado con exito");
           $('#ruttxt').val('');
           $('#nombretxt').val('');
           $('#telefonotxt').val('');  
           $('#emailtxt').val('');
           $('#selsexo').val('O');         
         }  else

        {          
           $('#ruttxt').val('');
           $('#nombretxt').val('');
           $('#telefonotxt').val('');  
           $('#emailtxt').val('');
           $('#selsexo').val('O');  
          alertify.error(r);

        }

      }
  });

}

function editadatos(datos)
{



  d=datos.split('||');  
   
   $('#idtxt').val(d[0]);
   $('#ruttxte').val(d[1]);
   $('#nombretxte').val(d[2]);
   $('#telefonotxte').val(d[3]);  
   $('#emailtxte').val(d[4]);
   $('#selsexoe').val(d[5]);     

  
  

  }

function guardaeditar()
{
 
         id_ = $('#idtxt').val();
         rut_ = $('#ruttxte').val();
         nom_ = $('#nombretxte').val();
         tel_ = $('#telefonotxte').val();  
         ema_ = $('#emailtxte').val();
         sex_ = $('#selsexoe').val();

     datos="id_=" + id_ +
           "&rut_=" + rut_ + 
           "&nom_=" + nom_ +
           "&tel_=" + tel_ +
           "&ema_=" + ema_ +
          "&sex_=" + sex_;   

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_editar_cliente.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Cliente fue Actualizado con exito");
         }  else

        {          
          alertify.error("Ocurrio un error, no se realizo la actulizacion");

        }

      }
  });


}


function siono(id_)
   	{
   		alertify.confirm('Eliminar Cliente', 'Esta seguro de eliminar el cliente seleccionado', function(){ borrar(id_) }
                , function(){ alertify.error('No se elimino el cliente')});
   	}


function borrar(id_)
{ 
  
  n = id_;
  datos="id=" + n;        

  $.ajax({

  		type:"POST",
  		url:'../modelo/eliminar_clientes.php',
  		data:datos,
  		success:function(r)
  		{
  			if (r==1)
  			 { 
             
              mostrar_despues();
  			      alertify.success("Cliente eliminado con exito");
  			 }
  			 else
  			 {  				
              $("#mostrar").css("display", "inline");
              alertify.error("Ocurrio un error, No se elimino el registro");
  			}

  		}
  });

}   	

function mostrar_despues(){
   
 $('#mostrar').load('../modelo/lista_clientes.php');

}

function valida_rut_cliente(){
rut_ = $('#ruttxt').val();

if(rut_==''){
  return false;
}

$('#procesar').css("display", "block");   
$('#ruttxt').attr('disabled', 'disabled');
 

 datos="rut=" + rut_;

 $.ajax({


      type:"POST",
      url:"../modelo/clientes.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {

              lee_api(rut_);
               
         }  else

        {  
           $('#procesar').css("display", "none"); 
           $('#ruttxt').removeAttr('disabled');        
           $('#ruttxt').val('');
           $('#nombretxt').val('');
           $('#selsexo').val('O');
          alertify.error(r);

        }

      }
   });
}

function lee_api(rut_){



datos="rut=" + rut_;

 $.ajax({


         type:"POST",
         url:"../modelo/lee_api.php",
         data:datos,     
         success:function(r){
           $('#procesar').css("display", "none");           
           $('#ruttxt').removeAttr('disabled'); 
           d=r.split('||');  
           $('#nombretxt').val(d[0]);
           $('#selsexo').val(d[1]); 
         }



  });

}
