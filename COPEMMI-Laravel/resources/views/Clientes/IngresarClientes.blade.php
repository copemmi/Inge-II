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
	  				<h1 class="text-center">Incorporar Cliente</h1>
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
					{!! Form::open(['route' => 'clientes.store','method'=>'POST','autocomplete'=>'off','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">


							<!--ID del Cliente-->

							{!! Form::label('ID','Identificación del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 11 de caracteres.Identificaciones de ejemplo: 2-0111-0222 o 1-1333-1444</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('ID',null,['class' => 'form-control','placeholder' => 'Identificacion del Cliente', 'maxlength="11"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>



							<!--Nombre del Cliente-->

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del Cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<!--Apellido1 del Cliente-->

						<div class="form-group">
							{!! Form::label('PRIMER_APELLIDO','Primer Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('PRIMER_APELLIDO',null,['class' => 'form-control','placeholder' => 'Primer Apellido', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<!--Apellido2 del Cliente-->

						<div class="form-group">
							{!! Form::label('SEGUNDO_APELLIDO','Segundo Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('SEGUNDO_APELLIDO',null,['class' => 'form-control','placeholder' => 'Segundo Apellido', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<!--Direccion del Cliente-->

						<div class="form-group">
							{!! Form::label('DIRECCION','Dirección del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 100 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('DIRECCION',null,['class' => 'form-control','placeholder' => 'Dirección', 'maxlength="100"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<!--Telefono del Cliente-->

						<div class="form-group">
							{!! Form::label('TELEFONO','Teléfono del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 10 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('TELEFONO',null,['class' => 'form-control','placeholder' => 'Teléfono del Cliente', 'maxlength="10"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<!--Correo del Cliente-->

						<div class="form-group">
							{!! Form::label('CORREO','Correo del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('CORREO',null,['class' => 'form-control','placeholder' => 'Correo del Cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						


						</div>

                             
						

<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
								
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('materiales.index') }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
							</div>

						</form>
						
					{!! Form::close() !!}
				</div>
				
			
@stop

@section('js')
	{!! Html::script('js/validacionCliente.js') !!}
@stop