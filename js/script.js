// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');
    $("#borrar").click(function () {
        $.ajax({
            url: 'borrar_claves.php',
            success: function (data) {
                $('#resultado').html(data);
                $('#').fadeout(data);
            }
        })
    });
    $("#cambiar").click(function () {
        $.ajax({
            url: 'borrar_claves.php',
            success: function (data) {
                $('#resultado').html(data);
                $('#').fadeout(data);
            }
        })
    });
    $("#mostrar").click(function () {
        $.ajax({
            url: 'borrar_claves.php',
            success: function (data) {
                $('#resultado').html(data);
                $('#').fadeout(data);
            }
        })
    });
    $("#añadir").click(function () {
        $.ajax({
            url: 'borrar_claves.php',
            success: function (data) {
                $('#resultado').html(data);
                $('#').fadeout(data);
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
