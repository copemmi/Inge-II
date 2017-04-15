<!DOCTYPE html>
<html>
	<head>
		<title>COPEMMI</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		{!! Html::style('css/bootstrap-select.min.css') !!}
		{!! Html::style('css/bootstrap.min.css') !!}
		

<!--------------------------------------------------------------------BARRA ARRIBA-------------------------------------------------------->
		<div id="topmenu">
			<div class="containertop">
					<ul class="topbar">
						<li> <a href="#" class="bt-menu"><span class="icono derecha fa fa-bars"></span></a></li>
						<li> <a class="lb-NOMCOP">COPEMMI: </a> </li>
						<li> <a class="lb-COP"> Control de Pedidos de Materiales para Máquinas Industriales </a> </li>
				  		<li> <a class="lb-US"> {{Auth::user()->name}} </a></li>
				   		<li> <a><i class="icono derecha fa fa-user"></i></a></li>
				  		<li> <a href="{{url('/logout')}}" class="bt-cerrar"> Cerrar Sesión</a></li>
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
				        <li><a href="#"><img src="{{asset('imagenes/IconosMenu/materiales.png')}}"/> Materiales<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
		                    	@php if(Auth::user()->privilegio==1){ @endphp
		                    	<li><a href="{{ route('materiales.create') }}" target="_self">Incorporar Material</a></li>
		                    	@php } @endphp	
		                    	<li><a href="{{ route('materiales.index') }}">Visualizar Materiales</a></li>
		                    	<li><a href="{{ route('tiposMateriales.index') }}">Mantenimiento Tipos de Material</a></li>
		                    </ul>    
	                    </li>

						<li><a href="#"><img src="{{asset('imagenes/IconosMenu/modelosMaquinas.png')}}"/> Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
			                	@php if(Auth::user()->privilegio==1){ @endphp
				                <li><a href="{{ route('modelosMaquinas.create') }}">Incorporar Modelos de Máquinas</a></li>
				                @php} @endphp
				                <li><a href="{{ route('modelosMaquinas.index' ) }}">Visualizar Modelos de Máquinas</a></li>
				                <li><a href="{{ route('tiposModelosMaquinas.index' ) }}">Mantenimiento de Tipos de Modelos de Máquinas</a></li> <!--cambiar ruta-->
			                </ul> 
		                </li> 

		                <li><a href="#"><img src="{{asset('imagenes/IconosMenu/ordenesFabricacion.png')}}"/> Órdenes de Fabricación<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
			                	@php if(Auth::user()->privilegio==1){ @endphp
				            	<li><a href="{{ route('ordenesFabricacion.create') }}">Incorporar Órdenes de Fabricación</a></li>
				            	@php} @endphp
				                <li><a href="{{route('ordenesFabricacion.index')}}">Visualizar Órdenes de Fabricación</a></li>
				                <li><a href="{{ route('historialOrdenesFabricacion.index') }}">Historial de Órdenes de Fabricación</a></li>
				                <li><a href="{{ route('historialOrdenesFabricacion.terminadas')}}">Últimas Órdenes de Fabricación Terminadas</a></li>
			                </ul> 
		                </li> 

						<li><a href="#"><img src="{{asset('imagenes/IconosMenu/ordenesPedidos.png')}}"/> Notificaciones<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
			                    <li><a href="#">Visualizar Órdenes de Pedidos</a></li>
		                    </ul> 
		                </li> 

		                <li><a href="#"><img src="{{asset('imagenes/IconosMenu/clientes.png')}}"/> Clientes<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
			                @php if(Auth::user()->privilegio==1){ @endphp
				            	<li><a href="{{ route('clientes.create') }}">Incorporar Cliente</a></li>
				            	@php } @endphp	
				                <li><a href="{{ route('clientes.index') }}">Visualizar Clientes</a></li>
			                </ul> 
		                </li> 

		                  <li><a href="{{ route('estadisticas.index')}}"><img src="{{asset('imagenes/IconosMenu/estadisticas.png')}}"/> Estadísticas</a>
		                  <li><a href="{{ route('equipoTrabajo.index') }}"><img src="{{asset('imagenes/IconosMenu/acercaDe.png')}}"/> Equipo de Trabajo</a>

		                <li><a href="{{ route('equipoDesarrollo.index') }}"><img src="{{asset('imagenes/IconosMenu/acercaDe.png')}}"/> Equipo Desarrollador</a>
		                
		            </ul>
                </nav>
			</div>
				
              @yield('contenido')<!--aquí se cargaran las demás vistas-->
          </div>

	</body>
   	 
<!--------------------------JAVASCRIPTS-------------------------->

	@yield('js') <!-- Seccion para incluir los js de las vistas -->
	
	{{ Html::script('js/jquery.js') }}
	{{ Html::script('js/bootstrap.min.js') }}
	{{ Html::script('js/main.js') }}
	{{ Html::script('js/bootstrap-select.min.js') }}

	


</html>