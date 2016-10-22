/*Carga el documento jquery, carga todo el documento jquery*/
/*Función para abrir y ocultar los submenús*/ 

$(document).ready(function(){
	$('.menu li:has(ul)').click(function(e){ /*elementos li del menu que tengan ul o sea los que tengan submenu*/
	/*cuando alguno fue clickeado se va a ejecutar toda la función con parámetro 3
	que en este caso llama a e.preventDefault();*/
		e.preventDefault(); /*para que no me redirija a otra página*/


		if($(this).hasClass('activado')){ /*si el elemento clickeado tiene clase activado*/
		   $(this).removeClass('activado'); /*se le quita*/
		   $(this).children('ul').slideUp(); /*el submenu ul se oculta*/

	}else{ /*si el elemento clickeado no tiene la clase activado*/
		$('.menu li ul').slideUp(); /*todos los submenus se ocultan*/
		$('.menu li').removeClass('activado'); /*a todos los li se les quita la clase actiado para quitar el color*/
		$(this).addClass('activado'); /*solo al que fue clickeado se le pone activado*/
		$(this).children('ul').slideDown(); /*el elemento clickeado con hijos ul va a mostrar los mismos*/
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



});//fin del ready

//para que toda la fila de un material en la tabla sea un link 
$('tr[data-href]').on("click", function() {
    document.location = $(this).data('href');
});

/*Método que pasa el mouse y sale el mensaje de información en los íconos de ayuda*/

$('[rel="popover"]').popover({
	trigger: 'hover',
	html: true, 
	delay: 500, 
}); 










