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



							
					<!--BUSCADOR DE MODELOS-->
						
						{!!Form::open(['route'=>'modelosMaquinas.index','method'=>'GET','class'=>'search-form','files'=>'true'])!!}
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

                			<div class="col-md-0 col-md-offset-0"><label for="codBusquedaMod" class=>Buscar por:</label>
					            <label class="radio-inline">{{ Form::radio('codBusquedaMod', 'cod') }} Código</label>
					            <label class="radio-inline">{{ Form::radio('codBusquedaMod', 'nombre',true) }} Nombre del Modelo</label>
								<label class="radio-inline">{{ Form::radio('codBusquedaMod', 'tipo') }} Tipo de modelo</label>
								<label class="radio-inline">{{ Form::radio('codBusquedaMod', 'precio') }} Precio</label>
    	                    </div>
        				{!!Form::close()!!}
							
					<!-- FIN DEL BUSCADOR -->

		<!-- TABLA DE MODELOS -->
				<br>
				<div class="tabla-modelos">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Código Modelo</th>
								<th>Nombre</th>
								<TH>Tipo de modelo</TH>
								<th>Características</th>
								<th>Precio</th>
								<th>Imagen</th>
								
								<!--<th class="opciones" >Opciones</th>-->
							</tr>
						 </thead>
						@foreach($modelos as $mat)
							<tr class="success" data-href="{{ route('modelosMaquinas.show', $mat->COD_MODELO) }}">
							
								<td>{{ $mat->COD_MODELO}} </td>
								<td>{{ $mat->NOMBRE}} </td>
								<td>{{ $mat->COD_TIPO_MODELO}}</td>
								<td>{{ $mat->CARACTERISTICAS}} </td>	
								<td>{{ $mat->PRECIO}} </td>	
								<td>{{$mat->COD_IMAGEN}}							
							</tr>
						@endforeach
					</table>

					<div class="text-center">
						
					</div>
				</div>

			</div>
		</div>

@stop
