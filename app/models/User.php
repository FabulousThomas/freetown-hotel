<?php
/*
 * User model
 * Creates Database instance
 * Handles users details
 * Register users
 * Inserts into users table
 */
class User
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Users register
   public function register($data)
   {
      $user_id = random_int(111111, 999999);
      $this->db->query('INSERT INTO `users` (`user_id`, `name`, `email`, `address`, `phone`, `password`) VALUES (:user_id, :name, :email, :address, :phone, :password)');
      // Bind values
      $this->db->bind(':user_id', $user_id);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':password', $data['password']);

      // Execute query
      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

   // Users login
   public function login($email, $password)
   {
      $this->db->query('SELECT * FROM users WHERE email = :email AND password = :password');
      // Bind values
      $this->db->bind(':email', $email);
      $this->db->bind(':password', md5($password));

      $this->db->singleSet();
      // $_SESSION['isUserLoggedIn'] = true;

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }

      // $row = $this->db->singleSet();

      // $hashed_password = $row->password;

      // if (password_verify($password, $hashed_password)) {
      //    return $row;
      // } else {
      //    return false;
      // }
   }

   // Check for email
   public function checkEmail($email)
   {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   // Check for phone number
   public function checkPhone($phone)
   {
      $this->db->query('SELECT * FROM users WHERE phone = :phone');
      $this->db->bind(':phone', $phone);
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   // Check for username
   public function checkUsername($username)
   {
      $this->db->query('SELECT * FROM users WHERE username = :username');
      $this->db->bind(':username', $username);
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function getId($table, $col, $id)
   {
      $this->db->query("SELECT * FROM `$table` WHERE `$col` = :id");
      $this->db->bind(':id', $id);

      return $this->db->singleSet();
   }

   // Check for Password
   public function checkPassword($password)
   {
      $this->db->query('SELECT * FROM users WHERE password = :password');
      $this->db->bind(':password', $password);
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   // UPDATE PASSWORD
   public function updatePassword($password, $email)
   {
      $this->db->query("UPDATE `users` SET `password` = :password WHERE `email` = :email");
      $this->db->bind(':password', $password);
      $this->db->bind(':email', $email);

      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }
}
