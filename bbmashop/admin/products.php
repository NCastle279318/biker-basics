<?php include 'includes/session.php'; ?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>Products</li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct">New</a>
              <div class="pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();

                        foreach($stmt as $crow){
                          $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                          echo "
                            <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                          ";
                        }

                        $pdo->close();
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Price</th>
                  <th>Views Today</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products $where");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                            </td>
                            <td>&#82; ".number_format($row['price'], 2)."</td>
                            <td>".$counter."</td>
                            <td>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'>Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>
