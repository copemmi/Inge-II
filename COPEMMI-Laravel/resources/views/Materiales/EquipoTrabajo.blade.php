<!DOCTYPE html>
<html>
	<head>
		<title>COPPEMMI</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width-device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

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

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		<div class="content">

			<div class="main-image">
				<div id="page-header">		
					<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
				</div>
			</div>

			<div class="page-header">
				<h1 class="text-center">Equipo de Trabajo</h1>
			</div>

			<div class="container">
				
				<div class="form-group">
					<div class="col-md-8">
						<h4>Leiman Sánchez Muñoz.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4> 
						<h4>Gerente.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                	</div>
				</div>

				<div class="form-group">
					<div class="col-md-8"> 
						<h4>Edgar Sánchez Muñoz.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4>
						<h4>Gerente.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <h4>Daniel Sánchez Chacón.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4>
                        <h4>Encargado de Producción.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                    </div>
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
