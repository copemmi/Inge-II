@extends ('Menu')
@section ('contenido') 

<!--------------------------------------------------Formulario EN EL CENTRO------------------------------------------------------>

<div id="center">
	<div class="content">
		
		<div class="main-image">
			<div id="page-header">		
				<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
			</div>
		</div>

		<div class="page-header">
			<h1 class="text-center">Modificar Modelos de Máquinas</h1>
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

			{!! Form::open(['route' => ['modelosMaquinas.update',$modelos],'method'=>'PUT','class' => 'form-horizontal']) !!}
			{{csrf_field()}}
			{{ Form::token() }}

			<!-- Código --> 

			<div class="form-group">
				{!! Form::label('COD_MODELO','Código del modelo de máquina:',array('class' => 'control-label col-md-2')) !!}
				<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información --> 

				<div class="col-md-3">
				{!! Form::text('COD_MODELO',$modelos->COD_MODELO,['class' => 'form-control', 'readonly']) !!}
					<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<!-- Imágen -->

			<div class="form-group">
				{!! Form::label('COD_IMAGEN','Código de la imagen:',array('class' => 'control-label col-md-2')) !!}
				<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
				<div class="col-md-3">
					{!! Form::text('COD_IMAGEN',$modelos->COD_IMAGEN,['class' => 'form-control', 'readonly']) !!}
					<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('IMAGEN','Imagen:',array('class' => 'control-label col-md-2')) !!}
				<div class="col-md-6">
					<input type="file" id="IMAGEN" name="IMAGEN" size="35" accept="image/*">
						<p class="help-block">Máximo 2mb </p>
				</div>
			</div>

			<!-- Tipo del Modelo --> 

			<div class="form-group">
				{!! Form::label('option','Tipo:',array('class' => 'control-label col-md-2')) !!}
				<div class="col-md-3">
					<select class="form-control" name="COD_TIPO_MODELO" id="option">
						@foreach($tipo_modelo as $tm)
							<?php if(strcmp($modelos->COD_TIPO_MODELO, $tm->COD_TIPO_MODELO) == 0){ ?>
								<option selected="selected" value={{$tm->COD_TIPO_MODELO}}>{{$tm->NOMBRE}}</option>
									<?php }else{ ?>
								<option value={{$tm->COD_TIPO_MODELO}}>{{$tm->NOMBRE}}</option>
									<?php } ?>
						@endforeach
					</select> 
				</div>
				<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('tiposModelosMaquinas.create') }}">Incorporar tipo</a> <!-- Se debe arreglar la vista a los tipos de modelos -->
			</div>

			<!-- Nombre del Modelo --> 

			<div class="form-group">
				{!! Form::label('NOMBRE','Nombre del modelo de la máquina:',array('class' => 'control-label col-md-2')) !!}
				<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
				<div class="col-md-5">
				{!! Form::text('NOMBRE',$modelos->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del modelo de la máquina', 'maxlength="50"']) !!}
					<span class = "help-block"></span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
				<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
				<!-- Aquí sale el mensaje de ayuda e información -->

				<div class="col-md-8">
					{!! Form::textarea('CARACTERISTICAS',$modelos->CARACTERISTICAS,['class' => 'form-control','placeholder' => 'Características', 'maxlength="255"','size' => '10x4']) !!}
					<span class = "help-block"></span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('PRECIO','Precio:',array('class' => 'control-label col-md-2')) !!}
				<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->

				<div class="col-md-2">
					{!! Form::text('PRECIO',$modelos->PRECIO,['class' => 'form-control','placeholder' => 'Precio', 'maxlength="6"']) !!}
					<span class = "help-block"></span>
				</div>
			</div>

			<!--------------------------------------BOTONES POR SI SE QUIERE MODIFICAR------------------------------------------------------------>

			<form action="" class="form-inline">
				<div class="col-md-2 col-md-offset-2">
					<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
				</div>

				<div class="col-md-0 col-md-offset-0">
				<a href="{{ route('modelosMaquinas.show', $modelos->COD_MODELO) }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
				</div>
			</form>

			<!--------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->	

			<br>
			<div class="form-group">
				<div class"col-md-0 col-md-offset-0">
					{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
				</div>
			</div>	

			<form action="" class="form-inline" >
				<div class="col-md-0 col-md-offset-1">
					<a href="{{ route('modelosMaquinas.edit', $modelos->COD_MODELO) }}" class="btn btn-warning disabled">Modificar Modelo</a>

					<a href="{{ route('modelosMaquinas.destroy', $modelos->COD_MODELO) }}" onclick="return confirm('¿Seguro que desea eliminar la máquina ?')" class="btn btn-danger disabled">Eliminar Modelo</a>
								
					<a href="{{ route('modelosMaquinas.create') }}" class="btn btn-success disabled"> Incorporar Modelo de Máquina</a>

					<a href="{{ route('modelosMaquinas.index') }}" class="btn btn-info disabled">Lista de Modelos de Máquinas</a>
				</div>

			{!! Form::close() !!}

		</div>

	</div>
</div>

@stop

@section('js')
	{!! Html::script('js/validacionMod.js') !!}
@stop