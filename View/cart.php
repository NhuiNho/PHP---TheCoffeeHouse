<?php
$cart = new cart();
if (isset($_SESSION['id'])) {
     $getCart = $cart->getCartById($_SESSION['id']);
     if ($getCart->rowCount() == 0) {
          echo "<script>alert('Không có sản phẩm, vui lòng đi mua sắm')</script>";
          echo "<script> window.location.href='?action=product' </script>";
     }
} else if (!isset($_SESSION['item']) || count($_SESSION['item']) == 0) {
     echo "<script>alert('Không có sản phẩm, vui lòng đi mua sắm')</script>";
     echo "<script> window.location.href='?action=product' </script>";
}
if (isset($_SESSION['item']) || isset($_SESSION['id'])) {
?>
     <div class="padding-bottom-3x mb-1">
          <!-- Alert-->
          <!-- <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><img class="d-inline align-center" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAzIDUxMi4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDMgNTEyLjAwMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMjU2LjAwMSw2NGMtNzAuNTkyLDAtMTI4LDU3LjQwOC0xMjgsMTI4czU3LjQwOCwxMjgsMTI4LDEyOHMxMjgtNTcuNDA4LDEyOC0xMjhTMzI2LjU5Myw2NCwyNTYuMDAxLDY0eiAgICAgIE0yNTYuMDAxLDI5OC42NjdjLTU4LjgxNiwwLTEwNi42NjctNDcuODUxLTEwNi42NjctMTA2LjY2N1MxOTcuMTg1LDg1LjMzMywyNTYuMDAxLDg1LjMzM1MzNjIuNjY4LDEzMy4xODQsMzYyLjY2OCwxOTIgICAgIFMzMTQuODE3LDI5OC42NjcsMjU2LjAwMSwyOTguNjY3eiIgZmlsbD0iIzUwYzZlOSIvPgoJCQk8cGF0aCBkPSJNMzg1LjY0NCwzMzMuMjA1YzM4LjIyOS0zNS4xMzYsNjIuMzU3LTg1LjMzMyw2Mi4zNTctMTQxLjIwNWMwLTEwNS44NTYtODYuMTIzLTE5Mi0xOTItMTkycy0xOTIsODYuMTQ0LTE5MiwxOTIgICAgIGMwLDU1Ljg1MSwyNC4xMjgsMTA2LjA2OSw2Mi4zMzYsMTQxLjE4NEw2NC42ODQsNDk3LjZjLTEuNTM2LDQuMTE3LTAuNDA1LDguNzI1LDIuODM3LDExLjY2OSAgICAgYzIuMDI3LDEuNzkyLDQuNTY1LDIuNzMxLDcuMTQ3LDIuNzMxYzEuNjIxLDAsMy4yNDMtMC4zNjMsNC43NzktMS4xMDlsNzkuNzg3LTM5Ljg5M2w1OC44NTksMzkuMjMyICAgICBjMi42ODgsMS43OTIsNi4xMDEsMi4yNCw5LjE5NSwxLjI4YzMuMDkzLTEuMDAzLDUuNTY4LTMuMzQ5LDYuNjk5LTYuNGwyMy4yOTYtNjIuMTQ0bDIwLjU4Nyw2MS43MzkgICAgIGMxLjA2NywzLjE1NywzLjU0MSw1LjYzMiw2LjY3Nyw2LjcyYzMuMTM2LDEuMDY3LDYuNTkyLDAuNjQsOS4zNjUtMS4yMTZsNTguODU5LTM5LjIzMmw3OS43ODcsMzkuODkzICAgICBjMS41MzYsMC43NjgsMy4xNTcsMS4xMzEsNC43NzksMS4xMzFjMi41ODEsMCw1LjEyLTAuOTM5LDcuMTI1LTIuNzUyYzMuMjY0LTIuOTIzLDQuMzczLTcuNTUyLDIuODM3LTExLjY2OUwzODUuNjQ0LDMzMy4yMDV6ICAgICAgTTI0Ni4wMTcsNDEyLjI2N2wtMjcuMjg1LDcyLjc0N2wtNTIuODIxLTM1LjJjLTMuMi0yLjExMi03LjMxNy0yLjM4OS0xMC42ODgtMC42NjFMOTQuMTg4LDQ3OS42OGw0OS41NzktMTMyLjIyNCAgICAgYzI2Ljg1OSwxOS40MzUsNTguNzk1LDMyLjIxMyw5My41NDcsMzUuNjA1TDI0Ni43LDQxMS4yQzI0Ni40ODcsNDExLjU2MywyNDYuMTY3LDQxMS44NCwyNDYuMDE3LDQxMi4yNjd6IE0yNTYuMDAxLDM2Mi42NjcgICAgIEMxNjEuOSwzNjIuNjY3LDg1LjMzNSwyODYuMTAxLDg1LjMzNSwxOTJTMTYxLjksMjEuMzMzLDI1Ni4wMDEsMjEuMzMzUzQyNi42NjgsOTcuODk5LDQyNi42NjgsMTkyICAgICBTMzUwLjEwMywzNjIuNjY3LDI1Ni4wMDEsMzYyLjY2N3ogTTM1Ni43NTksNDQ5LjEzMWMtMy40MTMtMS43MjgtNy41MDktMS40NzItMTAuNjg4LDAuNjYxbC01Mi4zNzMsMzQuOTIzbC0zMy42NDMtMTAwLjkyOCAgICAgYzQwLjM0MS0wLjg1Myw3Ny41ODktMTQuMTg3LDEwOC4xNi0zNi4zMzFsNDkuNTc5LDEzMi4yMDNMMzU2Ljc1OSw0NDkuMTMxeiIgZmlsbD0iIzUwYzZlOSIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" width="18" height="18" alt="Medal icon">&nbsp;&nbsp;With this purchase you will earn <strong>290</strong> Reward Points.</div> -->
          <!-- Shopping Cart-->
          <div class="table-responsive shopping-cart">
               <table class="table">
                    <thead>
                         <tr>
                              <th>Product Name</th>
                              <th class="text-center">Quantity</th>
                              <th class="text-center">Subtotal</th>
                              <th class="text-center">Discount</th>
                              <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="?action=cart&act=removeallcart" onclick="return confirm('Bạn có muốn xóa không?')">Clear Cart</a></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $sumQuantity = 0;
                         $sumDiscount = 0;
                         $sumTotal = 0;
                         if (isset($_SESSION['id'])) {
                              while ($row = $getCart->fetch()) {
                                   $price = 0;
                                   $product = $cart->getProduct($row['product_id'])->fetch();
                                   $price += intval($product['price']) * $row['quantity'];
                                   $sumQuantity += $row['quantity'];
                         ?>
                                   <tr>
                                        <td>
                                             <div class="row">
                                                  <div class="col-md-9">
                                                       <div class="product-item">
                                                            <a class="product-thumb" href="?action=product&act=product_detail&id=<?= $product['id'] ?>"><img src="Content/image/<?= $product['image'] ?>" alt="Product"></a>
                                                            <div class="product-info">
                                                                 <h4 class="product-title">
                                                                      <a href="?action=product&act=product_detail&id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                                                                 </h4>
                                                                 <?php $size = $cart->getSize($row['size_id'])->fetch();
                                                                 if ($size['description_name'] != '') {
                                                                      $price += intval($size['price']) * $row['quantity']; ?>
                                                                      <span><em>Size:</em> <?= $size['description_name'] ?></span>

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
                                                                                $price += intval($topping['price']) * $row['quantity'];
                                                                                if ($i != 1) {
                                                                                     echo ', ' . $topping['name'];
                                                                                } else {
                                                                                     echo $topping['name'];
                                                                                }
                                                                           }
                                                                      } else {
                                                                           $topping = $cart->getTopping($row['topping_id'])->fetch();
                                                                           $price += intval($topping['price']) * $row['quantity'];
                                                                           echo $topping['name'] . '<br>';
                                                                      }
                                                                 }
                                                                      ?></span>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-3 text-end pt-5">
                                                       <a class="btn btn-primary" id="update<?= $product['id'] ?>" onclick="Update(<?= $product['id'] ?>, <?= $row['id'] ?>)" style="display: none">Update</a>
                                                       <a class="btn btn-primary" id="edit<?= $product['id'] ?>" name="edit" onclick="Edit(<?= $product['id'] ?>)">Edit</a>
                                                  </div>
                                             </div>
                                        </td>
                                        <td class="text-center">
                                             <div class="count-input">
                                                  <input type="number" id="quantity<?= $product['id'] ?>" min="1" name="quantity" class="form-control text-center" value="<?= $row['quantity'] ?>" readonly>
                                             </div>
                                        </td>
                                        <td class="text-center text-lg text-medium"><?= number_format($price, 0, ',', '.') ?></td>
                                        <td class="text-center text-lg text-medium"><?php if ($product['sale'] != null) {
                                                                                          $sumDiscount -= $product['sale'];
                                                                                          echo $product['sale'];
                                                                                     } else {
                                                                                          echo 0;
                                                                                     } ?></td>
                                        <td class="text-center"><a class="remove-from-cart" href="?action=cart&act=removecart&id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-trash"></i></a></td>
                                   </tr>
                              <?php
                                   $sumTotal += $price;
                              }
                         } else if (isset($_SESSION['item'])) {
                              foreach ($_SESSION['item'] as $key => $row) {
                                   $price = 0;
                                   $product = $cart->getProduct($row['product_id'])->fetch();
                                   $price += intval($product['price']) * $row['quantity'];
                                   $sumQuantity += $row['quantity'];
                              ?>
                                   <tr>
                                        <td>
                                             <div class="row">
                                                  <div class="col-md-9">
                                                       <div class="product-item">
                                                            <a class="product-thumb" href="?action=product&act=product_detail&id=<?= $product['id'] ?>"><img src="Content/image/<?= $product['image'] ?>" alt="Product"></a>
                                                            <div class="product-info">
                                                                 <h4 class="product-title">
                                                                      <a href="?action=product&act=product_detail&id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                                                                 </h4>
                                                                 <?php $size = $cart->getSize($row['size_id'])->fetch();
                                                                 if ($size['description_name'] != '') {
                                                                      $price += intval($size['price']) * $row['quantity']; ?>
                                                                      <span><em>Size:</em> <?= $size['description_name'] ?></span>

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
                                                                                $price += intval($topping['price']) * $row['quantity'];
                                                                                if ($i != 1) {
                                                                                     echo ', ' . $topping['name'];
                                                                                } else {
                                                                                     echo $topping['name'];
                                                                                }
                                                                           }
                                                                      } else {
                                                                           $topping = $cart->getTopping($row['topping_id'])->fetch();
                                                                           $price += intval($topping['price']) * $row['quantity'];
                                                                           echo $topping['name'] . '<br>';
                                                                      }
                                                                 }
                                                                      ?></span>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-3 text-end pt-5">
                                                       <a class="btn btn-primary" id="update<?= $product['id'] ?>" onclick="Update(<?= $product['id'] ?>, <?= $key ?>)" style="display: none">Update</a>
                                                       <a class="btn btn-primary" id="edit<?= $product['id'] ?>" name="edit" onclick="Edit(<?= $product['id'] ?>)">Edit</a>
                                                  </div>
                                             </div>
                                        </td>
                                        <td class="text-center">
                                             <div class="count-input">
                                                  <input type="number" id="quantity<?= $product['id'] ?>" min="1" name="quantity" class="form-control text-center" value="<?= $row['quantity'] ?>" readonly>
                                             </div>
                                        </td>
                                        <td class="text-center text-lg text-medium"><?= number_format($price, 0, ',', '.') ?></td>
                                        <td class="text-center text-lg text-medium"><?php if ($product['sale'] != null) {
                                                                                          $sumDiscount += $product['sale'];
                                                                                          echo $product['sale'];
                                                                                     } else {
                                                                                          echo 0;
                                                                                     } ?></td>
                                        <td class="text-center"><a class="remove-from-cart" href="?action=cart&act=removecart&id=<?= $key ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-trash"></i></a></td>
                                   </tr>
                         <?php
                                   $sumTotal += $price;
                              }
                         }

                         ?>
                         <tr class="text-end fs-4" style="height: 135.07px">

                              <td class="">
                                   Tổng:
                              </td>
                              <td class="text-center">
                                   <div class="count-input">
                                        <input type="text" name="quantity" class="form-control text-center" value="<?= $sumQuantity ?>" readonly>
                                   </div>
                              </td>
                              <td class="text-center">
                                   <?= number_format($sumTotal, 0, ',', '.') ?>
                              </td>
                              <td class="text-center">
                                   <?= number_format($sumDiscount, 0, ',', '.') ?>
                              </td>
                              <td>
                                   <!-- <div class="column text-lg">Subtotal: <span class="text-medium"><?= number_format($sumTotalNew, 0, ',', '.') ?></span></div> -->
                              </td>
                         </tr>
                    </tbody>
               </table>
          </div>
          <div class="shopping-cart-footer border-0">
               <div class="column"><a class="btn btn-outline-secondary" href="?action=product"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
               <div class="column">
                    <!-- <a class="btn btn-primary" id="saveCart" onclick="saveCart()" style="display: none">Save</a>
                    <a class="btn btn-primary" id="updateCart" onclick="UpdateCart()">Update Cart</a> -->
                    <a class="btn btn-success" href="?action=order" id="checkout">Checkout</a>
               </div>
          </div>
     </div>
     <script>
          var quantity = 0;

          function Edit(id) {
               document.getElementById('quantity' + id).removeAttribute('readonly');
               document.getElementsByName('edit').forEach(item => {
                    item.style.display = 'none';
               })
               document.getElementById('update' + id).style.display = '';
               quantity = document.getElementById('quantity' + id).value;
          }

          function Update(id, index) {
               document.getElementsByName('edit').forEach(item => {
                    item.style.display = '';
               })
               document.getElementById('update' + id).style.display = 'none';
               document.getElementById('quantity' + id).setAttribute('readonly', 'true');
               var quantityNew = document.getElementById('quantity' + id).value;
               if (quantityNew != quantity) {
                    document.getElementById('update' + id).setAttribute('href', '?action=cart&act=updateCart&id=' + index + '&quantity=' + quantityNew);
               }
          }
     </script>
<?php
}
