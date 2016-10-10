<!DOCTYPE html>
<html>
	<head>
		<title>COPEMMI Modificar Materiales</title>
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
		                    	<li><a href="/IngresarMateriales" target="_self">Agregar Materiales</a></li>
		                    	<li><a href="/">Visualizar Materiales</a></li>
		                    </ul>    
	                    </li>

						<li class="activado"><a href="#"><span class="icono izquierda fa fa-tablet"></span>Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				                <li><a href="#">Agregar Modelos de Máquinas</a></li>
				                <li><a href="#">Visualizar Modelo de Máquinas</a></li>
			                </ul> 
		                </li> 

		                <li class="activado"><a href="#"><span class="icono izquierda fa fa-file-text"></span>Órdenes de Fabricación<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				            	<li><a href="#">Agregar Órdenes de Fabricación</a></li>
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

<!--------------------------------------------------------------------Formulario EN EL CENTRO------------------------------------------------------>

		<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="imagenes/tek.PNG";/></a>
					</div>
				</div>


				<div class="page-header">
  					<h1 class="text-center">Editar Materiales</h1>
				</div>
		

				<div class="container">
					
					<form action="" class="form-horizontal">

						<div class="form-group">
							{!! Form::label('codigo','Código:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								{!! Form::text('codigo','$mat->CODIGO',['class' => 'form-control','placeholder' => 'Ingrese un código']) !!}
								<span class = "help-block"></span>  <!- Mensaje que sale en caso de datos incorrectos->
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('option','Tipo/Categoria:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								<select class="form-control" name="" id="option">
									@foreach($tipo_material as $tm)
									<option value="">{{$tm->NOMBRE}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('nombre','Nombre:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								{!! Form::text('nombre','$mat->NOMBRE',['class' => 'form-control','placeholder' => 'Ingrese un nombre']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('descripcion','Descripción:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								{!! Form::textarea('descripcion','$mat->DESCRIPCION',['class' => 'form-control','placeholder' => 'Ingrese una descripcion','size' => '10x4']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('cantidad','Cantidad:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								{!! Form::text('cantidad','$mat->CANTIDAD',['class' => 'form-control','placeholder' => 'Ingrese una cantidad']) !!}
								<span class = "help-block"></span>
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('fechaIngreso','Fecha de Ingreso:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-10">
								{{Form::date('fechaIngreso', \Carbon\Carbon::now()) }}
							</div>
						</div>


						<form action="" class="form-inline">
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="imagenes/save.ico" width=20;/></button>
							</div>

							<div class="col-md-0 col-md-offset-0">
								<button class="btn btn-danger"> Cancelar  <img src="imagenes/delete.ico" width=20;/></button>
							</div>
						</form>
					</form>
				</div>
			</div>
		</div>
	</body>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    {!! Html::style('css/bootstrap.min.css') !!}
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    {!! Html::script('js/menuInsertar.js') !!}
    {!! Html::script('js/validacion.js') !!}	
    {!! Html::script('js/main.js') !!}
</html>