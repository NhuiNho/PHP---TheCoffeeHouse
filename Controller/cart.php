<?php
$act = 'cart';
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
$cart = new cart();
switch ($act) {
     case 'cart':
          include_once "View/cart.php";
          break;
     case 'addcart':
          $id_product = '';
          $id_size = '';
          $list_id_topping = '';
          $quantity = '';
          if (isset($_POST['submit'])) {
               $id_product = intval($_POST['id_product']);
               $id_size = intval($_POST['id_size']);
               $list_id_topping = $_POST['id_topping'];
               $quantity = intval($_POST['quantity']);
               if ($list_id_topping == '') {
                    $list_id_topping = 100;
               }
               if (isset($_SESSION['id'])) {
                    $checkProductCart = $cart->checkProductCart($id_product, $_SESSION['id'], $id_size, $list_id_topping);
                    if ($checkProductCart->rowCount() > 0) {
                         $checkProductCart = $checkProductCart->fetch();
                         $id = $checkProductCart['id'];
                         $quantity = $checkProductCart['quantity'] + $quantity;
                         $update = $cart->updateProductCartByQuantity($id, $quantity);
                         if ($update) {
                              // echo "<script> alert('Thêm số lượng vào sản phẩm thành công') </script>";
                         } else {
                              echo "<script> alert('Có lỗi khi thêm số lượng vào sản phẩm " . $quantity . "') </script>";
                         }
                    } else {
                         $insertNew = $cart->insertCart($id_product, $_SESSION['id'], $id_size, $list_id_topping, $quantity);
                         if ($insertNew) {
                              // echo "<script> alert('Thêm vào giỏ hàng thành công ') </script>";
                         } else {
                              echo "<script> alert('Có lỗi khi thêm vào giỏ hàng') </script>";
                         }
                    }
               } else {
                    $flag = false;
                    // Nếu không có 'id' trong session, thêm sản phẩm vào session 'item'
                    if (!isset($_SESSION['item'])) {
                         $_SESSION['item'] = array();
                    } else {
                         foreach ($_SESSION['item'] as $key => $value) {
                              if ($value['product_id'] == $id_product && $value['size_id'] == $id_size && $value['topping_id'] == $list_id_topping) {
                                   $_SESSION['item'][$key]['quantity'] += $value['quantity'];
                                   $flag = true;
                              }
                         }
                    }
                    if (!$flag) {
                         $newProduct = array(
                              'product_id' => $id_product,
                              'size_id' => $id_size,
                              'topping_id' => $list_id_topping,
                              'quantity' => $quantity
                         );
                         $_SESSION['item'][] = $newProduct;
                    }
               }
               echo "<script> window.location.href='?action=cart' </script>";
          } else {
               echo "<script> window.location.href='?action=cart' </script>";
          }
          break;
     case 'removecart':
          if (isset($_SESSION['id'])) {
               if (isset($_GET['id'])) {
                    $remove = $cart->removeProductForCart($_GET['id']);
                    if ($remove) {
                         echo "<script> alert('Xóa sản phẩm khỏi giỏ hàng thành công') </script>";
                    } else {
                         echo "<script> alert('Xóa sản phẩm khỏi giỏ hàng thất bại') </script>";
                    }
               } else {
                    echo "<script> window.location.href='?action=cart' </script>";
               }
          } else if (isset($_SESSION['item'])) {
               if (isset($_GET['id'])) {
                    foreach ($_SESSION['item'] as $key => $value) {
                         if ($key == $_GET['id']) {
                              unset($_SESSION['item'][$key]);
                              echo "<script> alert('Xóa sản phẩm khỏi giỏ hàng thành công') </script>";
                         }
                    }
                    echo "<script> window.location.href='?action=cart' </script>";
               }
          }
          echo "<script> window.location.href='?action=cart' </script>";
          break;
     case 'removeallcart':
          if (isset($_SESSION['id'])) {
               $removeall = $cart->removeAllProductForCart($_SESSION['id']);
               if ($removeall) {
                    echo "<script> alert('Xóa tất cả sản phẩm khỏi giỏ hàng thành công') </script>";
               } else {
                    echo "<script> alert('Xóa tất cả sản phẩm khỏi giỏ hàng thất bại') </script>";
               }
          } else if (isset($_SESSION['item']) && count($_SESSION['item']) != 0) {
               unset($_SESSION['item']);
               echo "<script> alert('Xóa tất cả sản phẩm khỏi giỏ hàng thành công') </script>";
          }
          echo "<script> window.location.href='?action=product' </script>";
          break;
     case 'updateCart':
          if (isset($_SESSION['id'])) {
               if (isset($_GET['quantity']) && isset($_GET['id'])) {
                    if ($cart->getCart($_GET['id'])->rowCount() == 1) {
                         $updateCart = $cart->updateProductCartByQuantity($_GET['id'], $_GET['quantity']);
                         if (!$updateCart) {
                              echo "<script> alert('Có lỗi khi cập nhật số lượng') </script>";
                         }
                    }
               }
          } else if (isset($_SESSION['item'])) {
               if (isset($_GET['quantity']) && isset($_GET['id'])) {
                    foreach ($_SESSION['item'] as $key => $value) {
                         if ($key == $_GET['id']) {
                              $_SESSION['item'][$key]['quantity'] = $_GET['quantity'];
                         }
                    }
               }
          }
          echo "<script> window.location.href='?action=cart' </script>";
          break;
}
