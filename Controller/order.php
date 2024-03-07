<?php
$cart = new cart();
$order = new order();
$order_detail = new order_detail();
$user = new user();
$payment_method_1 = new payment_method();
$voucher = new voucher();
$act = "order";
$saltF = "G456#@";
$saltR = "Fa34%!";
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
if (true) {
     switch ($act) {
          case "order":
               include_once "View/order.php";
               break;
          case 'order_action':
               if (isset($_SESSION['id'])) {
                    $getCartById = $cart->getCartById($_SESSION['id']);
                    $name_receiver = '';
                    $address_receiver = '';
                    $phone_receiver = '';
                    $email_receiver = '';
                    $payment_method = '';
                    $voucher_id = '';
                    $total_price = 0;
                    if (isset($_POST['submit'])) {
                         $name_receiver = $_POST['inputFullname'];
                         $address_receiver = $_POST['inputAddress'];
                         $phone_receiver = $_POST['inputPhone'];
                         $email_receiver = $_POST['inputEmail'];
                         $payment_method = $_POST['payment_method'];
                         $voucher_id = $_POST['voucher'];
                         $total_price = $_POST['total_price'];
                         $time = date("Y-m-d H:i:s", time());
                         if ($voucher_id == 'null') {
                              $voucher_id = null;
                              $voucher_code = '';
                         } else {
                              $voucher_code = $voucher->getVoucherById($voucher_id)->fetch()['code'];
                         }
                         $insertOrder = $order->insertOrder($_SESSION['id'], $name_receiver, $address_receiver, $phone_receiver, $email_receiver, $time, $total_price, $payment_method, $voucher_id);
                         if ($insertOrder) {
                              // echo "<script> alert('Thêm sản phẩm vào hóa đơn thành công') </script>";
                              while ($products = $getCartById->fetch()) {
                                   $product_id = $products['product_id'];
                                   $user_id = $products['user_id'];
                                   $size_id = $products['size_id'];
                                   $quantity = $products['quantity'];
                                   $topping_id = $products['topping_id'];
                                   $insertOrderDetail = $order_detail->insertOrderDetail($insertOrder, $product_id, $size_id, $topping_id, $quantity);
                                   if ($insertOrderDetail) {
                                        $removeCart = $cart->removeProductForCart($products['id']);
                                        // echo "<script> alert('Thêm sản phẩm vào chi tiết hóa đơn thành công') </script>";
                                   } else {
                                        echo "<script> alert('Thêm sản phẩm vào chi tiết hóa đơn không thành công') </script>";
                                   }
                              }
                              $mail = new PHPMailer();
                              $mail->CharSet =  "utf-8";
                              $mail->IsSMTP();
                              $mail->SMTPAuth = true;
                              $mail->Username = "truongphuoc442001@gmail.com";
                              $mail->Password = "ekrq borr ytkq blvj";
                              $mail->SMTPSecure = "tls";
                              $mail->Host = "smtp.gmail.com";
                              $mail->Port = "587";
                              $mail->From = 'truongphuoc442001@gmail.com';
                              $mail->FromName = 'TheCoffeeHouse';
                              $mail->AddAddress($email_receiver, $name_receiver);
                              $mail->Subject  =  'Chúc mừng bạn đã đặt hàng thành công';
                              $mail->IsHTML(true);
                              $mail->Body    = ' Xin chào ' . $name_receiver . '<br>
                              Mã đơn hàng của bạn: ' . $insertOrder . '<br>
                              Tên người nhận: ' . $name_receiver . '<br>
                              Địa chỉ người nhận: ' . $address_receiver . '<br>
                              Số điện thoại người nhận: ' . $phone_receiver . '<br>
                              Tổng tiền: ' . $total_price . '<br>
                              Phương thức thanh toán: ' . $payment_method_1->getPaymentMethodById($payment_method)->fetch()['name_method'] . '<br>
                              Mã voucher của bạn: ' . $voucher_code . '<br>';
                              if ($mail->Send()) {
                                   echo '<script> alert("Đơn hàng đã được gửi qua email ' . $email_receiver . '");</script>';
                                   echo "<script> window.location.href='?action=order&act=order_history' </script>";
                              } else {
                                   echo "Mail Error - >" . $mail->ErrorInfo;
                                   echo "<script> window.location.href='?action=home' </script>";
                              }
                         } else {
                              echo "<script> alert('Thêm sản phẩm vào hóa đơn không thành công') </script>";
                              echo "<script> window.location.href='?action=cart' </script>";
                         }
                    } else {
                         echo "<script> window.location.href='?action=home' </script>";
                    }
               } else if (isset($_SESSION['item'])) {
                    $name_receiver = '';
                    $address_receiver = '';
                    $phone_receiver = '';
                    $email_receiver = '';
                    $payment_method = '';
                    $voucher_id = '';
                    $total_price = 0;
                    if (isset($_POST['submit'])) {
                         $name_receiver = $_POST['inputFullname'];
                         $address_receiver = $_POST['inputAddress'];
                         $phone_receiver = $_POST['inputPhone'];
                         $email_receiver = $_POST['inputEmail'];
                         $payment_method = $_POST['payment_method'];
                         $voucher_id = $_POST['voucher'];
                         $total_price = $_POST['total_price'];
                         $time = date("Y-m-d H:i:s", time());
                         if ($voucher_id == 'null') {
                              $voucher_id = null;
                              $voucher_code = '';
                         } else {
                              $voucher_code = $voucher->getVoucherById($voucher_id)->fetch()['code'];
                         }
                         $code = random_int(1000, 9999);
                         $_SESSION['order'] = [
                              'name_receiver' => $name_receiver,
                              'address_receiver' => $address_receiver,
                              'phone_receiver' => $phone_receiver,
                              'email_receiver' => $email_receiver,
                              'payment_method' => $payment_method,
                              'voucher_id' => $voucher_id,
                              'total_price' => $total_price,
                              'time' => $time,
                              'voucher_code' => $voucher_code,
                              'code' => $code,
                         ];
                         $mail = new PHPMailer();
                         $mail->CharSet =  "utf-8";
                         $mail->IsSMTP();
                         $mail->SMTPAuth = true;
                         $mail->Username = "truongphuoc442001@gmail.com";
                         $mail->Password = "ekrq borr ytkq blvj";
                         $mail->SMTPSecure = "tls";
                         $mail->Host = "smtp.gmail.com";
                         $mail->Port = "587";
                         $mail->From = 'truongphuoc442001@gmail.com';
                         $mail->FromName = 'TheCoffeeHouse';
                         $mail->AddAddress($_SESSION['order']['email_receiver'], $_SESSION['order']['name_receiver']);
                         $mail->Subject  =  'Mã xác thực: ' . $code;
                         $mail->IsHTML(true);
                         $mail->Body    = ' Xin chào ' . $_SESSION['order']['name_receiver'] . '<br>
          Đây là mã xác thực của bạn: ' . $code . '';

                         if ($mail->Send()) {
                              $_SESSION['act'] = '?action=order&act=order_action_checkotp';
                              echo '<script> alert("Check Your Email and Click on the 
              link sent to your email");</script>';
                              // echo "<script> window.location.href='?action=forget&act=check_otp' </script>";
                              include('View/checkotp.php');
                         } else {
                              echo "Mail Error - >" . $mail->ErrorInfo;
                              echo "<script> window.location.href='?action=user&act=profile' </script>";
                         }
                    } else {
                         echo "<script> window.location.href='?action=home' </script>";
                    }
               }
               break;
          case 'order_action_checkotp':
               $codeOld = '';
               $codeNew = '';
               if (isset($_POST['submit_code'])) {
                    $codeOld = $_SESSION['order']['code'];
                    $codeNew = $_POST['code'];
                    if ($codeOld == $codeNew) {
                         $checkUser = $user->getCheckUser($_SESSION['order']['email_receiver'], $_SESSION['order']['phone_receiver']);
                         if ($checkUser->rowCount() != 0) {
                              $user_id = $checkUser->fetch()['id'];
                         } else {
                              $user_id = null;
                         }
                         $insertOrder = $order->insertOrder($user_id, $_SESSION['order']['name_receiver'], $_SESSION['order']['address_receiver'], $_SESSION['order']['phone_receiver'], $_SESSION['order']['email_receiver'], $_SESSION['order']['time'], $_SESSION['order']['total_price'], $_SESSION['order']['payment_method'], $_SESSION['order']['voucher_id']);
                         if ($insertOrder) {
                              $flag = false;
                              foreach ($_SESSION['item'] as $key => $products) {
                                   $product_id = $products['product_id'];
                                   // $user_id = $products['user_id'];
                                   $size_id = $products['size_id'];
                                   $quantity = $products['quantity'];
                                   $topping_id = $products['topping_id'];
                                   $insertOrderDetail = $order_detail->insertOrderDetail($insertOrder, $product_id, $size_id, $topping_id, $quantity);
                                   if (!$insertOrderDetail) {
                                        echo "<script> alert('Có lỗi khi thêm chi tiết sản phẩm vào bảng chi tiết đơn hàng') </script>";
                                   }
                              }
                              if (!$flag) {
                                   unset($_SESSION['item']);
                              }
                              $mail = new PHPMailer();
                              $mail->CharSet =  "utf-8";
                              $mail->IsSMTP();
                              $mail->SMTPAuth = true;
                              $mail->Username = "truongphuoc442001@gmail.com";
                              $mail->Password = "ekrq borr ytkq blvj";
                              $mail->SMTPSecure = "tls";
                              $mail->Host = "smtp.gmail.com";
                              $mail->Port = "587";
                              $mail->From = 'truongphuoc442001@gmail.com';
                              $mail->FromName = 'TheCoffeeHouse';
                              $mail->AddAddress($_SESSION['order']['email_receiver'], $_SESSION['order']['name_receiver']);
                              $mail->Subject  =  'Chúc mừng bạn đã đặt hàng thành công';
                              $mail->IsHTML(true);
                              $mail->Body    = ' Xin chào ' . $_SESSION['order']['name_receiver'] . '<br>
                              Mã đơn hàng của bạn: ' . $insertOrder . '<br>
                              Tên người nhận: ' . $_SESSION['order']['name_receiver'] . '<br>
                              Địa chỉ người nhận: ' . $_SESSION['order']['address_receiver'] . '<br>
                              Số điện thoại người nhận: ' . $_SESSION['order']['phone_receiver'] . '<br>
                              Tổng tiền: ' . $_SESSION['order']['total_price'] . '<br>
                              Phương thức thanh toán: ' . $payment_method_1->getPaymentMethodById($_SESSION['order']['payment_method'])->fetch()['name_method'] . '<br>
                              Mã voucher của bạn: ' . $_SESSION['order']['voucher_code'] . '<br>';
                              if ($mail->Send()) {
                                   echo '<script> alert("Đơn hàng đã được gửi qua email ' . $_SESSION['order']['email_receiver'] . '");</script>';
                                   $_SESSION['email'] = $_SESSION['order']['email_receiver'];
                                   unset($_SESSION['order']);
                                   unset($_SESSION['act']);
                                   echo "<script> window.location.href='?action=order&act=order_history' </script>";
                              } else {
                                   echo "Mail Error - >" . $mail->ErrorInfo;
                                   echo "<script> window.location.href='?action=home' </script>";
                              }
                         }
                    } else {
                         echo '<script> alert("Mã xác thực không đúng, vui lòng nhập lại!");</script>';
                         include "View/checkotp.php";
                    }
               } else {
                    echo "<script> window.location.href='?action=home'</script>";
               }
               break;

          case 'order_history':
               if (isset($_SESSION['email']) || isset($_SESSION['id'])) {
                    include_once "View/order_history.php";
               } else {
                    $_SESSION['act'] = '?action=order&act=checkEmail';
                    include_once "View/forgetpassword.php";
               }
               break;
          case 'checkEmail':
               if (isset($_POST['submit_email'])) {
                    $email = $_POST['email'];
                    $code = random_int(1000, 9999);
                    $_SESSION['email_check'] = [
                         'email' => $email,
                         'code' => $code,
                    ];
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Username = "truongphuoc442001@gmail.com";
                    $mail->Password = "ekrq borr ytkq blvj";
                    $mail->SMTPSecure = "tls";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "587";
                    $mail->From = 'truongphuoc442001@gmail.com';
                    $mail->FromName = 'TheCoffeeHouse';
                    $mail->AddAddress($email, 'null');
                    $mail->Subject  =  'Mã xác thực: ' . $code;
                    $mail->IsHTML(true);
                    $mail->Body    = ' Xin chào ' . $email . '<br>
          Đây là mã xác thực của bạn: ' . $code . '';

                    if ($mail->Send()) {
                         $_SESSION['act'] = '?action=order&act=order_history_checkotp';
                         echo '<script> alert("Check Your Email and Click on the 
              link sent to your email");</script>';
                         echo "<script> window.location.href='?action=forget&act=view_check_otp' </script>";
                    } else {
                         echo "Mail Error - >" . $mail->ErrorInfo;
                         echo "<script> window.location.href='?action=user&act=profile' </script>";
                    }
               }
               break;
          case 'order_history_checkotp':
               $codeOld = '';
               $codeNew = '';
               if (isset($_POST['submit_code'])) {
                    $codeOld = $_SESSION['email_check']['code'];
                    $codeNew = $_POST['code'];
                    if ($codeNew == $codeOld) {
                         $_SESSION['email'] = $_SESSION['email_check']['email'];
                         unset($_SESSION['email_check']);
                         unset($_SESSION['act']);
                         echo "<script> window.location.href='?action=order&act=order_history' </script>";
                    } else {
                         echo "<script> alert('Mã xác thực không đúng') </script>";
                         echo "<script> window.location.href='?action=forget&act=view_check_otp'";
                    }
               }
               break;
          case 'order_detail':
               include_once "View/order_detail.php";
               break;
          case 'order_cancel':
               if (isset($_GET['order_id'])) {
                    $cancelOrder = $order->cancelOrder($_GET['order_id']);
                    if ($cancelOrder) {
                         echo "<script> alert('Đơn hàng đã hủy thành công') </script>";
                         echo "<script> window.location.href='?action=order&act=order_history' </script>";
                    } else {
                         echo "<script> alert('Hủy đơn hàng không thành công') </script>";
                         echo "<script> window.location.href='?action=order&act=order_history' </script>";
                    }
               }
               break;
          case 'order_rebook':
               if (isset($_SESSION['id'])) {
                    if (isset($_GET['order_id'])) {
                         if (isset($_GET['delete_cart']) && $_GET['delete_cart'] == 'false') {
                              $removeCart = $cart->removeAllProductForCart($_SESSION['id']);
                              if (!$removeCart) {
                                   echo "<script> alert('Có lỗi xảy ra khi xóa sản phẩm trong giỏ hàng')</script>";
                              }
                         }
                         $getOrder = $order->getOrderById($_GET['order_id'], null)->fetch();
                         $getOrderDetails = $order_detail->getOrderDetail($getOrder['id']);
                         while ($getOrderDetail = $getOrderDetails->fetch()) {
                              $checkProductCart = $cart->checkProductCart($getOrderDetail['product_id'], $_SESSION['id'], $getOrderDetail['size_id'], $getOrderDetail['topping_id']);
                              if ($checkProductCart->rowCount() > 0) {
                                   $checkProductCart = $checkProductCart->fetch();
                                   $id = $checkProductCart['id'];
                                   $quantity = $checkProductCart['quantity'] + $getOrderDetail['quantity'];
                                   $update = $cart->updateProductCartByQuantity($id, $quantity);
                                   if (!$update) {
                                        echo "<script> alert('Có lỗi khi thêm số lượng vào sản phẩm') </script>";
                                   } else {
                                        echo "<script> alert('Sản phẩm trong đơn hàng cũ của bạn đã có trong giỏ hàng nên tôi đã cập nhật số lượng thêm cho bạn') </script>";
                                   }
                              } else {
                                   $insertCart = $cart->insertCart($getOrderDetail['product_id'], $_SESSION['id'], $getOrderDetail['size_id'], $getOrderDetail['topping_id'], $getOrderDetail['quantity']);
                                   if (!$insertCart) {
                                        echo "<script> alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng')</script>";
                                   }
                              }
                         }
                    }
               } else if (isset($_SESSION['email'])) {
                    if (isset($_GET['order_id'])) {
                         if (isset($_GET['login']) && $_GET['login'] == 'false') {
                              $getOrder = $order->getOrderById($_GET['order_id'], null)->fetch();
                              $getOrderDetails = $order_detail->getOrderDetail($getOrder['id']);

                              $_SESSION['item'] = [];

                              while ($getOrderDetail = $getOrderDetails->fetch()) {
                                   $_SESSION['item'][] = [
                                        'product_id' => $getOrderDetail['product_id'],
                                        'size_id' => $getOrderDetail['size_id'],
                                        'topping_id' => $getOrderDetail['topping_id'],
                                        'quantity' => $getOrderDetail['quantity'],
                                   ];
                              }
                              if (count($_SESSION['item']) != 0) {
                                   echo "<script> alert('Đã thêm sản phẩm vào giỏ hàng')</script>";
                              }
                         }
                    }
               }
               echo "<script> window.location.href='?action=order' </script>";
               break;
     }
} else {
     echo "<script> window.location.href='?action=product' </script>";
}
