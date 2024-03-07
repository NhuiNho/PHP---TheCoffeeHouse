<?php
$order = new order();
$order_status = new order_status();
$payment_method = new payment_method();
$cart = new cart();
if (isset($_SESSION['id'])) {
     $getAllOrder = $order->getOrderById('all', $_SESSION['id']);
} else if (isset($_SESSION['email'])) {
     $getAllOrder = $order->getOrderByEmail('all', $_SESSION['email']);
}

?>
<h3 class="text-primary text-center">Lịch sử mua hàng</h3>
<table class="table table-success table-hover table-bordered table-sm table-responsive-sm">
     <thead>
          <tr class="text-center">
               <th scope="col" class="text-start">Mã đơn hàng</th>
               <th scope="col">Thời gian</th>
               <th scope="col">Tổng Tiền</th>
               <th scope="col">Phương thức thanh toán</th>
               <th scope="col">Voucher</th>
               <th scope="col">Trạng thái</th>
               <th scope="col">Xem chi tiết</th>
               <th scope="col">Thao tác</th>
          </tr>
     </thead>
     <tbody>
          <?php if (isset($_SESSION['email']) || isset($_SESSION['id'])) {
               while ($get = $getAllOrder->fetch()) { ?>
                    <tr>
                         <td><?= $get['id'] ?></td>
                         <td><?= $get['time'] ?></td>
                         <td><?= $get['total_price'] ?></td>
                         <td>
                              <?php echo $payment_method->getPaymentMethodById($get['payment_method'])->fetch()['name_method'] ?>
                         </td>
                         <td><?= $get['voucher_id'] ?></td>
                         <td>
                              <?php echo $order_status->getOrderStatusById($get['status'])->fetch()['name'] ?>
                         </td>
                         <td class="text-center"><a href="?action=order&act=order_detail&order_id=<?= $get['id'] ?>" class="btn btn-primary">Chi tiết</a></td>
                         <?php if ($get['status'] == 1) { ?>
                              <td class="text-center"><a href="?action=order&act=order_cancel&order_id=<?= $get['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn hủy đơn chứ ?')">Hủy đơn</a></td>
                              <?php  } else {
                              if (isset($_SESSION['id'])) {
                                   if ($cart->getCartById($_SESSION['id'])->rowCount() != 0) {

                              ?>
                                        <td class="text-center"><a href="" id="rebook_true_<?= $get['id'] ?>" class="btn btn-success" onclick="Order(<?= $get['id'] ?>, true)">Đặt lại đơn hàng</a></td>
                                   <?php
                                   } else {
                                   ?>
                                        <td class="text-center"><a href="" id="rebook_false_<?= $get['id'] ?>" class="btn btn-success" onclick="Order(<?= $get['id'] ?>, false)">Đặt lại đơn hàng</a></td>
                                   <?php
                                   }
                              } else if (isset($_SESSION['email'])) {
                                   ?>
                                   <td class="text-center"><a href="?action=order&act=order_rebook&order_id=<?= $get['id'] ?>&login=false" class="btn btn-success">Đặt lại đơn hàng</a></td>
                         <?php
                              }
                         } ?>
                    </tr>
          <?php }
          } ?>
     </tbody>
</table>
<script>
     function Order(id, active) {
          var result = '';
          if (active) {
               var check = confirm('Bạn có muốn thêm các sản phẩm này cùng giỏ hàng hay không ?');
               result = '?action=order&act=order_rebook&order_id=' + id + '&delete_cart=' + check;
               document.getElementById('rebook_true_' + id).setAttribute('href', result);
          } else {
               var check = confirm('Bạn có chắc muốn đặt lại các sản phẩm này ?');
               if (check) {
                    result = '?action=order&act=order_rebook&order_id=' + id + '&delete_cart=' + check;
               } else {
                    result = '?action=order&act=order_history';
               }
               document.getElementById('rebook_false_' + id).setAttribute('href', result);
          }
     }
</script>