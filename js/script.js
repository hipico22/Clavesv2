// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');
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
});
