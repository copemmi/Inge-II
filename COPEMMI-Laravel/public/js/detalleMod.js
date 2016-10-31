$(document).ready(function()
	{	
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont=0;//contador de filas
	$('#Guardar').hide();

	function agregar()
	{
		idmaterial=$("#pidmaterial").val();
		material=$("#pidmaterial option:selected").text();
		cantidad=$("#pcantidad").val();


		if(idmaterial!=""&&cantidad!=""&&cantidad>0)//validar que cantidad sea entero
		{
			
			var fila='<tr class="selected" id="fila'+cont+'"><td width="20%"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td width="50%"><input type="hidden" name="idmaterial[]" value="'+idmaterial+'">'+material+'</td><td width="30%"><input class="col-md-6 col-md-offset-4" type="number" min="1"  name=" cantidad[]" value="'+cantidad+'"></td></tr>';

				cont++;
				limpiar();
				evaluar();
				$("#detalles").append(fila);
		}
		else
		{
			alert("Error al ingresar, revise los datos");
		};
	};

	function limpiar()
	{
		$("#pcantidad").val("");//limpia el campo de cantidad

	}

	function evaluar()
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