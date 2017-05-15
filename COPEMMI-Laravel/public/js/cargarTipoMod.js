function actualizaCombo()		
 {		
   var cod_tipo_modelo =  $("#COD_TIPO_MODELO").val();//se captura el item que seleccione en el combobox		
 
   var url="/ruta_tipoMod/"+cod_tipo_modelo;//ruta del método en el backend y sus parámetros		
  $.get(url,function(resul) //método ajax para traer cosas desde el backend al frontend		
   {		

     $("#COD_TIPO_MODELO").html(resul);//Este método recibe por parámetro la respuesta del servidor(que es una estructura html)para listar de nuevo el comobox		
  }).fail(function (){//si ocurre un error en la transacción entonces manda este error		
       //alert('Ha ocurrido un error al actualizar los tipos de modelos de máquina');		
     });		
}		
 		
 //Guarda los cambios en la ventana modal del formulario de tipo de materiales. 		
 function guardaCambiosModal()		
 {		
  var cod =  $("#COD_TIPO").val();  //Capturar valores de los input		
  var nomb =  $("#NOMB_TIPO").val();		
  var url="/guardarTipoModMaq/"+cod+"/"+nomb; //ruta del método en el backend y sus parámetros		
 	
  $.get(url,function(resul)//método ajax para traer cosas desde el backend al frontend		
  {		
    alert(resul);//respuesta del servidor con el mensaje de cambios efectuados		
 		
   }).fail(function (){//si ocurre un error en la transacción entonces manda este error		
      alert('error al insertar el tipo de modelo de máquina');		
    });		
 		
   actualizaCombo();		
 }