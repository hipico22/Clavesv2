// Cuando el documento carga, probamos si funciona jquery.
$(document).ready(function () {
    let edit = false;
    console.log('jquery is working!');

    $("#mostrar").click(function () {
        $.ajax({
            url: 'mostrar_claves.php?pagina=1',
            success: function (data) {
                $('#resultado').html(data);
                $('a').removeClass('pag-atual');
                $('.Mostrar').addClass('pag-atual');
            }
        })
    });
    //Este es el menú de arriba al pulsar borrar.
    $("#borrar").click(function () {
        $.ajax({
            url: 'borrar_claves.php?pagina=1&tipo=borrar',
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
            url: 'cambiar_claves.php?pagina=1&tipo=cambiar',
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
            url: 'cambiar_claves.php?pagina=1&tipo=cambiar',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Cambiar').addClass('pag-atual')
              $('#paginacion').fadeOut();
            }
        })
    });
    $('#busqueda').keyup(function () {
       let buscar = $('#busqueda').val();
       console.log(buscar);
       $.ajax({
           url: 'busqueda.php?pagina=1',
           type: 'GET',
           data: { buscar: buscar },
           success: function (data) {
               $('#resultado').html(data);
               $('#paginacion').fadeOut();
           }
       })
   });
    $("#añadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php?pagina=1&tipo=anadir',
            type: 'POST',
            success: function (data) {
              $('#resultado').html(data);
              $('a').removeClass('pag-atual');
              $('.Anadir').addClass('pag-atual')
              $('#paginacion').fadeOut();
            }
        })
    });
    $(".btnanadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php?pagina=2',
            type: 'POST',

        })
    });

    //tentativa de por o menu a dar
    $("#ana").click(function(){
      $('a').removeClass('pag-atual');
      $(".Anadir").addClass("pag-atual");
    });

    $("#camb").click(function(){
      $('a').removeClass('pag-atual');
      $(".Cambiar").addClass("pag-atual");
    });

    $("#borr").click(function(){
      $('a').removeClass('pag-atual');
      $(".Borrar").addClass("pag-atual");
    });
});
