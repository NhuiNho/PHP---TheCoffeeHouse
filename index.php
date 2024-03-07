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
  session_start();
  include_once 'Model/class.phpmailer.php';
  // include_once 'Model/get_product_info.php';
  ?>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link đăng nhập -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- end link đăng nhập -->
    <link href="Content/CSS/style1.css" rel='stylesheet' type='text/css' media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>The Coffee House</title>
    <style>

    </style>
  </head>

  <body>
    <?php $kn = new connect() ?>
    <!-- header -->
    <?php
    include_once "View/header.php";
    $ctrl = "home";
    ?>
    <!-- hiên thi noi dung -->

    <div class="container pt-5 mt-5">
      <div class="row">
        <!-- hien thi noi dung đây -->
        <?php
        if (isset($_GET['action'])) {
          $ctrl = $_GET['action'];
        }
        include_once "Controller/$ctrl.php";
        ?>
      </div>
    </div>
    <!-- hiên thị footer -->
    <?php
    include_once "View/footer.php"
    ?>
  </body>

  </html>