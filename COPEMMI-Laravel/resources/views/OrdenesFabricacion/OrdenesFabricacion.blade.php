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
						<div class="col-md-0 col-md-offset-0"><label for="Cod_BusOrd_Fab" class=>Buscar por:</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'orden_fabricacion') }} Código de la órden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'estado_orden','true') }} Estado de la órden</label>
					            <label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'cedula_cliente') }} Cédula del Cliente</label>
								<label class="radio-inline">{{ Form::radio('Cod_BusOrd_Fab', 'modelo_maquina') }} Modelo de la máquina en fabricación</label>
							</div>
							<div class="col-md-4 col-md-offset-0">
                				<div class="form-group has-feedback">
		                    		<input type="text" class="form-control" name="buscar" id="Buscar" placeholder="Buscar" onkeyup="lista(this.value);">
		                    		<span class="glyphicon glyphicon-search form-control-feedback"></span>
                				</div>

                				<div class="col-sm-0 col-sm-offset-12">
                				<button type="submit" class="btn btn-primary " >Buscar</button>
                               </div>
        						
        					
                			</div> 


                		<div class="col-sm-10 col-sm-offset-0">
                				@php if(Auth::user()->privilegio==1){ @endphp
        						<a href="{{ route('ordenesFabricacion.create') }}" class="btn btn-success"> Incorporar Órden de Fabricación </a>
        						@php} @endphp
        					</div>
        			</div>

				</div><br>

                			

        				{!!Form::close()!!}
							
					<!-- FIN DEL BUSCADOR -->

		<!-- TABLA DE MODELOS -->
			
				<br>
				@php
                      $i = 0
                      @endphp

                       @foreach($ordenFab as $ord)
                           @if($i<1) 
	                        <div class="tabla-modelos">
					     <table class="table width=30 table-bordered table-hover table-condensed" >
						  <thead class="bg-primary">
							 <tr>
								<th>Código de la órden</th>
								<th>Estado</th>
								<th>Modelo</th>
								<th>Usuario</th>
								<th>Nombre del cliente</th>
								<th>Cédula del cliente</th>
								<th>Nombre de la empresa</th>
								<th>Cédula juridica</th>
								<th>Precio de la máquina</th>
								@php if(Auth::user()->privilegio==1){ @endphp
								<th>Operación</th>
								@php} @endphp
							</tr>
						 </thead>

                           @endif
                           @php
                           $i++
                           @endphp
			
						
							<tr class="success" data-href="{{ route('ordenesFabricacion.show',$ord->COD_ORDEN_FABRICACION) }}">
							
								<td>{{ $ord->COD_ORDEN_FABRICACION}} </td>
								<td>{{ $ord->COD_ESTADO}} </td>
								<!--Tipo de Maquina-->
								@foreach($modelo_maquina as $mod)
								@php if(strcmp($ord->COD_MODELO, $mod->COD_MODELO) == 0){ @endphp
									<td>{{  $mod->NOMBRE}} </td>	
								@php } @endphp
								@endforeach
								<!--Usuario-->
								@foreach($tipo_usuario as $tu)
								@php if(strcmp($ord->COD_USUARIO, $tu->COD_USUARIO) == 0){ @endphp
									<td>{{ $tu->NOMBRE}} </td>
								@php } @endphp
								@endforeach
								<!--Nombre cliente-->
								@foreach($cedula_cliente as $cliente)
								@php if(strcmp($ord->ID,$cliente->ID) == 0){ @endphp
									<td>{{ $cliente->NOMBRE}}</td>	
								@php } @endphp
								@endforeach
                               <!--Cédula del cliente -->
                               @foreach($cedula_cliente as $cliente)
								@php if(strcmp($ord->ID,$cliente->ID) == 0){ @endphp
									<td>{{ $cliente->ID}}</td>	
								@php } @endphp
								@endforeach

								<!--Nombre empresa-->
								@foreach($cedula_cliente as $cliente)
								@php if(strcmp($ord->ID,$cliente->ID) == 0){ @endphp
									<td>{{ $cliente->NOMBRE_EMPRESA}}</td>	
								@php } @endphp
								@endforeach
								<!--Cedula empresa del cliente-->
								@foreach($cedula_cliente as $cliente)
								@php if(strcmp($ord->ID,$cliente->ID) == 0){ @endphp
									<td>{{ $cliente->CEDULA_JURIDICA}}</td>	
								@php } @endphp
								@endforeach
								<!--Precio Maquina-->
								@foreach($modelo_maquina as $mod)
								@php if(strcmp($ord->COD_MODELO,$mod->COD_MODELO) == 0){ @endphp
									<td>{{ $mod->PRECIO}}</td>	
								@php } @endphp
								@endforeach
								
								<td>
								@php if(Auth::user()->privilegio==1){ @endphp
        						<a href="{{ route('ordenesFabricacion.cambiar_estados',$ord->COD_ORDEN_FABRICACION) }}" class="btn btn-primary"> Terminar </a>
        						@php} @endphp
        						</td>			
							</tr>


						@endforeach

					</table>

					<div class="text-center">
						
					</div>
					<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>
				</div>

			</div>
		</div>

@stop


