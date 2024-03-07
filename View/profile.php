<div class="d-flex justify-content-center pt-3">
     <h3 class="text-center"><img src="Content/image/icon_taikhoan_cuaban.svg" alt=""> Tài khoản của bạn</h3>
</div>
<?php
$user = new user();
if (isset($_SESSION['id'])) {
     $getUsers = $user->getUsers($_SESSION['id']);
?>
     <div class="container-xl px-4 mt-4">
          <!-- Account page navigation-->
          <nav class="nav nav-borders">
               <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
               <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
               <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
               <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a> -->
          </nav>
          <hr class="mt-0 mb-4">
          <div class="row">
               <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                         <div class="card-header">Profile Picture</div>
                         <div class="card-body text-center">
                              <!-- Profile picture image-->
                              <img class="img-account-profile rounded-circle mb-2" src="Content/image/<?php if (isset($getUsers)) {
                                                                                                              echo $getUsers['avatar'];
                                                                                                         } else {
                                                                                                              echo "avatar_default.png";
                                                                                                         } ?>" alt="" class="img-fluid">
                              <!-- Profile picture help block-->
                              <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                              <!-- Profile picture upload button-->
                              <form action="?action=user&act=uploadImage" method="post" enctype="multipart/form-data">
                                   <input type="file" name="image" class="mb-4" required />
                                   <button class="btn btn-primary" type="submit" name="submit">Upload new image</button>
                              </form>

                         </div>
                    </div>
               </div>
               <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                         <div class="card-header">Account Details</div>
                         <div class="card-body">
                              <form action="?action=user&act=updateProfile" method="post">
                                   <!-- Form Group (username)-->
                                   <!-- <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                        <input class="form-control" name="inputUsername" id="inputUsername" type="text" placeholder="Enter your username" value="<?= $getUsers['username'] ?>" required maxlength="50">
                                   </div> -->
                                   <!-- Form Group (fullname)-->
                                   <div class="mb-3">
                                        <label class="small mb-1" for="inputFullname">Fullname</label>
                                        <input class="form-control" name="inputFullname" id="inputFullname" type="text" placeholder="Enter your fullname" value="<?= $getUsers['fullname'] ?>" required maxlength="200">
                                   </div>
                                   <!-- Form Group (address)-->
                                   <div class="mb-3">
                                        <label class="small mb-1" for="inputAddress">Address</label>
                                        <input class="form-control" name="inputAddress" id="inputAddress" type="text" placeholder="Enter your address" value="<?= $getUsers['address'] ?>" required maxlength="200">
                                   </div>
                                   <!-- Form Group (email address)-->
                                   <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control" name="inputEmailAddress" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?= $getUsers['email'] ?>" required maxlength="50">
                                   </div>
                                   <!-- Form Group (phone)-->
                                   <div class="mb-3">
                                        <label class="small mb-1" for="inputPhone">Phone</label>
                                        <input class="form-control" name="inputPhone" id="inputPhone" type="text" placeholder="Enter your phone number" value="<?= $getUsers['phone'] ?>" required maxlength="11" minlength="10" pattern="[0-9]+">
                                   </div>
                                   <button type="button" class="btn btn-primary" id="edit" onclick="enable(false)">Edit</button>
                                   <!-- Save changes button-->
                                   <button class="btn btn-primary float-end" id="checkFormUpdateProfile" type="submit" name="submit">Save changes</button>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script>
          // var inputUsername = document.getElementById('inputUsername');
          var inputFullname = document.getElementById('inputFullname');
          var inputAddress = document.getElementById('inputAddress');
          var inputEmailAddress = document.getElementById('inputEmailAddress');
          var inputPhone = document.getElementById('inputPhone');
          var edit = document.getElementById("edit");
          var check = document.getElementById('checkFormUpdateProfile');
          // inputUsername.disabled = true;
          enable(true);

          function enable(a) {
               // inputUsername.disabled = false;
               inputFullname.disabled = a;
               inputAddress.disabled = a;
               inputEmailAddress.disabled = a;
               inputPhone.disabled = a;
               check.disabled = a;
          }
     </script>
<?php
}
?>