<?php $user = new user(); ?>
<div class="be-content">
     <div class="main-content container-fluid">
          <div class="user-profile">
               <div class="row">
                    <div class="col-lg-5">
                         <div class="user-display">
                              <div class="user-display-bg"><img src="assets\img\user-profile-display.png" alt="Profile Background"></div>
                              <div class="user-display-bottom">
                                   <div class="user-display-avatar"><img src="assets\img\avatar-150.png" alt="Avatar"></div>
                                   <div class="user-display-info">
                                        <div class="name"><?= $_SESSION['name_admin'] ?></div>
                                        <?php $array_name = explode(' ', $_SESSION['name_admin']) ?>
                                        <div class="nick"><span class="mdi mdi-account"></span><?= $array_name[0]; ?></div>
                                   </div>
                                   <!-- <div class="row user-display-details">
                                        <div class="col-4">
                                             <div class="title">Issues</div>
                                             <div class="counter">26</div>
                                        </div>
                                        <div class="col-4">
                                             <div class="title">Commits</div>
                                             <div class="counter">26</div>
                                        </div>
                                        <div class="col-4">
                                             <div class="title">Followers</div>
                                             <div class="counter">26</div>
                                        </div>
                                   </div> -->
                              </div>
                         </div>
                         <div class="user-info-list card">
                              <div class="card-header card-header-divider">About Me<span class="card-subtitle"></span></div>
                              <div class="card-body">
                                   <table class="no-border no-strip skills">
                                        <tbody class="no-border-x no-border-y">
                                             <tr>
                                                  <td class="icon"><span class="mdi mdi-case"></span></td>
                                                  <td class="item">Ocupation<span class="icon s7-portfolio"></span></td>
                                                  <td></td>
                                             </tr>
                                             <tr>
                                                  <td class="icon"><span class="mdi mdi-cake"></span></td>
                                                  <td class="item">Birthday<span class="icon s7-gift"></span></td>
                                                  <td></td>
                                             </tr>
                                             <tr>
                                                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                                  <td class="item">Mobile<span class="icon s7-phone"></span></td>
                                                  <td></td>
                                             </tr>
                                             <tr>
                                                  <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                                                  <td class="item">Location<span class="icon s7-map-marker"></span></td>
                                                  <td></td>
                                             </tr>
                                             <tr>
                                                  <td class="icon"><span class="mdi mdi-pin"></span></td>
                                                  <td class="item">Website<span class="icon s7-global"></span></td>
                                                  <td></td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-7">
                         <div class="widget widget-fullwidth widget-small">
                              <div class="widget-head pb-6">
                                   <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div>
                                   <div class="title">Development Activity</div>
                              </div>
                              <div class="widget-chart-container">
                                   <div id="bar-chart1" style="height: 180px;"></div>
                                   <table class="table table-striped table-hover">
                                        <thead>
                                             <tr>
                                                  <th>Id</th>
                                                  <th>User</th>
                                                  <th>Username</th>
                                                  <th>Address</th>
                                                  <th>Phone</th>
                                                  <!-- <th class="actions"></th> -->
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $getAllUsers = $user->getAllUsers();
                                             while ($get = $getAllUsers->fetch()) { ?>
                                                  <tr>
                                                       <form action="?action=admin&act=update_profile_user" method="post">
                                                            <td><?= $get['id'] ?></td>
                                                            <td class="user-avatar"><img src="../../Content/image/<?= $get['avatar'] ?>" alt="Avatar"><?= $get['fullname'] ?><input type="text" class="form-control" name="fullname" id="fullname<?= $get['id'] ?>" style="display: none"></td>
                                                            <td><?= $get['username'] ?> <input type="text" class="form-control" name="username" id="username<?= $get['id'] ?>" style="display: none"></td>
                                                            <td><?= $get['address'] ?> <input type="text" class="form-control" name="address" id="address<?= $get['id'] ?>" style="display: none"></td>
                                                            <td><?= $get['phone'] ?> <input type="text" class="form-control" name="phone" id="phone<?= $get['id'] ?>" style="display: none"></td>
                                                            <!-- <td class="actions">
                                                                 <a class="btn btn-primary form-control text-white" name="edit" onclick="edit(<?= $get['id'] ?>)">Edit</a>
                                                                 <button type="submit" name="submit" class="btn btn-primary mt-2 form-control text-center justify-content-center" id="update<?= $get['id'] ?>" style="display: none">update</button>
                                                            </td> -->
                                                       </form>
                                                  </tr>
                                             <?php } ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-6">
                         <div class="card">
                              <div class="card-header card-header-divider">Current Progress<span class="card-subtitle">This is the user current progress widget</span></div>
                              <div class="card-body">
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">Bootstrap Admin</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-primary" style="width: 78%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">78%</span></div>
                                   </div>
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">Custom Work</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-primary" style="width: 57%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">57%</span></div>
                                   </div>
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">Clients Module</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-primary" style="width: 45%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">45%</span></div>
                                   </div>
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">Email Templates</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-danger" style="width: 36%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">36%</span></div>
                                   </div>
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">Plans Module</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-danger" style="width: 30%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">30%</span></div>
                                   </div>
                                   <div class="row user-progress">
                                        <div class="col-10"><span class="title">User Managemenet System</span>
                                             <div class="progress">
                                                  <div class="progress-bar bg-danger" style="width: 21%;"></div>
                                             </div>
                                        </div>
                                        <div class="col-2 pl-0 pl-sm-3"><span class="value">21%</span></div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="card">
                              <div class="card-header card-header-divider">Latest Activity<span class="card-subtitle">This is a custom timeline widget</span></div>
                              <div class="card-body">
                                   <ul class="user-timeline">
                                        <li class="latest">
                                             <div class="user-timeline-date">Just Now</div>
                                             <div class="user-timeline-title">Create New Page</div>
                                             <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
                                        </li>
                                        <li>
                                             <div class="user-timeline-date">Today - 15:35</div>
                                             <div class="user-timeline-title">Back Up Theme</div>
                                             <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
                                        </li>
                                        <li>
                                             <div class="user-timeline-date">Yesterday - 10:41</div>
                                             <div class="user-timeline-title">Changes In The Structure</div>
                                             <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<script>
     function edit(id) {
          document.getElementsByName('edit').forEach(function(a) {
               a.style.display = 'none';
          })
          document.getElementById('fullname' + id).style.display = 'flex';
          document.getElementById('username' + id).style.display = 'flex';
          document.getElementById('address' + id).style.display = 'flex';
          document.getElementById('phone' + id).style.display = 'flex';
          document.getElementById('update' + id).style.display = 'flex';
     }
</script>