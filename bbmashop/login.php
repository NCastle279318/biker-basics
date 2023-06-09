<?php include 'includes/session.php'; ?>

<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>

  	<div class="login-box-body">
    	<p class="login-box-msg"><span class="custom-font1">Login</span></p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat btn-custom3" name="login">Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="password_forgot.php"><span class="custom-font1">Forgot password?</span></a><br>
      <a href="signup.php" class="text-center"><span class="custom-font1">Signup</span></a><br>
      <a href="index.php"><span class="custom-font1"><i class="fa fa-home"></i> Home</span></a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>