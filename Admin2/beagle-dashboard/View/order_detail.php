<?php
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $order_detail = new order_detail();
     $order = new order();
     $payment_method = new payment_method();
     $order_status = new order_status();
     $product = new product();
     $size = new size();
     $topping = new topping();
     $voucher = new voucher();
     $getOrder = $order->getOrdersById($id);
     $getOrderDetail = $order_detail->getOrderDetailById($id);
     if ($getOrderDetail->rowCount() != 0 && $getOrder->rowCount() != 0) {
          $setOrder = $getOrder->fetch();
?>
          <div class="be-content">
               <div class="main-content container-fluid">
                    <div class="row">
                         <div class="d-flex justify-content-between align-items-center py-3">
                              <h2 class="h5 mb-0 fs-2"><a href="#" class="text-muted"></a> Order #<?= $setOrder['id'] ?></h2>
                         </div>

                         <!-- Main content -->
                         <div class="row">
                              <div class="col-lg-8">
                                   <!-- Details -->
                                   <div class="card mb-4">
                                        <div class="card-body">
                                             <div class="mb-3 d-flex justify-content-between fs-3">
                                                  <div>
                                                       <span class="me-3"><?= $setOrder['time'] ?></span>
                                                       <span class="me-3">#<?= $setOrder['id'] ?></span>
                                                       <span class="me-3"><?= $payment_method->getPaymentMethod($setOrder['payment_method'])->fetch()['name_method'] ?></span>
                                                       <span class="badge rounded-pill bg-info fs-4"><?= $order_status->getStatus($setOrder['status'])->fetch()['name']; ?></span>
                                                  </div>
                                             </div>
                                             <table class="table table-borderless">
                                                  <tbody>
                                                       <?php
                                                       $totalPrice = 0;
                                                       $sumTotalNew = 0;
                                                       while ($setOrderDetail = $getOrderDetail->fetch()) {
                                                            $priceProduct = 0;
                                                            $getProduct = $product->getProductById($setOrderDetail['product_id']);
                                                            while ($setProduct = $getProduct->fetch()) {
                                                       ?>
                                                                 <tr>
                                                                      <td>
                                                                           <div class="d-flex mb-2">
                                                                                <div class="flex-shrink-0">
                                                                                     <img src="../../Content/image/<?= $setProduct['image'] ?>" alt="<?= $setProduct['name'] ?>" width="85" class="img-fluid">
                                                                                </div>
                                                                                <div class="flex-lg-grow-1 ms-3">
                                                                                     <div class="product-info">
                                                                                          <h6 class="product-title fs-2">
                                                                                               <?= $setProduct['name'] ?>
                                                                                          </h6>
                                                                                          <?php $getSize = $size->getSizeById($setOrderDetail['size_id'])->fetch();
                                                                                          $priceProduct += intval($setProduct['price']);
                                                                                          if ($getSize['description_name'] != '') {
                                                                                               $priceProduct += intval($getSize['price']);
                                                                                          ?>
                                                                                               <span><em>Size:</em> <?= $getSize['description_name'] ?></span><br>

                                                                                          <?php }
                                                                                          if ($setOrderDetail['topping_id'] != 100 && $setOrderDetail['topping_id'] != '') {
                                                                                          ?>
                                                                                               <span> <em>Topping:</em>
                                                                                               <?php
                                                                                               if (strlen($setOrderDetail['topping_id']) > 1) {
                                                                                                    $list_topping = explode('+', $setOrderDetail['topping_id']);;
                                                                                                    foreach ($list_topping as $each) {
                                                                                                         $getTopping = $topping->getToppingById($each)->fetch();
                                                                                                         $priceProduct += intval($getTopping['price']);
                                                                                                         echo $getTopping['name'] . '<br>';
                                                                                                    }
                                                                                               } else {
                                                                                                    $getTopping = $topping->getToppingById($setOrderDetail['topping_id'])->fetch();
                                                                                                    $priceProduct += intval($getTopping['price']);
                                                                                                    echo $getTopping['name'] . '<br>';
                                                                                               }
                                                                                          }
                                                                                          $priceProduct *= intval($setOrderDetail['quantity']);
                                                                                          $totalPrice += $priceProduct;
                                                                                               ?></span>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </td>
                                                                      <td class="fs-4"><?= $setOrderDetail['quantity'] ?></td>
                                                                      <td class="text-end fs-4">$ <?= number_format($priceProduct, 0, ',', '.') ?></td>
                                                                 </tr>

                                                       <?php
                                                            }
                                                       } ?>
                                                  </tbody>
                                                  <tfoot class="fs-4">
                                                       <?php $shipping = 0; ?>
                                                       <tr>
                                                            <td colspan="2">Subtotal</td>
                                                            <td class="text-end">$ <?= number_format($totalPrice, 0, ',', '.') ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="2">Shipping</td>
                                                            <td class="text-end">$ <?= number_format($shipping, 0, ',', '.') ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td colspan="2">Discount <?php if (isset($setOrder['voucher_id'])) {
                                                                                          $getVoucher = $voucher->getVoucherById($setOrder['voucher_id'])->fetch();
                                                                                          echo "(Code: " . $getVoucher['code'] . ")";
                                                                                     } ?></td>
                                                            <td class="text-danger text-end">$ <?php if (isset($setOrder['voucher_id'])) {
                                                                                                    $priceVoucher = $getVoucher['discount'] / 100 * $priceProduct;
                                                                                               } else {
                                                                                                    $priceVoucher = 0;
                                                                                               }
                                                                                               echo number_format($priceVoucher, 0, ',', '.') ?></td>
                                                       </tr>
                                                       <tr class="fw-bold">
                                                            <td colspan="2">TOTAL</td>
                                                            <td class="text-end">$ <?= number_format($setOrder['total_price'], 0, ",", ".") ?></td>
                                                       </tr>
                                                  </tfoot>
                                             </table>
                                        </div>
                                   </div>
                                   <!-- Payment -->
                                   <div class="card mb-4 fs-5">
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-lg-6">
                                                       <h3 class="h6">Payment Method</h3>
                                                       <p><?= $payment_method->getPaymentMethod($setOrder['payment_method'])->fetch()['name_method'] ?><br>
                                                            Total: $ <?= number_format($setOrder['total_price'], 0, ",", ".") ?> <span class="badge bg-success rounded-pill"></span></p>
                                                  </div>
                                                  <div class="col-lg-6">
                                                       <h3 class="h6">Billing address</h3>
                                                       <address>
                                                            <strong><?= $setOrder['name_receiver'] ?></strong><br>
                                                            <?= $setOrder['address_receiver'] ?><br>
                                                            <abbr title="Phone"></abbr> <?= $setOrder['phone_receiver'] ?>
                                                       </address>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4 fs-5">
                                   <div class="card mb-4">
                                        <!-- Shipping information -->
                                        <div class="card-body">
                                             <h3 class="h6">Shipping Information</h3>
                                             <strong>FedEx</strong>
                                             <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i> </span>
                                             <hr>
                                             <h3 class="h6">Billing address</h3>
                                             <address>
                                                  <strong><?= $setOrder['name_receiver'] ?></strong><br>
                                                  <?= $setOrder['address_receiver'] ?><br>
                                                  <abbr title="Phone"></abbr> <?= $setOrder['phone_receiver'] ?>
                                             </address>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
<?php }
}
?>