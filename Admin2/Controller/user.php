<?php
$act = "login";
$saltF = "G456#@";
$saltR = "Fa34%!";
$admin = new admin();
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'login':
          include_once "View/login.php";
          break;
     case 'login_action':
          $email = '';
          $password = '';
          if (isset($_POST['login'])) {
               $email = $_POST['email'];
               $password = $_POST['password'];
               $passnew = md5($saltF . $password . $saltR);
               $checkAdmin = $admin->checkAdmin($email, $passnew);
               if ($checkAdmin->rowCount() == 0) {
                    echo "<script>alert('Tài khoản hoặc mật khẩu không đúng');</script>";
                    echo "<script> window.location.href='?action=login' </script>";
               } else {
                    $admin = $checkAdmin->fetch();
                    $status = $admin['status'];
                    if ($status == 0) {
                         $_SESSION['id_admin'] = $admin['id'];
                         $_SESSION['name_admin'] = $admin['name'];
                         echo '<script> alert("Đăng nhập thành công");</script>';
                         echo "<script> window.location.href='?action=home' </script>";
                    } else {
                         echo '<script> alert("Tài khoản của bạn đã bị khóa, vui lòng liên hệ admin 0856033726");</script>';
                         echo "<script> window.location.href='../' </script>";
                    }
               }
          }
          break;
     case 'logout':
          session_destroy();
          echo "<script> window.location.href='?action=home';</script>";
          break;
}
