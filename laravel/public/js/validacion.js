$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#Guardar").click(function(){
		if(validar()==false || validarCantidad()==false || validarNombre()==false || validarDescripcion() == false)
			alert("Espacios Incorrectos");
		else{
			alert("Formulario Correcto");
		}
	});
$("#codigo").keyup(validar);
$("#cantidad").keyup(validarCantidad);
$("#nombre").keyup(validarNombre);
$("#descripcion").keyup(validarDescripcion);
}

function validar(){
	var valor = document.getElementById("codigo").value;
	if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){

		$("#iconocodigo").remove();
		$("#codigo").parent().parent().attr("class","form-group has-error has-feedback")
		$("#codigo").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#codigo").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(valor.length > 10){

		$("#iconocodigo").remove();
		$("#codigo").parent().parent().attr("class","form-group has-error has-feedback")
		$("#codigo").parent().children("span").text("Debe ser menor que 10 caracteres").show();
		$("#codigo").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocodigo").remove();
		$("#codigo").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#codigo").parent().children("span").text("").hide();
	    $("#codigo").parent().append("<span id='iconocodigo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}
}

	function validarCantidad(){
	var cant = document.getElementById("cantidad").value;

	if(cant == null || cant.length == 0 || /^\s+$/.test(cant)){

		$("#iconocant").remove();
		$("#cantidad").parent().parent().attr("class","form-group has-error has-feedback")
		$("#cantidad").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#cantidad").parent().append("<span id='iconocant' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(isNaN(cant)){
		$("#iconocant").remove();
		$("#cantidad").parent().parent().attr("class","form-group has-error has-feedback")
		$("#cantidad").parent().children("span").text("Debe ingresar caracter numerico").show();
		$("#cantidad").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(cant.length>6){
		$("#iconocant").remove();
		$("#cantidad").parent().parent().attr("class","form-group has-error has-feedback")
		$("#cantidad").parent().children("span").text("La cantidad debe ser menor a 6 numeros").show();
		$("#cantidad").parent().append("<span id=iconocant class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#iconocant").remove();
		$("#cantidad").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#cantidad").parent().children("span").text("").hide();
	    $("#cantidad").parent().append("<span id='iconocant' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}

	}

	function validarNombre(){
	var nom = document.getElementById("nombre").value;

	if(nom == null || nom.length == 0 || /^\s+$/.test(nom)){

		$("#icononom").remove();
		$("#nombre").parent().parent().attr("class","form-group has-error has-feedback")
		$("#nombre").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#nombre").parent().append("<span id='icononom' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(nom.length>50){
		$("#icononom").remove();
		$("#nombre").parent().parent().attr("class","form-group has-error has-feedback")
		$("#nombre").parent().children("span").text("El nombre debe ser menor a 50 caracteres").show();
		$("#nombre").parent().append("<span id=icononom class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else{
		$("#icononom").remove();
		$("#nombre").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#nombre").parent().children("span").text("").hide();
	    $("#nombre").parent().append("<span id='icononom' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}}


	function validarDescripcion(){
	var descrip = document.getElementById("descripcion").value;

	if(descrip == null || descrip.length == 0 || /^\s+$/.test(descrip)){

		$("#iconodescrip").remove();
		$("#descripcion").parent().parent().attr("class","form-group has-error has-feedback")
		$("#descripcion").parent().children("span").text("Debe ingresar algun caracter").show();
		$("#descripcion").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}
	else if(descrip.length>255){
		$("#iconodescrip").remove();
		$("#descripcion").parent().parent().attr("class","form-group has-error has-feedback")
		$("#descripcion").parent().children("span").text("Debe ser menor a 50 caracteres").show();
		$("#descripcion").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		}
	else{
		$("#iconodescrip").remove();
		$("#descripcion").parent().parent().attr("class","form-group has-success has-feedback")
	    $("#descripcion").parent().children("span").text("").hide();
	    $("#descripcion").parent().append("<span id='iconodescrip' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	    return true;
	}}