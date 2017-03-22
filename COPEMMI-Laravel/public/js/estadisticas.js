
$(document).ready(function(){
/*dibujaPie();*/
dibujaBarras();








	 });






function dibujaBarras()
{

var options={
      chart: {
	 	    renderTo: 'div_graficos',
            type: 'column'
        },
        title: {
            text: 'Materiales en el inventario'
        },
        subtitle: {
            text: 'COPEMMI'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'Cantidad'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span> <b>{point.y} </b>Unidades<br/>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },

        },
        series: [{
            name: 'Cantidad:',
             colorByPoint: true,
            data: []

        }]
}


var url="http://localhost:8000/traeDatos";
var cuenta;
var datas=new Array();

 $.get(url,function(resul){

    datas = JSON.parse(resul);

   for(var i=0;i<datas.length;i++)
    {
    

  

/*options.series[0].data.push( datas[i]);
    options.xAxis.categories.push(i);*/


options.series[0].data.push(datas[i].cantidad);
options.xAxis.categories.push(datas[i].nombre);

    }





/*chart = new Highcharts.Chart(options);*/


   


 chart = new Highcharts.Chart(options);

  })





}


function dibujaPie()
{

var options={
 chart: {
 	renderTo: 'div_graficos',
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Materiales en el inventario'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        
      
        data: []
    }]


}


var url="http://localhost:8000/traeDatos";
var cuenta;
var datas=new Array();

 $.get(url,function(resul){

    datas = JSON.parse(resul);

   for(var i=0;i<datas.length;i++)
    {
    

 var objeto= {name: datas[i].cod_material, y:datas[i].cantidad};     
    options.series[0].data.push( objeto ); 



    }


 chart = new Highcharts.Chart(options);

  })


}

