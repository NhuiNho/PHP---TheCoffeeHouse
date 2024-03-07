<?php
$product = new product();
$category = new category();
$size = new size();
$topping = new topping();
$getProducts = $product->getProductById('all');
$totalPage = 0;
if (isset($_SESSION['id_admin'])) {
     $search = isset($_POST['search']) ? $_POST['search'] : '';
     $pageNow = isset($_GET['page']) ? $_GET['page'] : 1;
     echo $pageNow;
     $type = isset($_POST['type']) ? $_POST['type'] : '';
     $price_1 = (isset($_POST['price_1']) && $_POST['price_1'] != '') ? intval($_POST['price_1']) : 0;
     $price_2 = (isset($_POST['price_2']) && $_POST['price_2'] != '') ? intval($_POST['price_2']) : 10000000;
     $itemPage = 10;
     $totalPage = ceil($product->getProductSearch1($search, $type, $price_1, $price_2)->fetch()['count(*)'] / $itemPage);
     $indexStart = ($pageNow - 1) * $itemPage;
     $getProductPage = $product->getProductSearch2($search, $type, $price_1, $price_2, $indexStart, $itemPage);

?>
     <div class="be-content">
          <div class="main-content container-fluid">
               <div class="mt-5 mb-5 text-center">
                    <form action="?action=product" method="post">
                         <caption>
                              <input class="" type="text" name="search" value="<?php echo (isset($_POST['search'])) ? $_POST['search'] : '' ?>" placeholder="product name" style="height: 40px">
                              <select name="type" id="" style="height: 40px">
                                   <option value="">All</option>
                                   <?php $getCategory = $category->getCategoryById('all');
                                   while ($getC = $getCategory->fetch()) { ?>
                                        <option value="<?php echo $getC['id'] ?>" <?php echo (isset($_POST['type']) && $_POST['type'] == $getC['id'] ? "selected" : "") ?>> <?php echo $getC['type'] ?> </option>
                                   <?php }  ?>
                              </select>
                              <input type="text" placeholder="min" value="<?php echo (isset($_POST['price_1'])) ? $_POST['price_1'] : 0 ?>" name="price_1" style="height: 40px" pattern="[0-9]+">
                              --
                              <input type="text" placeholder="max" value="<?php echo (isset($_POST['price_2'])) ? $_POST['price_2'] : 1000000 ?>" name="price_2" style="height: 40px" pattern="[0-9]+">
                              <button type="submit" name="submit" style="height: 40px">tim kiem</button>
                         </caption>
                    </form>
               </div>
               <button data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal1">AddProduct</button>
               <div class="row">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col" style="width: 7%">Image</th>
                                   <th scope="col" style="width: 15%">Name</th>
                                   <th scope="col" style="width: 5%">Prire</th>
                                   <th scope="col" style="width: 10%">Product Type</th>
                                   <th scope="col">Description</th>
                                   <th scope="col" style="width: 5%">Sale</th>
                                   <th scope="col" colspan="2" style="width: 10%">Actions</th>
                              </tr>
                         </thead>
                         <tbody class="fs-5">
                              <?php while ($getProduct = $getProductPage->fetch()) { ?>
                                   <tr>
                                        <th scope="row"><img src="../../Content/image/<?= $getProduct['image'] ?>" alt="" class="img-fluid"></th>
                                        <td><?= $getProduct['name'] ?></td>
                                        <td><?= $getProduct['price'] ?></td>
                                        <td><?= $category->getCategoryById($getProduct['product_type'])->fetch()['type'] ?></td>
                                        <td><?= $getProduct['description'] ?></td>
                                        <td><?= $getProduct['sale'] ?></td>
                                        <td>
                                             <input type="button" class="btn btn-info" value="sua" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Update(<?= $getProduct['id'] ?>)">
                                        </td>

                                        <td>
                                             <a href="?action=product&act=delete_product&id=<?= $getProduct['id'] ?>" class="btn btn-danger m-0" onclick="return confirm('Bạn có chắc muốn xóa ?')">Xóa</a>
                                        </td>
                                   </tr>
                              <?php } ?>
                         </tbody>

                    </table>

               </div>
               <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-grey" <?php if ($pageNow == 1) echo "disabled" ?>><a class="btn btn-grey" href="?action=product&page=<?= $pageNow - 1 ?>">Previous</a></button>
                    <?php for ($i = 0; $i < $totalPage; $i++) { ?>
                         <a href="?action=product&page=<?= $i + 1 ?>"><button type="button" class="btn btn-outline-primary ml-1 <?php if ($i + 1 == $pageNow) echo "active" ?>"><?= $i + 1 ?></button></a>
                    <?php } ?>
                    <button type="button" class="btn btn-success ml-1" <?php if ($pageNow == $totalPage) echo "disabled" ?>><a class="btn btn-success" href="?action=product&page=<?= $pageNow + 1 ?>">Next</a></button>
               </div>
          </div>
     </div>
     <!-- Button trigger modal -->


     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content  d-flex justify-content-center" id="load-form">




               </div>
          </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content  d-flex justify-content-center" id="load-form">
                    <div class="modal-header">
                         <h5 class="modal-title" id="modalTitleId">
                              Thêm sản phẩm
                         </h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="?action=product&act=add_product_action" method="post" enctype="multipart/form-data">
                         <div class="modal-body">

                              <div class="mb-3">
                                   <label for="" class="form-label">Tên sản phẩm</label>
                                   <input type="text" class="form-control" maxlength="50" required name="name">
                              </div>
                              <div class="mb-3">
                                   <label for="" class="form-label">Giá sản phẩm</label>
                                   <input type="text" class="form-control" maxlength="11" required name="price" pattern="[0-9]+">
                              </div>
                              <div class="mb-3">
                                   <label for="" class="form-label">Description sản phẩm</label>
                                   <textarea type="text" name="description" class="form-control" required> </textarea>
                              </div>
                              <div class="mb-3">
                                   <label for="" class="form-label">Giá giảm sản phẩm</label>
                                   <input type="text" class="form-control" maxlength="11" name="sale" pattern="[0-9]+">
                              </div>
                              <?php
                              $newCategory = $category->getCategoryById('all');
                              ?>
                              <div class="mb-3">
                                   <label for="" class="form-label">Loại sản phẩm</label>
                                   <select name="type" id="" class="form-select">
                                        <?php while ($getCategory = $newCategory->fetch()) { ?>
                                             <option value="<?= $getCategory['id'] ?>"><?= $getCategory['type'] ?></option>
                                        <?php } ?>
                                   </select>
                              </div>
                              <div class="form-group">
                                   Bạn muốn có bao nhiêu size cho sản phẩm này ? <input type="number" id="quantitySize" name="quantitySize" max="3" min="0" value="0" class="form-control">
                                   <div class="row">
                                        <span id="size0">Sản phẩm này không cần size</span>
                                        <div class="col-lg-4" id="size1" style="display: none">
                                             <h6>Size Nhỏ: </h6>
                                             <select name="size_1" class="form-select" onchange="changeSize1()" id="size_1">
                                                  <?php $sizes = $size->getSizeByName('Nhỏ');
                                                  while ($set = $sizes->fetch()) {
                                                  ?>
                                                       <option value="<?= $set['id'] ?>" data_price="<?= $set['price'] ?>">
                                                            <?= $set['description_name'] ?> - <?= $set['price'] ?>
                                                       </option>
                                                  <?php
                                                  }
                                                  ?>
                                             </select>
                                        </div>

                                        <div class="col-lg-4" id="size2" style="display: none">
                                             <h6>Size Vừa: </h6>
                                             <select name="size_2" class="form-select" onchange="changeSize2()" id="size_2">
                                                  <?php $sizes1 = $size->getSizeByName('Vừa');
                                                  while ($set = $sizes1->fetch()) {
                                                  ?>
                                                       <option value="<?= $set['id'] ?>" data_price="<?= $set['price'] ?>">
                                                            <?= $set['description_name'] ?> - <?= $set['price'] ?>
                                                       </option>
                                                  <?php
                                                  }
                                                  ?>
                                             </select>
                                        </div>

                                        <div class="col-lg-4" id="size3" style="display: none">
                                             <h6>Size Lớn: </h6>
                                             <select name="size_3" class="form-select" onchange="changeSize3()" id="size_3">
                                                  <?php $sizes2 = $size->getSizeByName('Lớn');
                                                  while ($set = $sizes2->fetch()) {
                                                  ?>
                                                       <option value="<?= $set['id'] ?>" data_price="<?= $set['price'] ?>">
                                                            <?= $set['description_name'] ?> - <?= $set['price'] ?>
                                                       </option>
                                                  <?php
                                                  }
                                                  ?>
                                             </select>
                                        </div>

                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label for="" class="form-label">Topping</label>
                                   <div class="form-check">
                                        <div class="row">
                                             <?php $newTopping = $topping->getToppingById('all');
                                             while ($getTopping = $newTopping->fetch()) { ?>
                                                  <div class="col-md-3">
                                                       <input onclick="changeTopping(<?= $getTopping['id'] ?>)" name="topping[]" class="form-check-input" type="checkbox" value="<?= $getTopping['id'] ?>" id="topping<?= $getTopping['id'] ?>" <?php echo $getTopping['id'] == 100 ? "checked" : ""; ?>>
                                                       <label class="form-check-label mr-5" for="flexCheckChecked">
                                                            <?= $getTopping['name'] ?>
                                                       </label>
                                                  </div>
                                             <?php } ?>
                                        </div>
                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label for="" class="form-label">Hình ảnh sản phẩm</label>
                                   <input type="file" class="form-control" name="image1" required>
                              </div>

                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                   Close
                              </button>
                              <button type="submit" name="submit" class="btn btn-primary">Save</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- Optional: Place to the bottom of scripts -->
     <script>
          const myModal = new bootstrap.Modal(
               document.getElementById("modalId"),
               options,
          );
     </script>

     <script type="text/javascript">
          var toppings = document.getElementsByName("topping[]");

          function Update(id) {
               $('#load-form').load('?action=product&act=update_product', {
                    id: id,
               })
          }

          function AddProduct() {
               $('#load-form').load('?action=product&act=add_product', )
          }

          function changeTopping(id) {
               if (id != 100) {
                    document.getElementById('topping100').checked = false;
               } else {
                    document.getElementsByName('topping').forEach(item => item.checked = false);
                    document.getElementById('topping100').checked = true;
               }
               if (checkTopping()) {
                    document.getElementById('topping100').checked = true;
               }
          }

          function checkTopping() {
               var count = 0;
               toppings.forEach(item => {
                    if (!item.checked) {
                         count++
                    }
               })
               if (count == toppings.length) {
                    return true;
               }
               return false;
          }
          var quantitySize = document.getElementById('quantitySize');
          quantitySize.addEventListener('change', function() {
               console.log('Quantity Size changed: ' + quantitySize.value);
               switch (quantitySize.value) {
                    case '0':
                         document.getElementById('size3').style.display = 'none';
                         document.getElementById('size2').style.display = 'none';
                         document.getElementById('size1').style.display = 'none';
                         document.getElementById('size0').style.display = '';
                         changeSize1();
                         break;
                    case '1':
                         document.getElementById('size0').style.display = 'none';
                         document.getElementById('size1').style.display = '';
                         document.getElementById('size3').style.display = 'none';
                         document.getElementById('size2').style.display = 'none';
                         break;
                    case '2':
                         document.getElementById('size0').style.display = 'none';
                         document.getElementById('size1').style.display = '';
                         document.getElementById('size2').style.display = '';
                         document.getElementById('size3').style.display = 'none';
                         break;
                    case '3':
                         document.getElementById('size0').style.display = 'none';
                         document.getElementById('size1').style.display = '';
                         document.getElementById('size3').style.display = '';
                         document.getElementById('size2').style.display = '';
                         changeSize2();
                         break;
               }
          })

          function changeSize1() {
               // Lấy đối tượng select
               var selectElement = document.getElementById('size_1');

               // Lấy giá trị của thuộc tính data_price từ option được chọn
               var selectedOption = selectElement.options[selectElement.selectedIndex];
               var dataPrice = parseInt(selectedOption.getAttribute('data_price'));

               // Lấy danh sách các option
               var optionList = document.getElementById('size_2').options;

               // In danh sách ra console
               for (var i = 0; i < optionList.length; i++) {
                    if (dataPrice >= parseInt(optionList[i].getAttribute('data_price'))) {
                         optionList[i].style.display = 'none';
                    } else {
                         optionList[i].style.display = '';
                    }
               }

          }

          function changeSize2() {
               // Lấy đối tượng select
               var selectElement = document.getElementById('size_2');

               // Lấy giá trị của thuộc tính data_price từ option được chọn
               var selectedOption = selectElement.options[selectElement.selectedIndex];
               var dataPrice = parseInt(selectedOption.getAttribute('data_price'));

               var optionList = document.getElementById('size_3').options;

               // In danh sách ra console
               for (var i = 0; i < optionList.length; i++) {
                    if (dataPrice >= parseInt(optionList[i].getAttribute('data_price'))) {
                         optionList[i].style.display = 'none';
                    } else {
                         optionList[i].style.display = '';
                    }
               }

               if (dataPrice >= parseInt(optionList[document.getElementById('size_3').selectedIndex].getAttribute(
                         'data_price'))) {
                    document.getElementById('size_3').selectedIndex = optionList.length - 1;
               }


          }

          function changeSize3() {}

          // Get all toppings checkboxes
          var toppingsCheckboxes = document.querySelectorAll('input[name="toppings[]"]');

          // Get the "Không có topping" checkbox
          var noToppingCheckbox = document.getElementById('topping_100');
          noToppingCheckbox.checked = true;
          toppingsCheckboxes.forEach(function(option) {
               option.addEventListener('change', function() {
                    if (noToppingCheckbox.checked) {
                         if (option.checked && option != noToppingCheckbox) {
                              noToppingCheckbox.checked = false;
                         } else if (option == noToppingCheckbox) {
                              noToppingCheckbox.checked = true;
                              toppingsCheckboxes.forEach(function(option1) {
                                   if (option1 != option) {
                                        option1.checked = false;
                                   }
                              })
                         }
                    }
               })
          })
     </script>
<?php } ?>