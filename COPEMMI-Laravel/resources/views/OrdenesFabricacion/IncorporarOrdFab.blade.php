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
	  				<h1 class="text-center">Órdenes de Fabricación</h1>
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
							<a class="btn btn-success" input type="button" target="_blank" href="{{ route('modelosMaquinas.create') }}">Incorporar Modelo</a><!--Agregar la funcion href-->
						</div>


							<div class="form-group">
							{!! Form::label('option','Usuario:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_USUARIO" id="option">
									
									@foreach($tipo_usuario as $tm)
									<option value={{$tm->COD_USUARIO}}>{{$tm->NOMBRE}}</option>
									@endforeach

								</select>
                             
							</div>
						</div>

						<!--Identificacion del Cliente-->

						<div class="form-group">
							{!! Form::label('option','Identificación del Cliente:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="ID" id="ID">
									
									@foreach($cliente as $tm)
									<option value={{$tm->ID}}>{{$tm->ID}}</option>
									@endforeach	
								
								</select>
                             
							</div>
							<!-- Creación del Botón Modal que abre el formulario de los datos de los clientes-->		
 							<a class="btn btn-success" input type="button" data-toggle="modal" data-target="#addData">Incorporar Cliente</a>
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

								<input type="date" name="FECHA_ENTREGA" step="1" 
								min="<?php echo date('Y-m-d', strtotime(date("Y-m-d", time()))); ?>" 
								max="2020-12-31" value="<?php echo date('Y-m-d');?>">

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

						<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>	
			{!! Form::close() !!}

			</div>
		<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">		
 			<div class="modal-dialog" role="document">		
 					<div class="modal-content">

 <!-- Título de la Ventana Modal -->

 <div class="modal-header">		
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
 							<h4 class="modal-title" id="addLabel">Incorporar Cliente</h4>		
 						</div>		
 		
 							<!-- Formulario donde solicita los datos del tipo de Material -->		
 							<div class="modal-body">		
 		
 								<div class="form-group">		
 									<!--ID del Cliente-->		
 									{!! Form::label('ID','Identificación del Cliente:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 11 de caracteres.Identificaciones de ejemplo: 2-0111-0222 o 1-1333-1444</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('ID',null,['class' => 'form-control','placeholder' => 'Identificacion del Cliente', 'maxlength="11"']) !!}--> 		
										<input id="ID_CLIENTE" class="input" name="ID_CLIENTE" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->		
 									</div>		
 								</div>		
 								<br><br>		
 		
 								<!--Nombre del Cliente-->		
								<div class="form-group">		
 	
 									{!! Form::label('NOMBRE','Nombre del Cliente:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del Cliente', 'maxlength="50"']) !!}		
 										<span class = "help-block"></span>-->		
 										<input id="NOMB" class="input" name="NOMB" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->		
 									</div>		
 		
 								</div>		
								<br><br>		
 		
 								<!--Apellido1 del Cliente-->		
 								<div class="form-group">		
 								{!! Form::label('PRIMER_APELLIDO','Primer Apellido:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('PRIMER_APELLIDO',null,['class' => 'form-control','placeholder' => 'Primer Apellido', 'maxlength="50"']) !!}-->		
 										<input id="PRIMER_APE" class="input" name="PRIMER_APE" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
								<!--Apellido2 del Cliente-->		
 								<div class="form-group">		
 									{!! Form::label('SEGUNDO_APELLIDO','Segundo Apellido:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!!Form::text('SEGUNDO_APELLIDO',null,['class' => 'form-control','placeholder' => 'Segundo Apellido', 'maxlength="50"']) !!}-->		
 										<input id="SEGUNDO_APE" class="input" name="SEGUNDO_APE" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
 								<!--Direccion del Cliente-->		
 								<div class="form-group">		
 									{!! Form::label('DIRECCION','Dirección del Cliente:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 100 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('DIRECCION',null,['class' => 'form-control','placeholder' => 'Dirección', 'maxlength="100"']) !!}-->		
 								<input id="DIRE" class="input" name="DIRE" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
 								<!--Telefono del Cliente-->		
 								<div class="form-group">		
 									{!! Form::label('TELEFONO','Teléfono del Cliente:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 10 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 								<div class="col-md-5">		
 										<!--{!! Form::text('TELEFONO',null,['class' => 'form-control','placeholder' => 'Teléfono del Cliente', 'maxlength="10"']) !!}-->		
 										<input id="TELE" class="input" name="TELE" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
 								<!--Correo del Cliente-->		
 								<div class="form-group">		
 									{!! Form::label('CORREO','Correo del Cliente:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('CORREO',null,['class' => 'form-control','placeholder' => 'Correo del Cliente', 'maxlength="50"']) !!}-->		
 										<input id="COR" class="input" name="COR" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
								<!--Nombre Empresa-->		
 								<div class="form-group">		
 									{!! Form::label('NOMBRE_EMPRESA','Nombre de la Empresa:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('NOMBRE_EMPRESA',null,['class' => 'form-control','placeholder' => 'Nombre de la Empresa', 'maxlength="50"']) !!}-->		
 										<input id="NOM_EM" class="input" name="NOM_EM" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
 		
 								<!--Cedula Juridica-->		
 								<div class="form-group">		
 									{!! Form::label('CEDULA_JURIDICA','Cédula Jurídica de la Empresa:',array('class' => 'control-label col-md-5')) !!}		
 									<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 13 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 									<div class="col-md-5">		
 										<!--{!! Form::text('CEDULA_JURIDICA',null,['class' => 'form-control','placeholder' => 'Cédula Jurídica de la Empresa', 'maxlength="13"']) !!}-->		
 									<input id="CED_JURI" class="input" name="CED_JURI" type="text"  size="30" /><br />		
 										<span class = "help-block"></span>		
 									</div>		
 								</div>		
 								<br><br>		
		
 							</div>		
 		
 							<!-- Footer o parte donde vienen los botones -->		
 							<div class="modal-footer">		
 									
								<!--<button class="btn btn-success" input type="submit">Guardar<img src="{{asset('imagenes/save.ico')}}" width=20; action="javascript:close_this_popup()" /></button>-->		
 		
 								<button class="btn btn-success" input type="submit" id="guardarCambiosModal" onclick="guardaCambiosModal();" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>		
 									
 								<a href="{{ route('clientes.index') }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>		
 							</div>		
 					</div>		
 			</div>		
 			</div>		
 		
		</div>	


	
	
@stop
@section('js')
	
	{!! Html::script('js/cargarCliente.js') !!}
	{!! Html::script('js/validarOrdFab.js') !!}
@stop