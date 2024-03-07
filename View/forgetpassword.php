<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
        <form action="<?php if (isset($_SESSION['act'])) echo $_SESSION['act'] ?>" class="login-form" method="post">

          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Enter Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="" required>

          </div>



          <div class="form-check">
            <button type="submit" name="submit_email">Gửi</button>

          </div>

        </form>


      </div>


    </div>
  </div>
</section>