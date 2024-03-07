<?php
$order = new order();
$order_status = new order_status();
$payment_method = new payment_method();
$voucher = new voucher();
$status = 'all';
if (isset($_GET['status'])) {
     $status = $_GET['status'];
}
$getAllOrders = $order->getOrdersByStatus($status);
?>
<div class="be-content">
     <div class="main-content container-fluid">
          <div class="row">
               <caption>Order History</caption>
               <table class="table table-dark  table-hover table-bordered table-sm table-responsive-sm">

                    <thead>
                         <tr>
                              <th scope="col">Order Id</th>
                              <th scope="col">User Id</th>
                              <th scope="col">Name Receiver</th>
                              <th scope="col">Phone Receiver</th>
                              <th scope="col">Address Receiver</th>
                              <th scope="col">Time</th>
                              <th scope="col">Total Price</th>
                              <th scope="col">Payment Method</th>
                              <th scope="col">Voucher</th>
                              <th scope="col">Trạng thái</th>
                              <th scope="col">Details</th>
                              <th scope="col">Actions</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php while ($get = $getAllOrders->fetch()) { ?>
                              <tr <?php if ($get['status'] == 1) {
                                        echo "class='table-active'";
                                   } ?>>
                                   <th scope="row"><?= $get['id'] ?></th>
                                   <td><?= $get['user_id'] ?></td>
                                   <td><?= $get['name_receiver'] ?></td>
                                   <td><?= $get['phone_receiver'] ?></td>
                                   <td><?= $get['address_receiver'] ?></td>
                                   <td><?= $get['time'] ?></td>
                                   <td><?= number_format($get['total_price'], 0, ",", ".") ?> đ</td>
                                   <td>
                                        <?php echo $payment_method->getPaymentMethod($get['payment_method'])->fetch()['name_method'] ?>
                                   </td>
                                   <td>
                                        <?php if (isset($get['voucher_id'])) echo $voucher->getVoucherById($get['voucher_id'])->fetch()['code']; ?>
                                   </td>
                                   <td <?php
                                        echo $get['status'] == 1 ? "class='text-warning'" : "";
                                        ?>>
                                        <?php
                                        echo $order_status->getStatus($get['status'])->fetch()['name'];
                                        ?>
                                   </td>
                                   <td>
                                        <a href="?action=order&act=order_detail&id=<?= $get['id'] ?>"><button type="button" class="btn btn-outline-primary">Xem chi tiết</button></a>
                                   </td>
                                   <?php if (!($get['status'] == 3 || $get['status'] == 4)) ?>
                                   <td>
                                        <?php
                                        if ($get['status'] == 1) {
                                        ?>
                                             <a href="?action=order&act=update_order&status=<?= $get['status'] + 1 ?>&id=<?= $get['id'] ?>"><button type="button" class="btn btn-outline-success">Bắt đầu giao</button></a>
                                        <?php }
                                        if ($get['status'] == 2) { ?>
                                             <a href="?action=order&act=update_order&status=<?= $get['status'] + 1 ?>&id=<?= $get['id'] ?>"><button type="button" class="btn btn-outline-success">Giao thành công</button></a>
                                        <?php }
                                        if ($get['status'] == 1) { ?>
                                             <a href="?action=order&act=update_order&status=<?= $get['status'] + 3 ?>&id=<?= $get['id'] ?>"><button type="button" class="btn btn-outline-danger">Hủy đơn</button></a>
                                        <?php } ?>
                                   </td>
                                   <?php ?>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>