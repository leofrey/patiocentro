function volver(id)
	{						
		 id = id;
		  var url =  'formulario_paso2.php?id='+id;
          window.location.href=url; 
	}


function valida_numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function entra(){
  monto = $('#monboltxt').val();
 
}

function saca_ticket(){

	 monto = $('#monboltxt').val();
   
   if(monto == ''){
    $('#btncancela').css("display", "inline");
    $('#btnfinal').css("display", "none");  
    $('#btnvalida').attr('disabled', 'disabled');
    $('#tictxt').val('');
    return false;
   }

  
	 datos = 'monto='+ monto;

	 $.ajax({
         
        type:"POST",
        url:"../modelo/obtiene_ticket.php",
        data:datos,
        success:function(r){

        if(r==0){           	
         	 $('#btnvalida').attr('disabled', 'disabled');
         }else{           
         	$('#btnvalida').removeAttr('disabled')         	
         }	

           $('#tictxt').val(r);
        }
    });	
}

function valida(){
    
    rut_ = $('#ruttxt').val();
    nom_ = $('#nomtxt').val();
    tel_ = $('#teltxt').val();
    ema_ = $('#ematxt').val();
    id_cam_ = $('#idcampana').val();
    mon_bol_ = $('#monboltxt').val();
    tienda_ = $('#cmbtienda').val();
    num_ticket_ = $('#tictxt').val();
    sexo_ = $('#sexotxt').val();

    datos = "rut_=" + rut_ + 
            "&nom_=" + nom_ +
            "&tel_=" + tel_ +
            "&ema_=" + ema_ +
            "&id_cam_=" + id_cam_ +
            "&mon_bol_=" + mon_bol_ + 
            "&tienda_=" + tienda_ +
            "&num_ticket_=" + num_ticket_ +
            "&sexo_=" + sexo_;

     $.ajax({
            type:"POST",
            url:"../modelo/guarda_promotora.php",
            data:datos,
            success:function(r){
              if(r==1){
                imprime_ticket();
                $('#btncancela').css("display", "none");
                $('#btnfinal').css("display", "inline");  
                $('#btnvalida').attr('disabled', 'disabled');
                $('#btnfinal').removeAttr('disabled');   
                $('#btnimprimir').removeAttr('disabled');  
                $('#monboltxt').attr('disabled', 'disabled');
                $('#cmbtienda').attr('disabled', 'disabled');
                

              }else{
                alertify.error("Ocurrio un error, no se registro el participante");
                 $('#btncancela').css("display", "inline");
                 $('#btnfinal').css("display", "none"); 
                 $('#btnvalida').removeAttr('disabled');    
                 $('#btnimprimir').attr('disabled', 'disabled');
                 $('#btnfinal').attr('disabled', 'disabled');
                 $('#monboltxt').removeAttr('disabled'); 
                 $('#cmbtienda').removeAttr('disabled'); 


              }



            }
      



     });       


}

 function imprime_ticket(){

 stilo = '<style type="text/css">'+
        ' .textovuelta{'+
         '  writing-mode: vertical-lr;'+
         '  transform: rotate(180deg);'+
         '}'+        
       '</style>';
   
    rut_ = $('#ruttxt').val();
    nom_ = $('#nomtxt').val();
    tel_ = $('#teltxt').val();
    ema_ = $('#ematxt').val();

        if(nom_ == ''){
          alertify.alert('Error','Debe ingresar nombre cliente');         
          return false;        
        }

        if(tel_ == ''){
          alertify.alert('Error','Debe ingresar telefono cliente');         
          return false;        
        }

        if(ema_ == ''){
          alertify.alert('Error','Debe ingresar email cliente');         
            return false;        
        }



    rut_ = rut_.toUpperCase();
    nom_ = nom_.toUpperCase();
    ema_ = ema_.toLowerCase();

    d=nom_.split(' ');  

    son_ = d.length;

     if (son_ == 2){
      nom__ = d[1];
      ape__ = d[0];
    } 

    if (son_ == 3){
      nom__ = d[2];
      ape__ = d[0] + ' ' + d[1];
    }

    if (son_ == 4){
      nom__ = d[2] + ' ' + d[3];
      ape__ = d[0] + ' ' + d[1];
    }

     if (son_ == 5){
      nom__ = d[3] + ' ' + d[4];
      ape__ = d[0] + ' ' + d[1] + ' ' + d[2];
    }

     if (son_ == 6){
      nom__ = d[3] + ' ' + d[4] + ' ' + d[5];
      ape__ = d[0] + ' ' + d[1] + ' ' + d[2];
    }

    if (son_ >= 7){
      nom__ = d[4] + ' ' + d[5] + ' ' + d[6];
      ape__ = d[0] + ' ' + d[1] + ' ' + d[2] + ' ' + d[3];
    }

     
   
    

 


    cadena = tel_ + '<br><br><br><br>' + ema_ + '<br>' + rut_ + '<br><br>' + ape__ + '<br><br>' + nom__ +'<br>';
   
    imprimir = stilo + '<div align="right" class="textovuelta">'+ cadena +'</div';

  

    var myWindow = window.open("", "myWindow", "width=800,height=400");
    myWindow.document.write(imprimir);
    myWindow.print();
    myWindow.close();
    
}

