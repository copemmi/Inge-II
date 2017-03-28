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

        				<div class="col-sm-2 col-sm-offset-4">
        					<a href="{{ route('tiposMateriales.create') }}" class="btn btn-success"> Incorporar tipo de material </a>
        				</div>

					</div>
				</div>

				<br>
				<div class="tabla-tipoMaterial">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código</th>
								<th>Nombre del Tipo de Material</th>
							</tr>
						 </thead>
						@foreach($tipoMaterial as $tip)
							
							<tr class="success" data-href="{{ route('tiposMateriales.show', $tip->COD_TIPO_MATERIAL) }}">
								<td>{{ $tip->COD_TIPO_MATERIAL}} </td>
								<td>{{ $tip->NOMBRE}} </td>
							    <!--<td> <label><input type="checkbox" id="opcion" class="checkbox" name="opcion" value={{ $tip->COD_TIPO_MATERIAL}} /></label></td>-->
							</tr>
							
						@endforeach
					</table>
				</div>
			

				<!--<form action="" class="form-inline">
						<div id="botonbarra"class="col-md-0 col-md-offset-4">
							<a href="{{ route('tiposMateriales.edit', $tip->COD_TIPO_MATERIAL) }}" class="btn btn-warning"> Modificar </a>
							<span class="opcion"><a href="{{ route('tiposMateriales.destroy', $tip->COD_TIPO_MATERIAL) }}" onclick="return confirm('¿Seguro que desea eliminar el material ?')" class="btn btn-danger"> Eliminar </a></span>
						</div>
				</form>-->

			</div>
		</div>

@stop