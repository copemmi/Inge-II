@extends ('Menu')
@section ('contenido')

<!---------------------------------------------------Formulario en el centro------------------------------------------>

<div id="center">
	<div class="content">
		<div class="main-image">
			<div id="page-header">		
			  	<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
			</div>
		</div>

		@if(session()->has('flash_notification.message'))
    		<div class="alert alert-{{ session('flash_notification.level') }}">
       			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{!!session('flash_notification.message')!!}
    		</div>
		@endif

		<div class="page-header">
	  	<h1 class="text-center">Últimas Órdenes de Fabricación Terminadas</h1>
		</div>


		<!-- Inicio de tabla-->
		<div class="tabla-historial">
			<table class="table width=30 table-bordered table-hover table-condensed" >
				<thead class="bg-primary">
					<tr>
						<th>Código de la orden de fabricación</th>
						<th>Código del modelo</th>
						<th>Cédula del cliente</th>
						<th>Fecha de llegada</th>
						<th>Fecha de entrega</th>	
					</tr>
	     		</thead>

	     		<tbody>
		     		@foreach($historialOrdenesFabricacion as $OF)	
		     			
		     			<!--Modificar este TR para que cuando se haga click sobre algúna orden, se despliegue los datos abajo-->
						<tr class="success" id="mostrar" onclick="MostrarDatos({{$OF->COD_ORDEN_FABRICACION}});">
							<td>{{$OF->COD_ORDEN_FABRICACION}}</td>
							<td>{{$OF->COD_MODELO}}</td>
							<td>{{$OF->ID}}</td>
							<td>{{$OF->FECHA_LLEGADA}}</td>	
							<td>{{$OF->FECHA_ENTREGA}}</td>								
						</tr>
					@endforeach
				</tbody>
			</table>

		</div><!-- Cierre de div de Tabla -->


		<br>
		<div class"col-md-0 col-md-offset-0">
			{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
		</div>
		<br>
		

		<div class="container form-horizontal">
			<!--Cod de Orden-->
				<div class="form-group">
					{!! Form::label('COD_ORDEN_FABRICACION','Órden de Fabricación:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
						{!! Form::text('COD_ORDEN_FABRICACION','',['class' => 'form-control','id'=>'CodOrd','readonly']) !!}
					</div>
				</div>
			<!--Tipo de Estado-->
				<div class="form-group">
				{!!Form::label('COD_ESTADO', 'Estado de la Órden:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-2">
					{!! Form::text('COD_ESTADO','',['class'=>'form-control','id'=>'NomEstado', 'readonly'])!!}
					</div>
				</div>
			<!-- Usuario-->
				<div class="form-group">
					{!! Form::label('option','Usuario:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
					{!! Form::text('COD_USUARIO','',['class'=>'form-control','id'=>'NomUsuario', 'readonly'])!!}
					</div>
				</div>		
			<!--Cliente Identificacion --> 
				<div class="form-group">
					{!! Form::label('option','Identificación del Cliente:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
						{!! Form::text('ID_CLIENTE','',['class'=>'form-control','id'=>'IdCliente', 'readonly'])!!}
					</div>
				</div>
			<!--Nombre del cliente --> 
				<div class="form-group">
					{!! Form::label('option','Nombre del cliente:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
								{!! Form::text('NOM_CLIENTE','',['class'=>'form-control','id'=>'NomCliente', 'readonly'])!!}
					</div>
				</div>
			<!--Nombre de la empresa del cliente --> 
				<div class="form-group">
					{!! Form::label('option','Nombre de la empresa:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
						{!! Form::text('NOM_EMPRESA','',['class'=>'form-control','id'=>'NomEmpresa', 'readonly'])!!}

					</div>
				</div>
			<!--Cedula de la empresa cliente --> 
				<div class="form-group">
					{!! Form::label('option','Cédula de la empresa:',array('class' => 'control-label col-md-2','readonly')) !!}
					<div class="col-md-2">
						{!! Form::text('CED_EMPRESA','',['class'=>'form-control','id'=>'CedEmpresa', 'readonly'])!!}
						</div>
					</div>
			<!-- Fecha de Llegada-->
				<div class="form-group">
					{!! Form::label('FECHA_LLEGADA','Fecha de Llegada:',array('class' => 'control-label col-md-2')) !!}
					<div class="col-md-2">
						{!! Form::text('FECHA_LLEGADA','', ['class' => 'form-control','id'=>'FecLlegada', 'readonly']) !!}
					</div>
				</div>
			<!-- Fecha de Entrega-->
				<div class="form-group">
					{!! Form::label('FECHA_ENTREGA','Fecha de Entrega:',array('class' => 'control-label col-md-2')) !!}
					<div class="col-md-2">
						{!! Form::text('FECHA_ENTREGA','', ['class' => 'form-control','id'=>'FecEntrega', 'readonly']) !!}
					</div>
				</div>
			<!--Tipo de Modelo-->
				<div class="form-group">
				{!!Form::label('COD_MODELO', 'Modelo de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-3">
					{!! Form::text('COD_MODELO','',['class'=>'form-control','id'=>'NomMaquina', 'readonly'])!!}
					</div>
				</div>
			<!--PRECIO DE LA MAQUINA-->
				<div class="form-group">
				{!!Form::label('option', 'Precio de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-2">
						{!! Form::text('COD_MODELO','',['class'=>'form-control','id'=>'PrecMaquina', 'readonly'])!!}
					</div>
				</div>												
		</div><!--Cierre de Container -->

		
	</div>	
</div>
@stop

@section('js')
	
<script>

function MostrarDatos(id){

	var url="http://localhost:8000/traerDatos/"+id; //ruta del método en el backend y sus parámetros

	$.get(url, function(res){
		$("#CodOrd").val(res.codigo);
		$("#NomEstado").val(res.estado);
		$("#NomUsuario").val(res.usuario);
		$("#IdCliente").val(res.idCli);
		$("#NomCliente").val(res.nomCli+" "+res.priApell+" "+res.segApell);
		$("#NomEmpresa").val(res.nomEmp);
		$("#CedEmpresa").val(res.idEmp);
		$("#FecLlegada").val(res.fecLle);
		$("#FecEntrega").val(res.fecEnt);
		$("#NomMaquina").val(res.NomMaq);
		$("#PrecMaquina").val(res.preMaq);
	});

}
</script>


@stop