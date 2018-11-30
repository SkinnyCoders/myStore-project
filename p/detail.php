<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../lib/moduls/f_query.php';
include_once 'views/main.php';

$varProductId = $_GET['product_id'];

$varProduct = viewData("SELECT * FROM product JOIN category ON category.category_id=product.category_id WHERE product_code=$varProductId");

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
	<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Category</a></li>
      <li><a href="#"><?=ucwords($varProduct['category_name']) ?></a></li>
    </ol>
  </section>

      <section class="content">
      	<div class="row">
      		<div class="col-md-6 col-sm-12">
      			<div id="carousel-product" class="carousel slide" data-ride="carousel">
               	<div class="carousel-inner">
               	<?php 
                	$varQRY = "SELECT image_filename FROM product_images WHERE product_code=$varProductId";
					$data = viewsData($varQRY); 
					?>
					<div class="item active">
			            <img  src="product/img/<?= $data[0]['image_filename'] ?>" alt="" style="width: 600px; align-items: center !important;">

			            <!-- <div class="carousel-caption">
			                First Slide
			            </div> -->
			        </div>
			        <div class="item">
			            <img  src="product/img/<?= $data[1]['image_filename']?>" alt="" style="width: 600px; lign-items: center !important;">
 
			            <!-- <div class="carousel-caption">
			                First Slide
			            </div> -->
			        </div>
			        <div class="item">
			            <img  src="product/img/<?= $data[2]['image_filename'] ?>" alt="" style="width: 600px; lign-items: center !important;">

			           <!--  <div class="carousel-caption">
			                First Slide
			            </div> -->
			        </div>
                </div>

                <a class="left carousel-control" href="#carousel-product" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-product" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>

      		</div>
      		<div class="col-md-5">
      			<div class="product-info">
      				<h1><?=$varProduct['product_name'];?></h1>
	      			<h3>Rp.<?=number_format($varProduct['product_price'],2,',','.') ?></h3>
	      			<hr>
	      			<h4>Description Product</h4>
	      			<p><?= $varProduct['product_desc'] ?></p>
	      			<hr>
	      			<h4>Shipping estimated</h4>
	      			<ul>
	      				<li>International Shipping 7 working days</li>
	      				<li>Local Shipping 3 working days</li>
	      			</ul>
	      			<br>
	      			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, tempore distinctio architecto aut earum repudiandae sequi in similique</p>
	      			<hr>
      			</div>
      			<div class="row">
              <form action="../controler/cart_proc.php?a=add" method="POST">
                <div class="col-md-2">
                <label for="">Quantity</label>
                </div>
                <div class="col-md-2">
                  <input type="hidden" name="product_code" value="<?=$varProduct['product_code']?>">
                  <input class="form-control input-sm col-sx-3"  style="margin-bottom: 10px;" type="number" name="cart_qty" value="1">
                </div>
                <div class="col-md-8">
                  <button class="btn btn-md btn-block btn-primary" style="margin-bottom: 10px;" name="add"><i class="fa fa-shopping-cart"></i>  Add To Cart</button>
                </div>
              </form>
      			</div>
      		</div>
      	</div>

      </section>
    </div>
</div>

<?php include_once 'views/footer.php' ?>