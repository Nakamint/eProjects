	<script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
  <script>
	window.onload = function (){
	  custompriceOther()
  };
  function custompriceOther() {
    $('.custom-price').each(function() {
      var money = +$(this).text();
      var moneyDots = money.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $(this).text('  ' + moneyDots + ' VND ');
    });
  };
</script>
</body>
</html>