<?php 
  $id = $_GET['id'];
  $view = viewData("SELECT * FROM category WHERE category_id = '$id'");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Update table of category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">Update kategori</li>
      </ol>
    </section>

    <div class="content"> 
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Update kategori</h3>
            </div>
              <form class="form-horizontal" action="../add-category-proc.php?action=update&category_id='<?=$id?>'" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="frmCategory" class="col-md-2 control-label">Nama Kategory</label>
                    <div class="col-md-8">
                      <input type="text" name="frmCategory" class="form-control" value="<?=$view['category_name']?>">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="update" class="btn btn-info">UPDATE</button>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>