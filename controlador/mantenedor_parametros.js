function guardanuevo()
{
 
         
         des_ = $('#desdetxt').val();
         has_ = $('#hastatxt').val();
         tic_ = $('#tictxt').val();  

     datos="des_=" +des_ + 
           "&has_=" + has_ +
           "&tic_=" + tic_;
        

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_nuevo_parametro.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Parametro fue creado con exito");
           $('#desdetxt').val('');
           $('#hastatxt').val('');
           $('#tictxt').val(''); 
           obtener_valor()     
         }  else

        {          
           $('#desdetxt').val('');
           $('#hastatxt').val('');
           $('#tictxt').val('');  
           obtener_valor()
          alertify.error(r);

        }

      }
  });

}

function editadatos(datos)
{



  d=datos.split('||');  
   
   $('#idtxt').val(d[0]);
   $('#desdetxte').val(d[1]);
   $('#hastatxte').val(d[2]);
   $('#tictxte').val(d[3]);  
  

  }

function guardaeditar()
{
 
         id_ = $('#idtxt').val();
         des_ = $('#desdetxte').val();
         has_ = $('#hastatxte').val();
         tic_ = $('#tictxte').val();  

     datos="id_=" + id_ +
           "&des_=" + des_ + 
           "&has_=" + has_ +
           "&tic_=" + tic_ ;
           

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_editar_parametro.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Parametro fue Actualizado con exito");
           obtener_valor();   
         }  else

        {          
          alertify.error("Ocurrio un error, no se realizo la actulizacion");
           obtener_valor();   

        }

      }
  });


}


function siono(id_)
   	{
   		alertify.confirm('Eliminar Parametro', 'Esta seguro de eliminar el parametro seleccionado', function(){ borrar(id_) }
                , function(){ alertify.error('No se elimino el parametro')});
   	}


function borrar(id_)
{ 
  
  n = id_;
  datos="id=" + n;        

  $.ajax({

  		type:"POST",
  		url:'../modelo/eliminar_parametro.php',
  		data:datos,
  		success:function(r)
  		{
  			if (r==1)
  			 { 
             
              mostrar_despues();
  			      alertify.success("Parametro eliminado con exito");
              obtener_valor();
  			 }
  			 else
  			 {  				
              $("#mostrar").css("display", "inline");
              alertify.error("Ocurrio un error, No se elimino el registro");
              obtener_valor();
  			}

  		}
  });

}   	

function mostrar_despues(){
   
 $('#mostrar').load('../modelo/lista_parametros.php');

}


function obtener_valor(){
  
  $.ajax({
      type:"POST",
      url:'../modelo/carga_valor_parametro.php',
      success:function(r){
        $('#desdetxt').val(r);
      }

      

  })

}