<?php
$act = "product";
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'product':
          include_once "View/product.php";
          break;
     case 'product_detail':
          include_once "View/product_detail.php";
          break;
     default:
          include_once "View/home.php";
          break;
}
