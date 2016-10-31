@extends ('Menu')
@section ('contenido')


        <!-----------------------------FORMULARIO EN EL CENTRO-------------------------->

        <div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>


				<div class="page-header">
	  				<h1 class="text-center">Ordenes de Fabricacion</h1>
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

			<!--Cambiar el materiales.store-->

			{!! Form::open(['route' => 'ordenesFabricacion.store','method'=>'POST','autocomplete'=>'off','class' => 'form-horizontal']) !!}
			{{csrf_field()}}
			{{ Form::token() }}

			<!--Codigo de Orden de Fabricacion-->


<!--			<div class="form-group">
							{!! Form::label('COD_ORDEN_FABRICACION','Código Orden Fabricacion:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<!-- <div class="col-md-3">
								{!! Form::text('COD_ORDEN_FABRICACION',null,['class' => 'form-control','placeholder' => 'Código Orden Fabricacion', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
				<!--			</div>
						</div>

						<!--Tipo de Estado-->

						<div class="form-group">
							{!! Form::label('option','Tipo de Estado:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_ESTADO" id="option">
									
									@foreach($tipo_estado as $tm)
									<option value={{$tm->COD_ESTADO}}>{{$tm->NOMBRE}}</option>
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
									<option value={{$tm->COD_MODELO}}>{{$tm->NOMBRE}}</option>
									@endforeach
						
								</select>
                             
							</div>
							<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('modelosMaquinas.create') }}">Incorporar Modelo</a><!--Agregar la funcion href-->
						</div>


							<div class="form-group">
							{!! Form::label('option','Codigo Usuario:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_USUARIO" id="option">
									
									@foreach($tipo_usuario as $tm)
									<option value={{$tm->COD_USUARIO}}>{{$tm->NOMBRE}}</option>
									@endforeach

								</select>
                             
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('NOMBRE_CLIENTE','Nombre del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-3"><!-- Aquí sale el mensaje de ayuda e información -->
								{!! Form::text('NOMBRE_CLIENTE',null,['class' => 'form-control','placeholder' => 'Nombre del Cliente', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

							<div class="form-group">
							{!! Form::label('CEDULA_CLIENTE','Cedula del Cliente:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 11 caracteres, Con Formato 1-0111-0111.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-3"><!-- Aquí sale el mensaje de ayuda e información -->
								{!! Form::text('CEDULA_CLIENTE',null,['class' => 'form-control','placeholder' => 'Cedula del Cliente', 'maxlength="11"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_LLEGADA','Fecha de Llegada:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								{!! Form::text('FECHA_LLEGADA', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'readonly']) !!}
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_ENTREGA','Fecha de Entrega:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-5">
								<!--{!! Form::text('FECHA_ENTREGA', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}-->

								<input type="date" name="FECHA_ENTREGA" step="1" min="2016-01-01" max="2020-12-31" value="<?php echo date('Y-m-d');?>">

							</div>
						</div>

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
		</div>


	
	
@stop


@section('js')
	{!! Html::script('js/validarOrdFab.js') !!}
@stop