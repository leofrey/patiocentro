

function guardanuevo()
{
 
  nom_ = $('#nombretxt').val();
  use_ = $('#usuariotxt').val();
  pas_ = $('#passtxt').val();  
  per_ = $('#listaperfiles').val();

     datos="nom_=" + nom_ + 
        "&use_=" + use_ +
        "&pas_=" + pas_ +
        "&per_=" + per_;   

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_nuevo_usuario.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Usuario fue creado con exito");
           $('#nombretxt').val('');
           $('#usuariotxt').val('');
           $('#passtxt').val('');  
           $('#listaperfiles').val('');           
         }  else

        {          
           $('#nombretxt').val('');
           $('#usuariotxt').val('');
           $('#passtxt').val('');  
           $('#listaperfiles').val(''); 
          alertify.error("Ocurrio un error, no se realizo la creacion de usuario");

        }

      }
  });

}

function editadatos(datos)
{



  d=datos.split('||');  
   
  $('#idtxt').val(d[0]);
  $('#nombretxte').val(d[3]);
  $('#usuariotxte').val(d[1]);
  $('#passtxte').val(d[2]); 
  id = d[4];

 datos = "id="+id;

     $.ajax({

      type:"POST",
      url:'../modelo/lista_perfiles_edita.php',
      data:datos,
      success:function(res)
      {
       // $('#txtnemo').val(buscanemo); 
        $('#combo_perfilese').html(res);
      }

     });

  }

function guardaeditar()
{
 
  id_ = $('#idtxt').val();
  nom_ = $('#nombretxte').val();
  use_ = $('#usuariotxte').val();
  pas_ = $('#passtxte').val();  
  per_ = $('#listaperfilese').val();

     datos="id_=" + id_ + 
        "&nom_=" + nom_ + 
        "&use_=" + use_ +
        "&pas_=" + pas_ +
        "&per_=" + per_;   

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_editar_usuario.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Usuario fue Actualizada con exito");
         }  else

        {          
          alertify.error("Ocurrio un error, no se realizo la actulizacion");

        }

      }
  });


}


function siono(id_)
   	{
   		alertify.confirm('Eliminar Usuario', 'Esta seguro de eliminar el usuario seleccionado', function(){ borrar(id_) }
                , function(){ alertify.error('No se elimino el usuario')});
   	}


function borrar(id_)
{ 
  
  n = id_;
  datos="id=" + n;        

  $.ajax({

  		type:"POST",
  		url:'../modelo/eliminar_usuarios.php',
  		data:datos,
  		success:function(r)
  		{
  			if (r==1)
  			 { 
             
              mostrar_despues();
  			      alertify.success("Usuario eliminado con exito");
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
   
 $('#mostrar').load('../modelo/lista_usuarios.php');

}