
<div class="content-fluid">
  <div class="info">
    <p class="text-center">Free Shipping for around the world</p>
  </div>
</div>

<?php include_once 'views/navbar.php'; ?>

 <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      <div class="jumbotron">
        <h1>Hello Welcome to our store!</h1>
        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad voluptatem aperiam maiores qui, dolor, blanditiis ipsum eius iste autem sequi, delectus est rerum molestiae natus architecto distinctio dolorem, labore molestias.</h4>
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

              $varQuery = mysqli_query($conn,"SELECT * FROM product JOIN category ON category.category_id=product.category_id JOIN product_images ON product_images.product_code=product.product_code");

              //cek datanya ada atau tidak
              $varCekProduct = mysqli_num_rows($varQuery);
              if ($varCekProduct > 0) {
                while ($row = $varQuery->fetch_assoc()) :
               ?>
                <div class="col-md-3">
                  <div class="thumbnail">
                    <?= '<img class="img_product" src="img/'.$row['image_filename'].'" alt="" align="center"> '?>
                    <h3 class="text-header"><?= $row['product_name']  ?></h3>
                    <h4>Rp.</h4>
                    <label class="label-lg label-info"><?= $row['category_name'] ?></label>
                    <p><?= $row['product_desc']  ?></p>
                    <div class="row">
                      <div class="col-md-6">
                        <a class="btn btn-block btn-success" role="button" href="order.php?product_id=<?= $row['product_code'] ?>"><i class="fa fa-cart"></i></a>
                      </div>
                      <div class="col-md-6">
                        <a class="btn btn-block btn-info" role="button" href="">Detail</a>
                      </div>
                    </div>
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