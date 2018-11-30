<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>advanced table of category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">Tambah kategori</li>
      </ol>
    </section>

    <div class="content"> 
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tambah kategori</h3>
            </div>
              <form class="form-horizontal" action="../add-category-proc.php" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="frmCategory" class="col-md-2 control-label">Nama Kategory</label>
                    <div class="col-md-8">
                      <input type="text" name="frmCategory" class="form-control" placeholder="Nama Kategori">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="simpan-kategori" class="btn btn-info">SIMPAN</button>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>