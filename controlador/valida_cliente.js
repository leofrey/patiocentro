function valida_cliente(rut,id){

   

	   rut = rut;
     id = id;

     if(rut == ''){
         var url = 'formulario_paso3.php?id='+id+'&rut='+rut;
         window.location.href=url; 
         return false;
     }

     if(rut.length < 5){
        $('#procesar').css("display", "none"); 
        $('#ruttxt').removeAttr('disabled'); 
        alertify.error('ERROR:::: RUT INGRESADO NO ES VALIDO');
        return false;
     } 


     datos = "rut=" + rut

      $.ajax({
         
        type:"POST",
        url:"../modelo/clientes.php",
        data:datos,
        success:function(r){
          
        if (r==1){           
          var url = 'formulario_paso3.php?id='+id+'&rut='+rut;
          window.location.href=url; 
         }else       
         {
          $('#procesar').css("display", "none"); 
          $('#ruttxt').removeAttr('disabled'); 
          alertify.error(r);
           
         }

        }



      });           
}