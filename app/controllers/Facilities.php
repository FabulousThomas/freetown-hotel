<?php
class Facilities extends Controller
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
         'getAll' => $this->pageModel->getAll('facilities', 'id'),
      ];
      $this->view('facilities', $this->data);
   }
}
