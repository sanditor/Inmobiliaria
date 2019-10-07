$('#nick').change(function() {
    $.post('ajax_validacion_nick.php', {
        nick: $('#nick').val(),

        beforeSend: function() {
            $('.validacion').html('Espere un momento por favor...');
        }
    }, function(respuesta) {
        $('.validacion').html(respuesta);
    });
});


$('#btn_guardar').hide();
$('#pass2').change(function(event){
    if($('#pass1').val() == $('#pass2').val()){
        swal('Excelente','Las contraseñas coinciden','success')
        $('#btn_guardar').show();
    }else{
        swal('Error','Las contraseñas no coinciden','error')
        $('#pass1').val('');
        $('#pass2').val('');       
        $('#btn_guardar').hide();        
    }
    $('#pass1').focus();
});

$('.form').keypress(function(e) {
    if (e.which == 13 )
    return false;
}); 