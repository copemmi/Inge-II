@extends ('Menu')
@section ('contenido')

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



							
					<!--BUSCADOR DE ORDENES DE FABRICACION-->
						
						{!!Form::open(['route'=>'ordenesFabricacion.index','method'=>'GET','class'=>'search-form','files'=>'true'])!!}
						{{csrf_field()}}
							<div class="col-md-4 col-md-offset-0">
                				<div class="form-group has-feedback">
		                    		<input type="text" class="form-control" name="buscar" id="Buscar" placeholder="Buscar" onkeyup="lista(this.value);">
		                    		<span class="glyphicon glyphicon-search form-control-feedback"></span>
                				</div>
                			</div> 


                		<div class="col-sm-2 col-sm-offset-1">
        						<a href="{{ route('modelosMaquinas.create') }}" class="btn btn-success"> Incorporar Modelo </a>
        					</div>
        			</div>
				</div>

                			<div class="col-md-0 col-md-offset-0"><label for="Cod_BusOrd_Fab" class=>Buscar por:</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'orden_fabricacion') }} Código de la Orden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'estado_orden') }} Estado de la orden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'cedula_cliente') }} Cedula del Cliente</label>
								<label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'modelo_maquina') }} Modelo de la maquina en fabricacion</label>
							</div>
        				{!!Form::close()!!}
							
					<!-- FIN DEL BUSCADOR -->

		<!-- TABLA DE MODELOS -->
				<br>
				<div class="tabla-modelos">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Codigo de la orden</th>
								<th>ID del cliente</th>
								<TH>Tipo de modelo</TH>
								<th>Tipo de estado</th>
								<th>Fecha de llegada</th>
								<th>Fecha de entrega</th>
								
								<!--<th class="opciones" >Opciones</th>-->
							</tr>
						 </thead>
						@foreach($orden_fabricacion as $ord_fab)
							<tr class="success" data-href="{{ route('ordenesFabricacion.show', $ord_fab->COD_ORDEN_FABRICACION) }}">
							
								<td>{{ $ord_fab->COD_ORDEN_FABRICACION}} </td>
								<td>{{ $ord_fab->ID}} </td>
								<td>{{ $ord_fab->COD_MODELO}}</td>
								<td>{{ $ord_fab->COD_ESTADO}} </td>	
								<td>{{ $ord_fab->FECHA_LLEGADA}} </td>	
								<td>{{$ord_fab->FECHA_ENTREGA}}							
							</tr>
						@endforeach
					</table>

					<div class="text-center">
						
					</div>
				</div>

			</div>
		</div>

@stop
