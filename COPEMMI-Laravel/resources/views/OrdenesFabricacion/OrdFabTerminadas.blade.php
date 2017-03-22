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
						<!--<tr class="success" data-href="{{route('historialOrdenesFabricacion.show', $OF->COD_ORDEN_FABRICACION)}}">-->
						<tr>
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


		

		
		
	</div>	
</div>
@stop