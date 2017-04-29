$(document).ready(function(){
dibujaBarras();


     });


$("#comboGrafico").change(function(){

var valor=$("#comboGrafico").val();

switch(valor)
{
case '1':
document.getElementById("comboTipo").disabled=false;
dibujaBarras();
break;

case '2':
document.getElementById("comboTipo").disabled=true;

dibujaLineas();
break;


}

});

$("#comboTipo").change(function(){

var valor=$("#comboGrafico").val();
var tipo=$("#comboTipo").val();



if(valor=='1')
{
if(tipo=='1')
{
dibujaBarras();

}
else
{

    dibujaPie();
}


}






});

function dibujaLineas()
{

var grafico=
{



 chart: {
   renderTo: 'div_graficos',
        type: 'line'
    },
    title: {
        text: 'Órdenes de fabricación, año 2017'
    },
    subtitle: {
        text: 'COPEMMI'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: []

}

var url="/traeDatosOrdenes";
var arrayPrincipal=new Array();

$.get(url,function(resul)
{


var arrayPrincipal = JSON.parse(resul);

var tipoOrden1= {name:'Terminadas', data:[
arrayPrincipal[0].eneroTer,
arrayPrincipal[0].febreroTer,
arrayPrincipal[0].marzoTer,
arrayPrincipal[0].abrilTer,
arrayPrincipal[0].mayoTer,
arrayPrincipal[0].junioTer,
arrayPrincipal[0].julioTer,
arrayPrincipal[0].agostoTer,
arrayPrincipal[0].septiembreTer,
arrayPrincipal[0].octubreTer,
arrayPrincipal[0].noviembreTer,
arrayPrincipal[0].diciembreTer

]}; 

var tipoOrden2= {name:'En producción', data:[
arrayPrincipal[1].eneroProd,
arrayPrincipal[1].febreroProd,
arrayPrincipal[1].marzoProd,
arrayPrincipal[1].abrilProd,
arrayPrincipal[1].mayoProd,
arrayPrincipal[1].junioProd,
arrayPrincipal[1].julioProd,
arrayPrincipal[1].agostoProd,
arrayPrincipal[1].septiembreProd,
arrayPrincipal[1].octubreProd,
arrayPrincipal[1].noviembreProd,
arrayPrincipal[1].diciembreProd

]}; 

var tipoOrden3= {name:'Inactivas', data:[
arrayPrincipal[2].eneroInac,
arrayPrincipal[2].febreroInac,
arrayPrincipal[2].marzoInac,
arrayPrincipal[2].abrilInac,
arrayPrincipal[2].mayoInac,
arrayPrincipal[2].junioInac,
arrayPrincipal[2].julioInac,
arrayPrincipal[2].agostoInac,
arrayPrincipal[2].septiembreInac,
arrayPrincipal[2].octubreInac,
arrayPrincipal[2].noviembreInac,
arrayPrincipal[2].diciembreInac

]}; 



    grafico.series.push(tipoOrden1);
    grafico.series.push(tipoOrden2);
    grafico.series.push(tipoOrden3);

 chart = new Highcharts.Chart(grafico);


  })
 }

function dibujaBarras()
{

var grafico={
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


var url="/traeDatos";
var cuenta;
var datas=new Array();

 $.get(url,function(resul){

    datas = JSON.parse(resul);

   for(var i=0;i<datas.length;i++)
    {

       grafico.series[0].data.push(datas[i].cantidad);
       grafico.xAxis.categories.push(datas[i].nombre);

    }

 chart = new Highcharts.Chart(grafico);

  })

}


function dibujaPie()
{

var grafico={
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
        pointFormat: 'Cantidad: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
           
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            innerSize: 100,
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


var url="/traeDatos";
var cuenta;
var datas=new Array();

 $.get(url,function(resul){

    datas = JSON.parse(resul);

   for(var i=0;i<datas.length;i++)
    {
       var objeto= {name: datas[i].nombre, y:datas[i].cantidad};   
       grafico.series[0].data.push(objeto); 
    }


 chart = new Highcharts.Chart(grafico);

  })


}


