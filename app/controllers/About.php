<?php

class About extends Controller
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
         'getTeam' => $this->pageModel->getAll('team', 'id'),
         // 'settings' => $this->pageModel->getAll('settings', 'id'),
      ];
      $this->view('about', $this->data);
   }
}
