$(document).on("ready",inicio);

function inicio(){
$("span.help-block").hide();
$("#COD_MODELO").keyup(validarCodigo);
$("#COD_IMAGEN").keyup(validarCodigoImagen);
$("#PRECIO").keyup(validarPrecio);
$("#NOMBRE").keyup(validarNombre);
$("#CARACTERISTICAS").keyup(validarCaracteristicas);
}

//Método validar código
function validarCodigo(){
	var valor = document.getElementById("COD_MODELO").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocodigo").remove();
		$("#COD_MODELO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_MODELO").parent().children("span").text("Debe ingresar algún caracter").show();
		$("#COD_MODELO").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 10){

		$("#iconocodigo").remove();
		$("#COD_MODELO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_MODELO").parent().children("span").text("Solo se permite un máximo de 10 caracteres").show();
		$("#COD_MODELO").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocodigo").remove();
		$("#COD_MODELO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#COD_MODELO").parent().children("span").text("").hide();
	    $("#COD_MODELO").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

//Método validar código de la imagen
function validarCodigoImagen(){
	var valor = document.getElementById("COD_IMAGEN").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocodigo").remove();
		$("#COD_IMAGEN").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_IMAGEN").parent().children("span").text("Debe ingresar algún caracter").show();
		$("#COD_IMAGEN").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 10){

		$("#iconocodigo").remove();
		$("#COD_IMAGEN").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_IMAGEN").parent().children("span").text("Solo se permite un máximo de 10 caracteres").show();
		$("#COD_IMAGEN").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocodigo").remove();
		$("#COD_IMAGEN").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#COD_IMAGEN").parent().children("span").text("").hide();
	    $("#COD_IMAGEN").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}



//Método validar cantidad
	function validarPrecio(){
	var cant = document.getElementById("PRECIO").value;

	if(cant == null || cant.length == 0 || /^\s+$/.test(cant)){

		$("#iconocant").remove();
		$("#PRECIO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRECIO").parent().children("span").text("Debe ingresar algún caracter").show();
		$("#PRECIO").parent().append("<span id='iconocant' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(isNaN(cant)){
		$("#iconocant").remove();
		$("#PRECIO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRECIO").parent().children("span").text("Debe ingresar algún número").show();
		$("#PRECIO").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(cant.length>9){
		$("#iconocant").remove();
		$("#PRECIO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRECIO").parent().children("span").text("Solo se permite un máximo de 9 números").show();
		$("#PRECIO").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(cant % 1 != 0){  //Validación que solo permita números enteros. 
		$("#iconocant").remove();
		$("#PRECIO").parent().parent().attr("class","form-group has-error has-feedback")
		$("#PRECIO").parent().children("span").text("Sólo se debe ingresar números enteros.").show();
		$("#PRECIO").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return true;
	}
	else{
		$("#iconocant").remove();
		$("#PRECIO").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#PRECIO").parent().children("span").text("").hide();
	    $("#PRECIO").parent().append("<span id='iconocant' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}

	}

//Método validar nombre
	function validarNombre(){
	var nom = document.getElementById("NOMBRE").value;

	if(nom == null || nom.length == 0 || /^\s+$/.test(nom)){

		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("Debe ingresar algún caracter").show();
		$("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(nom.length>50){
		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("Solo se permite un máximo de 50 caracteres").show();
		$("#NOMBRE").parent().append("<span id=icononom class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#NOMBRE").parent().children("span").text("").hide();
	    $("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}}


//Método validar descripción
	function validarCaracteristicas(){
	var descrip = document.getElementById("CARACTERISTICAS").value;

	if(descrip == null || descrip.length == 0 || /^\s+$/.test(descrip)){

		$("#iconodescrip").remove();
		$("#CARACTERISTICAS").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CARACTERISTICAS").parent().children("span").text("Debe ingresar algún caracter").show();
		$("#CARACTERISTICAS").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(descrip.length>255){
		$("#iconodescrip").remove();
		$("#CARACTERISTICAS").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CARACTERISTICAS").parent().children("span").text("Solo se permite un máximo de 255 caracteres").show();
		$("#CARACTERISTICAS").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
		}
	else{
		$("#iconodescrip").remove();
		$("#CARACTERISTICAS").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CARACTERISTICAS").parent().children("span").text("").hide();
	    $("#CARACTERISTICAS").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}} 