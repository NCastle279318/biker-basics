<header class="main-header">
  <nav class="navbar navbar-static-top">

    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><img src="images/biker-basics-shoplogo.jpg" width="100" height="auto"></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Nav Links -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
              $conn = $pdo->open();
              try {
                $stmt = $conn->prepare("SELECT * FROM category");
                $stmt->execute();
                foreach ($stmt as $row) {
                  echo "
                      <li><a href='category.php?category=" . $row['cat_slug'] . "'>" . $row['name'] . "</a></li>
                    ";
                }
              } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
              }
              $pdo->close();
              ?>
            </ul>
          </li>
        </ul>
        <!-- Nav Links -->
      </div>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- Cart -->
          <li class="static-menu">
            <a href="cart_view.php">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart-count"></span>
            </a>
          </li>
          <!-- Cart -->

          <!-- User -->
          <?php
          if (isset($_SESSION['user'])) {
            $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
            echo '
                <!-- Menu Toggle -->  
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="' . $image . '" class="user-image" alt="User Image">
                    <span class="hidden-xs">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>
                  </a>

                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="' . $image . '" class="img-circle" alt="User Image">
                      <p>
                        ' . $user['firstname'] . ' ' . $user['lastname'] . '
                        <small>Member since ' . date('M. Y', strtotime($user['created_on'])) . '</small>
                      </p>
                    </li>

                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>

                </li>
              ';
          } else {
            echo "
                <li><a href='login.php'>Login</a></li>
                <li><a href='signup.php'>Signup</a></li>
              ";
          }
          ?>
          <!-- User -->

        </ul>

      </div>

    </div>

  </nav>

</header>