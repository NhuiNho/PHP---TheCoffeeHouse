<?php
$product = new product();
$product_detail = new product_detail();
$size = new size();
$topping = new topping();
$category = new category();
$menu = new menu();
$comment = new comment();
$user = new user();
$rating = new rating();
$id = 1;
if (isset($_GET["id"])) {
     $id = intval($_GET["id"]);
}
// $rating1 = $rating->getRating($id);
// $ratingProduct = 0;
// $i = 0;
// while ($rate = $rating1->fetch()) {
//      $ratingProduct += $rate['rating'];
//      $i++;
// }
// $ratingProduct /= $i;
if ($product->getProductById($id)->rowCount() != 0) {
     $result_product = $product_detail->getProduct($id)->fetch();
     $result_product_detail_size = $product_detail->getProductDetail_size($id);
     $result_product_detail_topping = $product_detail->getProductDetail_topping($id);
     $result_category = $product_detail->getCategory($result_product['product_type'])->fetch();
?>
     <p class="text-muted pt-5">
          <a href="?action=product" class="text-decoration-none text-black fw-bold">Menu</a>&nbsp; /&nbsp;
          <a class="text-decoration-none text-black fw-bold"><?= $result_category['type'] ?></a>&nbsp; /&nbsp;
          <a class="text-decoration-none text-muted"><?= $result_product['name'] ?></a>
     </p>
     <div class="row pt-5 pb-5">
          <div class="col-lg-6 pb-5">
               <img src="Content/image/<?= $result_product['image'] ?>" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6">
               <form action="?action=cart&act=addcart" method="post">
                    <h3><?= $result_product['name'] ?></h3>
                    <h3 class="mau_vang">
                         <span id="price_now"><?= number_format($result_product['price'], 0, ',', '.') ?></span> đ
                         <input type="hidden" id="id_product" name="id_product" value="<?= $result_product['id'] ?>">
                         <input type="hidden" name="price" id="price" value="<?= $result_product['price'] ?>">
                    </h3>
                    <!-- <div class="pstar" data-pid="<?= $id ?>">
                    Your rating:
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                         $img = $i <= $ratingProduct ? "star" : "star-blank";
                         echo "<img src='Content/image/$img.png' style='width:30px;cursor:pointer;' data-set='$i'>";
                    }
                    ?>
               </div> -->
                    <h6 class="pt-3">Chọn số lượng</h6>
                    <button type="button" class="btn btn-secondary" id="minus"><span><i class="fa fa-minus"></i></span></button>
                    <span id="quantity_now">1</span><input type="hidden" id="quantity" name="quantity" value="1">
                    <button type="button" class="btn btn-warning" id="plus"><span><i class="fa fa-plus"></i></span></button>
                    <?php

                    if ($result_product_detail_size->rowCount() != 1) {
                    ?>
                         <h6 class="pt-3 pb-2">Chọn size (bắt buộc)</h6>
                         <?php
                         $i = 0;
                         while ($get_size = $result_product_detail_size->fetch()) {
                              $result1 = $size->getSize($get_size['size']);
                              while ($size1 = $result1->fetch()) {
                                   $i++;
                                   if ($i == 1) {
                                        $value_size = $size1['id'];
                                   }


                         ?>
                                   <button type="button" class="btn btn-outline-secondary me-3 <?php if ($i == 1) {
                                                                                                    echo "active";
                                                                                               } ?>" id-size="<?= $size1['id'] ?>" id="size" name="size" value="<?= $size1['price'] ?>"><?= $size1['description_name'] ?>
                                        +
                                        <?= number_format($size1['price'], 0, ',', '.') ?> đ</button>

                         <?php
                              }
                         }
                         ?>

                    <?php
                    } else {
                         $size100 = $size->getSize($result_product_detail_size->fetch()['size'])->fetch();
                         $value_size = $size100['id'];
                    }
                    ?>
                    <input type="hidden" id="id_size" name="id_size" value="<?= $value_size ?>">
                    <?php

                    if ($result_product_detail_topping->rowCount() != 1) {
                    ?>
                         <h6 class="pt-3 pb-1">Topping</h6>
                         <?php
                         while ($get_topping = $result_product_detail_topping->fetch()) {
                              $result1 = $topping->getTopping($get_topping['topping']);
                              while ($topping1 = $result1->fetch()) {

                         ?>
                                   <button type="button" class="btn btn-outline-success me-3 mb-4" id="topping" name="<?= $get_topping['topping'] ?>" value="<?= $topping1['price'] ?>"><?= $topping1['name'] ?>
                                        +
                                        <?= number_format($topping1['price'], 0, ',', '.') ?> đ</button>

                         <?php
                              }
                         }
                         ?>

                    <?php
                    } else {
                         $value_topping = 100;
                    }
                    ?>
                    <input type="hidden" id="id_topping" name="id_topping" value="<?php if (isset($value_topping)) echo $value_topping ?>">
                    <br>
                    <button type="submit" class="btn btn-info form-control fw-bold p-2" name="submit">Thêm vào giỏ hàng</button>
               </form>
          </div>
          <hr>
          <h5 class="pt-3">Mô tả sản phẩm</h5>
          <p class="pb-3"><?= $result_product['description'] ?></p>
          <hr>
          <h5 class="pt-3">Sản phẩm liên quan</h5>
          <?php
          $result_product_contact = $product->getProduct($result_product['product_type']);
          $count = 0;
          while (($set1 = $result_product_contact->fetch()) && $count < 6) :
               $count++;
          ?>
               <div class="col-lg-2">
                    <div class="card border-0">
                         <a href="?action=product&act=product_detail&id=<?= $set1['id'] ?>" title="<?= $set1['name'] ?>"><img src="Content/image/<?= $set1['image'] ?>" class="card-img-top rounded-4 border border-5" alt="..."></a>
                         <!-- <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted "><?= $set1['name'] ?></h6>
                                        <p class="card-text"><?= $set1['price'] ?></p>
                                    </div> -->
                    </div>
                    <a href="?action=product&act=product_detail&id=<?= $set1['id'] ?>" title="<?= $set1['name'] ?>" class="text-decoration-none text-black">
                         <h6 class="card-subtitle mb-2 hover_vang"><?= $set1['name'] ?></h6>
                    </a>
                    <span class="card-text text-muted"><?= number_format($set1['price'], 0, ',', '.') ?>
                         đ</span>
               </div>
          <?php endwhile ?>
          <!-- <hr>
          <h5>Bình luận</h5>
          <?php if (isset($_SESSION['id'])) { ?>
               <form action="?action=comment" method="post">
                    <input type="hidden" name="product_id" value="<?= $result_product['id']  ?>">
                    <textarea name="comment" cols="70" rows="2" placeholder="Thêm bình luận" class="form-control"></textarea>
                    <input type="submit" name="submit" class="btn btn-primary">
               </form>
          <?php } else { ?>
               <a class="btn btn-primary" href="?action=user">Phải đăng nhập mới bình luận được</a>
          <?php } ?>
          <div class="row">
               <p><b>Các bình luận</b></p>
               <?php
               $binhluan = $comment->getComment($result_product['id']);
               while ($cm = $binhluan->fetch()) {
               ?>
                    <div class="col-lg-12">
                         <div class="row">
                              <p><b><?= $user->getUsers($cm['user_id'])['fullname'] ?></b>: <?= $cm['description'] ?></p>
                         </div>
                    </div>
               <?php } ?>

          </div> -->
     </div>
