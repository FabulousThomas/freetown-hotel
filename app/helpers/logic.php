<?php

if (isset($_POST['btn_register_user'])) {

   $data = filteration($_POST);

   $user_id = random_int(111111, 999999);
   // HASH PASSWORD --- PASSWORD_BCRYPT
   $hash_password = md5($data['password']);

   // ===QUERY TO CHECK IF USER DETAILS EXISTS===
   $stmt = $con->query("SELECT * FROM `users` WHERE `email` = '$data[email]' LIMIT 1");
   $stmt0 = $con->query("SELECT * FROM `users` WHERE `phone` = '$data[phone]' LIMIT 1");

   if (!mysqli_num_rows($stmt) > 0) {
      // ===REGISTER USERS IF CONDITION IS TRUE===
      if (!mysqli_num_rows($stmt0) > 0) {

         $stmt1 = $con->query("INSERT INTO `users`(`user_id`, `name`, `email`, `phone`, `address`, `password`) VALUES('$user_id', '$data[name]', '$data[email]','$data[phone]', '$data[address]', '$hash_password')");

         if ($stmt1) {
            $stmt2 = $con->query("SELECT * FROM `users` WHERE `email` = '$data[email]' AND `password` = '$hash_password' LIMIT 1");
            if ($stmt2 && mysqli_num_rows($stmt2) > 0) {
               $row = mysqli_fetch_array($stmt2);
               $user_id = $row['user_id'];

               if ($row['email'] == $data['email'] && $row['password'] == $hash_password) {

                  $_SESSION['user_id'] = $row['user_id'];
                  $_SESSION['user_name'] = $row['name'];
                  $_SESSION['user_email'] = $row['email'];
                  $_SESSION['isUserLoggedIn'] = true;

                  alert('success', 'Welcome ' . '-' . $_SESSION['user_name'] . '-');
                  redirect('account.php?ud=' . $row['user_id']);
               } else {
                  alert('error', 'Invalid Credentials - Check details');
               }
            }
         }
      } else {
         alert('error', 'Phone number already exists');
      }
   } else {
      alert('error', 'Email already exists');
   }
}

if (isset($_POST['btn_login_users'])) {

   $data = filteration($_POST);
   $hash_password = md5($data['password']);

   $stmt = "SELECT * FROM users WHERE email = ? LIMIT 1";
   $values = array($data['email']);

   $res = select($stmt, $values, 's');
   $row = $res->fetch_assoc();

   if ($row && $row['email'] === $data['email'] && $row['password'] === $hash_password) {
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['isUserLoggedIn'] = true;

      flash_msg('success', 'Welcome ' . '-' . $_SESSION['user_name'] . '-');
      redirect('account.php?ud=' . $row['user_id']);
   } else {
      alert('error', 'Invalid Credentials');
   }
}

if (isset($_POST['btn_add_admin'])) {
   $data = filteration($_POST);
   $hash_password = md5($data['password']);
   $admin_id = random_int(111111, 999999);

   $res = $con->query("INSERT INTO `admin` (`user_id`, `admin_name`, `admin_pass`, `admin_access`) VALUES ('$admin_id', '$data[username]', '$hash_password', '$data[role]')");

   if ($res) {
      flash_msg('success', 'New user added!');
   } else {
      flash_msg('success', 'Could not add user', 'alert alert-danger');
   }
}

if (isset($_POST['btn_save_password'])) {
   $frm_data = filteration($_POST);
   $user_email = $_SESSION['user_email'];
   $password = md5($frm_data['password']);

   if ($frm_data['password'] !== $frm_data['cpassword']) {
      flash_msg('success', 'Passwords do not match', 'alert alert-danger');
   } else if (strlen($frm_data['password']) < 6) {
      flash_msg('success', 'Passwords must be at least 6 characters', 'alert alert-danger');
   } else {
      $stmt = $con->prepare("UPDATE `users` SET `password`=? WHERE `email` = ?");
      $stmt->bind_param('ss', $password, $user_email);
      if ($stmt->execute()) {
         flash_msg('success', 'Password updated successfully');
      } else {
         flash_msg('success', 'Could not update password', 'alert alert-danger');
      }
   }
}

if (isset($_POST['btn_save_changes'])) {
   $frm_data = filteration($_POST);

   $stmt = $con->prepare("UPDATE `users` SET `name`=?, `phone`=?, `address`=? WHERE `user_id`=?");
   $stmt->bind_param('sssi', $frm_data['name'], $frm_data['phone'], $frm_data['address'], $_SESSION['user_id']);
   if ($stmt->execute()) {
      flash_msg('success', 'Changes saved');
      $con->query("UPDATE `bookings` SET `name`='$frm_data[name]', `phone`='$frm_data[phone]', `address`='$frm_data[address]' WHERE `user_id`='$_SESSION[user_id]'");
   } else {
      flash_msg('success', 'Could not make changes', 'alert alert-danger');
   }
}
