<!DOCTYPE html>
<html lang="en">
<?php
// cách 1
// spl_autoload_register('myModelClassLoader');
// function myModelClassLoader($className)
// {
//   $path = "Model/";
//   include_once $path . $className . '.php';
// }
// cách 2
set_include_path((get_include_path() . PATH_SEPARATOR . 'Model/'));
spl_autoload_extensions('.php');
spl_autoload_register();
session_start()
// include_once 'Model/get_product_info.php';
?>

<head>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets\img\logo-fav.png">
  <title>Admin TCH</title>
  <link rel="stylesheet" type="text/css" href="assets\lib\perfect-scrollbar\css\perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="assets\lib\material-design-icons\css\material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="assets\lib\jquery.vectormap\jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" type="text/css" href="assets\lib\jqvmap\jqvmap.min.css">
  <link rel="stylesheet" type="text/css" href="assets\lib\datetimepicker\css\bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="assets\css\app1.css" type="text/css">

</head>
<?php $ctrl = "home";
if (isset($_GET['action']) && isset($_SESSION['id_admin'])) {
  $ctrl = $_GET['action'];
} else if (isset($_GET['action']) && $_GET['action'] == 'admin' && $_GET['act']  == 'login_admin') {
  $ctrl = $_GET['action'];
}
?>

<body>
  <div class="be-wrapper be-fixed-sidebar">
    <?php if (isset($_SESSION['id_admin'])) {
      include_once "View/header.php";
    }  ?>

    <?php include_once "Controller/$ctrl.php" ?>
    
    <?php if (isset($_SESSION['id_admin'])) {
      include_once "View/header1.php";
    }  ?>
  </div>
  <script src="assets\lib\jquery\jquery.min.js" type="text/javascript"></script>
  <script src="assets\lib\perfect-scrollbar\js\perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets\lib\bootstrap\dist\js\bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets\js\app.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\jquery.flot.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\jquery.flot.pie.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\jquery.flot.time.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\jquery.flot.resize.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\plugins\jquery.flot.orderBars.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\plugins\curvedLines.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-flot\plugins\jquery.flot.tooltip.js" type="text/javascript"></script>
  <script src="assets\lib\jquery.sparkline\jquery.sparkline.min.js" type="text/javascript"></script>
  <script src="assets\lib\countup\countUp.min.js" type="text/javascript"></script>
  <script src="assets\lib\jquery-ui\jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets\lib\jqvmap\jquery.vmap.min.js" type="text/javascript"></script>
  <script src="assets\lib\jqvmap\maps\jquery.vmap.world.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
      App.dashboard();

    });
  </script>
</body>

</html>