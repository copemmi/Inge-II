@extends ('Menu')
@section ('contenido')


        <!-----------------------------FORMULARIO EN EL CENTRO-------------------------->

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
	  				<h1 class="text-center">Órdenes de Fabricación</h1>
				</div>
	
			{!! Form::open(['class' => 'form-horizontal']) !!}
			{{csrf_field()}}
			{{ Form::token() }}

				<div class="container">

					<!--Codigo de Orden de Fabricacion-->

					<div class="form-group">
						{!! Form::label('COD_ORDEN_FABRICACION','Órden de Fabricación:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							{!! Form::text('COD_ORDEN_FABRICACION',$orden_fabricacion->COD_ORDEN_FABRICACION,['class' => 'form-control','readonly']) !!}
						</div>
					</div>

					<!--Tipo de Estado-->

				<div class="form-group">
				{!!Form::label('COD_ESTADO', 'Estado de la Órden:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-2">
						@foreach($tipo_estado as $te)
									
							@php if(strcmp($orden_fabricacion->COD_ESTADO, $te->COD_ESTADO) == 0){ @endphp
								{!! Form::text('COD_ESTADO', $te->NOMBRE,['class'=>'form-control', 'readonly'])!!}

							@php } @endphp
						@endforeach
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
					</div>
			</div>

					<!--Tipo de Modelo-->

				<div class="form-group">
				{!!Form::label('COD_MODELO', 'Modelo de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-3">
						@foreach($modelo as $mod)
									
							@php if(strcmp($orden_fabricacion->COD_MODELO, $mod->COD_MODELO) == 0){ @endphp
								{!! Form::text('COD_MODELO', $mod->NOMBRE,['class'=>'form-control', 'readonly'])!!}

							@php } @endphp
						@endforeach
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
					</div>
				</div>

					<!-- Usuario-->
					<div class="form-group">
						{!! Form::label('option','Usuario:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							@foreach($tipo_usuario as $tu)
									
								@php if(strcmp($orden_fabricacion->COD_USUARIO, $tu->COD_USUARIO) == 0){ @endphp
								{!! Form::text('COD_USUARIO', $tu->NOMBRE,['class'=>'form-control', 'readonly'])!!}

								@php } @endphp
							@endforeach
							<span class="help-block"></span>
						</div>
					</div>

					
			<!--Cliente Identificacion --> 

					<div class="form-group">
						{!! Form::label('option','Identificación del Cliente:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							{!! Form::text('Identificación del Cliente', $orden_fabricacion->ID,['class'=>'form-control', 'readonly'])!!}
							<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
						</div>
					</div>

			<!--Nombre del cliente --> 
					<div class="form-group">
						{!! Form::label('option','Nombre del cliente:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							@foreach($cliente as $nombc)
									
								@php if(strcmp($orden_fabricacion->ID, $nombc->ID) == 0){ @endphp
								{!! Form::text('ID', $nombc->NOMBRE,['class'=>'form-control', 'readonly'])!!}

								@php } @endphp
							@endforeach
							<span class="help-block"></span>
						</div>
					</div>

			<!--Nombre de la empresa del cliente --> 
					<div class="form-group">
						{!! Form::label('option','Nombre de la empresa:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							@foreach($cliente as $nombe)
									
								@php if(strcmp($orden_fabricacion->ID, $nombe->ID) == 0){ @endphp
								{!! Form::text('ID', $nombe->NOMBRE_EMPRESA,['class'=>'form-control', 'readonly'])!!}

								@php } @endphp
							@endforeach
							<span class="help-block"></span>
						</div>
					</div>

			<!--Cedula de la empresa cliente --> 
					<div class="form-group">
						{!! Form::label('option','Cédula de la empresa:',array('class' => 'control-label col-md-2','readonly')) !!}
						<div class="col-md-2">
							@foreach($cliente as $nombcj)
									
								@php if(strcmp($orden_fabricacion->ID, $nombcj->ID) == 0){ @endphp
								{!! Form::text('ID', $nombcj->CEDULA_JURIDICA,['class'=>'form-control', 'readonly'])!!}

								@php } @endphp
							@endforeach
							<span class="help-block"></span>
						</div>
					</div>
					<!-- Fecha de Llegada-->


					<div class="form-group">
						{!! Form::label('FECHA_LLEGADA','Fecha de Llegada:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
							{!! Form::text('FECHA_LLEGADA',$orden_fabricacion->FECHA_LLEGADA, ['class' => 'form-control', 'readonly']) !!}
						</div>
					</div>

					<!-- Fecha de Entrega-->

					<div class="form-group">
						{!! Form::label('FECHA_ENTREGA','Fecha de Entrega:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
							{!! Form::text('FECHA_ENTREGA',$orden_fabricacion->FECHA_ENTREGA, ['class' => 'form-control', 'readonly']) !!}
						</div>
					</div>
				
				<!--PRECIO DE LA MAQUINA-->
				<div class="form-group">
				{!!Form::label('option', 'Precio de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-2">
						@foreach($modelo as $mod)
									
							@php if(strcmp($orden_fabricacion->COD_MODELO, $mod->COD_MODELO) == 0){ @endphp
								{!! Form::text('COD_MODELO', $mod->PRECIO,['class'=>'form-control', 'readonly'])!!}

							@php } @endphp
						@endforeach
						<span class="help-block"></span> <!--Mensaje que sale en caso de datos incorrectos-->
					</div>
				</div>

				<!--IMAGEN DE LA MAQUINA-->
				<div class="form-group">
							{!! Form::label('COD_IMAGEN','Imagén de la máquina:',array('class' => 'control-label col-md-2')) !!}
							
							<div class="col-md-2">
								
								<img src="/imagenes/ModelosMaquinas/{{$ima->IMAGEN}}" width=160; />
												 
							</div>
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
 											¿Está seguro de eliminar esta orden de fabricación? 
 										</div>
 
 										<div class="modal-footer">
 											<form> 
 												<a href="{{ route('ordenesFabricacion.destroy', $orden_fabricacion->COD_ORDEN_FABRICACION) }}" class="btn btn-default">Aceptar</a>
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

								<a href="{{ route('ordenesFabricacion.edit', $orden_fabricacion->COD_ORDEN_FABRICACION) }}" title="Modificar orden de fabricación" class="btn btn-warning">Modificar Orden de Fab.</a>

								<a href="#" title="Eliminar orden de fabricación" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Orden de Fab.</a>
								
								<a href="{{ route('ordenesFabricacion.create') }}" title="Incorporar orden de fabricación" class="btn btn-success"> Incorporar Orden de Fab. </a>

								<a href="{{ route('ordenesFabricacion.index') }}" title="Lista de ordenes de fabricación" class="btn btn-info">Lista de Ordenes de Fab.</a>

							</div>		

						</form>
		
			{!! Form::close() !!}
		</div>

@stop