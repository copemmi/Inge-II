$(document).on("ready",inicio);

function inicio(){
	

	$("span.help-block").hide();
	$("#ID").keyup(validarIdentificacion);
	$("#NOMBRE").keyup(validarNomb);
	$("#PRIMER_APELLIDO").keyup(validarPrimerA);
	$("#SEGUNDO_APELLIDO").keyup(validarSegundoA);
	$("#DIRECCION").keyup(validarDireccion);
	$("#TELEFONO").keyup(validarTelefono);
	$("#CORREO").keyup(validarCorreo);

}

function empezarFunciones(){

	validarIdentificacion();
	validarTelefono();
	validarCorreo();


}

function validarIdentificacion(){

	var tester = /\d{1}-0\d{3}-[0-1]\d{3}/
	var valor = document.getElementById("ID").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconoid").remove();
		$("#ID").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#ID").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 11){

		$("#iconoid").remove();
		$("#ID").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID").parent().children("span").text("Debe ser menor que 11 caracteres").show();
		$("#ID").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconoid").remove();
		$("#ID").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID").parent().children("span").text("Debe tener formato #-0###-0###").show();
		$("#ID").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconoid").remove();
		$("#ID").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#ID").parent().children("span").text("").hide();
	    $("#ID").parent().append("<span id='iconoid' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}

function validarNomb(){
	var valor = document.getElementById("NOMBRE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOMBRE").parent().children("span").text("").hide();
	    $("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarPrimerA(){
	var valor = document.getElementById("PRIMER_APELLIDO").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconopa").remove();
		$("#PRIMER_APELLIDO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRIMER_APELLIDO").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#PRIMER_APELLIDO").parent().append("<span id='iconopa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#iconopa").remove();
		$("#PRIMER_APELLIDO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRIMER_APELLIDO").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#PRIMER_APELLIDO").parent().append("<span id='iconopa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconopa").remove();
		$("#PRIMER_APELLIDO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#PRIMER_APELLIDO").parent().children("span").text("").hide();
	    $("#PRIMER_APELLIDO").parent().append("<span id='iconopa' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarSegundoA(){
	var valor = document.getElementById("SEGUNDO_APELLIDO").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconosa").remove();
		$("#SEGUNDO_APELLIDO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#SEGUNDO_APELLIDO").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#SEGUNDO_APELLIDO").parent().append("<span id='iconosa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#iconosa").remove();
		$("#SEGUNDO_APELLIDO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#SEGUNDO_APELLIDO").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#SEGUNDO_APELLIDO").parent().append("<span id='iconosa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconosa").remove();
		$("#SEGUNDO_APELLIDO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#SEGUNDO_APELLIDO").parent().children("span").text("").hide();
	    $("#SEGUNDO_APELLIDO").parent().append("<span id='iconosa' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}



function validarDireccion(){
	var valor = document.getElementById("DIRECCION").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconodi").remove();
		$("#DIRECCION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DIRECCION").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#DIRECCION").parent().append("<span id='iconodi' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 100){

		$("#iconodi").remove();
		$("#DIRECCION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DIRECCION").parent().children("span").text("Debe ser menor que 100 caracteres").show();
		$("#DIRECCION").parent().append("<span id='iconodi' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconodi").remove();
		$("#DIRECCION").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#DIRECCION").parent().children("span").text("").hide();
	    $("#DIRECCION").parent().append("<span id='iconodi' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}


function validarTelefono(){
	var tester = /\d{4}-\d{2}-\d{2}/
	var valor = document.getElementById("TELEFONO").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconote").remove();
		$("#TELEFONO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELEFONO").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#TELEFONO").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 11){

		$("#iconote").remove();
		$("#TELEFONO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELEFONO").parent().children("span").text("Debe ser menor que 11 caracteres").show();
		$("#TELEFONO").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconote").remove();
		$("#TELEFONO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELEFONO").parent().children("span").text("Debe tener formato ####-##-##").show();
		$("#TELEFONO").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconote").remove();
		$("#TELEFONO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#TELEFONO").parent().children("span").text("").hide();
	    $("#TELEFONO").parent().append("<span id='iconote' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}


function validarCorreo(){

	var tester = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var valor = document.getElementById("CORREO").value;
	
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconoco").remove();
		$("#CORREO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CORREO").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#CORREO").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 50){

		$("#iconoco").remove();
		$("#CORREO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CORREO").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#CORREO").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconoco").remove();
		$("#CORREO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CORREO").parent().children("span").text("Debe tener formato ####-##-##").show();
		$("#CORREO").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconoco").remove();
		$("#CORREO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CORREO").parent().children("span").text("").hide();
	    $("#CORREO").parent().append("<span id='iconoco' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
}
}