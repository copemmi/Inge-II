@extends ('Menu')
@section ('contenido')

<!--------------------------------------------------------------------FORMULARIO EN EL CENTRO------------------------------------------------------>


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
	  				<h1 class="text-center">Información del Material</h1>
				</div>

	
				<div class="container">
					{!! Form::open(['class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('CODIGO','Código del material:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('CODIGO',$material->COD_MATERIAL,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('option','Tipo de material:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
									@foreach($tipo_material as $tm)
										@php if(strcmp($material->COD_TIPO_MATERIAL, $tm->COD_TIPO_MATERIAL) == 0){ @endphp
									{!! Form::text('COD_TIPO_MATERIAL', $tm->NOMBRE,['class'=>'form-control', 'readonly'])!!}
										@php } @endphp
									@endforeach


							</div>
						</div>

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del material:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',$material->NOMBRE,['class' => 'form-control','placeholder' => 'Ingrese el nombre del material', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-5">
								{!! Form::textarea('CARACTERISTICAS',$material->CARACTERISTICAS,['class' => 'form-control','placeholder' => 'Ingrese las características', 'maxlength="255"','size' => '10x4', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CANTIDAD','Cantidad:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('CANTIDAD',$material->CANTIDAD,['class' => 'form-control', 'maxlength="6"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CANTIDADMINIMA','Cantidad mínima:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('CANTIDADMINIMA',$material->CANTIDADMINIMA,['class' => 'form-control', 'maxlength="6"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHAINGRESO','Fecha de Ingreso:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('FECHAINGRESO', $material->FECHA_INGRESO, ['class' => 'form-control', 'readonly']) !!}
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
 											¿Está seguro de eliminar este material? 
 										</div>
 
 										<div class="modal-footer">
 											<form> 
 												<a href="{{ route('materiales.destroy', $material->COD_MATERIAL) }}" class="btn btn-default">Aceptar</a>
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
								@php if(Auth::user()->privilegio==1){ @endphp
								<a href="{{ route('materiales.edit', $material->COD_MATERIAL) }}" title="Modificar material" class="btn btn-warning">Modificar Material</a>

								<a href="#" title="Eliminar material" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Material</a>
								
								<a href="{{ route('materiales.create') }}" class="btn btn-success"> Incorporar Material </a>
								@php} @endphp
								<a href="{{ route('materiales.index') }}" class="btn btn-info">Lista de Materiales</a>

							</div>		

						</form>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
	

@stop