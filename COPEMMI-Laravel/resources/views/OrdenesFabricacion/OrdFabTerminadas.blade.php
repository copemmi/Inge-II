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
	  	<h1 class="text-center">Últimas Órdenes de Fabricación Terminadas</h1>
		</div>

	</div>
</div>	
@stop