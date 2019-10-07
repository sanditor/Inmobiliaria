$('#buscar').keyup(function(event){
  var contenido = new RegExp($(this).val(), 'i');
  $('tr').hide();
  $('tr').filter(function() {
    return contenido.test($(this).text());
  }).show();
  $('.cabecera').attr('style','');
});
