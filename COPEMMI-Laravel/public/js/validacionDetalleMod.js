$(document).ready(function()
	{	
		$('#bt_add').click(function(){
			agregar();
		});

	});

	var cont=0;//contador de filas
	var string="";//sirve para comparar que los materiales no se repitan en el detalle

	$('#Guardar').hide();

	function agregar()
	{
		idmaterial=$("#pidmaterial").val();
		material=$("#pidmaterial option:selected").text();
		cantidad=$("#pcantidad").val();


		if(idmaterial!=""&&cantidad!=""&&cantidad>0)//validar que cantidad sea entero
		{
			if(materialRepetido()){
				var fila='<tr class="selected" id="fila'+cont+'"><td width="20%"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td id="cellmaterial" width="50%"><input type="hidden" name="idmaterial[]" value="'+idmaterial+'">'+material+'</td><td width="30%"><input class="col-md-6 col-md-offset-4" type="number" min="1"  name=" cantidad[]" value="'+cantidad+'" placeholder="Cantidad"></td></tr>';
				cont++;
				limpiar();
				evaluar();
				$("#detalles").append(fila);
			}
			else{
				//alert("El material ya ha sido agregado");
				$("span.msj-error").text("Error, este material ya ha sido agregado en la lista.").show();
				$("span.msj-error").delay(2000).hide(600);
			}	
		}
		else
		{
			//alert("Debe ingresar la cantidad de materiales");
			$("span.msj-error").text("Error, debe ingresar la cantidad de material que ingresará.").show();
			$("span.msj-error").delay(2000).hide(600);
		};
	};

	function materialRepetido(){//para validar que el detalle no se repita
		if(cont!=0){
			for($i=0;$i<cont;$i++){
				string = $('#detalles #cellmaterial').eq($i).text(); 

				if(material == string){
	 				return false;
	 				break;
	    		}
			}
			return true;
		}
		else{
			return true;
		}
	}


	function limpiar()
	{
		$("#pcantidad").val("");//limpia el campo de cantidad

	}

	function evaluar()//para evaluar si el detalle tiene algo, si no tiene el boton guardar se deshabilitara
	{
		if(cont>0)
		{
			$("#Guardar").show();	
			///$("#Cancelar").show();		
		}
		else
		{
			$("#Guardar").hide();
			////$("#Cancelar").hide();
		}
	}

	function eliminar(index)
	{
		$("#fila"+index).remove();
		cont--;
		evaluar();
	}