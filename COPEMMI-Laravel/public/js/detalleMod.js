$(document).ready(function()
	{	
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont=0;
	//subtotal=[];
	total=0;
	//$('#Guardar').hide();

	function agregar()
	{
		idarticulo=$("#pidarticulo").val();
		articulo=$("#pidarticulo option:selected").text();
		cantidad=$("#pcantidad").val();


		if(idarticulo!=""&&cantidad!=""&&cantidad>0)//validar que cantidad sea entero
		{
			
			var fila='<tr class="selected" id="fila'+cont+'"><td width="20%"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td width="50%"><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td width="30%"><input class="col-md-6 col-md-offset-4" type="number" min="1"  name=" cantidad[]" value="'+cantidad+'"></td></tr>';

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
		$("#pcantidad").val("");
	}

	function evaluar()
	{
		if(total>0)
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
		evaluar();
	}