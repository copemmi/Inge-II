<!DOCTYPE html>
<html>
	<head>
		<title>COPPEMI</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<!--------------------------------------------------------------------BARRA ARRIBA-------------------------------------------------------->
		<div id="topmenu">
			<div class="container">
					<ul class="topbar">
						<li> <a href="#" class="bt-menu"><span class="icono derecha fa fa-bars"></span></a></li>
						<li> <a class="lb-NOMCOP">COPEMMI: </a> </li>
						<li> <a class="lb-COP"> Control de Pedidos de Materiales para Máquinas Industriales </a> </li>
				  		<li> <a class="lb-US"> Leiman Sanchez </a></li>
				  		<li> <a><i class="icono derecha fa fa-user"></i></a></li>
				  		<li> <a href="#" class="bt-cerrar"> Cerrar Sesión</a></li>
					</ul>
			</div>
		</div>
	</head>

<!--------------------------------------------------------------------MENU IZQUIERDA-------------------------------------------------------->
	<body>
		<div id="leftMenu">
            <div class="sidebar"> 
               <nav>


	             	<ul class="menu">			
				        <li><a href="#"><span class="icono izquierda fa fa-wrench"></span>Materiales<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
		                    	<li><a href="{{ route('materiales.create') }}" target="_self">Incorporar Material</a></li>
		                    	<li><a href="{{ route('materiales.index') }}">Visualizar Materiales</a></li>
		                    	<li><a href="{{ route('tiposMateriales.index') }}">Mantenimiento Tipos de Material</a></li>
		                    </ul>    
	                    </li>

						<li><a href="#"><span class="icono izquierda fa fa-tablet"></span>Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				                <li><a href="{{ route('modelosMaquinas.create') }}">Incorporar Modelos de Máquinas</a></li>
				                <li><a href="#">Visualizar Modelo de Máquinas</a></li>
			                </ul> 
		                </li> 

		                <li><a href="#"><span class="icono izquierda fa fa-file-text"></span>Órdenes de Fabricación<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				            	<li><a href="#">Incorporar Órdenes de Fabricación</a></li>
				                <li><a href="#">Visualizar Órdenes de Fabricación</a></li>
			                </ul> 
		                </li> 

						<li><a href="#"><span class="icono izquierda fa fa-paper-plane"></span>Órdenes de Pedidos<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
			                    <li><a href="#">Visualizar Órdenes de Pedidos</a></li>
		                    </ul> 
		                </li> 

		                <li><a href="#"><span class="icono izquierda fa fa-users"></span>Acerca de<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
				            	<li><a href="#">Equipo Desarrollador</a></li>
				                <li><a href="#">Equipo de Trabajo</a></li>
			                </ul> 
		                </li>
		            </ul>
                </nav>
			</div>
        </div>

<!--------------------------------------------------------------------FORMULARIO EN EL CENTRO------------------------------------------------------>

		
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>


				<div class="page-header">
	  				<h1 class="text-center">Incorporar Modelo de Maquina</h1>
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
					{!! Form::open(['route' => 'modelosMaquinas.store','method'=>'POST','autocomplete'=>'off','class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_MODELO','Código del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_MODELO',null,['class' => 'form-control','placeholder' => 'Código del modelo', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('COD_IMAGEN','Imagen:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('COD_IMAGEN',null,['class' => 'form-control','placeholder' => 'Imagen', 'maxlength="10"']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('option','Tipo de modelo:',array('class' => 'control-label col-md-2')) !!}

							<div class="col-md-3">

								<select class="form-control" name="COD_TIPO_MODELO" id="option">
									@foreach($tipo_modelo as $md)
									<option value={{$md->COD_TIPO_MODELO}}>{{$md->NOMBRE}}</option>

									@endforeach
                                  
								</select>
                             
							</div>
							<a class="btn btn-success" input type="button" id="Guardar" target="_blank" href="{{ route('tiposMateriales.create') }}">Incorporar tipo</a>
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
							<div class="col-md-2">
								{!! Form::text('PRECIO',null,['class' => 'form-control','placeholder' => 'Precio', 'maxlength="6"']) !!} 
							</div>
						</div>

						<div class="form-group">
							<div class="text-center">
								{!! Form::label('MATERIALES','LISTA DE MATERIALES:') !!}
							</div>
						</div>

<!----------------------------------------------------------BOTONES PARA GUARDAR Y VOLVER------------------------------------------------------------>

						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>
								
							</div>

							<div class="col-md-0 col-md-offset-0">
								<a href="{{ route('modelosMaquinas.index') }}" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>
							</div>

						</form>

					{!! Form::close() !!}
				</div>
			</div>
		</div>	
	</body>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	{!! Html::style('css/bootstrap.min.css') !!}
	{{ Html::script('js/main.js') }}

</html>
