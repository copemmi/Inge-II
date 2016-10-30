@extends ('Menu')
@section ('contenido')
<!--------------------------------------------------------------------FORMULARIO EN EL CENTRO------------------------------------------------------>

		
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>


				<div class="page-header">
	  				<h1 class="text-center">Incorporar Modelo de Máquina</h1>
				</div>

			<!-- MENSAJE DE ERROR, SI UN DATO ES ERRONEO -->
				@if (count($errors) > 0)
    				<div class="alert alert-danger">
	       				 <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
	        			</ul>
    				</div>
				@endif
			<!-- FIN DE MSJ DE ERROR -->

	
				<div class="container">
					{!! Form::open(['route' => 'modelosMaquinas.store','method'=>'POST','autocomplete'=>'off','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_MODELO','Código del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_MODELO',null,['class' => 'form-control','placeholder' => 'Código del modelo', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('COD_IMAGEN','Imagen:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-6">
								<input type="file" id="imagen" size="35"'>
								<p class="help-block">Máximo 2mb </p>
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('option','Tipo de modelo:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_TIPO_MODELO" id="option">
									@foreach($tipo_modelo as $md)
									<option value={{$md->COD_TIPO_MODELO}}>{{$md->NOMBRE}}</option>

									@endforeach
                                  
								</select>
                             
							</div>
							<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('tiposMateriales.create') }}">Incorporar tipo</a>
						</div>

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del modelo', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-8"><!-- Aquí sale el mensaje de ayuda e información -->
								{!! Form::textarea('CARACTERISTICAS',null,['class' => 'form-control','placeholder' => 'Características', 'maxlength="255"','size' => '10x4']) !!}
								<span class = "help-block"></span>
							</div>

						</div>

						<div class="form-group">
							{!! Form::label('PRECIO','Precio:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('PRECIO',null,['class' => 'form-control','placeholder' => 'Precio', 'maxlength="9"']) !!} 
							</div>
						</div>


						<div class="row">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label>Lista de Materiales</label>
											<select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
												@foreach($material as $tm)
												<option value={{$tm->COD_MATERIAL}}>{{$tm->NOMBRE}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
										
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="cantidad">Cantidad</label>
											<input type="number" name="pcantidad" id="pcantidad" class="form-control"
											placeholder="Cantidad">
										</div>
									</div>

									<div class="col-lg-1 col-sm-3 col-md-3 col-xs-12">
										
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
											<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										
									</div>

									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Opciones</th>
												<th>Material</th>
												<th>Cantidad</th>
											</thead>
											<tfoot>
												
											</tfoot>
											<tbody>
												
											</tbody>
										</table>
									</div>

								</div>
							</div>




<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>
							
							<!--trabajar con transacciones-->
						<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>


						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
								
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('modelosMaquinas.index') }}" class="btn btn-danger" id="Cancelar"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
							</div>

						</form>
 
					{!! Form::close() !!}
				</div>
			</div>
@stop


@push('scripts')
<script>

	$(document).ready(function()
	{
		$('#bt_add').click(function(){
			//alert("HOLA");
			agregar();
		});
	});

	var cont=0;
	subtotal=[];
	total=0;
	$("#guardar").hide();

	function agregar()
	{
		idarticulo=$("#pidarticulo").val();
		articulo=$("#pidarticulo option:selected").text();
		cantidad=$("#pcantidad").val();


		if(idarticulo!=""&&cantidad!=""&&cantidad>0)
		{
			
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+idarticulo+'</td><td><input type="number" name=" cantidad[]" value="'+cantidad+'"></td></tr>';

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+idarticulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>'
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
			//$("#Cancelar").show();		
		}
		else
		{
			$("#Guardar").hide();
			//$("#Cancelar").hide();
		}
	}

	function eliminar(index)
	{
		$("#fila"+index).remove();
		evaluar();
	}
</script>
@endpush

@section('js')
	{!! Html::script('js/validacionMod.js') !!}
@stop