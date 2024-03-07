<?php
$act = isset($_GET['act']) ? $_GET['act'] : '';
$category = new category();
$menu = new menu();
switch ($act) {
     case '';
          if (isset($_SESSION['oldImage'])) {
               if (unlink($_SESSION['oldImage'])) {
                    unset($_SESSION['oldImage']);
               }
          }
          include_once "View/category.php";
          break;
     case 'update_category':
          $id = $_POST['id'];
          $getCategory = $category->getCategoryById($id)->fetch();
          $getMenu = $menu->getMenuById('all');
          $output = ' 
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Update </h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
     
       <div  class="modal-body  ">
         <form method="POST" action="?action=category&act=updateCategory_action" enctype="multipart/form-data">    
                  <input type="hidden" value="' . $id . '" name=id >        
                  <div> Name <input value="' . $getCategory["type"] . '" type=text name=type  class="form-control" required maxlength="50" minlength="10"> </div>      
                  <div> Menu   
                      <select name="menu" id="" class="form-select">';
          while ($type = $getMenu->fetch()) {

               $output .= '<option value="' . $type['id'] . '" ';
               if ($getCategory['category_type'] == $type['id']) {
                    $output .= 'selected';
               }
               $output .= ' >' . $type["name"] . ' </option>';
          }
          $output .=     '</select>
                  </div>     
                           ';


          $output .= '
                  <br>
                  <img height="100px" src="../../Content/image/' . $getCategory['image'] . '" alt="">
                  <div>  Image <input type="file" name="image"  value="" multiple />  </div>
                  
                 <div class="modal-footer mt-3">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                 </div>    
         </form>
       </div>
        ';

          echo $output;
          break;
     case 'updateCategory_action':
          $id = '';
          $type = '';
          $menu = '';
          $image = '';
          if (isset($_POST['submit'])) {
               $id = $_POST['id'];
               $type = $_POST['type'];
               $menu = $_POST['menu'];
               if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                    $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
                    $uploadOk = 1;
                    $oldImage = $category->getCategoryById($id)->fetch()['image'];
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
                         $updateImage = $category->updateImageCategory($id, $new_filename);
                         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && $updateImage) {
                              if (file_exists($target_dir . $oldImage) && $oldImage != 'avatar_default.png') {
                                   $_SESSION['oldImage'] = $target_dir . $oldImage;
                                   echo "<script> alert('Tệp " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã được tải lên thành công.');</script>";
                              }
                         } else {
                              echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn.');</script>";
                         }
                    }
                    $checkCategory = $category->getCategoryById($id)->fetch();
                    if ($checkCategory['type'] != $type || $checkCategory['category_type'] != $menu) {
                         $updateCategory = $category->updateCategory($id, $type, $menu);
                         if ($updateCategory) {
                              echo "<script> alert('Cập nhật danh mục thành công');</script>";
                         } else {
                              echo "<script> alert('Cập nhật danh mục không thành công');</script>";
                         }
                    } else {
                         echo "<script> alert('Cập nhật danh mục thành công');</script>";
                    }
                    echo "<script>window.location.href='?action=category'</script>";
               }
               $updateCategory = $category->updateCategory($id, $type, $menu);
               if ($updateCategory) {
                    echo "<script> alert('Cập nhật danh mục thành công');</script>";
               } else {
                    echo "<script> alert('Cập nhật danh mục không thành công');</script>";
               }
          }
          echo "<script>window.location.href='?action=category'</script>";
          break;
     case 'delete_category':
          $id = '';
          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
               $oldImage = $category->getCategoryById($id)->fetch()['image'];
               $remove = $category->removeCategory($id);
               if ($remove) {
                    if (file_exists($target_dir . $oldImage)) {
                         $_SESSION['oldImage'] = $target_dir . $oldImage;
                    }
                    echo "<script> alert('Xóa sản phẩm thành công');</script>";
               } else {
                    echo "<script> alert('Xóa sản phẩm không thành công');</script>";
               }
          }
          echo "<script>window.location.href='?action=category'</script>";
          break;
     case 'add_category':
          // require '../../connect.php';
          // $sql = "select* from manufacture  ";
          // $manufactor = mysqli_query($connect, $sql);
          $menu_id = $menu->getMenuById('all');

          $output = '';
          $output .= '
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Create </h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      <div  class="modal-body">
       <form action="?action=category&act=add_category_action" method="POST" enctype="multipart/form-data" >
         Type <input type="text" name="type" class="form-control" required minlength="1" maxlength="50"> ';

          //type
          $output .= ' Menu
         <select name="menu" id="" class="form-select">';
          while ($getMenu = $menu_id->fetch()) {
               $output .= '<option value="' . $getMenu['id'] . '">' . $getMenu['name'] . '</option>';
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
     case 'add_category_action':
          $type = '';
          $menu = '';
          $image = '';
          if (isset($_POST['submit'])) {
               $type = $_POST['type'];
               $menu = $_POST['menu'];
               $image = $_FILES['image'];
               if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                    $target_dir = "../../Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
                    $uploadOk = 1;
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
                         $checkAdd = $category->insertCategory($type, $menu, $new_filename);
                         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && $checkAdd) {
                              echo "<script> alert('Tệp " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã được tải lên thành công.');</script>";
                              echo "<script> alert('Sản phẩm " . $type . " đã được tải lên thành công.');</script>";
                         } else {
                              echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn.');</script>";
                         }
                    }
                    echo "<script>window.location.href='?action=category'</script>";
               }
          }
          break;
}
