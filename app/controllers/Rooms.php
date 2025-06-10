<?php
class Rooms extends Controller
{
   private $data = [];
   private $pageModel;
   private $formData;

   public function __construct()
   {
      $this->pageModel = $this->model('Page');
   }

   public function index()
   {
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         if (isset($this->formData['btn_filter_rooms'])) {

            $this->data = [
               'title' => 'Rooms',
               'price' => $this->formData['price'],
               'availability' => $this->formData['availability'],
               'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'normal'),
               'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'normal'),
               'filterRooms' => $this->pageModel->filterRooms('rooms', 'r_type', 'normal', 'status', $this->formData['availability'], 'price', $this->formData['price'], 'price'),

            ];

            $this->view('rooms', $this->data);
         }
      }

      $this->data = [
         'title' => 'Rooms',
         'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'normal'),
         'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'normal'),
         'getRooms' => $this->pageModel->getRoomsWhere('rooms', 'r_type', 'normal', 'room_id'),

      ];

      $this->view('rooms', $this->data);
   }
}
