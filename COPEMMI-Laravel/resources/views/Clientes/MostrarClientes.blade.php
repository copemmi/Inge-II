@extends ('Menu')
@section ('contenido')

<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>

				@if (session()->has('flash_notification.message'))
    				<div class="alert alert-{{ session('flash_notification.level') }}">
       					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        				{!! session('flash_notification.message') !!}
    				</div>
				@endif

				<div class="page-header">
	  				<h1 class="text-center">Información del Cliente</h1>
				</div>


				<div class="container">
					{!! Form::open(['class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

					<!-- MOSTRAR IDENTIFICACION -->

						<div class="form-group">
							{!! Form::label('ID','Identificación del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 11 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('ID',$cliente->ID,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<!-- MOSTRAR NOMBRE -->

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('NOMBRE',$cliente->NOMBRE,['class' => 'form-control','placeholder' => 'Ingrese el nombre del cliente', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!-- PRIMER APELLIDO -->

						<div class="form-group">
							{!! Form::label('PRIMER_APELLIDO','Primer Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('PRIMER_APELLIDO',$cliente->PRIMER_APELLIDO,['class' => 'form-control','placeholder' => 'Ingrese el apellido del cliente', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!-- SEGUNDO APELLIDO -->

						<div class="form-group">
							{!! Form::label('SEGUNDO_APELLIDO','Segundo Apellido:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('SEGUNDO_APELLIDO',$cliente->SEGUNDO_APELLIDO,['class' => 'form-control','placeholder' => 'Ingrese el segundo apellido del cliente', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!-- DIRECCION -->
						<div class="form-group">
							{!! Form::label('DIRECCION','Dirección del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('DIRECCION',$cliente->DIRECCION,['class' => 'form-control','placeholder' => 'Ingrese la dirección del cliente', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<!-- TELEFONO -->

						<div class="form-group">
							{!! Form::label('TELEFONO','Teléfono del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 10 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('TELEFONO',$cliente->TELEFONO,['class' => 'form-control','placeholder' => 'Ingrese el teléfono del cliente', 'maxlength="10"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<!-- CORREO -->

						<div class="form-group">
							{!! Form::label('CORREO','Correo del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('CORREO',$cliente->CORREO,['class' => 'form-control','placeholder' => 'Ingrese el correo del cliente', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!-- NOMBRE EMPRESA-->

						<div class="form-group">
							{!! Form::label('NOMBRE_EMPRESA','Nombre de la Empresa:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('NOMBRE_EMPRESA',$cliente->NOMBRE_EMPRESA,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la Empresa', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<!-- CEDULA JURIDICA -->

						<div class="form-group">
							{!! Form::label('CEDULA_JURIDICA','Cédula Jurídica de la Empresa:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('CEDULA_JURIDICA',$cliente->CEDULA_JURIDICA,['class' => 'form-control','placeholder' => 'Ingrese la cédula jurídica', 'maxlength="13"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>



						<!---------------------------------------------------------------Mensaje de confirmacion para eliminar---------------------------------------------->
							<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
 								<div class="modal-dialog" role="document">
 									<div class="modal-content">
 										<div class="modal-header">
 											<button type="button" class="close" data-dismiss="modal">
 												<span aria-hidden="true">&times;</span>
 												<span class="sr-only">Cerrar</span>
 											</button>
 											<h4 class="modal-title" id="ModalLabel">Atención</h4>
										</div>

 										<div class="modal-body">
 											¿Está seguro de eliminar este cliente? 
 										</div>
 
 										<div class="modal-footer">
 											<form> 
 												<a href="{{ route('clientes.destroy', $cliente->ID) }}" class="btn btn-default">Aceptar</a>
 												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
 											</form>
 										</div>
 									</div>
 								</div>
 							</div>



 							<!----------------------------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->					
						<br>
						<div class="form-group">
							<div class"col-md-0 col-md-offset-0">
								{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
							</div>
						</div>

						<form action="" class="form-inline" >				
							
							<div class="col-md-0 col-md-offset-1">

								<a href="{{ route('clientes.edit', $cliente->ID) }}" title="Modificar Cliente" class="btn btn-warning">Modificar Cliente</a>

								<a href="#" title="Eliminar cliente" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Cliente</a>
								
								<a href="{{ route('clientes.create') }}" class="btn btn-success"> Incorporar Cliente </a>

								<a href="{{ route('clientes.index') }}" class="btn btn-info">Lista de Clientes</a>

							</div>		

						</form>
					{!! Form::close() !!}
				</div>
			</div>


</div>

@stop