<!-- jQuery -->
<script src="libraries/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="libraries/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="libraries/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="libraries/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="libraries/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="libraries/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE -->
<script src="libraries/adminlte/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="libraries/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    CKEDITOR.replace('editor1')
  });
</script>
<script>
$(function(){
  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('.cart-count').html(response.count);
		}
	});
}
</script>