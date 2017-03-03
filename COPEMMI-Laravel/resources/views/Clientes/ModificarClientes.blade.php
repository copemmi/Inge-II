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
	  				<h1 class="text-center">Modificar Clientes</h1>
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


					<!-- MODIFICAR CLIENTES -->

					<!--IDENTIFICACION -->


						<div class="container">
					{!! Form::open(['route' => ['clientes.update',$cliente],'method'=>'PUT','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('ID','Identificación del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 11 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información --> 
							<div class="col-md-3">
								{!! Form::text('ID',$cliente->ID,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<!--NOMBRE-->


						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('NOMBRE',$cliente->NOMBRE,['class' => 'form-control','readonly','placeholder' => 'Nombre del cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!--PRIMER APELLIDO-->

						<div class="form-group">
							{!! Form::label('PRIMER_APELLIDO','Primer Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('PRIMER_APELLIDO',$cliente->PRIMER_APELLIDO,['class' => 'form-control','readonly','placeholder' => 'Primer Apellido', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!--SEGUNDO APELLIDO-->

						<div class="form-group">
							{!! Form::label('SEGUNDO_APELLIDO','Segundo Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('SEGUNDO_APELLIDO',$cliente->SEGUNDO_APELLIDO,['class' => 'form-control','readonly','placeholder' => 'Segundo Apellido', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!--DIRECCION-->

						<div class="form-group">
							{!! Form::label('DIRECCION','Dirección del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('DIRECCION',$cliente->DIRECCION,['class' => 'form-control','placeholder' => 'Dirección del Cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!--TELEFONO-->

						<div class="form-group">
							{!! Form::label('TELEFONO','Teléfono del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 10 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('TELEFONO',$cliente->TELEFONO,['class' => 'form-control','placeholder' => 'Teléfono del Cliente', 'maxlength="10"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!--CORREO-->

						<div class="form-group">
							{!! Form::label('CORREO','Correo del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('CORREO',$cliente->CORREO,['class' => 'form-control','placeholder' => 'Nombre del Cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<!----------------------------------------------------------BOTONES POR SI SE QUIERE MODIFICAR------------------------------------------------------------>

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('clientes.show', $cliente->ID) }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
							</div>
						</form>

						<!----------------------------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->					
						<br>
						<div class="form-group">
							<div class"col-md-0 col-md-offset-0">
								{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
							</div>
						</div>

						<form action="" class="form-inline" >				
							
							<div class="col-md-0 col-md-offset-1">

								<a href="{{ route('clientes.edit', $cliente->ID) }}" class="btn btn-warning disabled">Modificar Cliente</a>

								<a href="{{ route('clientes.destroy', $cliente->ID) }}" onclick="return confirm('¿Seguro que desea eliminar este cliente ?')" class="btn btn-danger disabled">Eliminar Cliente</a>
								
								<a href="{{ route('clientes.create') }}" class="btn btn-success disabled"> Incorporar Cliente </a>

								<a href="{{ route('clientes.index') }}" class="btn btn-info disabled">Lista de Clientes</a>

							</div>

					{!! Form::close() !!}
				</div>

				</div>

@stop

@section('js')
	{!! Html::script('js/validacionCliente.js') !!}
@stop