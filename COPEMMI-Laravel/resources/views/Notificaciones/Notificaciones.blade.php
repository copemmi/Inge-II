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
	  		<h1 class="text-center">Notificaciones</h1>
		</div>

		<!-- MENSAJE DE ERROR, SI UN DATO ES ERRONEO -->
				@if (count($errors) > 0)
    				<div class="alert alert-danger">
	       				 <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
	        			</ul>
    				</div>
				@endif
			<!-- FIN DE MSJ DE ERROR -->

		@php
		$i=0
		@endphp

		@foreach($notificaciones as $note)
		@php 
			$i++
			
		@endphp
		@endforeach

		@if($i<1)

		<div class="tabla-historial">
			<table class="table width=30 table-bordered table-hover table-condensed" >
				<thead class="bg-primary">
					<tr>
						<th>Tipo</th>
						<th>Mensaje</th>
						<th>Fecha de Creación</th>	
					</tr>
	     		</thead>

	     		<tbody>
					<tr class="success">
						<td>Vacío</td>
						<td>Vacío</td>	
						<td>Vacío</td>					
					</tr>
				</tbody>
	     	</table>

		@else

		<div class="tabla-historial">
			<table class="table width=30 table-bordered table-hover table-condensed" >
				<thead class="bg-primary">
					<tr>
						<th>Tipo</th>
						<th>Mensaje</th>
						<th>Fecha y Hora de Creación</th>
					</tr>
	     		</thead>

				<!-- Tabla donde se muestran las Notificaciones de Materiales y órdenes de Fabricación -->

	     		<tbody>
		     		@foreach($notificaciones as $note)	
		     			
						<tr class="success">
							<td>{{$note->tipo}}</td>
							<td>{{$note->mensaje}}</td>
							<td>{{$note->created_at}}</td>						
						</tr>

					@endforeach
					@endif
				</tbody>
			</table>

		</div><!-- Cierre de div de Tabla -->

		<br>
		<div class"col-md-0 col-md-offset-0">
			{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
		</div>
		<br>
		
		<div class="page-header">
			<h4 class="text-center">@2017, COPEMMI TEKNOMAQUINAS</h4>
        </div>	
		
	</div>	
</div>

@stop
