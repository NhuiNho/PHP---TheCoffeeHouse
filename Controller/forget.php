<?php
$saltF = "G456#@";
$saltR = "Fa34%!";
$act = 'forget';
$user = new user();
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'forget':
          if (!isset($_SESSION['id'])) {
               $_SESSION['act'] = '?action=forget&act=forget_password';
               include_once "View/forgetpassword.php";
          } else {
               echo "<script> window.location.href='?action=user&act=profile' </script>";
          }
          break;
     case 'forget_password':
          if (isset($_POST['submit_email'])) {
               $email = $_POST['email'];
               $checkUser = $user->getCheckUser($email, null);
               if ($checkUser->rowCount() > 0) {
                    $code = random_int(1000, 9999);
                    $item = array(
                         'id' => $code,
                         'email' => $email,
                    );
                    $user1 = $checkUser->fetch();
                    $_SESSION['email'] = $item;

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
                    $mail->AddAddress($email, $user1['fullname']);
                    $mail->Subject  =  'Mã xác thực: ' . $code;
                    $mail->IsHTML(true);
                    $mail->Body    = ' Xin chào ' . $user1['fullname'] . '<br>
                    Đây là mã xác thực của bạn: ' . $code . '';

                    if ($mail->Send()) {
                         $_SESSION['act'] = '?action=forget&act=check_otp';
                         echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                         include "View/checkotp.php";
                    } else {
                         echo "Mail Error - >" . $mail->ErrorInfo;
                         echo "<script> window.location.href='?action=forget' </script>";
                    }
               } else {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    echo "<script> window.location.href='?action=forget' </script>";
               }
          } else {
               echo "<script> window.location.href='?action=user&act=profile' </script>";
          }
          break;
     case 'check_otp':
          $codeNew = '';
          if (isset($_POST['submit_code'])) {
               $codeNew = $_POST['code'];
               if ($_SESSION['email']['id'] == $codeNew) {
                    include "View/resetpw.php";
               } else {
                    echo '<script> alert("Mã xác thực không đúng");</script>';
                    include "View/checkotp.php";
               }
          } else {
               echo "<script> window.location.href='?action=user' </script>";
          }
          break;
     case 'reset_password':
          $passNew = '';
          $email = '';
          if (isset($_POST['submit_resetpw'])) {
               $passNew = md5($saltF . $_POST['password'] . $saltR);
               $email = $_SESSION['email']['email'];
               $update = $user->updatePassword($email, $passNew);
               if ($update) {
                    unset($_SESSION['email']);
                    unset($_SESSION['act']);
                    echo '<script> alert("Mật khẩu mới đã được cập nhật thành công, vui lòng đăng nhập!");</script>';
               } else {
                    echo '<script> alert("Mật khẩu mới cập nhật không thành công, vui lòng đăng nhập!");</script>';
               }
               echo "<script> window.location.href='?action=user' </script>";
          } else {
               echo "<script> window.location.href='?action=user&act=profile' </script>";
          }
          break;
     case 'view_check_otp':
          include_once('View/checkotp.php');
          break;
}
