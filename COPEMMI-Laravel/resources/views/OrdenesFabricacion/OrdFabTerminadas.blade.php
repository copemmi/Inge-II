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

		@php
		$i=0
		@endphp

		@foreach($historialOrdenesFabricacion as $OF)
		@php 
			$i++
			
		@endphp
		@endforeach

		@if($i<1)
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
		     			
		     			<!--Modificar este TR para que cuando se haga click sobre algúna orden, se despliegue los datos abajo-->
						<tr class="success" id="mostrar">
							<td>Vacío</td>
							<td>Vacío</td>
							<td>Vacío</td>
							<td>Vacío</td>	
							<td>Vacío</td>								
						</tr>
				</tbody>

	     	</table>



		@else

		
		<div class="tabla-historial">
			<table class="table width=30 table-bordered table-hover table-condensed" >
				<thead class="bg-primary">
					<tr>
						<th>Código de la orden de fabricación</th>
						<th>Código del modelo</th>
						<th>Cédula del cliente</th>
						<th>Fecha de terminada</th>
					</tr>
	     		</thead>

	     		<tbody>
		     		@foreach($historialOrdenesFabricacion as $OF)	
		     			
		     			<!--Modificar este TR para que cuando se haga click sobre algúna orden, se despliegue los datos abajo-->
						<tr class="success" id="mostrar" onclick="MostrarDatos({{$OF->COD_ORDEN_FABRICACION}});">
							<td>{{$OF->COD_ORDEN_FABRICACION}}</td>
							<td>{{$OF->COD_MODELO}}</td>
							<td>{{$OF->ID}}</td>
							<td>{{$OF->FECHA_TERMINADA}}</td>								
						</tr>
					@endforeach
					@endif
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
			<!--Tipo de Estado-->
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
				</>		
			<!--Cliente Identificacion --> 
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
							<!--Nombre de la empresa del cliente --> 
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
			<!-- Fecha de Llegada-->
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
			<!--FECHA DE TERMINADA-->
				<div class="form-group">
				{!!Form::label('FECHA_TERMINADA', 'Fecha de Terminada:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-3">
					{!! Form::text('FECHA_TERMINADA','',['class'=>'form-control','id'=>'FecTerminada', 'readonly'])!!}
					</div>
				</div>
			<!--PRECIO DE LA MAQUINA-->
				{!!Form::label('option', 'Precio de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-2">
						{!! Form::text('COD_MODELO','',['class'=>'form-control','id'=>'PrecMaquina', 'readonly'])!!}
					</div>
				</div>	
			<!--Tipo de Modelo-->
				<div class="form-group">
				{!!Form::label('COD_MODELO', 'Modelo de Máquina:', array('class' => 'control-label col-md-2'))!!}
					<div class="col-md-3">
					{!! Form::text('COD_MODELO','',['class'=>'form-control','id'=>'NomMaquina', 'readonly'])!!}
					</div>
				</div>
														
		</div><!--Cierre de Container -->
		<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>	
		
	</div>	
</div>
@stop

@section('js')
	
<script>

function MostrarDatos(id){

	var url="/traerDatos/"+id; //ruta del método en el backend y sus parámetros

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
		$("#FecTerminada").val(res.fecTer);
		$("#NomMaquina").val(res.NomMaq);
		$("#PrecMaquina").val(res.preMaq);
	});

}
</script>


@stop