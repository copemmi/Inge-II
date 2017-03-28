@extends ('Menu')
@section ('contenido')

<!------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

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

						<div class="col-sm-2 col-sm-offset-4">
        					<a href="{{ route('tiposModelosMaquinas.create') }}" class="btn btn-success"> Incorporar tipo de modelo de máquina </a>
						</div>

					</div>	
				</div>

				<br>
				<div class="tabla-tipoModelo">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código</th>
								<th>Nombre del Tipo del Modelo de Máquina</th>
							</tr>
						 </thead>
						@foreach($tipoModelo as $tip)
							
							<tr class="success" data-href="{{ route('tiposModelosMaquinas.show', $tip->COD_TIPO_MODELO) }}">
								<td>{{ $tip->COD_TIPO_MODELO}} </td>
								<td>{{ $tip->NOMBRE}} </td>
							    <!--<td> <label><input type="checkbox" id="opcion" class="checkbox" name="opcion" value={{ $tip->COD_TIPO_MATERIAL}} /></label></td>-->
							</tr>
							
						@endforeach
					</table>
				</div>

			</div>
		</div>

@stop 