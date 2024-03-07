<!-- Main content -->
<?php
$cart = new cart();

$order = new order();
?>
<div class="row">
     <div class="col-lg-12">
          <!-- Details -->
          <div class="card mb-4">
               <div class="card-body">
                    <table class="table table-borderless">
                         <tbody>
                              <?php
                              $totalPrice = 0;
                              if (isset($_SESSION['id'])) {
                                   $getCartById =  $cart->getCartById($_SESSION['id']);
                                   while ($row = $getCartById->fetch()) {
                                        $priceProduct = 0;
                                        $getProduct = $cart->getProduct($row['product_id']);
                                        while ($products = $getProduct->fetch()) {
                              ?>
                                             <tr>
                                                  <td>
                                                       <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                 <img src="Content/image/<?= $products['image'] ?>" alt="<?= $products['name'] ?>" width="35" class="img-fluid">
                                                            </div>
                                                            <div class="flex-lg-grow-1 ms-3">
                                                                 <div class="product-info">
                                                                      <h6 class="product-title">
                                                                           <?= $products['name'] ?>
                                                                      </h6>
                                                                      <?php $size = $cart->getSize($row['size_id'])->fetch();
                                                                      $priceProduct += intval($products['price']);
                                                                      if ($size['description_name'] != '') {
                                                                           $priceProduct += intval($size['price']);
                                                                      ?>
                                                                           <span><em>Size:</em> <?= $size['description_name'] ?></span><br>

                                                                      <?php }
                                                                      if ($row['topping_id'] != 100 && $row['topping_id'] != '') {
                                                                      ?>
                                                                           <span> <em>Topping:</em>
                                                                           <?php
                                                                           if (strlen($row['topping_id']) > 1) {
                                                                                $list_topping = explode('+', $row['topping_id']);
                                                                                $i = 0;
                                                                                foreach ($list_topping as $each) {
                                                                                     $i++;
                                                                                     $topping = $cart->getTopping($each)->fetch();
                                                                                     $priceProduct += intval($topping['price']);
                                                                                     if ($i != 1) {
                                                                                          echo ', ' . $topping['name'];
                                                                                     } else {
                                                                                          echo $topping['name'];
                                                                                     }
                                                                                }
                                                                           } else {
                                                                                $topping = $cart->getTopping($row['topping_id'])->fetch();
                                                                                $priceProduct += intval($topping['price']);
                                                                                echo $topping['name'] . '<br>';
                                                                           }
                                                                      }
                                                                      $priceProduct *= intval($row['quantity']);
                                                                      $totalPrice += $priceProduct;
                                                                           ?></span>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </td>
                                                  <td><?= $row['quantity'] ?></td>
                                                  <td class="text-end">$ <?= number_format($priceProduct, 0, ',', '.') ?></td>
                                             </tr>
                                        <?php
                                        }
                                   }
                              } else if (isset($_SESSION['item'])) {
                                   foreach ($_SESSION['item'] as $key => $row) {
                                        $priceProduct = 0;
                                        $getProduct = $cart->getProduct($row['product_id']);
                                        while ($products = $getProduct->fetch()) {
                                        ?>
                                             <tr>
                                                  <td>
                                                       <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                 <img src="Content/image/<?= $products['image'] ?>" alt="<?= $products['name'] ?>" width="35" class="img-fluid">
                                                            </div>
                                                            <div class="flex-lg-grow-1 ms-3">
                                                                 <div class="product-info">
                                                                      <h6 class="product-title">
                                                                           <?= $products['name'] ?>
                                                                      </h6>
                                                                      <?php $size = $cart->getSize($row['size_id'])->fetch();
                                                                      $priceProduct += intval($products['price']);
                                                                      if ($size['description_name'] != '') {
                                                                           $priceProduct += intval($size['price']);
                                                                      ?>
                                                                           <span><em>Size:</em> <?= $size['description_name'] ?></span><br>

                                                                      <?php }
                                                                      if ($row['topping_id'] != 100 && $row['topping_id'] != '') {
                                                                      ?>
                                                                           <span> <em>Topping:</em>
                                                                           <?php
                                                                           if (strlen($row['topping_id']) > 1) {
                                                                                $list_topping = explode('+', $row['topping_id']);
                                                                                $i = 0;
                                                                                foreach ($list_topping as $each) {
                                                                                     $i++;
                                                                                     $topping = $cart->getTopping($each)->fetch();
                                                                                     $priceProduct += intval($topping['price']);
                                                                                     if ($i != 1) {
                                                                                          echo ', ' . $topping['name'];
                                                                                     } else {
                                                                                          echo $topping['name'];
                                                                                     }
                                                                                }
                                                                           } else {
                                                                                $topping = $cart->getTopping($row['topping_id'])->fetch();
                                                                                $priceProduct += intval($topping['price']);
                                                                                echo $topping['name'] . '<br>';
                                                                           }
                                                                      }
                                                                      $priceProduct *= intval($row['quantity']);
                                                                      $totalPrice += $priceProduct;
                                                                           ?></span>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </td>
                                                  <td><?= $row['quantity'] ?></td>
                                                  <td class="text-end">$ <?= number_format($priceProduct, 0, ',', '.') ?></td>
                                             </tr>
                              <?php
                                        }
                                   }
                              }
                              ?>
                         </tbody>
                         <?php
                         $sumTotalNew = $totalPrice;
                         $sale = 0;
                         if (isset($_POST['addCoupon'])) {
                              $voucher = $cart->getVoucher($_POST['coupon']);
                              if ($voucher->rowCount() == 1) {
                                   $a = $voucher->fetch();
                                   $discount = $a['discount'];
                                   $sale = ($discount / 100) * $totalPrice;
                                   $sumTotalNew = $totalPrice * (1 - ($discount / 100));
                                   echo "<script> alert('Chúc mừng, bạn được giảm " . $discount . "%!')</script>";
                              } else {
                                   echo "<script> alert('Mã voucher không hợp lệ!')</script>";
                              }
                         }
                         ?>
                         <tfoot>
                              <tr>
                                   <td colspan="2">Subtotal</td>
                                   <td class="text-end">$ <?= number_format($totalPrice, 0, ',', '.') ?></td>
                              </tr>
                              <tr>
                                   <td colspan="2">Shipping</td>
                                   <td class="text-end">$ 0.00</td>
                              </tr>
                              <tr>
                                   <td colspan="2">Discount <?php if (isset($discount)) echo "(Code: " . $a['code'] . ")" ?></td>
                                   <td class="text-danger text-end">$ <?= number_format($sale, 0, ',', '.') ?></td>
                              </tr>
                              <tr class="fw-bold">
                                   <td colspan="2">TOTAL</td>
                                   <td class="text-end">$ <?= number_format($sumTotalNew, 0, ',', '.') ?></td>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>
          <!-- Payment -->
          <div class="card mb-4">
               <div class="card-body">
                    <div class="row">
                         <div class="col-lg-12">
                              <form class="coupon-form" method="post" action="?action=order">
                                   <input class="form-control-cart form-control-sm-cart" type="text" name="coupon" placeholder="Coupon code" required="">
                                   <button class="btn btn-outline-primary btn-sm" type="submit" name="addCoupon">Apply Coupon</button>
                              </form>
                         </div>
                         <form action="?action=order&act=order_action" method="post">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div>
                                             <input type="hidden" name="total_price" value="<?= $sumTotalNew ?>">
                                             <input type="hidden" name="voucher" value="<?php if (isset($a['id'])) {
                                                                                               echo $a['id'];
                                                                                          } else {
                                                                                               echo "null";
                                                                                          } ?>">
                                             <h5 class="font-size-14 mb-3">Payment method :</h5>
                                             <div class="row">
                                                  <?php
                                                  $getPayment = $order->getAllPaymentMethod();
                                                  while ($payment = $getPayment->fetch()) {
                                                       $active = "checked";
                                                  ?>
                                                       <div class="col-lg-3 col-sm-6">
                                                            <div data-bs-toggle="collapse">
                                                                 <label class="card-radio-label">
                                                                      <input type="radio" name="payment_method" value="<?= $payment['id'] ?>" id="pay_methodoption<?= $payment['id'] ?>" class="card-radio-input" <?= $active ?>>
                                                                      <span class="card-radio py-3 text-center text-truncate">
                                                                           <i class="<?= $payment['icon'] ?> d-block h2 mb-3"></i>
                                                                           <?= $payment['name_method'] ?>
                                                                      </span>
                                                                 </label>
                                                            </div>
                                                       </div>
                                                  <?php
                                                       $active = "";
                                                  } ?>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <h3 class="h6">Billing address</h3>
                                        <div class="mb-3">
                                             <label class="small mb-1" for="inputFullname">Fullname</label>
                                             <input class="form-control" name="inputFullname_faker" id="inputFullname_faker" type="text" placeholder="Enter your fullname" value="<?php echo (isset($_SESSION['id'])) ? $getUsers['fullname'] : '' ?>" required maxlength="200">
                                             <input type="hidden" name="inputFullname" id="inputFullname" value="">
                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="mb-3">
                                             <label class="small mb-1" for="inputAddress">Address</label>
                                             <input class="form-control" name="inputAddress_faker" id="inputAddress_faker" type="text" placeholder="Enter your address" value="<?php echo (isset($_SESSION['id'])) ? $getUsers['address'] : '' ?>" required maxlength="200">
                                             <input type="hidden" name="inputAddress" id="inputAddress" value="">
                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="mb-3">
                                             <label class="small mb-1" for="inputEmail">Email</label>
                                             <input class="form-control" name="inputEmail_faker" id="inputEmail_faker" type="text" placeholder="Enter your Email" value="<?php echo (isset($_SESSION['id'])) ? $getUsers['email'] : '' ?>" required maxlength="200">
                                             <input type="hidden" name="inputEmail" id="inputEmail" value="">
                                        </div>
                                        <!-- Form Group (phone)-->
                                        <div class="mb-3">
                                             <label class="small mb-1" for="inputPhone">Phone</label>
                                             <input class="form-control" name="inputPhone_faker" id="inputPhone_faker" type="text" placeholder="Enter your phone number" value="<?php echo (isset($_SESSION['id'])) ? $getUsers['phone'] : '' ?>" required maxlength="11" minlength="10" pattern="[0-9]+">
                                             <input type="hidden" name="inputPhone" id="inputPhone" value="">
                                        </div>
                                        <button type="button" class="btn btn-info" onclick="enable()">Edit</button>
                                        <button type="button" class="btn btn-primary" onclick="update()">Update</button>
                                   </div>
                                   <button type="submit" class="btn btn-primary form-control mt-3" name="submit" id="submit" onclick="dathang()">Đặt hàng</button>
                              </div>

                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
