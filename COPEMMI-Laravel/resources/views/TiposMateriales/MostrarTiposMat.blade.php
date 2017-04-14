@extends ('Menu')
@section ('contenido')


<!--------------------------------------------------------------------FORMULARIO EN EL CENTRO------------------------------------------------------>


		<div id="center">
			<div class="content">

				<div class="main-image">
					<div id="page-header">		
			  			<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
					</div>
				</div>

				@if (session()->has('flash_notification.message'))
    				<div class="alert alert-{{ session('flash_notification.level') }}">
       					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        				{!! session('flash_notification.message') !!}
    				</div>
				@endif


				<div class="page-header">
	  				<h1 class="text-center">Información del Material</h1>
				</div>

	
				<div class="container">
					{!! Form::open(['class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('COD_TIPO_MATERIAL','Código del tipo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
								{!! Form::text('COD_TIPO_MATERIAL',$tipoMaterial->COD_TIPO_MATERIAL,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del tipo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-5">
								{!! Form::text('NOMBRE',$tipoMaterial->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del tipo', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

<!---------------------------------------------------------------Mensaje de confirmacion para eliminar---------------------------------------------->
						<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
 							<div class="modal-dialog" role="document">
 								<div class="modal-content">
 									<div class="modal-header">
 										<button type="button" class="close" data-dismiss="modal">
 											<span aria-hidden="true">&times;</span>
 											<span class="sr-only">Cerrar</span>
 										</button>
 										<h4 class="modal-title" id="ModalLabel">Atención</h4>
									</div>

 									<div class="modal-body">
 										¿Esta seguro de eliminar este tipo de material? 
 									</div>
 
 									<div class="modal-footer">
 										<form> 
 											<a href="{{ route('tiposMateriales.destroy', $tipoMaterial->COD_TIPO_MATERIAL) }}" class="btn btn-default">Aceptar</a>
 											<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
 										</form>
 									</div>
 								</div>
 							</div>
 						</div>


	<!----------------------------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->

						<br>
						<div class="form-group">
							<div class"col-md-0 col-md-offset-0">
								{!! Form::label('separador','___________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
							</div>
						</div>

						<form action="" class="form-inline" >				
							
							<div class="col-md-0 col-md-offset-1">
								@php if(Auth::user()->privilegio==1){ @endphp
								<a href="{{ route('tiposMateriales.edit', $tipoMaterial->COD_TIPO_MATERIAL) }}" title="Modificar material" class="btn btn-warning">Modificar Tipo de Material</a>

								<a href="#" title="Eliminar material" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Tipo de Material</a>
								
								<a href="{{ route('tiposMateriales.create') }}" class="btn btn-success"> Incorporar Tipo de Material </a>
								@php} @endphp
								<a href="{{ route('tiposMateriales.index') }}" class="btn btn-info">Lista de Tipos de Materiales</a>

							</div>		

						</form>
					{!! Form::close() !!}
				</div>
					<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>
			</div>
		</div>	

@stop