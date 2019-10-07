</main>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<script src="../js/buscador.js"></script>
<script>
  $('.button-collpase').sideNav();
  $('select').material_select();
  //inicializar datepicker
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    clear: 'limpiar',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
    // container: undefined, // ex. 'body' will append picker to body
  });

  function may(obj, id){
      obj = obj.toUpperCase();
      document.getElementById(id).value = obj; }
</script>
</body>
</html>
