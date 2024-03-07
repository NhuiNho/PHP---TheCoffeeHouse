<?php
$status = 100;
$order = new order();
if (isset($_GET['status'])) {
     $status = $_GET['status'];
}
switch ($status) {
     case '100':
          $getOrders = $order->getOrders($status);
          if ($getOrders->rowCount() == 0) {
               echo "<script> alert('Trang web của bạn chưa có đơn hàng nào cả') </script>";
               echo "<script> window.location.href='?action=home' </script>";
          } else {
               include_once "View/order.php";
          }
}
