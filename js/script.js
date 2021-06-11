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
    $('#busqueda').keyup(function (e) {
       let buscar = $('#busqueda').val();
       console.log(buscar);
       $.ajax({
           url: 'busqueda.php',
           type: 'POST',
           data: { buscar: buscar },
           success: function (data) {
               $('#resultado').html(data);
           }
       })
   });
    $("#añadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php',
            type: 'POST',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Anadir').addClass('pag-atual')
            }
        })
    });
});
