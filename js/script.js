// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');
    //Este es el menú de arriba al pulsar borrar.
    $("#borrar").click(function () {
        $.ajax({
            url: 'borrar_claves.php',
            success: function (data) {
                $('#resultado').html(data);
                $('a').removeClass('pag-atual');
                $('.Borrar').addClass('pag-atual')
            }
        })
    });
    //Cuando clickeamos en eliminar, elimina la columna.
    $("#cambiar").click(function () {
        $.ajax({
            url: 'cambiar_claves.php',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Cambiar').addClass('pag-atual')
            }
        })
    });

    $("#cambiar1").click(function () {
        $.ajax({
            url: 'cambiar_claves.php',
            success: function (data) {q
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Cambiar').addClass('pag-atual')
            }
        })
    });
    $("#añadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Anadir').addClass('pag-atual')
            }
        })
    });
});
