<?php
class Index extends Controller
{
   private $pageModel;
   private $data = [];
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
               'title' => 'FREETOWN HOTEL',
               'price' => $this->formData['price'],
               'availability' => $this->formData['availability'],
               'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'normal'),
               'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'normal'),
               'filterRooms' => $this->pageModel->filterRooms('rooms', 'r_type', 'normal', 'status', $this->formData['availability'], 'price', $this->formData['price'], 'price'),

            ];

            $this->view('index', $this->data);
         }
      }

      $this->data = [
         'title' => 'FREETOWN HOTEL',
         'randomRoom' => $this->pageModel->select_where_rand_limit('rooms', 'status', '1', '3'),
         'randomFacilities' => $this->pageModel->select_rand_limit('facilities', '4'),
         'getPrice' => $this->pageModel->selectDistinctWhere('price', 'rooms', 'r_type', 'normal'),
         'getAvailability' => $this->pageModel->selectDistinctWhere('status', 'rooms', 'r_type', 'normal'),
         'getRooms' => $this->pageModel->getRoomsWhere('rooms', 'r_type', 'normal', 'room_id'),

      ];

      $this->view('index', $this->data);
   }
}
