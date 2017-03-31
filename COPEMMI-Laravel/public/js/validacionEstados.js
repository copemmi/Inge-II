function actualizarEstados()
{
      var cod_ordFab= $("#COD_ORDEN_FABRICACION").val();//se captura el item que seleccione en el combobox
      var url="http://localhost:8000/ruta_cambiarEstado/"+cod_ordFab;//ruta del método en el backend y sus parámetros
 
      $.get(url,function(resul) //método ajax para traer cosas desde el backend al frontend
      {
  /*var datos= jQuery.parseJSON(resul);
  var id=datos.identificador;
var nombre=datos.nomb;*/

      $("#COD_ORDEN_FABRICACION").html(resul);//Este método recibe por parámetro la respuesta del servidor(que es una estructura html)para listar de nuevo el comobox
 

       }).fail(function (){//si ocurre un error en la transacción entonces manda este error
  flash('Error al cambiar de estado de la orden'+cod_ordFab);

});



    }