<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../lib/moduls/f_query.php';
include_once 'views/main.php';
?>

<div class="content-fluid">
  <div class="info">
    <p class="text-center">Free Shipping for around the world</p>
  </div>
</div>

<?php 
include_once 'views/navbar.php'; ?>

 <!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Keranjang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>  

    <section class="content">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="box box-warning">
              <div class="box-header">
                <div class="box-title">Produk Saya</div>
                <div class="pull-right">
                  <a class="btn btn-sm btn-info" href="index.php?home">Lanjutkan belanja</a>
                </div>
              </div>
              <div class="box-body">
              <table class="table table-striped">
                  <tr>
                    <th class="text-center" width="5%">No</th>
                    <th width="15%">Gambar</th>
                    <th width="30%">Produk</th>
                    <th width="30%">Harga</th>
                    <th class="text-center" width="10%">Qty</th>
                    <th class="10%">Aksi</th>
                  </tr>
                  <?php 
                  $_SESSION['member_id'] = 1;
                  $member_id = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : '';

                  $varResultCart = mysqli_query($conn, "SELECT c.cart_id,c.cart_qty,p.product_code,p.product_date,p.product_name,p.product_desc,p.product_price,m.member_id FROM cart c JOIN product p ON p.product_code=c.product_code JOIN member m ON m.member_id=c.member_id WHERE c.member_id ='{$member_id}' ORDER BY product_date DESC");
                  $varCekCart = mysqli_num_rows($varResultCart);
                  $varNo = 1;
                  if ($varCekCart > 0) {
                    while ($rows = $varResultCart->fetch_assoc()) :
                      ?>
                        <tr>
                          <td><?=$varNo++?></td>
                          <?php $varQueryImage = mysqli_query($conn,"SELECT image_filename FROM product_images WHERE product_code=".$rows['product_code']." LIMIT 1");
                            $rowImg = mysqli_fetch_assoc($varQueryImage);
                          ?>
                          <td><img class="img-cart" src="product/img/<?=$rowImg['image_filename'] ?>" alt="img"></td>
                          <td><b><?=$rows['product_name'] ?></b> <br><small class="help-block"><?=$rows['product_desc'] ?></small></td>
                          <td>Rp. <?=number_format($rows['product_price'],2,',','.'); ?></td>
                          <td>
                            <form action="../controler/cart_proc.php?a=addQty&cart_id=<?=$rows['cart_id']?>" method="POST">
                              <input class="form-control input-sm col-sx-3 text-center" type="text" name="qty" value="<?=$rows['cart_qty'] ?>">
                            </form>
                          </td>
                          <td>
                            <a class="btn btn-sm btn-danger" href="../controler/cart_proc.php?a=delete&cart_id=<?=$rows['cart_id'];?>"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                       
                        <?php
                        endwhile;
                    }else{
                      echo ' <tr>
                          <td colspan="5">
                            <h3 class="text-center"><i>Keranjang anda masih kosong!</i></h3>
                          </td>
                        </tr>';
                    }
                   ?>
              </table>
            </div>
            <div class="box-footer">
              
            </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-info">
              <div class="box-header">
                <div class="box-title">Pembayaran</div>
              </div>
              <?php 
              // $varQry = "SELECT c.cart_id,c.cart_qty,p.product_code,p.product_date,p.product_name,p.product_desc,p.product_price,m.member_id FROM cart c JOIN product p ON p.product_code=c.product_code JOIN member m ON m.member_id=c.member_id WHERE c.member_id ='{$member_id}'";
              // $rowsPrice = viewsData($varQry);
              // $varPrice = $rowsPrice['product_price'] * $rowsPrice['cart_qty'];
              // $varDisc = $varPrice * 30/100;
              // $varTotal = $varPrice - $varDisc;  
                       
               ?>
              <div class="box-body">
                <table class="table table-border table-striped">
                  <?php //for ($i=0; $i < count($rowsPrice['data']); $i++) : ?>
                  <tr>
                    <td><b>Jumlah Product</b></td>
                    <td><?//=$rowsPrice['data'][$i]['cart_qty'] ?> Produk</td>
                  </tr>
                  <tr>
                    <td><b>Diskon</b></td>
                    <td>30%</td>
                  </tr>
                  <tr>
                    <td><b>Total Bayar</b></td>
                    <td>Rp. <?//=number_format($varTotal,2,',','.'); ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-xl btn-success btn-block pull-right">Bayar Sekarang</button>
              </div>
            </div>
          </div>
        </div>
      </section>  
  </div>
</div>

<?php include_once 'views/footer.php' ?>

      