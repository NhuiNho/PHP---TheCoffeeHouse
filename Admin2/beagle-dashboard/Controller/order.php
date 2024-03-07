<?php
$act = "order_history";
$order = new order();
$order_status = new order_status();
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'order_history':
          include_once "View/order_history.php";
          break;
     case 'order_detail':
          include_once "View/order_detail.php";
          break;
     case 'update_order':
          $id = '';
          $status = '';
          $alert = '';
          if (isset($_GET['id']) && isset($_GET['status'])) {
               $id = $_GET['id'];
               $status = $_GET['status'];
               $alert = $order_status->getStatus($status)->fetch()['name'];
               $checkUpdate = $order->updateOrderStatus($id, $status);
               if ($checkUpdate) {
                    echo "<script>alert('Cập nhật trạng thái " . $alert . " thành công');</script>";
               } else {
                    echo "<script>alert('Cập nhật trạng thái " . $alert . " thất bại');</script>";
               }
               echo "<script> window.location.href='?action=order&act=order_history'</script>";
          }
}
