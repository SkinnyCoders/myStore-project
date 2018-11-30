<?php 
include '../lib/moduls/f_code.php';
include '../controler/product_proc.php';
error_reporting(E_ALL ^ (E_NOTICE));
 ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Produk
        <small>Insert of Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Produk</a></li>
        <li class="active">Tambah Produk</li>
      </ol>
    </section>

    <div class="content"> 
      <div class="row">
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header <?$alert; ?>">
              <h3 class="box-title">Tambah Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
              <?= $alert; ?>
                <div class="row">
                  <dic class="col-md-8">
                    <div class="form-group">
                      <label for="name">Nama Produk</label>
                      <input type="text" name="frmNamaProduk" class="form-control" id="name" placeholder="Nama Produk">
                    </div>
                  </dic>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="kode">Kode Produk</label>
                      <input type="text" value="<?=kode()?>" name="frmKodeProduk" class="form-control" id="kode" placeholder="Kode Produk">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Pilih Gambar</label>
                  <div class="wrapper-fileUploads text-center">
                  <label for="fileImage">
                    <img width="70" height="70" src="../admin/img/upload-icon.png">
                    <p>pilih gambar produk (maks 3 file)</p>
                  </label>

                  <input id="fileImage" type="file" multiple="" name="fileImageProduk[]" id="exampleInputFile">

                  <p class="help-block">Ukuran gambar maksimal 1mb.</p>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="stok">Stok Produk</label>
                  <input type="text" name="frmStokProduk" class="form-control" id="stok" placeholder="Stok Produk">
                </div>
                <div class="form-group">
                  <label for="price">Harga Produk</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" name="frmHargaProduk" class="form-control" id="price" placeholder="Harga Produk">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc">Deskripsi Produk</label>
                  <textarea class="form-control" name="frmDeskProduk" rows="3" id="desc" placeholder="Deskripsi Produk..."></textarea>
                </div>
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="pull-left">
                  <small>*Produk yang dijual harus dapat dipertanggung jawabkan</small>
                </div>
                <div class="pull-right">
                   <button type="submit" name="jual" class="btn btn-primary">JUAL</button>
                </div>
               
              </div>
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategory</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                    <label for="kategori">Pilih Kategori</label>
                    <select class="form-control select2" id="kategori" name="categoryDrop" style="width: 100%;">
                    <option value="">Pilih Kategori</option>
                    <?php

                    $varSQL = mysqli_query($conn, "SELECT * FROM category");
                      if ($varSQL->num_rows) {
                        while ($varRows = $varSQL->fetch_assoc()) {
                           echo '<option value="'.$varRows['category_id'].'">'.$varRows['category_name'].'</option>';
                        }
                      }
                     ?>
                    </select>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-body">
                <div class="form-group">
                  <label for="off">Diskon</label>
                  <div class="input-group">
                    <span class="input-group-addon">OFF</span>
                    <input type="text" name="frmDisProduk" class="form-control" id="off" placeholder="Diskon Produk">
                    <span class="input-group-addon">%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
</div>