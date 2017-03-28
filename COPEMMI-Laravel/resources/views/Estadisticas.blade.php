@extends ('Menu')
@section ('contenido')


<head>
   <style type="text/css">
${demo.css}
        </style>
</head>
<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
     
<div  class="row" >
    <br>
    <br>
    <br>
    
    <div class="col-md-4 col-sm-offset-5">
       
                    <h1 class="text-center">Estadísticas COPEMMI</h1>
                </div>


</div>


<div class="col-md-2 col-sm-offset-3">
{!! Form::label('option','Módulo',array('class' => 'control-label col-md-0')) !!}

    <select class="form-control" name="comboGrafico" id="comboGrafico">
                                    
        <option value="1">Materiales</option>
        <option value="2">Oŕdenes</option>
                                                                 
    </select>
                             
</div>

<div class="col-md-2 col-sm-offset-4">
{!! Form::label('option','Gráfico',array('class' => 'control-label col-md-0')) !!}

    <select class="form-control" name="comboTipo" id="comboTipo">
                                  
        <option value="1">Barras</option>
        <option value="2">Circular</option>
                                    

                                 
                                  
    </select>
                             
</div>

<div id="container" style="min-width: 310px; height: 400px; ">

<br/>
<br/>
<br/>


<div class="col-md-8  col-sm-offset-3">
   
      <div class="box-body" id="div_graficos">
      </div>
</div>

</div>
</div>

</body>


@stop

@section('js')
    
    {!! Html::script('js/estadisticas.js') !!}

@stop