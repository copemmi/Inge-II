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



							
					<!--BUSCADOR DE CLIENTES-->
						
						{!!Form::open(['route'=>'clientes.index','method'=>'GET','class'=>'search-form','files'=>'true'])!!}
						{{csrf_field()}}
						<div class="col-md-0 col-md-offset-0"><label for="identificacion" class=>Buscar por:</label>		<label class="radio-inline">{{ Form::radio('identificacion', 'id') }} Identificacion</label>
					            <label class="radio-inline">{{ Form::radio('identificacion', 'nombre',true) }} Nombre del Cliente</label>
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
        						<a href="{{ route('clientes.create') }}" class="btn btn-success"> Incorporar Cliente </a>
        						@php } @endphp
        					</div>
        			</div>
				</div><br>

                			
        				{!!Form::close()!!}
        				
							
					<!-- FIN DEL BUSCADOR -->


						<!-- TABLA DE CLIENTES -->
				<br>
				@php
				$i=0
				@endphp

				@foreach($clientes as $cli)
				@if($i<1)

				<div class="tabla-clientes">
					<table class="table width=30 table-bordered table-hover table-condensed" >
						<thead class="bg-primary">
							<tr>
								<th>Identificacion</th>
								<th>Nombre Cliente</th>
								<th>Primer Apellido</th>
								<th>Segundo Apellido</th>
								
								<!--<th class="opciones" >Opciones</th>-->
							</tr>
						 </thead>
						 @endif
						 @php
						 $i++
						 @endphp
						
						<tr class="success" data-href="{{ route('clientes.show', $cli->ID) }}">
								<td>{{ $cli->ID}}</td>
								<td>{{ $cli->NOMBRE}} </td>
								<td>{{ $cli->PRIMER_APELLIDO}} </td>
								<td>{{ $cli->SEGUNDO_APELLIDO}} </td>								
							</tr>
						@endforeach
					</table>

					
					
				</div>
			</div>
		</div>


@stop
