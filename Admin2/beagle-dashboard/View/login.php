<body class="be-splash-screen">
     <div class="be-wrapper be-login">
          <div class="be-content">
               <div class="main-content container-fluid">
                    <div class="splash-container">
                         <div class="card card-border-color card-border-color-primary">
                              <div class="card-header"><img class="logo-img" src="assets\img\logo-xx.png" alt="logo" width="{conf.logoWidth}" height="27"><span class="splash-description">Please enter your user information.</span></div>
                              <div class="card-body">
                                   <form method="post" action="?action=admin&act=login_admin">
                                        <div class="login-form">
                                             <div class="form-group">
                                                  <input class="form-control" id="email" name="email" type="text" placeholder="Email" autocomplete="off" required>
                                             </div>
                                             <div class="form-group">
                                                  <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                                             </div>
                                             <!-- <div class="form-group row login-tools"> chưa phát triển
                                                  <div class="col-6 login-remember">
                                                       <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="check1">
                                                            <label class="custom-control-label" for="check1">Remember Me</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-6 login-forgot-password"><a href="pages-forgot-password.html">Forgot Password?</a></div>
                                             </div> -->
                                             <button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script type="text/javascript">
          $(document).ready(function() {
               //-initialize the javascript
               App.init();
          });
     </script>
</body>