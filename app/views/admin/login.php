<?php require APPROOT . '/views/admin/inc/head.php' ?>
<title><?= SITENAME ?> | Login</title>

<div class="container mt-5 py-5">
   <div class="row mx-0">
      <div class="col-lg-6 col-md-8 col-12 mx-auto px-0">
         <div class="card card-body bg-light mt-5">
            <h2 class="">Admin Login</h2>
            <p>Please fill in your details</p>
            <form method="POST" enctype="multipart/form-data" autocomplete="off">
               <div class="form-group mb-2">
                  <label for="admin_name">Username <sup>*</sup></label>
                  <input type="text" name="admin_name" class="form-control shadow-none <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?> rounded-0" placeholder="Enter Username" value="<?php echo $data['admin_name'] ?>">
                  <small class="invalid-feedback"><?php echo $data['name_err'] ?></small>
               </div>
               <div class="form-group mb-0">
                  <label for="password">Password <sup>*</sup></label>
                  <input type="password" name="admin_pass" class="form-control shadow-none <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> rounded-0" placeholder="Enter Password" id="show_pass">
                  <small class="invalid-feedback"><?php echo $data['password_err'] ?></small>
               </div>
               <div class="form-check form-switch mb-2">
                  <label for="show">
                     <small>Show Password</small>
                     <input class="form-check-input shadow-none border" type="checkbox" id="show" role="switch" onclick="showPassword()">
                  </label>
               </div>

               <div class="row">
                  <div class="col-4">
                     <button type="submit" name="btn_login" class="btn-md">Login</button>
                  </div>
                  
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php' ?>