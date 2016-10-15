$(document).on("ready",inicio);

function inicio(){
$("span.help-block").hide();
	$("#Guardar").click(function(){
		if(validarCodigo()==false || validarCantidad()==false || validarNombre()==false || validarDescripcion() == false)
			alert("Espacios Incorrectos");
		
	});
$("#COD_MATERIAL").keyup(validarCodigo);
$("#CANTIDAD").keyup(validarCantidad);
$("#NOMBRE").keyup(validarNombre);
$("#DESCRIPCION").keyup(validarDescripcion);
}

function validarCodigo(){
	var valor = document.getElementById("COD_MATERIAL").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocodigo").remove();
		$("#COD_MATERIAL").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_MATERIAL").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#COD_MATERIAL").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 10){

		$("#iconocodigo").remove();
		$("#COD_MATERIAL").parent().parent().attr("class","form-group has-error has-feedback")
		$("#COD_MATERIAL").parent().children("span").text("Debe ser menor que 10 caracteres").show();
		$("#COD_MATERIAL").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocodigo").remove();
		$("#COD_MATERIAL").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#COD_MATERIAL").parent().children("span").text("").hide();
	    $("#COD_MATERIAL").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

	function validarCantidad(){
	var cant = document.getElementById("CANTIDAD").value;

	if(cant == null || cant.length == 0 || /^\s+$/.test(cant)){

		$("#iconocant").remove();
		$("#CANTIDAD").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CANTIDAD").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#CANTIDAD").parent().append("<span id='iconocant' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(isNaN(cant)){
		$("#iconocant").remove();
		$("#CANTIDAD").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CANTIDAD").parent().children("span").text("Debe ingresar caracter numerico").show();
		$("#CANTIDAD").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(cant.length>6){
		$("#iconocant").remove();
		$("#CANTIDAD").parent().parent().attr("class","form-group has-error has-feedback")
		$("#CANTIDAD").parent().children("span").text("La cantidad debe ser menor a 6 numeros").show();
		$("#CANTIDAD").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocant").remove();
		$("#CANTIDAD").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#CANTIDAD").parent().children("span").text("").hide();
	    $("#CANTIDAD").parent().append("<span id='iconocant' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}

	}

	function validarNombre(){
	var nom = document.getElementById("NOMBRE").value;

	if(nom == null || nom.length == 0 || /^\s+$/.test(nom)){

		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#NOMBRE").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(nom.length>50){
		$("#icononom").remove();
		$("#NOMBRE").parent().parent().attr("class","form-group has-error has-feedback")
		$("#NOMBRE").parent().children("span").text("El nombre debe ser menor a 50 caracteres").show();
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


	function validarDescripcion(){
	var descrip = document.getElementById("DESCRIPCION").value;

	if(descrip == null || descrip.length == 0 || /^\s+$/.test(descrip)){

		$("#iconodescrip").remove();
		$("#DESCRIPCION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DESCRIPCION").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#DESCRIPCION").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(descrip.length>255){
		$("#iconodescrip").remove();
		$("#DESCRIPCION").parent().parent().attr("class","form-group has-error has-feedback")
		$("#DESCRIPCION").parent().children("span").text("Debe ser menor a 255 caracteres").show();
		$("#DESCRIPCION").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
		}
	else{
		$("#iconodescrip").remove();
		$("#DESCRIPCION").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#DESCRIPCION").parent().children("span").text("").hide();
	    $("#DESCRIPCION").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}}