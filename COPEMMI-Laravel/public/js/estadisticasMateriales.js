
$(document).ready(function(){
/*dibujaPie();*/
dibujaBarras();










	 });

$("#comboGrafico").change(function(){

var valor=$("#comboGrafico").val();

switch(valor)
{
case '1':

dibujaBarras();
break;

case '2':

dibujaPie();
break;


}

}




    );





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
            alpha: 45
            
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
         
                    innerSize: 100,
            depth: 45
          
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
    

 var objeto= {name: datas[i].nombre, y:datas[i].cantidad};     
    options.series[0].data.push( objeto ); 



    }


 chart = new Highcharts.Chart(options);

  })


}

