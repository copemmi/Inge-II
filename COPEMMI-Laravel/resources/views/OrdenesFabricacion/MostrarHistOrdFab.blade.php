@extends ('Menu')
@section ('contenido')

<!---------------------------------------------------Formulario en el centro------------------------------------------>

<div id="center">
	<div class="content">
		<div class="main-image">
			<div id="page-header">		
			  	<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
			</div>
		</div>

		@if(session()->has('flash_notification.message'))
    		<div class="alert alert-{{ session('flash_notification.level') }}">
       			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{!!session('flash_notification.message')!!}
    		</div>
		@endif

		<div class="page-header">
	  	<h1 class="text-center">Información de la orden de fabricación terminada</h1>
		</div>

		<div class="container">
			{!!Form::open(['class'=>'form-horizontal'])!!}
			{{csrf_field()}}
			{{Form::token()}}

			<div class="form-group">
				{!!Form::label('CODIGO', 'Código de la orden de fabricación:', array('class' => 'control-label col-md-2'))!!}
				<div class="col-md-2">
					{!!Form::text('CODIGO',$historial_orden_fabricion->COD_ORDEN_FABRICACION,['class' => 'form-control', 'readonly'])!!}
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('CODIGOMODELO', 'Código del modelo:', array('class' => 'control-label col-md-2'))!!}
				<div class="col-md-2">
					{!! Form::text('CODIGOMODELO', $historial_orden_fabricion->COD_MODELO,['class'=>'form-control', 'readonly'])!!}
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('CEDULA', 'Cédula del cliente:', array('class' => 'control-label col-md-2'))!!}
				<div class="col-md-2">
					{!! Form::text('CEDULA', $historial_orden_fabricion->ID,['class'=>'form-control', 'readonly'])!!}
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('NOMBRE','Nombre del cliente:', array('class'=>'control-label col-md-2'))!!}
				<div class="col-md-3">
					{!!Form::text('NOMBRE',$clientes->NOMBRE." ".$clientes->PRIMER_APELLIDO." ".$clientes->SEGUNDO_APELLIDO,['class'=>'form-control', 'readonly'])!!}
						<span class = "help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('CEDULA', 'Teléfono del cliente:', array('class'=>'control-label col-md-2'))!!}
				<div class="col-md-2">
					{!!Form::text('CEDULA', $clientes->TELEFONO, ['class'=>'form-control', 'readonly'])!!}
					<!--variableClientes es la variable definida en el controlador que tiene toda la tabla de la BD-->
						<span class = "help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('FECHALLEGADA', 'Fecha de llegada:', array('class'=>'control-label col-md-2'))!!}
					<div class="col-md-2">
					{!!Form::text('FECHALLEGADA', $historial_orden_fabricion->FECHA_LLEGADA, ['class' => 'form-control', 'readonly'])!!}
						<span class = "help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('FECHAENTREGA', 'Fecha de entrega:', array('class'=>'control-label col-md-2'))!!}
					<div class="col-md-2">
					{!! Form::text('FECHAENTREGA', $historial_orden_fabricion->FECHA_ENTREGA, ['class'=>'form-control', 'readonly']) !!}
						<span class = "help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
				</div>
			</div>
			{!! Form::close()!!}
		</div>
		<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>	
	</div>
</div>	
@stop