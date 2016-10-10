<!DOCTYPE html>
<html>
	<head>
		<title>COPPEMI</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<!--------------------------------------------------------------------BARRA ARRIBA-------------------------------------------------------->
		<div id="topmenu" >
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
            <div class="sidebar" > 
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

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="imagenes/tek.PNG"></a>
					</div>
				</div>

				<div class="table-responsive">
					<div class="form-group">

						<button class="btn btn-success"><a href="/IngresarMateriales" target="_self" ><font color="black">Agregar Materiales</font></a></button>

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

				<div id="tabla-materiales">
					<table class="table width=30 table-striped table-bordered table-hover table-condensed">
						<tr class="success">
							<th>Código</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Categoría</th>
							<th width="50">Fecha de Entrega</th>
							<th width="50">Fecha de Agotamiento</th>
							<th class="opciones" >Opciones</th>
						</tr>

						<?php for($i=1;$i<=4;$i++){?>
						<tr bgcolor="fffff">
							<td>TOR0<?php echo "$i";?></td>
							<td>Tornillo <?php echo "$i";?></td>
							<td>400</td>
							<td>Tornillo</td>
							<td>01/08/2016</td>
							<td>03/01/2017</td>


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
											¿Esta seguro de eliminar este elemento? 
										</div>

										<div class="modal-footer">
											<form> 
												<button type="submit" class="btn btn-default">Aceptar</button>
												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							<td>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ventana"><img src="imagenes/delete.png" width="18px" height="18px";/></button>
								<button type="submit" class="btn btn-warning"><a href="/ModificarMateriales" target="_self"><img src="imagenes/pencil.png" width="18px" height="18px";/></a></button>
							</td>
						</tr>
						<?php };?>
					</table>
				</div>
				
			</div>
		</div>
	</body>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css" type='text/css'>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>	
</html>
