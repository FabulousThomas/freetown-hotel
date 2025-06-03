<?php
class Payment extends Controller
{
   private $data = [];

   public function __construct()
   {

   }

   public function index()
   {
      // if (!isUserLoggedIn()) {
      //    redirect('users/login');
      // }

      $this->view('payment', $this->data);
   }
}
