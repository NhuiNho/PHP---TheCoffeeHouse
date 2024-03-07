<?php
$act = 'all';
$id = '';
$product = new product();
$category = new category();
$menu = new menu();
$product_detail = new product_detail();
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'all':
          if (isset($_SESSION['oldImage'])) {
               if (unlink($_SESSION['oldImage'])) {
                    unset($_SESSION['oldImage']);
               }
          }
          include_once "View/product.php";
          break;
     case 'update_product':
          $id = $_POST['id'];
          $getProduct = $product->getProductById($id)->fetch();
          $getCategory = $category->getCategoryById('all');
          $getMenu = $menu->getMenuById('all');
          $output = ' 
   <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Update </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>

  <div  class="modal-body  ">
    <form method="POST" action="?action=product&act=updateProduct_action" enctype="multipart/form-data">    
             <input type="hidden" value="' . $id . '" name=id >        
             <div> Ten SP <input value="' . $getProduct["name"] . '" type=text name=name  class="form-control" required maxlength="50" minlength="10"> </div>      
             <div> Gia    <input value=' . $getProduct["price"] . ' name=price class="form-control"  required maxlength="1" minlength="7" pattern="[0-9]+"> </div>      
             <div> Giam gia    <input value="' . $getProduct["sale"] . '" name=sale class="form-control" maxlength="7" minlength="1" pattern="[0-9]+"> </div> 
             <div> Loai     
                 <select name="type" id="" class="form-select">';
          while ($type = $getCategory->fetch()) {

               $output .= '<option value="' . $type['id'] . '" ';
               if ($getProduct['product_type'] == $type['id']) {
                    $output .= 'selected';
               }
               $output .= ' >' . $type["type"] . ' </option>';
          }
          $output .=     '</select>
             </div>     
            
              <div> Mieu Ta <textarea name=description class="form-control" required>' . $getProduct["description"] . '</textarea> </div> 

             
                      ';


          $output .= '
             <br>
             <img height="100px" src="../../Content/image/' . $getProduct['image'] . '" alt="">
             <div>  Image <input type="file" name="image" class="form-control"  value="" multiple />  </div>
             
            <div class="modal-footer mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>    
    </form>
  </div>
   ';

          echo $output;
          break;
     case 'updateProduct_action':
          $id = '';
          $name = '';
          $price = '';
          $sale = '';
          $type = '';
          $description = '';
          $image = '';
          if (isset($_POST['submit'])) {
               $id = $_POST['id'];
               $name = $_POST['name'];
               $price = $_POST['price'];
               if (isset($_POST['sale'])) {
                    $sale = $_POST['sale'];
               }
               $type = $_POST['type'];
               $description = $_POST['description'];
               if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                    $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
                    $uploadOk = 1;
                    $oldImage = $product->getProductById($id)->fetch()['image'];
                    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

                    // Tạo tên mới cho tệp tin
                    $timestamp = time(); // Thời gian hiện tại
                    $random_number = rand(1000, 9999); // Số ngẫu nhiên từ 1000 đến 9999
                    $new_filename = $timestamp . '_' . $random_number . '.' . $imageFileType;
                    $target_file = $target_dir . $new_filename; // Đường dẫn đầy đủ đến tệp tin mới

                    // Kiểm tra kích thước tệp
                    // if ($_FILES["image"]["size"] > 500000) {
                    //      echo "<script> alert('Xin lỗi, tệp quá lớn.');</script>";
                    //      $uploadOk = 0;
                    // }

                    // Cho phép chỉ một số định dạng hình ảnh cụ thể
                    // $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                    // if (!in_array($imageFileType, $allowedExtensions)) {
                    //      echo "<script> alert('Chỉ cho phép tải lên các tệp JPG, JPEG, PNG & GIF.');</script>";
                    //      $uploadOk = 0;
                    // }

                    // Nếu mọi thứ đều ổn, tiến hành tải lên tệp
                    if ($uploadOk != 0) {
                         // Di chuyển tệp tin vào thư mục và đổi tên thành $new_filename
                         $updateImage = $product->updateImageProduct($id, $new_filename);
                         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && $updateImage) {
                              if (file_exists($target_dir . $oldImage) && $oldImage != 'avatar_default.png') {
                                   $_SESSION['oldImage'] = $target_dir . $oldImage;
                                   echo "<script> alert('Tệp " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã được tải lên thành công.');</script>";
                              }
                         } else {
                              echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn.');</script>";
                         }
                    }
                    $checkProduct = $product->getProductById($id)->fetch();
                    if ($checkProduct['name'] != $name || $checkProduct['price'] != $price || $checkProduct['sale'] != $sale || $checkProduct['description'] != $description || $checkProduct['product_type'] != $type) {
                         $updateProduct = $product->updateProduct($id, $name, $price, $sale, $description, $type);
                         if ($updateProduct) {
                              echo "<script> alert('Cập nhật sản phẩm thành công');</script>";
                         } else {
                              echo "<script> alert('Cập nhật sản phẩm không thành công');</script>";
                         }
                    } else {
                         echo "<script> alert('Cập nhật sản phẩm thành công');</script>";
                    }
                    echo "<script>window.location.href='?action=product'</script>";
               }
               $updateProduct = $product->updateProduct($id, $name, $price, $sale, $description, $type);
               if ($updateProduct) {
                    echo "<script> alert('Cập nhật sản phẩm thành công');</script>";
               } else {
                    echo "<script> alert('Cập nhật sản phẩm không thành công');</script>";
               }
          }
          echo "<script>window.location.href='?action=product'</script>";
          break;
     case 'delete_product':
          $id = '';
          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
               $oldImage = $product->getProductById($id)->fetch()['image'];
               $remove = $product->removeProduct($id);
               if ($remove) {
                    if (file_exists($target_dir . $oldImage)) {
                         $_SESSION['oldImage'] = $target_dir . $oldImage;
                    }
                    echo "<script> alert('Xóa sản phẩm thành công');</script>";
               } else {
                    echo "<script> alert('Xóa sản phẩm không thành công');</script>";
               }
          }
          echo "<script>window.location.href='?action=product'</script>";
          break;
     case 'add_product':
          // require '../../connect.php';
          // $sql = "select* from manufacture  ";
          // $manufactor = mysqli_query($connect, $sql);
          $product_types = $category->getCategoryById('all');

          $output = '';
          $output .= '
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
 <div  class="modal-body">
  <form action="?action=product&act=add_product_action" method="POST" enctype="multipart/form-data" >
    Name <input type="text" name="name" class="form-control" required minlength="1" maxlength="50"> 
    Price <input type="text" name="price" class="form-control" required minlength="1" maxlength="7" pattern="[0-9]+"> 
    Description <textarea type="text" name="description" class="form-control" required> </textarea>
    Giam gia <input value="" name="sale" class="form-control" maxlength="7" minlength="1" pattern="[0-9]+"> ';

          //type
          $output .= ' Product Type
    <select name="type" id="" class="form-select">';
          while ($product_type = $product_types->fetch()) {
               $output .= '<option value="' . $product_type['id'] . '">' . $product_type['type'] . '</option>';
          }
          $output .= '</select>';
          $output .=
               'Image <input type="file" name="image"  required>
    <br>
     <div class="modal-footer mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" name="submit" class="btn btn-primary">Create</button>
     </div>    

  </form>
  </div>';

          echo $output;
          break;
     case 'add_product_action':
          $name = '';
          $price = '';
          $product_type = '';
          $image = '';
          $description = '';
          $sale = '';
          $quantitySize = '';
          if (isset($_POST['submit'])) {
               $name = $_POST['name'];
               $price = $_POST['price'];
               $product_type = $_POST['type'];
               // $image = $_FILES['image'];
               $description = $_POST['description'];
               $quantitySize = $_POST['quantitySize'];
               $sale = $_POST['sale'];
               if (isset($_FILES['image1']) && $_FILES['image1']['name'] != '') {
                    $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION));

                    // Tạo tên mới cho tệp tin
                    $timestamp = time(); // Thời gian hiện tại
                    $random_number = rand(1000, 9999); // Số ngẫu nhiên từ 1000 đến 9999
                    $new_filename = $timestamp . '_' . $random_number . '.' . $imageFileType;
                    $target_file = $target_dir . $new_filename; // Đường dẫn đầy đủ đến tệp tin mới

                    // Kiểm tra kích thước tệp
                    // if ($_FILES["image"]["size"] > 500000) {
                    //      echo "<script> alert('Xin lỗi, tệp quá lớn.');</script>";
                    //      $uploadOk = 0;
                    // }

                    // Cho phép chỉ một số định dạng hình ảnh cụ thể
                    // $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                    // if (!in_array($imageFileType, $allowedExtensions)) {
                    //      echo "<script> alert('Chỉ cho phép tải lên các tệp JPG, JPEG, PNG & GIF.');</script>";
                    //      $uploadOk = 0;
                    // }

                    // Nếu mọi thứ đều ổn, tiến hành tải lên tệp
                    if ($uploadOk != 0) {
                         // Di chuyển tệp tin vào thư mục và đổi tên thành $new_filename
                         $checkAdd = $product->insertProduct($name, $price, $product_type, $new_filename, $description, $sale);
                         if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file) && $checkAdd) {
                              if ($quantitySize == 0) {
                                   $sizeProduct = 100;
                                   foreach ($_POST['topping'] as $key => $value) {
                                        $add = $product_detail->add($checkAdd, $sizeProduct, $value);
                                        if (!$add) {
                                             echo "<script> alert('Có lỗi khi thêm chi tiết sản phẩm') </script>";
                                        }
                                   }
                              } else {
                                   for ($i = 0; $i < $quantitySize; $i++) {
                                        foreach ($_POST['topping'] as $key => $value) {
                                             $add = $product_detail->add($checkAdd, $_POST['size_' . ($i + 1)], $value);
                                             if (!$add) {
                                                  echo "<script> alert('Có lỗi khi thêm chi tiết sản phẩm') </script>";
                                             }
                                        }
                                   }
                              }
                              echo "<script> alert('Tệp " . htmlspecialchars(basename($_FILES["image1"]["name"])) . " đã được tải lên thành công.');</script>";
                              echo "<script> alert('Sản phẩm " . $name . " đã được tải lên thành công.');</script>";
                         } else {
                              echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn.');</script>";
                         }
                    }
                    echo "<script>window.location.href='?action=product'</script>";
               } else {
                    echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn." . $_FILES['image1'] . "');</script>";
               }
          }
          break;
}
