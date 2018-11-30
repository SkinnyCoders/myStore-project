  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['name']); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENUS</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="index.php?pages=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>

        <!-- menu dropdown -->
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Produk</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?pages=add-product"><i class="fa fa-plus"></i>Tambah Produk</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>kaos</a></li>
          </ul>
        </li>

        <!-- menu kategory -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Kategori</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?pages=category"><i class="fa fa-circle-o"></i>Kategori</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>