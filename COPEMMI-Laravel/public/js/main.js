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










