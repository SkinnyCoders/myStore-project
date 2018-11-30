  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
          <a href="../../index2.html" class="navbar-brand"><b>my</b>Store</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php?home">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Produk</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              <?php 
                $varQuery = mysqli_query($conn,"SELECT category_name FROM category ORDER BY category_id DESC");
                if (mysqli_num_rows($varQuery) > 0) {
                  while ($rows = $varQuery->fetch_assoc()) {
                    echo '<li><a href="#">'.ucwords($rows['category_name']).'</a></li>';
                  }
                }
               ?>
              </ul>
            </li>
          </ul>
            <form class="navbar-form navbar-left" action="" method="get">
              <div class="input-group navbar-src">
              <input type="text" name="SrcCategory" class="form-control" placeholder="Search product">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-custom-menu pull-right">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 20px"></i></a></li>
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">
                  admin
                  </span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li><a href="#">Akun</a></li>
                  <li><a href="#">Payments</a></li>
                  <li class="divider"></li>
                  <li><a href="#">My Order</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>