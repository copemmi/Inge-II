/*Carga el documento jquery, carga todo el documento jquery*/
/*Función para abrir y ocultar los submenús*/ 

$(document).ready(function(){
	$('.menu li:has(ul)').click(function(e){ //accede los elementos del submenú. 
		e.preventDefault();

		if ($(this).hasClass('activado')){
			$(this).removeClass('activado'); 
			$('.menu li ul').slideUp(); //Para ocultar submenus.
			$(this).children('ul').slideDown();
		}
		else {  
			$('.menu li ul').slideUp(); //Para ocultar submenus. 
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
			
		}
	}); 

/*Abrir y cerrar el menú vertical*/

var contador = 0;

$('.bt-menu').click(function(){

if(contador == 1){

	$('.sidebar').animate({
		left:'1'
	});
	contador=0;
		} else {
			contador = 1;
			$('.sidebar').animate({
				left:'-100%'
			})
		}
});

$('.menu li ul li a').click(function(){

	window.location.href = $(this).attr("href");

});

});
/*
$('.menu li ul li a').click(funtion(){

	window.location.href = $(this).attr("href");

});
*/