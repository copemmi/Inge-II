function actualizaCombo()
{
  var cod_tipo_material =  $("#COD_TIPO_MATERIAL").val();//se captura el item que seleccione en el combobox
  var url="http://localhost:8000/ruta_tipo/"+cod_tipo_material;//ruta del método en el backend y sus parámetros
  $.get(url,function(resul) //método ajax para traer cosas desde el backend al frontend
  {
    $("#COD_TIPO_MATERIAL").html(resul);//Este método recibe por parámetro la respuesta del servidor(que es una estructura html)para listar de nuevo el comobox
       }).fail(function (){//si ocurre un error en la transacción entonces manda este error
            alert('Ha ocurrido un error al actualizar los tipos de material');
  });
}
  
function guardaCambiosModal()
{
  var cod =  $("#COD_TIPO").val();  //Capturar valores de los input
  var nomb =  $("#NOMB_TIPO").val();
  var url="http://localhost:8000/guardarTipoMat/"+cod+"/"+nomb; //ruta del método en el backend y sus parámetros
  $.get(url,function(resul)//método ajax para traer cosas desde el backend al frontend
  {
    alert(resul);//respuesta del servidor con el mensaje de cambios efectuados

  }).fail(function (){//si ocurre un error en la transacción entonces manda este error
    alert('error al insertar el tipo de material');
  });
    actualizaCombo();
} 

