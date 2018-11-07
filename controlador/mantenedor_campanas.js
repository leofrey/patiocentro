function guardanuevo()
{
 
         nom_ = $('#nombretxt').val();
         ini_ = $('#iniciotxt').val();
         fin_ = $('#fintxt').val();  
         det_ = $('#detalletxt').val();
         

     datos="nom_=" + nom_ + 
           "&ini_=" + ini_ +
           "&fin_=" + fin_ +
           "&det_=" + det_;
        

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_nuevo_campana.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Campaña fue creada con exito");
            $('#nombretxt').val('');
            $('#iniciotxt').val('');
            $('#fintxt').val('');  
            $('#detalletxt').val('');
                  
         }  else

        {          
            $('#nombretxt').val('');
            $('#iniciotxt').val('');
            $('#fintxt').val('');  
            $('#detalletxt').val('');
             
          alertify.error("Ocurrio un error, no se realizo la creacion de la campaña");

        }

      }
  });

}

function editadatos(datos)
{

  d=datos.split('||');  
   
   $('#idtxt').val(d[0]);
   $('#nombretxte').val(d[1]);
   $('#iniciotxte').val(d[2]);
   $('#fintxte').val(d[3]);    
   $('#detalletxte').val(d[5]); 
   $('#cmbestadoe').val(d[6]);   


  }

function guardaeditar()
{
 
         id_ = $('#idtxt').val();
         nom_ = $('#nombretxte').val();
         ini_ = $('#iniciotxte').val();
         fin_ = $('#fintxte').val();  
         det_ = $('#detalletxte').val();
         est_ = $('#cmbestadoe').val();

     datos="id_=" + id_ +
           "&nom_=" + nom_ + 
           "&ini_=" + ini_ +
           "&fin_=" + fin_ +
           "&est_=" + est_ +
           "&det_=" + det_;   

  $.ajax({


      type:"POST",
      url:"../modelo/guarda_editar_campana.php",
      data:datos,
      success:function(r)
      {
        if (r==1)
         {
          mostrar_despues();
          alertify.success("Campaña fue Actualizada con exito");
         }  else

        {          
          alertify.error("Ocurrio un error, no se realizo la actulizacion");

        }

      }
  });


}


function siono(id_)
   	{
   		alertify.confirm('Eliminar Campaña', 'Esta seguro de eliminar la campaña seleccionada', function(){ borrar(id_) }
                , function(){ alertify.error('No se elimino la campaña')});
   	}


function borrar(id_)
{ 
  
  n = id_;
  datos="id=" + n;        

  $.ajax({

  		type:"POST",
  		url:'../modelo/eliminar_campanas.php',
  		data:datos,
  		success:function(r)
  		{
  			if (r==1)
  			 { 
             
              mostrar_despues();
  			      alertify.success("Campaña eliminada con exito");
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
   
 $('#mostrar').load('../modelo/lista_campanas.php');

}

function validarFormatoFecha(campo) {
      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if ((campo.match(RegExPattern)) && (campo!='')) {
            return true;
      } else {
            return false;
      }
}

function existeFecha(fecha){
      var fechaf = fecha.split("/");
      var day = fechaf[0];
      var month = fechaf[1];
      var year = fechaf[2];
      var date = new Date(year,month,'0');
      if((day-0)>(date.getDate()-0)){
            return false;
      }
      return true;
}