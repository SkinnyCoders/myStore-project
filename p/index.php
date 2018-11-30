<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../lib/moduls/f_query.php';
?>

<!-- Content -->
<?php 
if (isset($_GET['home'])) {
  include_once 'home.php';
}elseif (isset($_GET['product'])) {
  include_once 'product/index.php';
}else{
  include_once 'home.php'; 
}

?>