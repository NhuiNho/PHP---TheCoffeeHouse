<!--Section: Examples-->
<section id="examples" class="">
     <?php
     $banner = new banner();
     $reult_banner_month = $banner->getBannerMonth();
     $product = new product();
     $result_product_love = $product->getProductLove();
     $chuyennha = new chuyennha();
     $result_chuyennha = $chuyennha->getChuyenNha();
     $content = new content();
     $product_detail = new product_detail();
     $size = new size();
     $topping = new topping();
     ?>
     <?php

     ?>
     <div class=" pt-5">
          <div class="row">
               <div class="col-md-6">
                    <a href="?action=product" title="TRÀ">
                         <img src="Content/image/<?= $reult_banner_month['image'] ?>" alt="" class="img-fluid">
                    </a>
               </div>
               <?php while ($set = $result_product_love->fetch()) : ?>
                    <div class="col-md-3 mb-5">
                         <div class="card mb-3 shadow border-0 rounded-4">
                              <a href="?action=product&act=product_detail&id=<?= $set['id'] ?>" title=" <?= $set['name'] ?>"><img src="Content/image/<?= $set['image'] ?>" class="rounded-4 p-2 card-img-top" alt="..."></a>
                              <div class="card-body">
                                   <a href="?action=product&act=product_detail&id=<?= $set['id'] ?>" title=" <?= $set['name'] ?>" class="text-decoration-none text-black">
                                        <h6 class="card-subtitle mb-2 hover_vang">
                                             <?= $set['name'] ?>
                                        </h6>
                                   </a>
                                   <span class="card-text text-muted">
                                        <?= number_format($set['price'], 0, ',', '.') ?>đ
                                   </span>
                              </div>
                         </div>
                    </div>
               <?php endwhile ?>
               <div class="col">
                    <div class="bg-image" style="background: url('Content/image/desktop_bg_350cd1de6f894c64825cd4d961866cb0.webp'); width: 1296px; height: 700px; background-size: contain; background-repeat: no-repeat; background-position: center;">
                         <!-- Nội dung của div -->
                         <div class="row">
                              <div class="col-md-6"></div>
                              <div class="col-md-6">
                                   <div class="" style="width: 500px">
                                        <img src="Content/image/tagline__1__1_378410beecb347f38cf8425ef7459690.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                             <p class="card-text text-muted" style="text-align: justify">
                                                  Được trồng trọt và chăm
                                                  chút kỹ
                                                  lưỡng, nuôi dưỡng từ
                                                  thổ nhưỡng phì nhiêu, nguồn nước mát lành, bao bọc bởi mây và
                                                  sương
                                                  cùng nền nhiệt độ mát mẻ quanh năm, những búp trà ở Tây Bắc mập
                                                  mạp và
                                                  xanh mướt, hội tụ đầy đủ dưỡng chất, sinh khí, và tinh hoa đất
                                                  trời.Chính khí hậu đặc trưng cùng phương pháp canh tác của đồng
                                                  bào
                                                  dân tộc nơi đây đã tạo ra Trà Xanh vị mộc dễ uống, dễ yêu, không
                                                  thể
                                                  trộn lẫn với bất kỳ vùng miền nào khác.
                                             </p>
                                        </div>
                                        <a href="?action=product&category=12"><button class="btn btn-success form-control mt-3">Thử
                                                  Ngay</button></a>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- <div class="pt-5" style="background: #FFF7E6;">
          <div class="container">
               <h2 class="text-black fw-bold text-center"><img src="Content/image/icon_chuyennha.webp" alt="">
                    Chuyện
                    Nhà</h2>
               <?php while ($set = $result_chuyennha->fetch()) : ?>
                    <div class="pt-5 pb-4">
                         <h3 class="" style="border-left: 4px solid #E57905;">&nbsp; <a href="" class="text-black fw-bold text-decoration-none">
                                   <?= $set['name'] ?>
                              </a></h3>
                    </div>
                    <div class="row">
                         <?php
                         $result_content = $content->getContent($set['name']);
                         while ($set1 = $result_content->fetch()) :
                         ?>
                              <div class="col-md-4">
                                   <div class="" style="width: 90%; background: #FFF7E6;">
                                        <div class="img-container">
                                             <a href="" title="<?= $set1['caption'] ?>"><img src=" Content/image/<?= $set1['image'] ?>" class="card-img-top rounded-4 img-zoom" alt="..." style="width: 100%; height: 180px"></a>
                                        </div>
                                        <div class="card-body">
                                             <span class="text-muted">
                                                  <?= $set1['time'] ?>
                                             </span> <br>
                                             <a href="" title="<?= $set1['caption'] ?>" class="text-decoration-none text-black">
                                                  <h6 class="text-truncate caption_hover">
                                                       <?= $set1['caption'] ?>
                                                  </h6>
                                             </a>
                                             <p class="card-text text-truncate">
                                                  <?= $set1['content_detail'] ?>
                                             </p>
                                        </div>
                                   </div>
                              </div>
                         <?php endwhile ?>
                    </div>
               <?php endwhile; ?>
          </div>
     </div> -->
</section>