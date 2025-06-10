<?php
class Shortlet extends Controller
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
               'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'shortlet'),
               'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'shortlet'),
               'filterRooms' => $this->pageModel->filterRooms('rooms', 'r_type', 'shortlet', 'status', $this->formData['availability'], 'price', $this->formData['price'], 'price'),

            ];

            $this->view('shortlet', $this->data);
         }
      }

      $this->data = [
         'title' => 'Rooms',
         'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'shortlet'),
         'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'shortlet'),
         'getRooms' => $this->pageModel->getRoomsWhere('rooms', 'r_type', 'shortlet', 'room_id'),

      ];

      $this->view('shortlet', $this->data);
   }
}
