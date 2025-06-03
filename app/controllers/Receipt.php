<?php
class Receipt extends Controller
{
   private $data = [];
   private $pageModel;
   public function __construct()
   {
      $this->pageModel = $this->model('Page');
   }

   public function index($id)
   {

      if ($id && !$id == $id) {
         redirect('rooms');
      }

      $this->data = [
         'id' => $id,
         'receipt' => $this->pageModel->selectWhere('bookings', 'booking_id', $id, 'id'),
      ];


      $this->view('receipt', $this->data);
   }
}
