$('#estado').change(function() {
    $.post('ajax_muni.php', {
        estado:$('#estado').val(),

        beforeSend: function() {
            $('.validacion').html('Espere un momento por favor...');
        }
    }, function(respuesta) {
        $('.res_estado').html(respuesta);
    });
});
