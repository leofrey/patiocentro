function valida_usuario(u,p)
{

  $('#procesar').css("display", "block");  
  $('#boton').css("display", "none");
  

  user = u;
  pass = p;

     datos = "user=" + user +
             "&pass=" + pass;

      $.ajax({
         
        type:"POST",
        url:"modelo/valida_usuario.php",
        data:datos,
        success:function(r){
          
        if (r==1){         
          var url =  'vistas/menu.php';
          window.location.href=url; 
         }
        if (r==2){         
          var url =  'vistas/formulario_paso1.php';
          window.location.href=url; 
         }
         
         if(r==0){
          $('#procesar').css("display", "none");  
          $('#boton').css("display", "block");
          alertify.error("Usuario o Password desconocido");
         }

        }



      });           
}