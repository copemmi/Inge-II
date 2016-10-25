@extends ('Menu')
@section ('contenido')

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		<div id="center">
			
			<div class="content">
				
				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>

				<div class="page-header">
	  				<h1 class="text-center">Modificar Modelos Máquinas</h1>
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


			</div>

		</div>

@stop

@section('js')
	{!! Html::script('js/validacionMod.js') !!}
@stop