function guardanuevo()
{
 
        
         nom_ = $('#nombretxt').val();
         dir_ = $('#diretxt').val();
         enc_ = $('#encatxt').val();           
        

     datos="nom_=" + nom_ + 
        "&dir_=" + dir_ +
        "&enc_=" + enc_;
         

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_nuevo_tienda.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Tienda fue creada con exito");
           $('#nombretxt').val('');
           $('#diretxt').val('');
           $('#encatxt').val('');  
                  
         }  else

        {          
           $('#nombretxt').val('');
           $('#diretxt').val('');
           $('#encatxt').val(''); 
          alertify.error(r);

        }

      }
  });

}

function editadatos(datos)
{



  d=datos.split('||');  

   
   
   $('#idtxt').val(d[0]);  
   $('#nombretxte').val(d[1]);
   $('#diretxte').val(d[2]);  
   $('#encatxte').val(d[3]);
   $('#cmbestadoe').val(d[4]);     

  
  

  }

function guardaeditar()
{
 
         id_ = $('#idtxt').val();
         nom_ = $('#nombretxte').val();
         dir_ = $('#diretxte').val();
         enc_ = $('#encatxte').val();  
         est_ = $('#cmbestadoe').val();
         

     datos="id_=" + id_ +
           "&nom_=" + nom_ + 
           "&dir_=" + dir_ +
           "&enc_=" + enc_ +
           "&est_=" + est_;
           

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_editar_tienda.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Tienda fue Actualizada con exito");
         }  else

        {          
          alertify.error("Ocurrio un error, no se realizo la actulizacion");

        }

      }
  });


}


function siono(id_)
   	{
   		alertify.confirm('Eliminar Tienda', 'Esta seguro de eliminar la tienda seleccionada', function(){ borrar(id_) }
                , function(){ alertify.error('No se elimino la tienda')});
   	}


function borrar(id_)
{ 
  
  n = id_;
  datos="id=" + n;        

  $.ajax({

  		type:"POST",
  		url:'../modelo/eliminar_tienda.php',
  		data:datos,
  		success:function(r)
  		{
  			if (r==1)
  			 { 
             
              mostrar_despues();
  			      alertify.success("Tienda eliminada con exito");
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
   
 $('#mostrar').load('../modelo/lista_tienda.php');

}