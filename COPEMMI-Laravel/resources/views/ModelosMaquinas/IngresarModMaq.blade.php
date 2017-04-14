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
	  				<h1 class="text-center">Incorporar Modelo de Máquina</h1>
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
					{!! Form::open(['route' => 'modelosMaquinas.store','method'=>'POST','autocomplete'=>'off','files'=>'true','class' => 'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_MODELO','Código del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_MODELO',null,['class' => 'form-control','placeholder' => 'Código del modelo', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('COD_IMAGEN','Código de la imagen:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_IMAGEN',null,['class' => 'form-control','placeholder' => 'Código de la imagen', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('IMAGEN','Imagen:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-6">
								{{Form::file('IMAGEN', ['id'=>'file','size'=>'35', 'accept' =>'image/*'])}}
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('option','Tipo de modelo:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_TIPO_MODELO" id="COD_TIPO_MODELO" >
									@foreach($tipo_modelo as $md)
									<option value={{$md->COD_TIPO_MODELO}}>{{$md->NOMBRE}}</option>

									@endforeach
                                  
								</select>
                             
							</div>
							<!--<a class="btn btn-success" input type="button" target="_blank" href="{{ route('tiposMateriales.create') }}">Incorporar tipo</a>-->
							<!-- Creación del Botón Modal que abre el formulario de los datos de tipos de materiales-->
							<a class="btn btn-success" input type="button" data-toggle="modal" data-target="#addData">Incorporar tipo</a>		
						</div>


						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del modelo', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-8"><!-- Aquí sale el mensaje de ayuda e información -->
								{!! Form::textarea('CARACTERISTICAS',null,['class' => 'form-control','placeholder' => 'Características', 'maxlength="255"','size' => '10x4']) !!}
								<span class = "help-block"></span>
							</div>

						</div>

						<div class="form-group">
							{!! Form::label('PRECIO','Precio:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('PRECIO',null,['class' => 'form-control','placeholder' => 'Precio', 'maxlength="9"']) !!} 
								<span class = "help-block"></span>
							</div>
						</div>


<!---------------------------------------------------DETALLE MODELO------------------------------------------------------------------------------>
						<div class= "col-md-offset-2">
						<span style="color:red;font-weight:bold;font-size:12pt" class = "msj-error glyphicon glyphicon-remove has-error"></span>
						</div>

						<div class="col-md-10 col-md-offset-0">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-9">
										<div class="form-group">
											<label>Lista de Materiales</label>
											<select name="pidmaterial" class="form-control selectpicker" id="pidmaterial" data-live-search="true">
												@foreach($material as $tm)
												<option value={{$tm->COD_MATERIAL}}>{{$tm->NOMBRE}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
										
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="cantidad">Cantidad</label>
											<input type="number" min="1" name="pcantidad" id="pcantidad" class="form-control"
											placeholder="Cantidad">
										</div>
									</div>

									<div class="col-lg-1 col-sm-3 col-md-3 col-xs-12">
										
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group">
											<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
										</div>
									</div>

									<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
										
									</div>

									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles" class="table width=30 table-striped table-bordered table-condensed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Opciones</th>
												<th>Materiales</th>
												<th>Cantidad</th>
											</thead>
											<tfoot>
												
											</tfoot>
											<tbody>
												
											</tbody>
										</table>
									</div>

								</div>
							</div>
						</div>
					</div><!--cierre de container-->


<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>
	

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-3">
								<button class="btn btn-success" input type="submit" name="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
								
							</div>

							<div class="col-md-0 col-md-offset-1">
								<a href="{{ route('modelosMaquinas.index') }}" class="btn btn-danger" id="Cancelar"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
							</div>

						</form>
 						<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>	
					{!! Form::close() !!}

<!-- Ventana Modal que abre el formulario de Incorporar Materiales --> 		
 			<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">		
 				<div class="modal-dialog" role="document">		
 					<div class="modal-content">		
 		
 						<!-- Título de la Ventana Modal -->		
 						<div class="modal-header">		
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
 							<h4 class="modal-title" id="addLabel">Incorporar Tipo de Modelo de Máquina</h4>		
 						</div>		
 						
 		
						<!-- Formulario donde solicita los datos del tipo de Material -->		
 						<div class="modal-body">		
 									
 							<div class="form-group">		
 		
 								{!! Form::label('COD_TIPO_MODELO','Código del tipo:',array('class' => 'control-label col-md-4')) !!}		
 								<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información --> 		
 		
 								<div class="col-md-4">		
 									<input id="COD_TIPO" class="input" name="COD_TIPO" type="text"  size="30" /><br />		
 									<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->		
 								</div>		
 	
							</div>		
 		
 								<br>		
 		
 							<div class="form-group"  id="cod_tipo">		
 		
 								{!! Form::label('NOMBRE','Nombre del tipo:',array('class' => 'control-label col-md-4')) !!}		
								<!--<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>--><!-- Aquí sale el mensaje de ayuda e información -->		
 										
 								<div class="col-md-4">		
 									<input id="NOMB_TIPO" class="input" name="COD_TIPO" type="text"  size="30" /><br />		
 									<span class = "help-block"></span>		
 								</div>		
 		
 							</div>		
 		
 						</div>		
 		
 						<!-- Footer o parte donde vienen los botones -->		
 						<div class="modal-footer">		
 									
 							<!--<button class="btn btn-success" input type="submit">Guardar<img src="{{asset('imagenes/save.ico')}}" width=20; action="javascript:close_this_popup()" /></button>-->		
 		
 						<button class="btn btn-success" input type="submit" id="guardarCambiosModal" onclick="guardaCambiosModal();" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>		
 									
 							<a href="{{ route('modelosMaquinas.index') }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>		
 		
 						</div>		
 					</div>		
 				</div>

 			</div>		
  		</div><!--cierre de content-->
@stop


@section('js')
	{!! Html::script('js/validacionMod.js') !!}
	{!! Html::script('js/validacionDetalleMod.js') !!}
	{!! Html::script('js/cargarTipoMod.js') !!}
@stop

