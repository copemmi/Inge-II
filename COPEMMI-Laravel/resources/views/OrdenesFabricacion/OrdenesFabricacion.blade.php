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
        						<a href="{{ route('ordenesFabricacion.create') }}" class="btn btn-success"> Incorporar Orden de Fabricacion </a>
        					</div>
        			</div>
				</div>

                			<div class="col-md-0 col-md-offset-0"><label for="Cod_BusOrd_Fab" class=>Buscar por:</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'orden_fabricacion') }} Código de la órden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'estado_orden') }} Estado de la órden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'cedula_cliente') }} Cédula del Cliente</label>
								<label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'modelo_maquina') }} Modelo de la máquina en fabricación</label>
							</div>
        				{!!Form::close()!!}
							
					<!-- FIN DEL BUSCADOR -->

		<!-- TABLA DE MODELOS -->
				<br>
				<br>
				<div class="tabla-modelos">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código de la orden</th>
								<th>Estado</th>
								<th>Código del modelo</th>
								<th>Código de usuario</th>
								<th>Cédula del cliente</th>
								<th>Fecha de llegada</th>
								<th>Fecha de entrega</th>

															
					
							</tr>
						 </thead>
						@foreach($ordenFab as $ord)
							<tr class="success" data-href="{{ route('ordenesFabricacion.show',$ord->COD_ORDEN_FABRICACION) }}">
							
								<td>{{ $ord->COD_ORDEN_FABRICACION}} </td>
								<td>{{ $ord->COD_ESTADO}} </td>
								<td>{{ $ord->COD_MODELO}} </td>
								<td>{{ $ord->COD_USUARIO}} </td>
								<td>{{ $ord->ID}} </td>
								<td>{{ $ord->FECHA_LLEGADA}} </td>
								<td>{{ $ord->FECHA_ENTREGA}} </td>

												
							</tr>
						@endforeach
					</table>

					<div class="text-center">
						
					</div>
				</div>

			</div>
		</div>

@stop
