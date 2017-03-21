$(document).ready(function() {
// Cargar cantones


var nombre_material =  $("#material").val();
var nomb="enrique";





    $("#COD_TIPO_MATERIAL").change(function()//Este evento se va a dar cuando se cambie de valor en el combobox
    {

      var cod_tipo_material =  $("#COD_TIPO_MATERIAL").val();//se captura el item que seleccione en el combobox
      var url="http://localhost:8000/ruta_tipo/"+cod_tipo_material;//ruta del método en el backend y sus parámetros
 
      $.get(url,function(resul) //método ajax para traer cosas desde el backend al frontend
      {
  /*var datos= jQuery.parseJSON(resul);
  var id=datos.identificador;
var nombre=datos.nomb;*/

      $("#COD_TIPO_MATERIAL").html(resul);//Este método recibe por parámetro la respuesta del servidor(que es una estructura html)para listar de nuevo el comobox
 

       })
    });










$('#guardarCambiosModal').click( function(){

var cod =  $("#COD_TIPO").val();  //Capturar valores de los input
var nomb =  $("#NOMB_TIPO").val();
var url="http://localhost:8000/guardarTipoMat/"+cod+"/"+nomb; //ruta del método en el backend y sus parámetros

$.get(url,function(resul)//método ajax para traer cosas desde el backend al frontend
{

  alert(resul);//respuesta del servidor con el mensaje de cambios efectuados
 


  /*var datos= jQuery.parseJSON(resul);
  var id=datos.identificador;
var nombre=datos.nomb;*/






})



});

  });