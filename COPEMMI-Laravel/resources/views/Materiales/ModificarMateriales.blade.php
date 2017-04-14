@extends ('Menu')
@section ('contenido')


<!--------------------------------------------------Formulario EN EL CENTRO------------------------------------------------------>


		<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>


				<div class="page-header">
	  				<h1 class="text-center">Modificar Material</h1>
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
					{!! Form::open(['route' => ['materiales.update',$material],'method'=>'PUT','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_MATERIAL','Código del material:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información --> 
							<div class="col-md-3">
								{!! Form::text('COD_MATERIAL',$material->COD_MATERIAL,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('option','Tipo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								<select class="form-control" name="COD_TIPO_MATERIAL" id="option"> 
									@foreach($tipo_material as $tm)
									<?php if(strcmp($material->COD_TIPO_MATERIAL, $tm->COD_TIPO_MATERIAL) == 0){ ?>
												<option selected="selected" value={{$tm->COD_TIPO_MATERIAL}}>{{$tm->NOMBRE}}</option>
									<?php }else{ ?>
											<option value={{$tm->COD_TIPO_MATERIAL}}>{{$tm->NOMBRE}}</option>
										<?php } ?>
									@endforeach
								</select>
							</div>
							<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('tiposMateriales.create') }}">Incorporar tipo</a>
						</div>

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del material:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',$material->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del material', 'maxlength="50"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-8">
								{!! Form::textarea('CARACTERISTICAS',$material->CARACTERISTICAS,['class' => 'form-control','placeholder' => 'Características', 'maxlength="255"','size' => '10x4']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CANTIDAD','Cantidad:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('CANTIDAD',$material->CANTIDAD,['class' => 'form-control','placeholder' => 'Cantidad', 'maxlength="6"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('CANTIDADMINIMA','Cantidad mínima:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('CANTIDADMINIMA',$material->CANTIDADMINIMA,['class' => 'form-control','placeholder' => 'Cantidad mínima', 'maxlength="6"']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_INGRESO','Fecha de Ingreso:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('FECHA_INGRESO', $material->FECHA_INGRESO, ['class' => 'form-control', 'readonly']) !!}
							</div>
						</div>

<!----------------------------------------------------------BOTONES POR SI SE QUIERE MODIFICAR------------------------------------------------------------>

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('materiales.show', $material->COD_MATERIAL) }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
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

								<a href="{{ route('materiales.edit', $material->COD_MATERIAL) }}" class="btn btn-warning disabled">Modificar Material</a>

								<a href="{{ route('materiales.destroy', $material->COD_MATERIAL) }}" onclick="return confirm('¿Seguro que desea eliminar el material ?')" class="btn btn-danger disabled">Eliminar Material</a>
								
								<a href="{{ route('materiales.create') }}" class="btn btn-success disabled"> Incorporar Material </a>

								<a href="{{ route('materiales.index') }}" class="btn btn-info disabled">Lista de Materiales</a>
								
							</div>
						<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                		</div>
					{!! Form::close() !!}
					
				</div>
			</div>

@stop

@section('js')
	{!! Html::script('js/validacionMat.js') !!}
@stop