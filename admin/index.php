<?php 
session_start();
include '../lib/moduls/f_conn.php';
include '../lib/moduls/f_query.php';

if (!isset($_SESSION['login']) OR $_SESSION['login'] !== 'login' AND $_COOKIE['admin_id'] == $_SESSION['admin_id']) {
  echo "<script>alert('Upss! Anda belum login');window.location='../controler/logout.php'</script>";
  exit;
}

//auto logout
if (isset($_SESSION['log_activitie'])) {
  if ($_SESSION['log_activitie'] + 1200 < time()) {
    header('location: ../controler/logout.php');
  }
}
$_SESSION['log_activitie'] = time();



 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="refresh" content="1205">  
  <link rel="stylesheet" href="../lib/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../lib/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../lib/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../lib/bower_components/select2/dist/css/select2.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .wrapper-fileUploads{
      border: 3px dashed green;
      background-color: #eee;
      border-spacing: 100%;
      padding: 10px;
      align-items: center;
      margin: auto; 
    }
    .wrapper-fileUploads input{
      display: none;
    }


  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<!-- Main Header -->
<?php
include_once 'moduls/header.php';
?> 
<!-- sidebar -->
<?php
include_once 'moduls/sidebar.php';
?>

<!-- Main Kontent -->
<?php 
if (isset($_GET['pages'])) {
  if ($_GET['pages'] == 'category') {
    include_once 'pages/category.php';
  }elseif ($_GET['pages'] == 'add-category') {
    include_once 'pages/add-category.php';
  }elseif ($_GET['pages'] == 'update-category') {
    include_once 'pages/update-category.php';
  }elseif ($_GET['pages'] == 'dashboard') {
     include_once 'pages/dashboard.php';
  }elseif ($_GET['pages'] == 'add-product') {
    include_once 'pages/add-product.php';
  }
  else{
    include_once 'pages/dashboard.php';
  }
}
//Searching
if (isset($_GET['SrcCategory'])) {
  include_once 'pages/category.php';
}

if (!isset($_GET['pages'])) {
  include_once 'pages/error-404.php';
}
 ?>

<!-- Main Footer -->
<?php
include_once 'moduls/footer.php';
?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../lib/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../lib/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>