@extends ('Menu')
@section ('contenido')

<!--------------------------------------------------------------------TABLA EN EL CENTRO------------------------------------------------------>

		<div class="content">

			<div class="main-image">
				<div id="page-header">		
					<a class="text-left"><img src="{{ asset('imagenes/tek.PNG')}}";/></a>
				</div>
			</div>

			<div class="page-header">
				<h1 class="text-center">Equipo de Trabajo</h1>
			</div>

			<div class="container">
				
				<div class="form-group">
					<div class="col-md-8">
						<h4>Leiman Sánchez Muñoz.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4> 
						<h4>Gerente.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                	</div>
				</div>

				<div class="form-group">
					<div class="col-md-8"> 
						<h4>Edgar Sánchez Muñoz.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4>
						<h4>Gerente.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <h4>Daniel Sánchez Chacón.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span></h4>
                        <h4>Encargado de Producción.<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-briefcase"></i></span></h4>
                    </div>
                </div>

			</div>
		</div>

@stop
