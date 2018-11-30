<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>advanced table of category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">table</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table Category</h3>
              <div class="pull-right">
                <form action="" method="get">
                  <div class="input-group input-group-sm pull-right">
                  <input type="text" name="SrcCategory" class="form-control" placeholder="Search Category">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Go!</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th class="text-center" width="5%" >No</th>
                    <th width="60%">Nama Kategori</th>
                    <th colspan="2" width="40%" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php 
                  $varSearch = isset($_GET['SrcCategory'])?$_GET['SrcCategory']:"";
                  if (isset($varSearch) && !empty($varSearch)) {
                    $varSQL = mysqli_query($conn, "SELECT * FROM category WHERE category_name LIKE '%$varSearch%'");
                  }else{
                    $varSQL = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC");
                  }

                  $varNO = 1; 
                  if ($varSQL->num_rows) {
                    while ($row = $varSQL->fetch_assoc()) :
                   ?>
                    <td align="center"><?= $varNO++ ?></td>
                    <td><?=ucwords($row['category_name']); ?></td>
                    <td width="18%" ><a href="index.php?pages=update-category&action=update&id=<?=$row['category_id']?>"><button type="button" class="btn btn-block btn-success">Edit</button></a></td>
                    <td width="20%"><a href="../add-category-proc.php?action=delete&category_id=<?=$row['category_id']?>"><button type="button" class="btn btn-block btn-danger" onclick="return confirm('apakah data ingin di hapus');">Hapus</button></a></td>
                  </tr>
                <?php endwhile; ?>
                <?php }else {
                  echo '<tr>
                          <td colspan="4" align="center">Belum ada data Kategori</td>
                        </tr>';;
                } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <div class="pull-left">
                <a href="index.php?pages=add-category"><button type="button" class="btn btn-block btn-primary">Tambah Kategori</button></a>
              </div>              
            </div>
          </div>
        </div>
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->