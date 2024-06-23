<?php

class Admins
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Users login
   public function login($username, $password)
   {
      $this->db->query("SELECT * FROM `admin` WHERE `admin_name` = :admin_name AND `admin_pass` = :admin_pass");
      // Bind values
      $this->db->bind(':admin_name', $username);
      $this->db->bind(':admin_pass', md5($password));
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   // Check for username
   public function checkUsername($name)
   {
      $this->db->query("SELECT * FROM `admin` WHERE `admin_name` = :admin_name");
      $this->db->bind(':admin_name', $name);
      $this->db->singleSet();

      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function getUserAccess()
   {
   }
}
