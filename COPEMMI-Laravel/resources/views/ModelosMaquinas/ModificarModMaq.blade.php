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

			<div class="form-group">
				{!! Form::label('COD_MODELO','Código del modelo de máquina:',array('class' => 'control-label col-md-2')) !!}
				<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información --> 

				<div class="col-md-3">
					<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('option','Tipo:',array('class' => 'control-label col-md-2')) !!}
				<div class="col-md-3">
					<select class="form-control" name="COD_TIPO_MODELO" id="option">
						@foreach($tipo_modelo as $tm)

						@endforeach
					</select> 
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('NOMBRE','Nombre del modelo de la máquina:',array('class' => 'control-label col-md-2')) !!}
				<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
				<div class="col-md-5">
					<span class = "help-block"></span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
				<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
				<!-- Aquí sale el mensaje de ayuda e información -->

				<div class="col-md-8">
					<span class = "help-block"></span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('PRECIO','Precio:',array('class' => 'control-label col-md-2')) !!}
				<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->

				<div class="col-md-2">
					<span class = "help-block"></span>
				</div>
			</div>

			<!--------------------------------------BOTONES POR SI SE QUIERE MODIFICAR------------------------------------------------------------>

			<form action="" class="form-inline">
				<div class="col-md-2 col-md-offset-2">
					<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
				</div>

				<div class="col-md-0 col-md-offset-0">

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
				
				</div>
			</form>

		</div>

	</div>
</div>