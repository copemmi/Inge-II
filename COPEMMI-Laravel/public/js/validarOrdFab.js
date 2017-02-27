$(document).on("ready",inicio);

function inicio(){
validarCedula();//se puso por si hay un error en otro campo y si la cedula esta bien que se habilite el boton, sin necesidad de apretar una tecla en el text de cedula
$("span.help-block").hide();
$("#COD_ORDEN_FABRICACION").keyup(validarCodigo);

}

//$('#Guardar').hide();

function validarCodigo(){
	var valor = document.getElementById("COD_ORDEN_FABRICACION").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocodigo").remove();
		$("#COD_ORDEN_FABRICACION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_ORDEN_FABRICACION").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#COD_ORDEN_FABRICACION").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 10){

		$("#iconocodigo").remove();
		$("#COD_ORDEN_FABRICACION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_ORDEN_FABRICACION").parent().children("span").text("Debe ser menor que 10 caracteres").show();
		$("#COD_ORDEN_FABRICACION").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocodigo").remove();
		$("#COD_ORDEN_FABRICACION").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#COD_ORDEN_FABRICACION").parent().children("span").text("").hide();
	    $("#COD_ORDEN_FABRICACION").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}


