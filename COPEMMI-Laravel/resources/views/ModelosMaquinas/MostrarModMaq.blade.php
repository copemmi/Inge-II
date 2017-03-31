@extends ('Menu')
@section ('contenido')

<!--------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

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
	  				<h1 class="text-center">Información del Modelo de la Máquina</h1>
				</div>

	
				<div class="container">
					{!! Form::open(['class' => 'form-horizontal']) !!}
					{{csrf_field()}}
					{{ Form::token() }}

						<div class="form-group">
							{!! Form::label('CODIGO','Código del modelo:',array('class' => 'control-label col-md-2')) !!}
							<a class="boton" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo 10 de caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-3">
								{!! Form::text('CODIGO',$modelos->COD_MODELO,['class' => 'form-control', 'readonly']) !!}
								<span class = "help-block"></span>  <!-- Mensaje que sale en caso de datos incorrectos-->
							</div>
						</div>


                         
						<div class="form-group">
							{!! Form::label('option','Tipo de modelo:',array('class' => 'control-label col-md-2')) !!}
							<div class="col-md-3">
									@foreach($tipo_modelo as $tm)
										@php if(strcmp($modelos->COD_TIPO_MODELO, $tm->COD_TIPO_MODELO) == 0){ @endphp
									{!! Form::text('COD_TIPO_MODELO', $tm->NOMBRE,['class'=>'form-control', 'readonly'])!!}
										@php } @endphp
									@endforeach
							</div>
						</div>
						
						


							<div class="form-group">
							{!! Form::label('NOMBRE','Nombre del material:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 50 caracteres.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-5">
								{!! Form::text('NOMBRE',$modelos->NOMBRE,['class' => 'form-control','placeholder' => 'Ingrese el nombre del modelo', 'maxlength="50"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

				

					

						<div class="form-group">
							{!! Form::label('CARACTERISTICAS','Características:',array('class' => 'control-label col-md-2')) !!}
							<a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 255 caracteres.</li>"><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a>
							<div class="col-md-8">
								{!! Form::textarea('CARACTERISTICAS',$modelos->CARACTERISTICAS,['class' => 'form-control','placeholder' => 'Ingrese las características', 'maxlength="255"','size' => '10x4', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('PRECIO','Precio:',array('class' => 'control-label col-md-2')) !!}
							<span class = "help-block"></span><a href="#" rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="Información" data-content="<ul><li>Sólo se permite un máximo de 6 números.</li><li>Sólo se deben ingresar números enteros.</li></ul> "><img src="{{asset('imagenes/Img_Info.png')}}" width=25; /></a><!-- Aquí sale el mensaje de ayuda e información -->
							<div class="col-md-2">
								{!! Form::text('PRECIO',$modelos->PRECIO,['class' => 'form-control', 'maxlength="6"', 'readonly']) !!}
								<span class = "help-block"></span>
							</div>
						</div>

                           <div class="form-group">
							{!! Form::label('COD_IMAGEN','Foto:',array('class' => 'control-label col-md-2')) !!}
							
							<div class="col-md-2">
								
								<img src="/imagenes/ModelosMaquinas/{{$ima->IMAGEN}}" width=160; />
												 
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
 											¿Está seguro de eliminar este material? 
 										</div>
 
 										<div class="modal-footer">
 											<form> 
 												<a href="{{ route('modelosMaquinas.destroy', [$modelos->COD_MODELO, $modelos->COD_IMAGEN, $ima->IMAGEN]) }}" class="btn btn-default">Aceptar</a>
 												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
 											</form>
 										</div>
 									</div>
 								</div>
 							</div>
 			

						
						
                
<!-- cuadro de detalle de materiales -->




@php
$i=0
@endphp
 @foreach($materialesDetalle as $mat)


@if($modelos->COD_MODELO === $mat->COD_MODELO)
@if($i<1)


                          <div class="panel panel-primary">
							<table id="visualizarDetalle" class="table width=30 table-striped table-bordered table-condensed table-hover">
											<thead style="background-color:#A9D0F5">
								<th>Código detalle</th>
								<th>Código Modelo</th>
								<TH>Código Material</TH>
								<th>Cantidad</th>
								@php if(Auth::user()->privilegio==1){ @endphp
								<th>Operaciones</th>
								@php} @endphp
											</thead>
			@endif								


										
							<tr data-id="{{$mat->COD_DETALLE_MODELO }}" class="success">
							
								<td>{{ $mat->COD_DETALLE_MODELO}} </td>
								<td>{{ $mat->COD_MODELO}} </td>
								<td>{{ $mat->COD_MATERIAL}}</td>
								<td>{{ $mat->CANTIDAD}} </td>
								@php if(Auth::user()->privilegio==1){ @endphp
								<td><a class="btn btn-danger" id="Cancelar"><img src="{{asset('imagenes/delete2.png')}}" width=15;/></a>
								</td>
								@php} @endphp															
							</tr>


					
@endif





						
						@php
					    $i++
					  @endphp

				

							@endforeach


{!! Form::open(['route'=> ['det_modelo_maquina.destroy',':ID_USER'],'method'=>'DELETE','id'=>'form-delete'])
!!}

{!!Form::close()!!}



										</table>
										</div>

										<!----------------------------------------------------------BOTONES PARTE INFERIOR-------------------------------------------------------------->
									

									<div class="form-group">
							<div class"col-md-0 col-md-offset-0">
								{!! Form::label('separador','____________________________________________________________________________________________________________________________________',array('class' => 'control-label col-md-0')) !!}
							</div>
						</div>

						<form action="" class="form-inline" >				
							
							<div class="col-md-0 col-md-offset-1">
								@php if(Auth::user()->privilegio==1){ @endphp
								<a href="{{ route('modelosMaquinas.edit', $modelos->COD_MODELO) }}" title="Modificar modelo" class="btn btn-warning">Modificar Modelo de Máquina</a>

								<a href="#" title="Eliminar modelo de maquina" data-toggle="modal" data-target="#ventana" class="btn btn-danger">Eliminar Modelo de Máquina</a>
								
								<a href="{{ route('modelosMaquinas.create') }}" class="btn btn-success"> Incorporar Modelo de Máquina </a>
								@php} @endphp
								<a href="{{route('modelosMaquinas.index')}}" class="btn btn-info">Lista de Modelos de Máquinas</a>
								

							</div>	



						</form>
					{!! Form::close() !!}
				</div>
			</div>





		</div>	
		

@stop




@section('js')
	
<script>

	$(document).ready(function(){
		
		

$('.btn-danger').click(function (e){


	
	e.preventDefault();//esto es para que no recargue la página


var row=$(this).parents('tr');
var id=row.data('id');

var form=$('#form-delete');
var url=form.attr('action').replace(':ID_USER/destroy',id);

var data=form.serialize();//transforma la información en datos binarios para que viajen por la red y llegue al backend



/*var tam=document.getElementById("visualizarDetalle").rows.length;*/
   


$.post(url,data, function (result) {//método ajax para poder trabajar de forma asincrona
row.fadeOut();//elimina la casilla de la tabla visualmente






}).fail(function (){//si ocurre un error en la transacción entonces manda este error
	alert('error al eliminar material');

});




});

	});


</script>


@stop