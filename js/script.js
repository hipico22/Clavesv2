// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');
    //Este es el menú de arriba al pulsar borrar.
    $("#borrar").click(function () {
        $.ajax({
            url: 'borrar_claves.php?pagina=1',
            success: function (data) {
                $('#resultado').html(data);
                $('a').removeClass('pag-atual');
                $('.Borrar').addClass('pag-atual')
                $('#paginacion').fadeOut();
            }
        })
    });
    //Cuando clickeamos en eliminar, elimina la columna.
    $("#cambiar").click(function () {
        $.ajax({
            url: 'cambiar_claves.php?pagina=1',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Cambiar').addClass('pag-atual')
              $('#paginacion').fadeOut();
            }
        })
    });
    $("#cambiar1").click(function () {
        $.ajax({
            url: 'cambiar_claves.php?pagina=1',
            success: function (data) {q
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Cambiar').addClass('pag-atual')
              $('#paginacion').fadeOut();
            }
        })
    });
    $('#busqueda').keyup(function (e) {
       let buscar = $('#busqueda').val();
       console.log(buscar);
       $.ajax({
           url: 'busqueda.php?pagina=1',
           type: 'POST',
           data: { buscar: buscar },
           success: function (data) {
               $('#resultado').html(data);
               $('#paginacion').fadeOut();
           }
       })
   });
    $("#añadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php?pagina=1',
            type: 'POST',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Anadir').addClass('pag-atual')
              $('#paginacion').fadeOut();
            }
        })
    });
    /*
    for (var int = 0; int < 10; int++) {
    (function (int) {
        $.ajax({
            url : 'process.php',
            success : function() {
                alert("TEST");
            }
        });
    })(int);
}*/
});
