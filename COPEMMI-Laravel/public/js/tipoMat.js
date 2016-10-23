/*Carga el documento jquery, carga todo el documento jquery*/
/*Función para abrir y ocultar los submenús*/ 

$('.checkbox').click(function(){
    $('.checkbox').each(function(){
        $(this).prop('checked', false); 
    }); 
    $(this).prop('checked', true);
});










