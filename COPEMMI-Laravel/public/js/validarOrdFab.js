$(document).on("ready",inicio);

function inicio(){
$("span.help-block").hide();
$("#COD_ORDEN_FABRICACION").keyup(validarCodigo);
$("#NOMBRE_CLIENTE").keyup(validarNomb);
$("#CEDULA_CLIENTE").keyup(validarCedula);
}

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

function validarNomb(){
	var valor = document.getElementById("NOMBRE_CLIENTE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#icononom").remove();
		$("#NOMBRE_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE_CLIENTE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOMBRE_CLIENTE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#icononom").remove();
		$("#NOMBRE_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE_CLIENTE").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#NOMBRE_CLIENTE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononom").remove();
		$("#NOMBRE_CLIENTE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOMBRE_CLIENTE").parent().children("span").text("").hide();
	    $("#NOMBRE_CLIENTE").parent().append("<span id='icononom' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}


function validarCedula(){

	//var tester= /^[0-9]$/;
	var tester = /\d{1}-\d{4}-\d{4}/

	var valor = document.getElementById("CEDULA_CLIENTE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconoce").remove();
		$("#CEDULA_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_CLIENTE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#CEDULA_CLIENTE").parent().append("<span id='iconoce' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 11){

		$("#iconoce").remove();
		$("#CEDULA_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_CLIENTE").parent().children("span").text("Debe ser menor que 11 caracteres").show();
		$("#CEDULA_CLIENTE").parent().append("<span id='iconoce' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconoce").remove();
		$("#CEDULA_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_CLIENTE").parent().children("span").text("Debe tener formato 2-0444-0999").show();
		$("#CEDULA_CLIENTE").parent().append("<span id='iconoce' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconoce").remove();
		$("#CEDULA_CLIENTE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CEDULA_CLIENTE").parent().children("span").text("").hide();
	    $("#CEDULA_CLIENTE").parent().append("<span id='iconoce' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

