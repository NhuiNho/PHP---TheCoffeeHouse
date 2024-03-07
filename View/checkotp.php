<section class="login-block">
     <div class="container">
          <div class="row">
               <div class="col-md-4 login-sec">
                    <form action="<?= isset($_SESSION['act']) ? $_SESSION['act'] : '?action=user' ?>" class="login-form" method="post">
                         <p>Nhập mã xác thực</p>
                         <input type="text" name="code" required>
                         <button type="submit" name="submit_code">Gửi</button>
                    </form>
               </div>
          </div>
     </div>
</section>