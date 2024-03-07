<?php
$act = "registration";
$saltF = "G456#@";
$saltR = "Fa34%!";
$user = new user();
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
$nextAct = (isset($_GET['nextAct'])) ? $_GET['nextAct'] : '';
switch ($act) {
     case 'registration':
          include_once 'View/registration.php';
          break;
     case 'registration_action':
          $fullname = '';
          $phone = '';
          $address = '';
          // $username = '';
          $password = '';
          $email = '';
          if (isset($_POST['submit'])) {
               $fullname = $_POST['fullname'];
               $phone = $_POST['phone'];
               $address = $_POST['address'];
               // $username = $_POST['username'];
               $password = $_POST['password'];
               $email = $_POST['email'];
               $passnew = md5($saltF . $password . $saltR);
               $check = $user->getCheckUser($email, $phone);
               if ($check->rowCount() > 0) {
                    echo '<script> alert("Username hoặc email hoặc số điện thoại đã tồn tại")</script>';
               } else {
                    $code = random_int(1000, 9999);
                    $item = array(
                         'id' => $code,
                         'email' => $email,
                         'fullname' => $fullname,
                         'phone' => $phone,
                         'address' => $address,
                         'password' => $passnew,

                    );
                    $_SESSION['account'] = $item;
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
                    $mail->AddAddress($email, $fullname);
                    $mail->Subject  =  'Mã xác thực: ' . $code;
                    $mail->IsHTML(true);
                    $mail->Body    = ' Xin chào ' . $fullname . '<br>
                    Đây là mã xác thực của bạn: ' . $code . '';

                    if ($mail->Send()) {
                         $_SESSION['act'] = '?action=user&act=registration_action_checkotp';
                         echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                         echo "<script> window.location.href='?action=forget&act=check_otp' </script>";
                    } else {
                         echo "Mail Error - >" . $mail->ErrorInfo;
                         echo "<script> window.location.href='?action=forget' </script>";
                    }
               }
          } else {
               echo "<script> window.location.href='?action=user' </script>";
          }
          break;
     case 'registration_action_checkotp':
          $codeOld = '';
          $codeNew = '';
          if (isset($_POST['submit_code'])) {
               $codeOld = $_SESSION['account']['id'];
               $codeNew = $_POST['code'];
               if ($codeOld == $codeNew) {
                    $newUser = $user->insertUser($_SESSION['account']['fullname'], $_SESSION['account']['phone'], $_SESSION['account']['address'], $_SESSION['account']['password'], $_SESSION['account']['email']);
                    if ($newUser) {
                         $getUser = $user->getCheckUser($_SESSION['account']['email'], $_SESSION['account']['phone'])->fetch();
                         $_SESSION['id'] = $getUser['id'];
                         $_SESSION['fullname'] = $getUser['fullname'];
                         echo '<script> alert("Đăng ký thành công");</script>';
                         unset($_SESSION['account']);
                         unset($_SESSION['act']);
                         if ($nextAct != '') {
                              echo '<script> window.location.href="?action=' . $nextAct . '"</script>';
                         } else {
                              echo '<script> window.location.href="?action=product"</script>';
                         }
                    } else {
                         echo '<script> alert("Đăng ký không thành công");</script>';
                    }
               } else {
                    echo '<script> alert("Mã xác thực không đúng, vui lòng nhập lại!");</script>';
                    include "View/checkotp.php";
               }
          } else {
               include "View/checkotp.php";
          }
          break;
     case 'login_action':
          $emailphone = '';
          $password = '';
          if (isset($_POST['submit'])) {
               $emailphone = $_POST['emailphone'];
               $password = $_POST['password'];
               $passnew = md5($saltF . $password . $saltR);
               $login = $user->getLoginUser($emailphone, $passnew);
               if ($login->rowCount() == 0) {
                    echo '<script> alert("Tài khoản hoặc mật khẩu không đúng");</script>';
                    include_once "View/registration.php";
               } else {
                    $result = $login->fetch();
                    if ($result['status'] == 0) {
                         $_SESSION['fullname'] = $result['fullname'];
                         $_SESSION['id'] = $result['id'];
                         $_SESSION['avatar'] = $result['avatar'];
                         // echo '<script> alert("Đăng nhập thành công");</script>';
                    } else {
                         echo '<script> alert("Tài khoản của bạn đã bị khóa, vui lòng liên hệ admin 0856033726");</script>';
                    }
                    if (isset($_GET['back']) && $_GET['back'] == 'cart') {
                         echo "<script> window.location.href='?action=cart&act=addcart';</script>";
                    } else {
                         if ($nextAct != '') {
                              echo '<script> window.location.href="?action=' . $nextAct . '"</script>';
                         }
                    }
                    echo "<script> window.location.href='?action=product';</script>";
               }
          } else {
               echo "<script> window.location.href='?action=product';</script>";
          }
          break;
     case 'logout':
          if (isset($_SESSION['id'])) {
               session_destroy();
               echo "<script> window.location.href='?action=home';</script>";
          } else {
               echo "<script> window.location.href='?action=product';</script>";
          }

          break;
     case 'profile':
          if (isset($_SESSION['id'])) {
               if (isset($_SESSION['oldImage'])) {
                    if (unlink($_SESSION['oldImage'])) {
                         unset($_SESSION['oldImage']);
                    }
               }
               include_once "View/profile.php";
          } else {
               echo "<script> window.location.href='?action=product';</script>";
          }
          break;
     case 'uploadImage':
          if (isset($_POST['submit'])) {
               $target_dir = "Content/image/"; // Thư mục lưu trữ hình ảnh đã tải lên
               $uploadOk = 1;
               $oldImage = $user->getUsers($_SESSION['id'])['avatar'];
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

               // // Cho phép chỉ một số định dạng hình ảnh cụ thể
               // $allowedExtensions = array("jpg", "jpeg", "png", "gif");
               // if (!in_array($imageFileType, $allowedExtensions)) {
               //      echo "<script> alert('Chỉ cho phép tải lên các tệp JPG, JPEG, PNG & GIF.');</script>";
               //      $uploadOk = 0;
               // }

               // Nếu mọi thứ đều ổn, tiến hành tải lên tệp
               if ($uploadOk != 0) {
                    // Di chuyển tệp tin vào thư mục và đổi tên thành $new_filename
                    $updateImage = $user->updateImageUser($_SESSION['id'], $new_filename);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && $updateImage) {
                         if (file_exists($target_dir . $oldImage) && $oldImage != 'avatar_default.png') {
                              $_SESSION['oldImage'] = $target_dir . $oldImage;
                              // echo "<script> alert('Tệp " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã được tải lên thành công.');</script>";
                         }
                    } else {
                         echo "<script> alert('Xảy ra lỗi khi tải lên tệp của bạn.');</script>";
                    }
               }
          }
          echo "<script> window.location.href='?action=user&act=profile'</script>";
          break;
     case 'updateProfile':
          // $username = '';
          $fullname = '';
          $address = '';
          $email = '';
          $phone = '';
          if (isset($_POST['submit'])) {
               $getUser = $user->getUsers($_SESSION['id']);
               // $username = $_POST['inputUsername'];
               $fullname = $_POST['inputFullname'];
               $address = $_POST['inputAddress'];
               $email = $_POST['inputEmailAddress'];
               $phone = $_POST['inputPhone'];
               if ($email != $getUser['email'] || $phone != $getUser['phone']) {
                    $getCheckUser = $user->getCheckUser($email, $phone);
                    if ($getCheckUser->rowCount() > 1) {
                         echo "<script> alert('Phonenumber hoặc email đã tồn tại, không thể thay đổi!')</script>";
                    } else if ($getCheckUser->rowCount() == 1) {
                         $getCheckUser1 = $getCheckUser->fetch();
                         if ($getCheckUser1['id'] != $getUser['id']) {
                              echo "<script> alert('Phonenumber hoặc email đã tồn tại, không thể thay đổi!')</script>";
                         } else {
                              if ($phone != $getUser['phone']) {
                                   $updateUser = $user->updateProfile($getUser['id'], $fullname, $phone, $address, $getUser['password'], $email);
                                   echo "<script> alert('Thay đổi thông tin thành công!')</script>";
                              } else if ($email != $getUser['email']) {
                                   $code = random_int(1000, 9999);
                                   $_SESSION['account'] = [
                                        'id' => $getUser['id'],
                                        'fullname' => $fullname,
                                        'phone' => $phone,
                                        'address' => $address,
                                        'password' => $getUser['password'],
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
                                   $mail->AddAddress($email, $fullname);
                                   $mail->Subject  =  'Mã xác thực: ' . $code;
                                   $mail->IsHTML(true);
                                   $mail->Body    = ' Xin chào ' . $fullname . '<br>
                    Đây là mã xác thực của bạn: ' . $code . '';

                                   if ($mail->Send()) {
                                        $_SESSION['act'] = '?action=user&act=updateProfile_checkotp';
                                        echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                                        // echo "<script> window.location.href='?action=forget&act=check_otp' </script>";
                                        include('View/checkotp.php');
                                   } else {
                                        echo "Mail Error - >" . $mail->ErrorInfo;
                                        echo "<script> window.location.href='?action=user&act=profile' </script>";
                                   }
                              }
                         }
                    } else {
                         $updateUser = $user->updateProfile($getUser['id'], $fullname, $phone, $address, $getUser['password'], $email);
                         echo "<script> alert('Thay đổi thông tin thành công!')</script>";
                         echo "<script> window.location.href='?action=user&act=profile'</script>";
                    }
               } else {
                    $updateUser = $user->updateProfile($getUser['id'], $fullname, $phone, $address, $getUser['password'], $email);
                    echo "<script> alert('Thay đổi thông tin thành công!')</script>";
                    echo "<script> window.location.href='?action=user&act=profile'</script>";
               }
          } else {
               echo "<script> window.location.href='?action=product'</script>";
          }
          break;
     case 'forgot_password':
          if (!isset($_SESSION['id'])) {
               include_once "View/forgetpassword.php";
          } else {
               echo "<script> window.location.href='?action=user&act=profile'</script>";
          }
          break;
     case 'updateProfile_checkotp':
          $codeOld = '';
          $codeNew = '';
          if (isset($_POST['submit_code'])) {
               $codeOld = $_SESSION['account']['code'];
               $codeNew = $_POST['code'];
               if ($codeOld == $codeNew) {
                    $updateUser = $user->updateProfile($_SESSION['account']['id'], $_SESSION['account']['fullname'], $_SESSION['account']['phone'], $_SESSION['account']['address'], $_SESSION['account']['password'], $_SESSION['account']['email']);
                    unset($_SESSION['account']);
                    unset($_SESSION['act']);
                    echo "<script> alert('Thay đổi thông tin thành công!')</script>";
                    echo "<script> window.location.href='?action=user&act=profile'</script>";
               } else {
                    echo '<script> alert("Mã xác thực không đúng, vui lòng nhập lại!");</script>';
                    include "View/checkotp.php";
               }
          } else {
               echo "<script> window.location.href='?action=user&act=profile'</script>";
          }
          break;
}
