<?php
class Server extends Controller
{
   
   private $data = [];

   public function index($tnx_id, $bk_id)
   {

      $this->data = [
         'tnx_id' => $tnx_id,
         'bk_id' => $bk_id,
      ];

      $this->view('server/completepayment/' . $this->data["tnx_id"] . "/" . $this->data["bk_id"]);
   }
}




