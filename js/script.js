// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');
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
