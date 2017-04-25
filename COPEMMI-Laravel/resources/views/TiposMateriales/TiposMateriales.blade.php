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
        					<!--<a href="{{ route('tiposMateriales.create') }}" class="btn btn-success"> Incorporar tipo de material</a>-->
<!-- Creación del Botón Modal que abre el formulario de los datos de tipos de materiales-->		
							@php if(Auth::user()->privilegio==1){ @endphp
 							<a class="btn btn-success" input type="button" data-toggle="modal" data-target="#addData">Incorporar tipo de material</a>
 							@php} @endphp
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

					<div class="col-md-8">
                        <h4>@2017, COPEMMI TEKNOMAQUINAS<span class="col-md-1 col-md-offset-2 text-right"></i></span></h4>
                </div>
			
<!-- Ventana Modal que abre el formulario de Incorporar Materiales --> 		
 			<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">		
 				<div class="modal-dialog" role="document">		
 					<div class="modal-content">		
 		
 						<!-- Título de la Ventana Modal -->		
 						<div class="modal-header">		
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
 							<h4 class="modal-title" id="addLabel">Incorporar Tipo de Material</h4>		
 						</div>		
 						
 		
 						<!-- Formulario donde solicita los datos del tipo de Material -->
							<div class="modal-body">
								
								<div class="form-group">
									{!! Form::label('COD_TIPO','Código del tipo:',array('class' => 'control-label col-md-2')) !!}
									<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información --> 
									<div class="col-md-5">
										{!! Form::text('COD_TIPO',null,['class' => 'form-control','placeholder' => 'Código del tipo', 'maxlength="10"']) !!}
									<span class = "help-block"></span>  
									</div>
								</div>	

								<br>
								<br>

								<div class="form-group">
									{!! Form::label('NOMB_TIPO','Nombre del tipo:',array('class' => 'control-label col-md-2')) !!}
									<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
									<div class="col-md-5">
										{!! Form::text('NOMB_TIPO',null,['class' => 'form-control','placeholder' => 'Nombre del tipo', 'maxlength="50"']) !!}
										<span class = "help-block"></span>
									</div>
								</div>
							</div>		
 		
 						<!-- Footer o parte donde vienen los botones -->		
 						<div class="modal-footer">		
 									
 							<!--<button class="btn btn-success" input type="submit">Guardar<img src="{{asset('imagenes/save.ico')}}" width=20; action="javascript:close_this_popup()" /></button>-->		
 		
 							<button class="btn btn-success" input type="submit" id="guardarCambiosModal" onclick="guardaCambiosModal();" data-dismiss="modal">Guardar<img src="{{asset('imagenes/save.ico')}}" width=20;/></button>		
 									
							<a href="#" data-dismiss="modal" class="btn btn-danger"> Cancelar <img src="{{asset('imagenes/delete.ico')}}" width=20;/></a>		
 		
 						</div>		
 					</div>
 					</div>		
 			</div>




				<!--<form action="" class="form-inline">
						<div id="botonbarra"class="col-md-0 col-md-offset-4">
							<a href="{{ route('tiposMateriales.edit', $tip->COD_TIPO_MATERIAL) }}" class="btn btn-warning"> Modificar </a>
							<span class="opcion"><a href="{{ route('tiposMateriales.destroy', $tip->COD_TIPO_MATERIAL) }}" onclick="return confirm('¿Seguro que desea eliminar el material ?')" class="btn btn-danger"> Eliminar </a></span>
						</div>
				</form>-->
				
				</div>

			</div>
		</div>

@stop

@section('js')		
 -	{!! Html::script('js/cargarTipo.js') !!}		
 -	{!! Html::script('js/validacionTipoMat.js') !!}		
  @stop