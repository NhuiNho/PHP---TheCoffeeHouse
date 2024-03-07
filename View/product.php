  <!--Section: Examples-->
  <section id="examples" class="">
      <?php
        $product = new product();
        $category = new category();
        $menu = new menu();
        $result_menu = $menu->getAllMenu();
        $result_category = $product->getAllCategory();
        ?>
      <!-- Heading -->
      <div class="row">
          <div class="text-center pt-5 pb-5">
              <span class="mau_vang pe-3"><i class="fa fa-trophy fs-3"></i></span>
              <h2 class="d-inline-block">Sản phẩm từ Nhà</h2>
          </div>
          <!-- Nav tabs -->
          <ul class="nav tch-category-card-list tch-category-card-list--spacing d-flex justify-content-md-center flex-xl-wrap flex-lg-wrap" id="myTab" role="tablist">
              <?php
                $active = 'active';
                $true = 'true';
                while ($get_category = $result_category->fetch()) {
                ?>

                  <li class="nav-item text-muted" role="presentation">
                      <a class="nav-link nav-link-category <?= $active ?>" id="a<?= $get_category['id'] ?>-tab" data-bs-toggle="tab" data-bs-target="#a<?= $get_category['id'] ?>" role="tab" aria-controls="a<?= $get_category['id'] ?>" aria-selected="<?= $true ?>">
                          <div class="tch-category-card d-flex flex-column">
                              <div class="d-flex justify-content-center align-items-center tch-category-card__image tch-category-card--circle">
                                  <img class="rounded-circle" src="Content/image/<?= $get_category['image'] ?>" alt="<?= $get_category['type'] ?>">
                              </div>
                              <div class="tch-category-card__content">
                                  <h5 class="tch-category-card__title text-center mb-0">
                                      <?= $get_category['type'] ?>
                                  </h5>
                              </div>
                          </div>
                      </a>
                  </li>

              <?php
                    $true = 'false';
                    $active = '';
                }
                ?>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content pt-5">
              <!-- <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  home
              </div> -->
              <?php
                $result_category = $product->getAllCategory();
                $active = 'active';
                while ($get_category = $result_category->fetch()) {
                ?>
                  <div class="tab-pane <?= $active ?>" id="a<?= $get_category['id'] ?>" role="tabpanel" aria-labelledby="a<?= $get_category['id'] ?>-tab">
                      <div class="row">
                          <?php
                            $result_product = $product->getProductByCategory($get_category['id']);
                            while ($set = $result_product->fetch()) {
                            ?>
                              <div class="col-xl-2 mb-5">
                                  <div class="card mb-3 shadow border-0 rounded-4">
                                      <a href="?action=product&act=product_detail&id=<?= $set['id'] ?>" title="<?= $set['name'] ?>">
                                          <img src="Content/image/<?= $set['image'] ?>" class="card-img-top p-2 rounded-4" alt="...">
                                      </a>
                                      <div class="card-body">
                                          <a href="?action=product&act=product_detail&id=<?= $set['id'] ?>" title="<?= $set['name'] ?>" class="text-decoration-none text-black">
                                              <h6 class="card-subtitle mb-2 hover_vang" style="height: 48px;">
                                                  <?= $set['name'] ?>
                                              </h6>
                                          </a>
                                          <span class="card-text text-muted">
                                              <?= number_format($set['price'], 0, ',', '.') ?>đ
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          <?php } ?>
                      </div>
                  </div>
              <?php
                    $active = '';
                }
                ?>
          </div>

      </div>
  </section>