<script>
     var inputFullname_faker = document.getElementById('inputFullname_faker');
     var inputAddress_faker = document.getElementById('inputAddress_faker');
     var inputPhone_faker = document.getElementById('inputPhone_faker');
     var inputEmail_faker = document.getElementById('inputEmail_faker');



     function ganGiaTri() {
          document.getElementById('inputFullname').value = inputFullname_faker.value;
          document.getElementById('inputAddress').value = inputAddress_faker.value;
          document.getElementById('inputPhone').value = inputPhone_faker.value;
          document.getElementById('inputEmail').value = inputEmail_faker.value;
          inputFullname_faker.disabled = true;
          inputAddress_faker.disabled = true;
          inputPhone_faker.disabled = true;
          inputEmail_faker.disabled = true;
     }

     function check() {
          if (inputFullname_faker.value == '' || inputAddress_faker.value == '' || inputPhone_faker.value == '' || inputEmail_faker.value == '') {
               enable();
          }
     }
     ganGiaTri();
     check();

     function enable() {
          inputFullname_faker.disabled = false;
          inputAddress_faker.disabled = false;
          inputPhone_faker.disabled = false;
          inputEmail_faker.disabled = false;
          document.getElementById('submit').disabled = true;
     }

     function update() {
          ganGiaTri();
          document.getElementById('submit').disabled = false;
          check();
     }
</script>
<?php  ?>