@extends ('Menu')
@section ('contenido')




<div  class="row" >
    <br>
    <br>
    <br>
    
    <div class="page-header">
                    <h1 class="text-center">Estadísticas del inventario</h1>
                </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</div>
<div class="col-md-1 col-sm-offset-3">

                                <select class="form-control" name="comboGrafico" id="comboGrafico">
                                    
                                    <option value="1">Barras</option>
                                    <option value="2">Circular</option>

                                 
                                  
                                </select>
                             
                            </div>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">

<br/>
<br/><br/>


<div class="col-md-8  col-sm-offset-3">
   
 

        <div class="box-body" id="div_graficos">
     
      

     
  

</div>

</div>


       


    



</div>
</div>
<script>




</script>











@stop

@section('js')
    
    {!! Html::script('js/estadisticasMateriales.js') !!}
    {!! Html::script('js/highcharts.js') !!}


@stop