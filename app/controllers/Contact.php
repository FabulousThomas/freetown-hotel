<?php

class Contact extends Controller
{
   private $data = [];
   private $formData;
   public function __construct()
   {
   }

   public function index()
   {
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($_POST['btn_message'])) {

            $q = "INSERT INTO `user_query` (`name`, `email`, `subject`, `message`) VALUES(?,?,?,?)";
            $values = array($this->formData['name'], $this->formData['email'], $this->formData['subject'], $this->formData['message']);

            $res = insert($q, $values, 'ssss');

            if ($res) {
               alert('success', 'Mail sent!');
            } else {
               alert('error', 'Server is down - Try again later');
            }
         }
      }

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
      ];

      $this->view('contact', $this->data);
   }
}
