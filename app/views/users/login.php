<?php
require_once APPROOT . '/views/inc/head.php';
require_once APPROOT . '/views/inc/navbar.php';
?>
<title><?= SITENAME . ' | ' . $data['title'] ?></title>

<div class="container my-5 py-4">
   <div class="jumbotron jumbotron-fluid py-2 text-center">
      <h1 class="text-uppercase mb-0"><?php echo $data['title'] ?></h1>
      <p class="lead mb-"><?php echo $data['description'] ?></p>
   </div>

   <div class="card card-body px-2 col-lg-6 col-md-12 m-auto shadow border rounded-0">
      <form method="POST" enctype="multipart/form-data">
         <?php flash_msg('message'); ?>
         <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control shadow-none <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?> rounded-0" name="email" placeholder="Enter Email" value="<?php echo $data['email'] ?>">
            <small class="invalid-feedback"><?php echo $data['email_err'] ?></small>
         </div>
         <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control shadow-none <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> rounded-0" name="password" placeholder="Enter Password" id="show_pass">
            <small class="invalid-feedback"><?php echo $data['password_err'] ?></small>
         </div>
         <div class="form-check form-switch mb-2">
            <label for="show">
               <small>Show Password</small>
               <input class="form-check-input shadow-none border" type="checkbox" id="show" role="switch" onclick="showPassword()">
            </label>
         </div>
         <div class="form-group row">
            <div class="col">
               <button type="submit" class="btn btn-custom-bg form-control shadow-none btn_user_login">Login</button>
            </div>
            <div class="col">
               <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light form-control shadow-none">Or Register</a>
            </div>
         </div>
      </form>

   </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php' ?>