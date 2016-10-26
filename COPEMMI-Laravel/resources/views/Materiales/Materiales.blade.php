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



							
					<!--BUSCADOR DE MATERIALES-->
						
						{!!Form::open(['route'=>'materiales.index','method'=>'GET','class'=>'search-form','files'=>'true'])!!}
						{{csrf_field()}}
							<div class="col-md-4 col-md-offset-0">
                				<div class="form-group has-feedback">
		                    		<input type="text" class="form-control" name="buscar" id="Buscar" placeholder="Buscar" onkeyup="lista(this.value);">
		                    		<span class="glyphicon glyphicon-search form-control-feedback"></span>
                				</div>
                			</div> 


                		<div class="col-sm-2 col-sm-offset-1">
        						<a href="{{ route('materiales.create') }}" class="btn btn-success"> Incorporar Material </a>
        					</div>
        			</div>
				</div>

                			<div class="col-md-0 col-md-offset-0"><label for="codTipoMaterial" class=>Buscar por:</label>
					            <label class="radio-inline">{{ Form::radio('codTipoMaterial', 'cod') }} Código</label>
					            <label class="radio-inline">{{ Form::radio('codTipoMaterial', 'nombre',true) }} Nombre del Material</label>
								<label class="radio-inline">{{ Form::radio('codTipoMaterial', 'tipo') }} Tipo de material</label>
    	                    </div>
        				{!!Form::close()!!}
							
					<!-- FIN DEL BUSCADOR -->

<!-- TABLA DE MATERIALES -->
				<br>
				<div class="tabla-materiales">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código</th>
								<th>Nombre del Material</th>
								<th>Tipo</th>
								<th>Cantidad</th>
								
								<!--<th class="opciones" >Opciones</th>-->
							</tr>
						 </thead>
						@foreach($materiales as $mat)
							<tr class="success" data-href="{{ route('materiales.show', $mat->COD_MATERIAL) }}">
								<td>{{ $mat->COD_MATERIAL}}</td>
								<td>{{ $mat->NOMBRE}} </td>
								<td>{{ $mat->COD_TIPO_MATERIAL}} </td>
								<td>{{ $mat->CANTIDAD}} </td>								
							</tr>
						@endforeach
					</table>

					<div class="text-center">
						{!! $materiales->render() !!} <!-- Metodo para hacer la paginación en caso de haber muchos elementos-->
					</div>

				</div>
			</div>
		</div>


@stop
