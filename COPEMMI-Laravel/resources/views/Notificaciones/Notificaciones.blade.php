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

		<div class="container">

			<!--<a href="{{route('notificaciones.create')}}" class="btn btn-danger">Add Post</a>-->

			<!-- Tabla donde se muestran las Notificaciones de Materiales y órdenes de Fabricación -->
			<table class="table table-bordered">

				<tr>
					<th>Tipo</th>
					<th>Fecha de Creación</th>
				</tr>

				@foreach($notificaciones as $note)
					<tr>
						<td>{{ $note->titulo }}</td>
						<td>{{ $note->created_at }}</td>
					</tr>
				@endforeach

			</table>

		</div>

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

@section('js')
	
<script>
	window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),

		]) 
	!!};
</script>


@stop