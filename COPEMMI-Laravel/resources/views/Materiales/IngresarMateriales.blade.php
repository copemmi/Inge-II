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
	  				<h1 class="text-center">Incorporar Material</h1>
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
					{!! Form::open(['route' => 'materiales.store','method'=>'POST','autocomplete'=>'off','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_MATERIAL','Código del material:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_MATERIAL',null,['class' => 'form-control','placeholder' => 'Código del material', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('option','Tipo de material:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_TIPO_MATERIAL" id="option">
									@foreach($tipo_material as $tm)
									<option value={{$tm->COD_TIPO_MATERIAL}}>{{$tm->NOMBRE}}</option>

									@endforeach
                                  
								</select>
                             
							</div>
							<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('tiposMateriales.create') }}">Incorporar tipo</a>
						</div>

						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del material:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del material', 'maxlength="50"']) !!}
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
							{!! Form::label('CANTIDAD','Cantidad:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('CANTIDAD',null,['class' => 'form-control','placeholder' => 'Cantidad', 'maxlength="6"']) !!}
								<span class = "help-block"></span> 
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('FECHA_INGRESO','Fecha de Ingreso:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-2">
								{!! Form::text('FECHA_INGRESO', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'readonly']) !!}
							</div>
						</div>

<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>

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
	{!! Html::script('js/validacionMat.js') !!}
@stop