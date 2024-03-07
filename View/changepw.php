<div class="row gx-3 mb-3">
     <!-- Form Group (first name)-->
     <div class="col-md-6">
          <label class="small mb-1" for="inputPasswordOld">Password Old</label>
          <input class="form-control" name="inputPasswordOld" id="inputPasswordOld" type="password" placeholder="Enter your password old" value="">
     </div>
     <!-- Form Group (last name)-->
     <div class="col-md-6">
          <label class="small mb-1" for="inputPasswordNew">Password New</label>
          <input class="form-control" name="inputPasswordNew" id="inputPasswordNew" type="password" placeholder="Enter your password new" value="" onchange="checkInputPasswordOld()">
     </div>
</div>