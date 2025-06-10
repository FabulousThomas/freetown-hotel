<?php
class Users extends Controller
{
   private $data = [];
   private $userModel;
   private $pageModel;
   private $formData;
   public function __construct()
   {
      $this->userModel = $this->model('User');
      $this->pageModel = $this->model('Page');
   }

   // REGISTER USERS
   public function register()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Sanitize input
         $this->formData = filteration($_POST);
         // Initialize this->data array
         $this->data = [
            'title' => 'Create an Account',
            'description' => 'Please, Register to Login',
            'name' => $this->formData['name'],
            'address' => $this->formData['address'],
            'phone' => $this->formData['phone'],
            'email' => $this->formData['email'],
            'password' => md5($this->formData['password']),
            'name_err' => '',
            'address_err' => '',
            'phone_err' => '',
            'email_err' => '',
            'password_err' => '',
         ];

         // Validate Inputs
         if (empty($this->data['name'])) {
            $this->data['name_err'] = 'Please, enter your full name';
         }

         if (empty($this->data['email'])) {
            $this->data['email_err'] = 'Please, enter email';
         } elseif ($this->data['email'] == $this->userModel->checkEmail($this->data['email'])) {
            $this->data['email_err'] = 'This email already exist';
         }

         if (empty($this->data['password'])) {
            $this->data['password_err'] = 'Please, enter password';
         } elseif (strlen($this->data['password']) < 6) {
            $this->data['password_err'] = 'password must be at least 6 characters';
         }

         if (empty($this->data['address'])) {
            $this->data['address_err'] = 'Please, enter address';
         }

         if (empty($this->data['phone'])) {
            $this->data['phone_err'] = 'Please, enter phone number';
         } elseif ($this->data['phone'] == $this->userModel->checkPhone($this->data['phone'])) {
            $this->data['phone_err'] = 'This phone number already exist';
         }

