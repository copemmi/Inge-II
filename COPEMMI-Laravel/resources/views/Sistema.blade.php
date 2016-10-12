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
						<li> <a class="lb-COP"> COPEMMI </a> </li>
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
				        <li class="activado"><a href="#"><span class="icono izquierda fa fa-wrench"></span>Materiales<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
		                    	<li><a href="{{ route('materiales.create') }}" target="_self">Incorporar Materiales</a></li>
		                    	<li><a href="{{ route('materiales.index') }}">Visualizar Materiales</a></li>
		                    </ul>    
	                    </li>

						<li class="activado"><a href="#"><span class="icono izquierda fa fa-tablet"></span>Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				                <li><a href="#">Incorporar Modelos de Máquinas</a></li>
				                <li><a href="#">Visualizar Modelo de Máquinas</a></li>
			                </ul> 
		                </li> 

		                <li class="activado"><a href="#"><span class="icono izquierda fa fa-file-text"></span>Órdenes de Fabricación<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				            	<li><a href="#">Incorporar Órdenes de Fabricación</a></li>
				                <li><a href="#">Visualizar Órdenes de Fabricación</a></li>
			                </ul> 
		                </li> 

						<li class="activado"><a href="#"><span class="icono izquierda fa fa-paper-plane"></span>Órdenes de Pedidos<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
			                    <li><a href="#">Visualizar Órdenes de Pedidos</a></li>
		                    </ul> 
		                </li> 
		            </ul>
                </nav>
			</div>
        </div>

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>

				<div class="table-responsive">
					<div class="form-group">
						
						@if (session()->has('flash_notification.message'))
						    <div class="alert alert-{{ session('flash_notification.level') }}">
						        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

						        {!! session('flash_notification.message') !!}
						    </div>
						@endif

						<a href="{{ route('materiales.create') }}" class="btn btn-success"> Incorporar Materiales </a>

						<div class="col-md-4 col-md-offset-3">
            				<form action="" class="search-form">
                				<div class="form-group has-feedback">
                    				<label for="Buscar" class="sr-only">Buscar</label>
                    				<input type="text" class="form-control" name="Buscar" id="Buscar" placeholder="Buscar">
                    				<span class="glyphicon glyphicon-search form-control-feedback"></span>
                				</div>
            				</form>
        				</div>
					</div>
				</div>

				<br>
				<div class="tabla-materiales">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código</th>
								<th>Nombre</th>
								<th>Cantidad</th>
								<th>Categoría</th>
								<th>Fecha de Entrega</th>
								<th width="200">Descripción</th>
								<th class="opciones" >Opciones</th>
							</tr>
						 </thead>
						@foreach($materiales as $mat)
							
							<tr class="success">
								<td>{{ $mat->COD_MATERIAL}}</td>
								<td>{{ $mat->NOMBRE}} </td>
								<td>{{ $mat->CANTIDAD}} </td>
								<td>{{ $mat->COD_TIPO_MATERIAL}} </td>
								<td>{{ $mat->FECHA_INGRESO}} </td>
								<td>{{ $mat->DESCRIPCION}} </td>
								<td>
									<a href="{{ route('materiales.destroy', $mat->COD_MATERIAL) }}" title="Eliminar material" onclick="return confirm('¿Seguro que desea eliminar el material ?')" class="btn btn-danger"><img src="{{asset('imagenes/delete.png')}}" width=20;/></a>
									<a href="{{ route('materiales.edit', $mat->COD_MATERIAL) }}" title="Modificar material" class="btn btn-warning"><img src="{{asset('imagenes/pencil.png')}}" width=20;/></a>
								</td>
							</tr>
							
						@endforeach
					</table>

					<div class="text-center">
					{!! $materiales->render() !!} <!-- Metodo para hacer la paginación en caso de haber muchos elementos-->
					</div>

				</div>
			</div>
		</div>
	</body>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    {!! Html::style('css/bootstrap.min.css') !!}
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	{{ Html::script('js/main.js') }}
</html>
