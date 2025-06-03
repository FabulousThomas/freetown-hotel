<?php
class Checkout extends Controller
{
   private $data = [];
   private $pageModel;
   public function __construct()
   {
      $this->pageModel = $this->model('Page');
   }

   public function index()
   {

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
         'bookingDetails' => isset($_SESSION['booking_id']) ? $this->pageModel->selectWhere('bookings', 'booking_id', $_SESSION['booking_id'], 'id') : '',
         'keywords' => 'FreeTown Hotel & Apartments',
         'author' => 'FreeTown Hotel & Apartments',
      ];

      if (!isset($_SESSION['form'])) {
         redirect('rooms');
      }

      $this->view('checkout', $this->data);
   }
}