         // Make sure errors are empty
         if (empty($this->data['name_err']) && empty($this->data['email_err']) && empty($this->data['password_err']) && empty($this->data['address_err']) && empty($this->data['phone_err'])) {

            if ($this->userModel->register($this->data)) {
               alert('users_msg', '<strong>Success!</strong> You can login');
               redirect('users/login');
            } else {
               die('Something went wrong');
            }
         } else {
            // Load views with error
            $this->view('users/register', $this->data);
         }
      } else {
         $this->data = [
            'title' => 'Create an Account',
            'description' => 'Please, Register to Login',
            'name' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'password' => '',
            'name_err' => '',
            'address_err' => '',
            'phone_err' => '',
            'email_err' => '',
            'password_err' => '',
         ];
         $this->view('users/register', $this->data);
      }
   }

   // LOGIN USERS
   public function login()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $this->formData = filteration($_POST);
         // Sanitize inputs
         // Initialize data array
         $this->data = [
            'title' => 'Login',
            'description' => 'Please, Login to proceed',
            'email' => $this->formData['email'],
            'password' => md5($this->formData['password']),
            'email_err' => '',
            'password_err' => '',
         ];

         // Validate login inputs
         // Validate email
         if ($this->userModel->checkEmail($this->data['email'])) {
            // Success
         } elseif (empty($this->data['email'])) {
            $this->data['email_err'] = 'Please, enter email';
         } else {
            // Failed
            $this->data['email_err'] = 'No user for this account';
         }

         // Validate password
         if (empty($this->formData['password'])) {
            $this->data['password_err'] = 'Please, enter password';
         }

         // Make sure errors are empty
         if (empty($this->data['email_err']) && empty($this->data['password_err'])) {
            // Success
            $loginUsers = $this->userModel->login($this->formData['email'], $this->formData['password']);

            if ($loginUsers) {
               $this->createLoggedinSession($loginUsers);
            } else {
               $this->data['password_err'] = 'Password is incorrect';
               $this->view('users/login', $this->data);
            }
         } else {
            // Load views with error
            $this->view('users/login', $this->data);
         }
      } else {
         $this->data = [
            'title' => 'Login',
            'description' => 'Please, Login to proceed',
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
         ];
         $this->view('users/login', $this->data);
      }
   }

   public function account($id)
   {
      if (!isUserLoggedIn()) {
         redirect('users/login');
      }

      $this->changePassword();
      $this->updateUser();

      if (isUserLoggedIn() && $id !== $_SESSION['user_id'] || $id && !$this->userModel->getId('users', 'user_id', $id) == $id) {
         redirect('');
      }

      $this->data = [
         'title' => 'Account',
         'id' => $id,
         'userDetails' => $this->pageModel->selectWhere('users', 'user_id', $id, 'id'),
         'bookings' => $this->pageModel->selectWhere('bookings', 'user_id', $id, 'id'),
      ];

      $this->view("users/account", $this->data);
   }

   // COMPLETE PAYMENT
   public function completePayment($tnx_id, $bk_id, $r_id)
   {

      // if (!isUserLoggedIn()) {
      //    redirect('users/login');
      // }

      if (isset($tnx_id) && isset($bk_id)) {

         global $con;

         $r_status = '0';
         $status = 'paid';
         $user_id = isUserLoggedIn() ? $_SESSION['user_id'] : null;

         $stmt = $con->prepare("INSERT INTO `bookings`(`booking_id`, `user_id`, `room_id`, `r_status`, `cost`, `days`, `status`, `r_type`, `r_price`, `r_name`, `name`, `email`, `phone`, `check_in`, `check_out`, `address`, `adult`, `children`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

         $stmt->bind_param('iiiiiissssssssssss', $bk_id, $user_id, $r_id, $r_status, $_SESSION['payment'], $_SESSION['count_days'], $status, $_SESSION['room']['r_type'], $_SESSION['room']['price'], $_SESSION['room']['r_name'], $_SESSION['f_name'], $_SESSION['email'], $_SESSION['f_phone'], $_SESSION['f_check_in'], $_SESSION['f_check_out'], $_SESSION['f_address'], $_SESSION['f_adult'], $_SESSION['f_children']);
         // $stmt->execute();

         // SAVE PAYMENT INFO
         $stmt1 = $con->prepare("INSERT INTO `payments`(`booking_id`, `user_id`, `tnx_id`) VALUES (?,?,?)");
         $stmt1->bind_param("iis", $bk_id, $user_id, $tnx_id);
         if ($stmt1->execute() && $stmt->execute()) {

            // UPDATE ROOM STATUS IF PAYMENT IS MADE SUCCESSFULLY
            $q = "UPDATE `rooms` SET `status`=? WHERE `room_id` = ?";
            $v = array(0, $r_id);
            update($q, $v, "ii");

            if (isUserLoggedIn()) {
               flash_msg('message', 'Paid successfully! Thanks for booking with us - ' . $_SESSION['user_name']);
               redirect("users/account/$_SESSION[user_id]");
            } else {
               redirect('receipt/' . $bk_id);
            }
         } else {
            alert('message', 'Could not complete transaction');
         }
      } else {
         redirect('rooms');
         exit();
      }
   }

   // CHANGE PASSWORD
   private function changePassword()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $this->formData = filteration($_POST);

         if (isset($this->formData['btn_change_password'])) {

            $password = md5($this->formData['password']);
            $user_email = $_SESSION['email'];

            if (strlen($this->formData['password']) >= 6) {
               $this->userModel->updatePassword($password, $user_email);
               alert('message', 'Password updated successfully');
            } else {
               alert('message', 'Passwords must be at least 6 characters');
            }
         }
      }
   }

   // UPDATE USERS
   private function updateUser()
   {
      global $con;
      $formData = filteration($_POST);

      if (isset($formData['btn_save_changes'])) {

         $stmt = $con->prepare("UPDATE `users` SET `name`=?, `phone`=?, `address`=? WHERE `user_id`=?");
         $stmt->bind_param('sssi', $formData['name'], $formData['phone'], $formData['address'], $_SESSION['user_id']);

         if ($stmt->execute()) {
            $con->query("UPDATE `bookings` SET `name`='$formData[name]', `phone`='$formData[phone]', `address`='$formData[address]' WHERE `user_id`='$_SESSION[user_id]'");
            alert('message', 'Changes saved successfully');
         } else {
            alert('message', 'Could not make changes');
         }
      }
   }

   // CHECK LOGGED IN USER
   public function createLoggedinSession($users)
   {
      global $con;
      $_SESSION['user_email'] = $this->formData['email'];
      $sql = $con->query("SELECT * FROM `users` WHERE `email` = '$_SESSION[user_email]'");
      $row = $sql->fetch_assoc();
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['isUserLoggedIn'] = true;
      // redirect URL on SUCCESS ->>>
      redirect("users/account/$row[user_id]");
   }

   // USER LOGOUT SESSION
   public function logout()
   {
      unset($_SESSION['user_email']);
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['isUserLoggedIn']);
      $_SESSION['isUserLoggedIn'] = false;
      session_destroy();
      redirect('users/login');
   }
}
