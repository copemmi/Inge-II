@extends ('Menu')
@section ('contenido')


<!----------------------------------------------------Formulario EN EL CENTRO------------------------------------------------------>

		<div id="center">
			<div class="content">
				
				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>

				<div class="page-header">
	  				<h1 class="text-center">Modificar Tipo de Modelo de Máquina</h1>
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
					{!! Form::open(['route' => ['tiposModelosMaquinas.update',$tipoModelo],'method'=>'PUT','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

					<div class="form-group">
						{!! Form::label('COD_TIPO_MODELO','Código del tipo:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-3">
							{!! Form::text('COD_TIPO_MODELO',$tipoModelo->COD_TIPO_MODELO,['class' => 'form-control', 'readonly']) !!}
							<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('NOMBRE','Nombre del tipo:',array('class' => 'control-label col-md-2')) !!}
						<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
						<div class="col-md-5">
							{!! Form::text('NOMBRE',$tipoModelo->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del tipo', 'maxlength="50"']) !!}
							<span class = "help-block"></span>
						</div>
					</div>

					<!----------------------------------BOTONES POR SI SE QUIERE MODIFICAR------------------------------------------------------------>

					<form action="" class="form-inline">
						<div class="col-md-2 col-md-offset-2">
							<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
						</div>

						<div class="col-md-0 col-md-offset-0">
							<a href="{{ route('tiposModelosMaquinas.show', $tipoModelo->COD_TIPO_MODELO) }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
						</div>
					</form>

					<!------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->

					<br>
					<div class="form-group">
						<div class"col-md-0 col-md-offset-0">
							{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
						</div>
					</div>

					<form action="" class="form-inline" >
						
						<div class="col-md-0 col-md-offset-1">
							<a href="{{ route('tiposModelosMaquinas.edit', $tipoModelo->COD_TIPO_MODELO) }}" title="Modificar modelo de maquina" class="btn btn-warning disabled">Modificar Tipo de Modelo de Máquina</a>

							<a href="{{ route('tiposModelosMaquinas.destroy', $tipoModelo->COD_TIPO_MODELO) }}" title="Eliminar material" onclick="return confirm('¿Seguro que desea eliminar el modelo de la máquina ?')" class="btn btn-danger disabled">Eliminar Tipo de Modelo de Máquina</a>
								
							<a href="{{ route('tiposModelosMaquinas.create') }}" class="btn btn-success disabled"> Incorporar Tipo de Modelo de Máquina </a>

							<a href="{{ route('tiposModelosMaquinas.index') }}" class="btn btn-info disabled">Lista de Tipos de Tipos Modelo de Máquina</a>
						</div>

					</form>

					{!! Form::close() !!}
				</div>

			</div>
		</div>

@stop

@section('js')
	{!! Html::script('js/validacionTipoModMaq.js') !!}
@stop