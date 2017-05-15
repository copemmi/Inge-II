//Inserta un cliente con ajax en el combobox.  		
 function actualizaCombo()		
 {		
   var id =  $("#ID").val();//se captura el item que seleccione en el combobox		
   var url="/ruta_tipoClientes/"+id;//ruta del método en el backend y sus parámetros		
   $.get(url,function(resul) //método ajax para traer cosas desde el backend al frontend		
   {		

     $("#ID").html(resul);//Este método recibe por parámetro la respuesta del servidor(que es una estructura html)para listar de nuevo el comobox		
  }).fail(function (){//si ocurre un error en la transacción entonces manda este error		
       alert('Ha ocurrido un error al actualizar los tipos de material');		
     });		
 }		
 		
 //Guarda los cambios en la ventana modal del formulario de tipo de materiales. 		
function guardaCambiosModal()		
 {		
   var id =  $("#ID_CLIENTE").val();  //Capturar valores de los input		
   var nomb =  $("#NOMB").val();		
   var pri_ape =  $("#PRIMER_APE").val();  //Capturar valores de los input		
   var segund_ape =  $("#SEGUNDO_APE").val();		
   var direc =  $("#DIRE").val();  //Capturar valores de los input		
   var telef =  $("#TELE").val();		
   var corr =  $("#COR").val();  //Capturar valores de los input		
   var nombreEm =  $("#NOM_EM").val();		
   var cedulaJu =  $("#CED_JURI").val();		
   var url="/guardarClientes/"+id+"/"+nomb+"/"+pri_ape+"/"+segund_ape+"/"+direc+"/"+telef+"/"+corr+"/"+nombreEm+"/"+cedulaJu; //ruta del método en el backend y sus parámetros		
 		
   $.get(url,function(resul)//método ajax para traer cosas desde el backend al frontend		
   {		
     alert(resul);//respuesta del servidor con el mensaje de cambios efectuados		
 		
   }).fail(function (){//si ocurre un error en la transacción entonces manda este error		
       alert('error al insertar un cliente');		
    });		
 		
   actualizaCombo();		
 }