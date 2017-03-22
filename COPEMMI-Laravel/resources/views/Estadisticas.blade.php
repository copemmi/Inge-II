@extends ('Menu')
@section ('contenido')




<div  class="row" >
    <br>
    <br>
    <br>
    
    <div class="page-header">
                    <h1 class="text-center">Estadísticas del inventario</h1>
                </div>


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
    {!! Html::script('js/graficas.js') !!}
    {!! Html::script('js/estadisticas.js') !!}
    {!! Html::script('js/highcharts.js') !!}


@stop