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

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		
	</body>


</html>
