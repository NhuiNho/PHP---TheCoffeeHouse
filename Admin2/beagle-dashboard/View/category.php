<?php
$category = new category();
$menu = new menu();
if (isset($_SESSION['id_admin'])) {
     $itemPage = 5;
     $search = isset($_POST['search']) ? $_POST['search'] : '';
     $type = isset($_POST['menu']) ? $_POST['menu'] : '';
     $totalPage = ceil($category->getCategorySearch($search, $type)->fetch()['count(*)'] / $itemPage);
     $pageNow = isset($_GET['page']) ? $_GET['page'] : 1;
     $indexStart = ($pageNow - 1) * $itemPage;
     $getCategories = $category->getCategorySearch1($search, $type, $indexStart, $itemPage);
?>
     <div class="be-content">
          <div class="main-content container-fluid">
               <div class="mt-5 mb-5 text-center">
                    <form action="?action=category" method="post">
                         <caption>
                              <input class="" type="text" name="search" value="<?php echo (isset($_POST['search'])) ? $_POST['search'] : '' ?>" placeholder="category name" style="height: 40px">
                              <select name="menu" id="" style="height: 40px">
                                   <option value="">All</option>
                                   <?php $getMenu = $menu->getMenuById('all');
                                   while ($getM = $getMenu->fetch()) { ?>
                                        <option value="<?php echo $getM['id'] ?>" <?php echo (isset($_POST['menu']) && $_POST['menu'] == $getM['id'] ? "selected" : "") ?>> <?php echo $getM['name'] ?> </option>
                                   <?php }  ?>
                              </select>
                              <button type="submit" name="submit" style="height: 40px">tim kiem</button>
                         </caption>
                    </form>
               </div>
               <button onclick="AddCategory()" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal">AddCategory</button>
               <div class="row">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col" style="width: 150px">Image</th>
                                   <th scope="col">Type</th>
                                   <th scope="col">Category Type</th>
                                   <th scope="col" colspan="2">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php while ($ct = $getCategories->fetch()) { ?>
                                   <tr>
                                        <th scope="row"><img src="../../Content/image/<?= $ct['image'] ?>" alt="" class="img-fluid card-img-top"></th>
                                        <td><?= $ct['type'] ?></td>
                                        <td>
                                             <?php
                                             echo $menu->getMenuById($ct['category_type'])->fetch()['name'];
                                             ?>
                                        </td>
                                        <td>
                                             <input type="button" class="btn btn-info" value="sua" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Update(<?= $ct['id'] ?>)">
                                        </td>

                                        <td>
                                             <a href="?action=category&act=delete_category&id=<?= $ct['id'] ?>" class="btn btn-danger m-0" onclick="return confirm('Bạn có chắc muốn xóa ?')">Xóa</a>
                                        </td>
                                   </tr>
                              <?php } ?>
                         </tbody>
                    </table>
               </div>
               <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-grey" <?php if ($pageNow == 1) echo "disabled" ?>><a class="btn btn-grey" href="?action=category&page=<?= $pageNow - 1 ?>">Previous</a></button>
                    <?php for ($i = 0; $i < $totalPage; $i++) { ?>
                         <a href="?action=category&page=<?= $i + 1 ?>"><button type="button" class="btn btn-outline-primary ml-1 <?php if ($i + 1 == $pageNow) echo "active" ?>"><?= $i + 1 ?></button></a>
                    <?php } ?>
                    <button type="button" class="btn btn-success ml-1" <?php if ($pageNow == $totalPage) echo "disabled" ?>><a class="btn btn-success" href="?action=category&page=<?= $pageNow + 1 ?>">Next</a></button>
               </div>
          </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content  d-flex justify-content-center" id="load-form">




               </div>
          </div>
     </div>
     <script type="text/javascript">
          function Update(id) {
               $('#load-form').load('?action=category&act=update_category', {
                    id: id,
               })
          }

          function AddCategory() {
               $('#load-form').load('?action=category&act=add_category', )
          }
     </script>
<?php } ?>