<?php } else {
     echo "<script> window.location.href='?action=product' </script>";
} ?>
<script>
     var quantity = parseInt(document.getElementById('quantity').value);
     var plus = document.getElementById('plus');
     var minus = document.getElementById('minus');
     var price = parseInt(document.getElementById('price').value);

     function disalbed_minus(quantity, minus) {
          if (quantity < 2) {
               minus.disabled = true;
               minus.classList.remove('btn-warning');
          } else {
               minus.disabled = false;
               minus.classList.add('btn-warning');
          }
          document.getElementById('quantity_now').textContent = quantity;
          document.getElementById('quantity').value = quantity;
     }
     disalbed_minus(quantity, minus);
     plus.addEventListener('click', function() {
          price /= quantity;
          quantity += 1;
          price *= quantity;
          disalbed_minus(quantity, minus);
          document.getElementById('price_now').textContent = price.toLocaleString('vi-VN');
     })
     minus.addEventListener('click', function() {
          price /= quantity;
          quantity -= 1;
          price *= quantity;
          disalbed_minus(quantity, minus);
          document.getElementById('price_now').textContent = price.toLocaleString('vi-VN');
     })


     var topping = document.getElementById('id_topping');
     // Lấy danh sách các button
     var button_size = document.querySelectorAll('button[name="size"]');
     var button_topping = document.querySelectorAll('button[id="topping"]');
     // Thêm sự kiện click cho từng button
     button_size.forEach(function(button) {
          button.addEventListener('click', function() {
               // Xóa class 'active' từ tất cả các button trước khi thêm vào button được click
               button_size.forEach(function(btn) {
                    if (btn.classList.contains('active')) {
                         btn.classList.remove('active');
                         price -= parseInt(btn.value) * quantity;
                    }
               });
               // Thêm class 'active' cho button được click
               this.classList.add('active');
               document.getElementById('id_size').value = this.getAttribute('id-size');
               var price_size = this.value;
               // Định dạng giá trị và cập nhật nội dung của phần tử có id="price_now"
               price += parseInt(this.value) * quantity;
               document.getElementById('price_now').textContent = price.toLocaleString('vi-VN');
          });
     });

     button_topping.forEach(function(button) {
          button.addEventListener('click', function() {
               var isActive = this.classList.contains('active');
               // button_topping.forEach(function(btn) {
               //      if (btn.classList.contains('active')) {
               //           btn.classList.remove('active');
               //           price -= parseInt(btn.value);
               //      }
               // });
               // Kiểm tra xem button đã có class 'active' hay chưa
               if (isActive) {
                    // Nếu đã có, loại bỏ class 'active' khi click lần nữa
                    this.classList.remove('active');
                    price -= parseInt(this.value) * quantity;
                    var mang = topping.value.split('+');
                    topping.value = '';
                    var check = false;
                    if (mang[0] == this.getAttribute('name')) {
                         check = true;
                    }
                    for (var i = 0; i < mang.length; i++) {
                         if (mang[i] != this.getAttribute('name')) {
                              if (!check) {
                                   if (i != 0) {
                                        topping.value += '+'
                                   }
                                   topping.value += mang[i]
                              } else {
                                   topping.value += mang[i]
                                   if (i != mang.length - 1) {
                                        topping.value += '+'
                                   }
                              }
                         }
                    }
               } else {
                    // Thêm class 'active' cho button được click
                    this.classList.add('active');
                    price += parseInt(this.value) * quantity;
                    if (topping.value != '') {
                         topping.value += '+'
                    }
                    topping.value += this.getAttribute('name');
               }
               document.getElementById('price_now').textContent = price.toLocaleString('vi-VN');
               var mang = topping.value.split('+');
               topping.value = '';
               mang1 = sortArrayAscending(mang);
               for (var i = 0; i < mang1.length; i++) {
                    if (i != 0) {
                         topping.value += '+'
                    }
                    topping.value += mang[i]
               }
          });
     });

     function sortArrayAscending(arr) {
          var len = arr.length;
          for (var i = 0; i < len - 1; i++) {
               for (var j = 0; j < len - 1; j++) {
                    if (arr[j] > arr[j + 1]) {
                         // Hoán đổi giá trị nếu phần tử hiện tại lớn hơn phần tử kế bên
                         var temp = arr[j];
                         arr[j] = arr[j + 1];
                         arr[j + 1] = temp;
                    }
               }
          }
          return arr;
     }
</script>