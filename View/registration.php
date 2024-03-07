<registration>
     <h2 class="registration-h2">Sign in/up Form</h2>
     <div class="registration-container" id="container">
          <div class="registration-form-container registration-sign-up-container">
               <?php
               $nextAct =  (isset($_GET['nextAct'])) ? "&nextAct = " . $_GET['nextAct'] . "" : '';
               ?>
               <form action="?action=user&act=registration_action<?= $nextAct ?>" class="registration-form" method="post">
                    <h1 class="registration-h1">Create Account</h1>
                    <div class="registration-social-container">
                         <a href="#" class="registration-social registration-a"><i class="fab fa-facebook-f"></i></a>
                         <a href="#" class="registration-social registration-a"><i class="fab fa-google-plus-g"></i></a>
                         <a href="#" class="registration-social registration-a"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <!-- <span class="registration-span">or use your email for registration</span> -->
                    <input type="text" placeholder="FullName" name="fullname" class="registration-input" required maxlength="200" />
                    <input type="text" placeholder="PhoneNumber" name="phone" class="registration-input" required maxlength="11" minlength="10" pattern="[0-9]+" />
                    <input type="text" placeholder="Address" name="address" class="registration-input" required maxlength="200" />
                    <!-- <input type="text" placeholder="UserName" name="username" class="registration-input" required maxlength="50" /> -->
                    <input type="password" placeholder="Password" name="password" class="registration-input" required maxlength="100" />
                    <input type="email" placeholder="Email" class="registration-input" name="email" required maxlength="50" />
                    <button class="registration-button" type="submit" name="submit">Sign Up</button>
               </form>
          </div>
          <div class="registration-form-container registration-sign-in-container">
               <form action="?action=user&act=login_action<?= $nextAct ?>" class="registration-form" method="post">
                    <h1 class="registration-h1">Sign in</h1>
                    <div class="registration-social-container">
                         <a href="#" class="registration-social registration-a"><i class="fab fa-facebook-f"></i></a>
                         <a href="#" class="registration-social registration-a"><i class="fab fa-google-plus-g"></i></a>
                         <a href="#" class="registration-social registration-a"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span class="registration-span">or use your account</span>
                    <input type="text" placeholder="Email or Phonenumber" class="registration-input" name="emailphone" required />
                    <input type="password" placeholder="Password" class="registration-input" name="password" required />
                    <a href="?action=forget">Forgot your password?</a>
                    <button class="registration-button" type="submit" name="submit">Sign In</button>
               </form>
          </div>
          <div class="registration-overlay-container">
               <div class="registration-overlay">
                    <div class="registration-overlay-panel registration-overlay-left">
                         <h1 class="registration-h1">Welcome Back!</h1>
                         <p class="registration-p">To keep connected with us please login with your personal info</p>
                         <button class="ghost registration-button" id="signIn">Sign In</button>
                    </div>
                    <div class="registration-overlay-panel registration-overlay-right">
                         <h1 class="registration-h1">Hello, Friend!</h1>
                         <p class="registration-p">Enter your personal details and start journey with us</p>
                         <button class="ghost registration-button" id="signUp">Sign Up</button>
                    </div>
               </div>
          </div>
     </div>
</registration>
<script>
     const signUpButton = document.getElementById('signUp');
     const signInButton = document.getElementById('signIn');
     const container = document.getElementById('container');

     signUpButton.addEventListener('click', () => {
          container.classList.add('registration-right-panel-active');
     });

     signInButton.addEventListener('click', () => {
          container.classList.remove('registration-right-panel-active');
     });
</script>