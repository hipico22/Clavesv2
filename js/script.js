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
    $(".btnanadir").click(function () {
        $.ajax({
            url: 'añadir_claves.php?pagina=2',
            type: 'POST',

        })
    });
    //tentativa de por o menu a dar
    function alterar_menu_anadir(){
      $('a').removeClass('pag-atual');
      $('.Anadir').addClass('pag-atual');
    }
    function alterar_menu_cambiar(){
      $('a').removeClass('pag-atual');
      $('.Cambiar').addClass('pag-atual');
    }
    function alterar_menu_borrar(){
      $('a').removeClass('pag-atual');
      $('.Borrar').addClass('pag-atual');
    }
});
