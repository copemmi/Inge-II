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
	
			{!! Form::open(['route' => ['ordenesFabricacion.update',$OrdFab->COD_ORDEN_FABRICACION],'method'=>'PUT','class' => 'form-horizontal']) !!}
			{{csrf_field()}}
			{{ Form::token() }}

				<div class="container">

						<!--Codigo de Orden de Fabricacion-->

						<div class="form-group">
							{!! Form::label('COD_ORDEN_FABRICACION','Código Orden Fabricacion:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('COD_ORDEN_FABRICACION',$OrdFab->COD_ORDEN_FABRICACION,['class' => 'form-control','readonly']) !!}
								<span class = "help-block"></span> 
							</div>
						</div>

						<!--Tipo de Estado-->

						<div class="form-group">
							{!! Form::label('COD_ESTADO','Tipo de Estado:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
  								<select class="form-control" name="COD_ESTADO" id="option"> 
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
							{!! Form::label('option','Modelo de Maquina:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								<select class="form-control" name="COD_MODELO" id="option"> 
									@foreach($modelo as $tm)
									
									<?php if(strcmp($OrdFab->COD_MODELO, $tm->COD_MODELO) == 0){ ?>
												<option selected="selected" value={{$tm->COD_MODELO}}>{{$tm->NOMBRE}}</option>
									<?php }else{ ?>
											<option value={{$tm->COD_MODELO}}>{{$tm->NOMBRE}}</option>
										<?php } ?>
									@endforeach
								</select>
							</div>
							<a class="btn btn-success" input type="button" target="_blank" href="{{ route('modelosMaquinas.create') }}">Incorporar Modelo</a><!--Agregar la funcion href-->
						</div>


							<div class="form-group">
							{!! Form::label('option','Codigo Usuario:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								<select class="form-control" name="COD_USUARIO" id="option"> 
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

						<div class="form-group">
							{!! Form::label('option','Identificacion del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
  								<select class="form-control" name="ID" id="option"> 
									@foreach($id_cliente as $te)
									
									<?php if(strcmp($OrdFab->ID, $te->ID) == 0){ ?>
												<option selected="selected" value={{$te->ID}}>{{$te->ID}}</option>
									<?php }else{ ?>
											<option value={{$te->ID}}>{{$te->ID}}</option>
										<?php } ?>
									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_LLEGADA','Fecha de Llegada:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('FECHA_LLEGADA', $OrdFab->FECHA_LLEGADA, ['class' => 'form-control', 'readonly']) !!}
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_ENTREGA','Fecha de Entrega:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('FECHA_ENTREGA', $OrdFab->FECHA_ENTREGA, ['class' => 'form-control', 'readonly']) !!}

								<!--<input type="date" name="FECHA_ENTREGA" step="1" min="2016-01-01" max="2020-12-31" value="<?php echo date('Y-m-d');?>">-->

							</div>
						</div>
				</div>

<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
								
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('ordenesFabricacion.show', $OrdFab->COD_ORDEN_FABRICACION) }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
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

								<a href="{{ route('ordenesFabricacion.edit', $OrdFab->COD_ORDEN_FABRICACION) }}" title="Modificar orden de fabricación" class="btn btn-warning disabled">Modificar Orden de Fab.</a>

								<a href="#" title="Eliminar orden de fabricación" data-toggle="modal" data-target="#ventana" class="btn btn-danger disabled">Eliminar Orden de Fab.</a>
								
								<a href="{{ route('ordenesFabricacion.create') }}" title="Incorporar orden de fabricación" class="btn btn-success disabled"> Incorporar Orden de Fab. </a>

								<a href="{{ route('ordenesFabricacion.index') }}" title="Lista de ordenes de fabricación" class="btn btn-info disabled">Lista de Ordenes de Fab.</a>

							</div>		

						</form>
		
			{!! Form::close() !!}
		</div>

@stop

@section('js')
	{!! Html::script('js/validarOrdFab.js') !!}
@stop