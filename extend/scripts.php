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
    format: 'yyyy-m-d',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    clear: 'limpiar',
    close: 'Ok'
  });

  function may(obj, id){
      obj = obj.toUpperCase();
      document.getElementById(id).value = obj; }
</script>
</body>
</html>
