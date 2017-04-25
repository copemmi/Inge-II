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
	$("#NOMBRE_EMPRESA").keyup(validarNombEmp);
	$("#CEDULA_JURIDICA").keyup(validarCedulaJuridica);

	$("#ID_CLIENTE").keyup(validarIdentificacionM);
	$("#NOMB").keyup(validarNombM);
	$("#PRIMER_APE").keyup(validarPrimerAM);
	$("#SEGUNDO_APE").keyup(validarSegundoAM);
	$("#DIRE").keyup(validarDireccionM);
	$("#TELE").keyup(validarTelefonoM);
	$("#COR").keyup(validarCorreoM);
	$("#NOM_EM").keyup(validarNombEmpM);
	$("#CED_JURI").keyup(validarCedulaJuridicaM);

}

function empezarFunciones(){

	validarIdentificacion();
	validarTelefono();
	validarCorreo();

	validarIdentificacionM();
	validarTelefonoM();
	validarCorreoM();

}

function validarIdentificacion(){

	var tester = /\d{1}-[0-1]\d{3}-[0-1]\d{3}/
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
	else if(valor.length > 10){

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
		$("#CORREO").parent().children("span").text("Debe tener formato ejemplo@hotmail.com").show();
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

function validarNombEmp(){
	var valor = document.getElementById("NOMBRE_EMPRESA").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#icononomemp").remove();
		$("#NOMBRE_EMPRESA").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE_EMPRESA").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOMBRE_EMPRESA").parent().append("<span id='icononomemp' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#icononomemp").remove();
		$("#NOMBRE_EMPRESA").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE_EMPRESA").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#NOMBRE_EMPRESA").parent().append("<span id='icononomemp' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononomemp").remove();
		$("#NOMBRE_EMPRESA").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOMBRE_EMPRESA").parent().children("span").text("").hide();
	    $("#NOMBRE_EMPRESA").parent().append("<span id='icononomemp' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarCedulaJuridica(){

	var tester = /\d{1}-\d{3}-\d{7}/
	var valor = document.getElementById("CEDULA_JURIDICA").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocedj").remove();
		$("#CEDULA_JURIDICA").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_JURIDICA").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#CEDULA_JURIDICA").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 14){

		$("#iconocedj").remove();
		$("#CEDULA_JURIDICA").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_JURIDICA").parent().children("span").text("Debe ser menor que 14 caracteres").show();
		$("#CEDULA_JURIDICA").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconocedj").remove();
		$("#CEDULA_JURIDICA").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CEDULA_JURIDICA").parent().children("span").text("Debe tener formato #-###-#######").show();
		$("#CEDULA_JURIDICA").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconocedj").remove();
		$("#CEDULA_JURIDICA").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CEDULA_JURIDICA").parent().children("span").text("").hide();
	    $("#CEDULA_JURIDICA").parent().append("<span id='iconocedj' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}


function validarIdentificacionM(){

	var tester = /\d{1}-[0-1]\d{3}-[0-1]\d{3}/
	var valor = document.getElementById("ID_CLIENTE").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconoid").remove();
		$("#ID_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID_CLIENTE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#ID_CLIENTE").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 11){

		$("#iconoid").remove();
		$("#ID_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID_CLIENTE").parent().children("span").text("Debe ser menor que 11 caracteres").show();
		$("#ID_CLIENTE").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconoid").remove();
		$("#ID_CLIENTE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#ID_CLIENTE").parent().children("span").text("Debe tener formato #-0###-0###").show();
		$("#ID_CLIENTE").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconoid").remove();
		$("#ID_CLIENTE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#ID_CLIENTE").parent().children("span").text("").hide();
	    $("#ID_CLIENTE").parent().append("<span id='iconoid' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}

function validarNombM(){
	var valor = document.getElementById("NOMB").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#icononom").remove();
		$("#NOMB").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMB").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOMB").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#icononom").remove();
		$("#NOMB").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMB").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#NOMB").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononom").remove();
		$("#NOMB").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOMB").parent().children("span").text("").hide();
	    $("#NOMB").parent().append("<span id='icononom' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarPrimerAM(){
	var valor = document.getElementById("PRIMER_APE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconopa").remove();
		$("#PRIMER_APE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRIMER_APE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#PRIMER_APE").parent().append("<span id='iconopa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#iconopa").remove();
		$("#PRIMER_APE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRIMER_APE").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#PRIMER_APE").parent().append("<span id='iconopa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconopa").remove();
		$("#PRIMER_APE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#PRIMER_APE").parent().children("span").text("").hide();
	    $("#PRIMER_APE").parent().append("<span id='iconopa' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarSegundoAM(){
	var valor = document.getElementById("SEGUNDO_APE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconosa").remove();
		$("#SEGUNDO_APE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#SEGUNDO_APE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#SEGUNDO_APE").parent().append("<span id='iconosa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#iconosa").remove();
		$("#SEGUNDO_APE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#SEGUNDO_APE").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#SEGUNDO_APE").parent().append("<span id='iconosa' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconosa").remove();
		$("#SEGUNDO_APE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#SEGUNDO_APE").parent().children("span").text("").hide();
	    $("#SEGUNDO_APE").parent().append("<span id='iconosa' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}



function validarDireccionM(){
	var valor = document.getElementById("DIRE").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconodi").remove();
		$("#DIRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DIRE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#DIRE").parent().append("<span id='iconodi' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 100){

		$("#iconodi").remove();
		$("#DIRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DIRE").parent().children("span").text("Debe ser menor que 100 caracteres").show();
		$("#DIRE").parent().append("<span id='iconodi' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconodi").remove();
		$("#DIRE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#DIRE").parent().children("span").text("").hide();
	    $("#DIRE").parent().append("<span id='iconodi' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}


function validarTelefonoM(){
	var tester = /\d{4}-\d{2}-\d{2}/
	var valor = document.getElementById("TELE").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconote").remove();
		$("#TELE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#TELE").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 10){

		$("#iconote").remove();
		$("#TELE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELE").parent().children("span").text("Debe ser menor que 11 caracteres").show();
		$("#TELE").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconote").remove();
		$("#TELE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#TELE").parent().children("span").text("Debe tener formato ####-##-##").show();
		$("#TELE").parent().append("<span id='iconote' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconote").remove();
		$("#TELE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#TELE").parent().children("span").text("").hide();
	    $("#TELE").parent().append("<span id='iconote' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}


function validarCorreoM(){

	var tester = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var valor = document.getElementById("COR").value;
	
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconoco").remove();
		$("#COR").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COR").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#COR").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 50){

		$("#iconoco").remove();
		$("#COR").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COR").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#COR").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconoco").remove();
		$("#COR").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COR").parent().children("span").text("Debe tener formato ejemplo@hotmail.com").show();
		$("#COR").parent().append("<span id='iconoco' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconoco").remove();
		$("#COR").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#COR").parent().children("span").text("").hide();
	    $("#COR").parent().append("<span id='iconoco' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
}
}

function validarNombEmpM(){
	var valor = document.getElementById("NOM_EM").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#icononomemp").remove();
		$("#NOM_EM").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOM_EM").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOM_EM").parent().append("<span id='icononomemp' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 50){

		$("#icononomemp").remove();
		$("#NOM_EM").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOM_EM").parent().children("span").text("Debe ser menor que 50 caracteres").show();
		$("#NOM_EM").parent().append("<span id='icononomemp' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononomemp").remove();
		$("#NOM_EM").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOM_EM").parent().children("span").text("").hide();
	    $("#NOM_EM").parent().append("<span id='icononomemp' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

function validarCedulaJuridicaM(){

	var tester = /\d{1}-\d{3}-\d{7}/
	var valor = document.getElementById("CED_JURI").value;

	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocedj").remove();
		$("#CED_JURI").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CED_JURI").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#CED_JURI").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(valor.length > 14){

		$("#iconocedj").remove();
		$("#CED_JURI").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CED_JURI").parent().children("span").text("Debe ser menor que 14 caracteres").show();
		$("#CED_JURI").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else if(tester.test(valor)==false){
		$("#iconocedj").remove();
		$("#CED_JURI").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CED_JURI").parent().children("span").text("Debe tener formato #-###-#######").show();
		$("#CED_JURI").parent().append("<span id='iconocedj' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		$('#Guardar').hide();
		return false;
	}
	else{
		$("#iconocedj").remove();
		$("#CED_JURI").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CED_JURI").parent().children("span").text("").hide();
	    $("#CED_JURI").parent().append("<span id='iconocedj' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    $('#Guardar').show();
	    return true;
	}
}
