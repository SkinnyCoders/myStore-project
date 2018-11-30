<?php 
include_once '../lib/moduls/f_conn.php';
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

      <div class="jumbotron text-center">
        <h1>Hello Welcome to our new store!</h1>
        <br>
        <button class="btn btn-xl btn-primary-blue" style="margin-bottom: 10px; align-self: center;">shop now</button>
      </div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Brand New
        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Produk</a></li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="row">
              <div class="wrapper-product">
              <?php 
              $varQuery = mysqli_query($conn,"SELECT * FROM product JOIN category ON category.category_id=product.category_id ORDER BY product_date DESC");

              //cek datanya ada atau tidak
              $varCekProduct = mysqli_num_rows($varQuery);

              if ($varCekProduct > 0) {
                while ($row = $varQuery->fetch_assoc()) :
               ?>
                <div class="col-md-3 col-sm-6">
                  <div class="thumbnail">
                    <a class="dis-product" href="detail.php?product_id=<?=$row['product_code']?>" >
                      <div class="link-hover">
                        <div class="link-hover-content">
                          <h4 class="link-text">Detail</h4>
                        </div>
                      </div>
                      <?php $varQueryImage = mysqli_query($conn,"SELECT image_filename FROM product_images WHERE product_code=".$row['product_code']." LIMIT 1");
                        $rows = mysqli_fetch_assoc($varQueryImage);
                       ?>
                       <img class="img_product" src="product/img/<?= $rows['image_filename'] ?>" alt="" align="center">
                    </a>
                    <h2><?= $row['product_name'];?></h2>
                    <h4><?= $row['product_desc'] ?></h4>
                    <label for="" class="discount">
                      30%
                      OFF
                    </label>
                    <h5>Rp. <?=number_format($row['product_price'],2,',','.')?></h5>

                    <label class="label-product"><?= ucwords($row['category_name']); ?></label>
                    <a class="btn btn-block btn-primary" role="button" href="order.php?product_id=<?= $row['product_code'] ?>"><i class="fa fa-cart-plus"></i>  Add to Cart</a>
                  </div>
                </div>
                  <?php endwhile;
              }else{
                echo '<div class="callout callout-info">
                        <div class="text-center">
                        <h4>Belum ada produk untuk dijual!</h4>

                        <p>Silahkan berkunjung kembali.</p>
                        </div>
                      </div>';
              }?>
              </div>
            </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>

  <?php 
include_once 'views/footer.php';

   ?>