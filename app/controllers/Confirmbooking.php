<?php
class Confirmbooking extends Controller
{
   private $data = [];
   private $formData;
   private $pageModel;
   private $userModel;
   private $getBookingDetails;
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

      $this->getBookingDetails = $this->pageModel->selectWhere('rooms', 'room_id', $id, 'room_id');

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
         'description' => 'Find your perfect room in our hotel and apartments. We offer various types of rooms with different facilities.',
         'id' => $id,
         'getBookingDetails' => $this->getBookingDetails,
         'getUsersDetails' => isUserLoggedIn() ? $this->pageModel->selectWhere('users', 'user_id', $_SESSION['user_id'], 'id') : '',
      ];

      foreach ($this->getBookingDetails as $row) {
         $_SESSION['room'] = [
            'r_name' => $row->name,
            'price' => $row->price,
            'r_type' => $row->r_type,
            'room_id' => $row->room_id,
            'payment' => null,
            'available' => false,
         ];
      }

      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($this->formData['btn_pay_now'])) {

            // CHECK IN AND OUT VALIDATION
            $_SESSION['today_date'] = new DateTime(date('Y-m-d'));
            $_SESSION['checkin_date'] = new DateTime($this->formData['check_in']);
            $_SESSION['checkout_date'] = new DateTime($this->formData['check_out']);

            $_SESSION['count_days'] = date_diff($_SESSION['checkin_date'], $_SESSION['checkout_date'])->days;
            $_SESSION['payment'] = $_SESSION['room']['price'] * $_SESSION['count_days'];

            $_SESSION['room']['payment'] = $_SESSION['payment'];
            $_SESSION['room']['available'] = true;
            $_SESSION['days'] = $_SESSION['count_days'];

            if ($this->formData['check_in'] != '' && $this->formData['check_out'] != '') {
               if ($_SESSION['checkin_date'] == $_SESSION['checkout_date']) {
                  alert("message", "You cannot check out on the same day");
               } else if ($_SESSION['checkout_date'] < $_SESSION['checkin_date']) {
                  alert("message", "Check-out date is earlier than check-in date!");
               } else if ($_SESSION['checkout_date'] < $_SESSION['today_date']) {
                  alert("message", "Check-in date is earlier than today's date!");
               } else {

                  $_SESSION['form'] = [
                     $_SESSION['f_name'] = $this->formData['name'],
                     $_SESSION['f_phone'] = $this->formData['phone'],
                     $_SESSION['f_email'] = $this->formData['email'],
                     $_SESSION['f_check_in'] = $this->formData['check_in'],
                     $_SESSION['f_check_out'] = $this->formData['check_out'],
                     $_SESSION['f_address'] = $this->formData['address'],
                     $_SESSION['f_adult'] = $this->formData['adult'],
                     $_SESSION['f_children'] = $this->formData['children'],
                  ];

                  $_SESSION['email'] = isUserLoggedIn() ? $_SESSION['user_email'] : $this->formData['email'];

                  $booking_id = random_int(1111111, 9999999);

                  $_SESSION['r_id'] = $id;
                  $_SESSION['booking_id'] = $booking_id;
                  redirect('checkout');
               }
            }
         } else {
            redirect('rooms');
         }
      }

      $this->view('confirmbooking', $this->data);
   }
}
