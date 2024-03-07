<?php
$bool = false;
$dangnhap = "?action=user";
$dropdownAccount = '';
$cart = new cart();
$user = new user();
if (isset($_SESSION['id'])) {
     $bool = true;
     $dangnhap = "#";
     $dropdownAccount = 'data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
     $quantityCart = $cart->getCartById($_SESSION['id'])->rowCount();
     $getUsers = $user->getUsers($_SESSION['id']);
} else if (isset($_SESSION['item'])) {
     $quantityCart = count($_SESSION['item']);
}
?>
<header style="background-color: #fb8d17" class="align-items-center d-flex fixed-top">
     <div class="container">
          <nav class="navbar navbar-expand-sm navbar-dark align-items-center d-flex pt-3 pb-3">
               <a class="navbar-brand" href="?action=home"><img src="Content/image/logo.174bdfd.svg" alt="" style="width: 170px; height: 14px"></a>
               <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
               <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                         <li class="nav-item">
                              <a class="nav-link active" href="?action=product" aria-current="page">Đặt hàng <span class="visually-hidden">(current)</span></a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="?action=order&act=order_history">Lịch sử mua hàng</a>
                         </li>
                         <!-- <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                              <div class="dropdown-menu" aria-labelledby="dropdownId">
                                   <a class="dropdown-item" href="#">Action 1</a>
                                   <a class="dropdown-item" href="#">Action 2</a>
                              </div>
                         </li> -->
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                         <div class="dropdown">
                              <a href="<?= $dangnhap ?>" id="dropdownAccount" <?= $dropdownAccount ?> class="text-decoration-none">
                                   <span><img src="Content/image/<?php if (isset($getUsers['avatar'])) {
                                                                      echo $getUsers['avatar'];
                                                                 } else {
                                                                      echo 'avatar_default.png';
                                                                 } ?>" class="rounded-circle" style="width: 40px; height: 40px"></span>
                              </a>
                              <?php if ($bool) { ?>
                                   <span class="text-white"><?= $_SESSION['fullname'] ?></span>
                                   <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                                        <a class="dropdown-item" href="?action=user&act=profile"><img src="Content/image/icon_taikhoan.svg" alt="">&nbsp; Thông tin tài khoản</a>
                                        <!-- <a class="dropdown-item" href=""><img src="Content/image/icon_diachi.svg" alt="">&nbsp; Sổ địa chỉ</a> -->
                                        <a class="dropdown-item" href="?action=order&act=order_history"><img src="Content/image/icon_tracuudonhang.svg" alt="">&nbsp; Lịch sử mua hàng</a>
                                        <a class="dropdown-item" href="?action=user&act=logout"><img src="Content/image/icon_dangxuat.svg" alt="">&nbsp; Thoát</a>
                                   </div>
                              <?php
                              } ?>
                         </div>
                         <a href="?action=cart" style="text-decoration: none;">

                              <div class="icon-cart align-items-center justify-content-center d-flex">
                                   <div class="icon-wrapper">
                                        <img src="Content/image/cart.svg" alt="">
                                        <?php
                                        if (isset($quantityCart)) {
                                             echo "<span>$quantityCart</span>";
                                        } ?>
                                   </div>
                              </div>


                         </a>
                    </form>
               </div>
          </nav>
     </div>
</header>
<!-- Heading -->
<?php
if (!isset($_GET['action']) || $_GET['action'] == 'home') {
     $banner = new banner();
     $result_banner = $banner->getBanner();
?>
     <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-indicators">
               <button type="button" data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Slide 3"></button>
               <button type="button" data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="Slide 4"></button>
               <button type="button" data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner" role="listbox">
               <?php
               $first = true; // Biến để xác định mục đầu tiên
               while ($set = $result_banner->fetch()) {
               ?>
                    <div class="carousel-item <?= $first ? 'active' : '' ?>">
                         <a href=" ?action=product"><img src="Content/image/<?= $set['image'] ?>" class=" d-block w-100" alt="..." style="height:644px"></a>
                    </div>
                    <?php
                    $first = false; // Đã qua mục đầu tiên, loại bỏ class active từ các mục tiếp theo
                    ?>
               <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
          </button>
     </div>
<?php } ?>