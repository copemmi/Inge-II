<!DOCTYPE html>
<html>
	<head>
		@include('flash::message')
		

@if(count($errors)>0)
		<div class="alert alert-danger" role="alert">
         <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>
         <br>
         <br>
         @endforeach
           </ul>
		</div>

		@endif






		<title>COPEMMI Ingresar Materiales</title>
		<meta charset="UTF-8">

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


	

	<body>


<!--------------------------------------------------------------------MENU IZQUIERDA-------------------------------------------------------->

		<div id="leftMenu">
            <div class="sidebar"> 
               <nav>
	             	<ul class="menu">			
				        <li class="activado"><a href="#">Materiales<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
		                    	<li><a href="/IngresarMateriales" target="_self">Agregar Materiales</a></li>
		                    	<li><a href="/">Visualizar Materiales</a></li>
		                    </ul>    
	                    </li>

						<li class="activado"><a href="#">Modelos de Máquinas<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				                <li><a href="#">Agregar Modelos de Máquinas</a></li>
				                <li><a href="#">Visualizar Modelo de Máquinas</a></li>
			                </ul> 
		                </li> 

		                <li class="activado"><a href="#">Órdenes de Fabricación<i class="icono derecha fa fa-chevron-down"></i></a>
			                <ul>
				            	<li><a href="#">Agregar Órdenes de Fabricación</a></li>
				                <li><a href="#">Visualizar Órdenes de Fabricación</a></li>
			                </ul> 
		                </li> 

						<li class="activado"><a href="#">Órdenes de Pedidos<i class="icono derecha fa fa-chevron-down"></i></a>
		                    <ul>
			                    <li><a href="#">Visualizar Órdenes de Pedidos</a></li>
		                    </ul> 
		                </li> 
		            </ul>
                </nav>
			</div>
        </div>


<!--------------------------------------------------------------------Formulario EN EL CENTRO------------------------------------------------------>











{!!Form::open(array('url'=>'/IngresarMateriales','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
		
		
		<div id="center">

			



			<div class="content">




				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-down"><img src="imagenes/tek.PNG"></a>
					</div>
				</div>


				<div class="page-header">

	  				<h1 class="text-center">Incorporar Materiales</h1>
				</div>

	
				
					

						<div class="form-group">
							<label for="codigo" class="control-label col-md-2">Codigo:</label>
							<div class="col-md-10">
								<input class="form-control" id= "codigo" placeholder="Codigo:" name="COD_MATERIAL">
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="option" class="control-label col-md-2">Tipo/Categoria:</label>
							<div class="col-md-10">
								<select class="form-control" name="COD_TIPO_MATERIAL" id="option">
									<option value="TORN">Tornillo</option>
									<option value="LAM">Lámina</option>
								
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="nombre" class="control-label col-md-2">Nombre:</label>
							<div class="col-md-10">
								<input class="form-control" id= "nombre" placeholder="Nombre:" name="NOMBRE">
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="control-label col-md-2">Descripcion:</label>
							<div class="col-md-10">
								<input class="form-control" id= "descripcion" placeholder="Descripcion:" name="DESCRIPCION">
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="cantidad" class="control-label col-md-2">Cantidad:</label>
							<div class="col-md-10">
								<input class="form-control" id= "cantidad" placeholder="Cantidad:" name="CANTIDAD">
								<span class = "help-block"></span>
							</div>
						</div>


						



						<div class="form-group">
							<label for = "fechaAgotado" class="control-label col-md-2">Fecha Ingreso:</label>
							<div class="col-md-10">
								<input type="date" name="FECHA_INGRESO" step="1" min="2016-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>">
								

								<br>
								<br>
				             
							</div>
						</div>


						
							<div class="col-md-2 col-md-offset-2">
								<button class="btn btn-success" input type="submit" id="Guardar" >Guardar<img src="imagenes/save.ico" width=20;/></button>
							</div>
                              
							<div class="col-md-0 col-md-offset-0">

								<button class="btn btn-danger">Cancelar  <img src="imagenes/delete.ico" width=20;/></button>
							</div>
						
				

				
				</div>
						</div>
		

		{!!Form::close()!!}













	</body>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css" type='text/css'> 
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/menuInsertar.js"></script>	
    <script src="js/validacion.js"></script>	
    <script src="js/main.js"></script>
</html>


