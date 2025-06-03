<?php
class Roomdetails extends Controller
{
   private $data = [];
   private $formData;
   private $pageModel;
   private $userModel;
   public function __construct()
   {
      $this->pageModel = $this->model('Page');
      $this->userModel = $this->model('User');
   }

   public function index($id)
   {
      if ($id && !$this->userModel->getId('rooms', 'room_id', $id) == $id) {
         redirect('rooms');
      }

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
         'description' => 'Find your perfect room in our hotel and apartments. We offer various types of rooms with different facilities.',
         'id' => $id,
         'getRoomDetails' => $this->pageModel->selectWhere('rooms', 'room_id', $id, 'room_id'),
      ];

      $this->view('roomdetails', $this->data);
   }
}
