$(document).ready(function() {
// Cargar cantones


var nombre_material =  $("#material").val();
var nomb="enrique";




//Envío;
    $("#COD_TIPO_MATERIAL").change(function(){

      var cod_tipo_material =  $("#COD_TIPO_MATERIAL").val();
var url="http://localhost:8000/ruta_tipo/"+cod_tipo_material;


       // var idProv = $("#slct_provincia option:selected").val();
        //var accion = 4;
        //alert("combo 7777");

      /*  var request = $.ajax({
          url:"tipo_materialBack",
          type: "GET",
          data:"cod_tipo_mat=" + cod_tipo_material + "nombre_mat=" + nombre_material,
          dataType: "html"
        });
        

//Respuesta a servidor
    request.done(function( tipos_materiales ) {
      alert(tipos_materiales);
        $("#COD_TIPO_MATERIAL").html(tipos_materiales);
//console.log(" Viva la liga " + codigoHTML);

    });

    request.fail(function(jqXHR, textStatus ) {
        $("#COD_TIPO_MATERIAL").html("Intentando conectar al servidor. Por favor inténtelo de nuevo: " + textStatus );
    });

    */


$.get(url,function(resul){
  /*var datos= jQuery.parseJSON(resul);
  var id=datos.identificador;
var nombre=datos.nomb;*/


$("#COD_TIPO_MATERIAL").html(resul);
alert(resul);

})
});










$('#guardarCambiosModal').click( function(){

var cod =  $("#COD_TIPO").val();
var nomb =  $("#NOMB_TIPO").val();
var url="http://localhost:8000/guardarTipoMat/"+cod+"/"+nomb;

$.get(url,function(resul){
  /*var datos= jQuery.parseJSON(resul);
  var id=datos.identificador;
var nombre=datos.nomb;*/


/*$("#COD_TIPO_MATERIAL").html(resul);*/
alert(resul);
  $(this).hide(); 

})



});

  });