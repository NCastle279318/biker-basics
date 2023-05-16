<!-- jQuery -->
<script src="../libraries/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="../libraries/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="../libraries/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../libraries/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../libraries/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../libraries/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../libraries/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../libraries/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE -->
<script src="../libraries/adminlte/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="../libraries/ckeditor/ckeditor.js"></script>

<!-- Active Script -->
<script>
$(function(){
	var url = window.location;
  
	// Sidebar
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// Treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>

<!-- Data Table Initialization -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function(){
    //Select2 Initialization
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>


