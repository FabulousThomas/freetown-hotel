<?php
class Bookingdetails extends Controller
{
   private $data = [];
   private $pageModel;
   public function __construct()
   {
      $this->pageModel = $this->model('Page');
   }

   public function index($id)
   {
      // if (!isUserLoggedIn()) {
      //    redirect('users/login');
      // }

      $this->data = [
         'id' => $id,
         'bookingDetails' => $this->pageModel->selectWhere('bookings', 'booking_id', $id, 'id'),
      ];

      $this->view("bookingdetails", $this->data);
   }
}
