<!DOCTYPE html>
<html>
	<head>
		<title>COPEMMI Información del Tipo de Material</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<!--------------------------------------------------------------------BARRA ARRIBA-------------------------------------------------------->
		<div id="topmenu">
			<div class="container">
					<ul class="topbar">
						<li> <a href="#" class="bt-menu"><span class="icono derecha fa fa-bars"></span></a></li>
						<li> <a class="lb-NOMCOP">COPEMMI: </a> </li>
						<li> <a class="lb-COP"> Control de Pedidos de Materiales para Máquinas Industriales </a> </li>
				  		<li> <a class="lb-US"> Leiman Sánchez </a></li>
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
		                    	<li><a href="{{ route('tiposMateriales.index') }}">Mantenimiento de Tipos de Materiales</a></li>
		                    </ul>    
	                    </li>

						<li><a href="#"><span class="icono izquierda fa fa-tablet"></span>Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				                <li><a href="#">Incorporar Modelos de Máquinas</a></li>
				                <li><a href="#">Visualizar Modelos de Máquinas</a></li>
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
							{!! Form::label('COD_TIPO_MATERIAL','Código del tipo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								{!! Form::text('COD_TIPO_MATERIAL',$tipoMaterial->COD_TIPO_MATERIAL,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del tipo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-5">
								{!! Form::text('NOMBRE',$tipoMaterial->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del tipo', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
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
 										¿Esta seguro de eliminar este tipo de material? 
 									</div>
 
 									<div class="modal-footer">
 										<form> 
 											<a href="{{ route('tiposMateriales.destroy', $tipoMaterial->COD_TIPO_MATERIAL) }}" class="btn btn-default">Aceptar</a>
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

								<a href="{{ route('tiposMateriales.edit', $tipoMaterial->COD_TIPO_MATERIAL) }}" title="Modificar material" class="btn btn-warning">Modificar Tipo de Material</a>

								<a href="#" title="Eliminar material" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Tipo de Material</a>
								
								<a href="{{ route('tiposMateriales.create') }}" class="btn btn-success"> Incorporar Tipo de Material </a>

								<a href="{{ route('tiposMateriales.index') }}" class="btn btn-info">Lista de Tipos de Material</a>

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
	{!! Html::script('js/validacion.js') !!}
	{{ Html::script('js/main.js') }}
</html>