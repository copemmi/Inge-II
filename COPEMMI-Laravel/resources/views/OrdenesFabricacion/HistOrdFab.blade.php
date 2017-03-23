@extends ('Menu')
@section ('contenido')

<!------------------------------------------------------Tabla en el centro-------------------------------------------->

<div id="center">
	<div class="content">
		<div class="main-image">
			<div id="page-header">		
				<a class="text-left"><img src="{{asset('imagenes/tek.PNG')}}";/></a> <!--Imágen de Teknomaquinas-->
			</div>
		</div>

		<div class="table-responsive">
			<div class="form-group">			
				@if (session()->has('flash_notification.message'))
				   <div class="alert alert-{{ session('flash_notification.level') }}">
				       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{!! session('flash_notification.message')!!}
					</div>
				@endif

				<!--Inicio del buscador de órdenes de fabricación-->
				{!!Form::open(['route'=>'historialOrdenesFabricacion.index', 'method'=>'GET', 'class'=>'search-form', 'files'=>'true'])!!}
				{{csrf_field()}}
				<div class="col-md-0 col-md-offset-0"><label for="codHistorial" class=>Buscar por:</label>
			<label class="radio-inline">{{ Form::radio('codHistorial', 'codorden',true) }} Código de la orden de fabricación</label>
			<label class="radio-inline">{{ Form::radio('codHistorial', 'codmodelo') }} Código del modelo</label>
			<label class="radio-inline">{{ Form::radio('codHistorial', 'cedula') }} Cédula del cliente</label>
        </div>
					
					<div class="col-md-4 col-md-offset-0">
               			<div class="form-group has-feedback">
		               		<input type="text" class="form-control" name="buscar" id="Buscar" placeholder="Buscar orden de fabricación" onkeyup="lista(this.value);">
		                    	<span class="glyphicon glyphicon-search form-control-feedback"></span>
                		</div>
                			<div class="col-sm-0 col-sm-offset-12">
                				<button type="submit" class="btn btn-primary " >Buscar</button>
                               </div>
                	</div> 
        	</div>
		</div>

   		
        		{!!Form::close()!!} <!--Fin del buscador de órdenes de fabricación-->
				<br>

		<!--Tabla que muestra los resultados del buscador-->
		@php
		$i=0
		@endphp


		@foreach($historialOrdenesFabricacion as $mat)
		
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
			@endif
			@php 
			$i++
			@endphp
				
					<tr class="success" data-href="{{route('historialOrdenesFabricacion.show', $mat->COD_ORDEN_FABRICACION)}}">
						<td>{{$mat->COD_ORDEN_FABRICACION}}</td>
						<td>{{$mat->COD_MODELO}}</td>
						<td>{{$mat->ID}}</td>
						<td>{{$mat->FECHA_LLEGADA}}</td>	
						<td>{{$mat->FECHA_ENTREGA}}</td>								
					</tr>
				@endforeach
			</table>

			<div class="text-center">
				{!!$historialOrdenesFabricacion->render()!!} <!--Método para hacer la paginación en caso de haber muchos elementos-->
			</div>
		</div>
	</div>
</div>
@stop