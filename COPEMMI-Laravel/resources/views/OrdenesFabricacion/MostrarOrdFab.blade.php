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
	  				<h1 class="text-center">Ordenes de Fabricación</h1>
				</div>
	
			{!! Form::open(['class' => 'form-horizontal']) !!}
			{{csrf_field()}}
			{{ Form::token() }}

				<div class="container">

					<!--Codigo de Orden de Fabricacion-->

					<div class="form-group">
						{!! Form::label('COD_ORDEN_FABRICACION','Código Orden Fabricación:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
							{!! Form::text('COD_ORDEN_FABRICACION',$OrdFab->COD_ORDEN_FABRICACION,['class' => 'form-control','readonly']) !!}
						</div>
					</div>

					<!--Tipo de Estado-->

					<div class="form-group">
						{!! Form::label('option','Tipo de Estado:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
  							<select class="form-control" name="ESTADO" id="option" disabled> 
									@foreach($tipo_estado as $te)
									
									<?php if(strcmp($OrdFab->COD_ESTADO, $te->COD_ESTADO) == 0){ ?>
												<option selected="selected" value={{$te->COD_ESTADO}}>{{$te->NOMBRE}}</option>
									<?php }else{ ?>
											<option value={{$te->COD_ESTADO}}>{{$te->NOMBRE}}</option>
										<?php } ?>
									@endforeach
							</select>
						</div>
					</div>


					<!--Tipo de Modelo-->

					<div class="form-group">
						{!! Form::label('option','Modelo de Máquina:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-3">
							<select class="form-control" name="MODELO DE MAQUINA" id="option" disabled> 
									@foreach($modelo as $tm)
									
									<?php if(strcmp($OrdFab->COD_MODELO, $tm->COD_MODELO) == 0){ ?>
												<option selected="selected" value={{$tm->COD_MODELO}}>{{$tm->NOMBRE}}</option>
									<?php }else{ ?>
											<option value={{$tm->COD_MODELO}}>{{$tm->NOMBRE}}</option>
										<?php } ?>
									@endforeach
							</select>
						</div>
					</div>

					<!-- Usuario-->
					<div class="form-group">
						{!! Form::label('option','Usuario:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-3">
							<select class="form-control" name="USUARIO" id="option" disabled> 
									@foreach($tipo_usuario as $tu)
									
									<?php if(strcmp($OrdFab->COD_USUARIO, $tu->COD_USUARIO) == 0){ ?>
												<option selected="selected" value={{$tu->COD_USUARIO}}>{{$tu->NOMBRE}}</option>
									<?php }else{ ?>
											<option value={{$tu->COD_USUARIO}}>{{$tu->NOMBRE}}</option>
										<?php } ?>
									@endforeach
							</select>
						</div>
					</div>

					
<!--Cliente Identificacion --> 

					<div class="form-group">
						{!! Form::label('option','Identificacion del Cliente:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-3">
							<select class="form-control" name="CLIENTE" id="option" disabled> 
									@foreach($id_cliente as $tc)
									
									<?php if(strcmp($OrdFab->ID, $tc->ID) == 0){ ?>
												<option selected="selected" value={{$tc->ID}}>{{$tc->ID}}</option>
									<?php }else{ ?>
											<option value={{$tc->ID}}>{{$tc->ID}}</option>
											
										<?php } ?>
									@endforeach
							</select>
						</div>
					</div>

					<!-- Fecha de Llegada-->

					<div class="form-group">
						{!! Form::label('FECHA_LLEGADA','Fecha de Llegada:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
							{!! Form::text('FECHA_LLEGADA',$OrdFab->FECHA_LLEGADA, ['class' => 'form-control', 'readonly']) !!}
						</div>
					</div>

					<!-- Fecha de Entrega-->

					<div class="form-group">
						{!! Form::label('FECHA_ENTREGA','Fecha de Entrega:',array('class' => 'control-label col-md-2')) !!}
						<div class="col-md-2">
							{!! Form::text('FECHA_ENTREGA',$OrdFab->FECHA_ENTREGA, ['class' => 'form-control', 'readonly']) !!}
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
 												<a href="{{ route('ordenesFabricacion.destroy', $OrdFab->COD_ORDEN_FABRICACION) }}" class="btn btn-default">Aceptar</a>
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

								<a href="{{ route('ordenesFabricacion.edit', $OrdFab->COD_ORDEN_FABRICACION) }}" title="Modificar orden de fabricación" class="btn btn-warning">Modificar Orden de Fab.</a>

								<a href="#" title="Eliminar orden de fabricación" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Orden de Fab.</a>
								
								<a href="{{ route('ordenesFabricacion.create') }}" title="Incorporar orden de fabricación" class="btn btn-success"> Incorporar Orden de Fab. </a>

								<a href="{{ route('ordenesFabricacion.index') }}" title="Lista de ordenes de fabricación" class="btn btn-info">Lista de Ordenes de Fab.</a>

							</div>		

						</form>
		
			{!! Form::close() !!}
		</div>

@stop
