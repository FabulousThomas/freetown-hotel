<?php
class Admin extends Controller
{
   private $data = [];
   private $adminModel;
   private $pageModel;
   private $formData;

   public function __construct()
   {
      isAdmin();
      $this->addAdmin();
      $this->adminModel = $this->model('Admins');
      $this->pageModel = $this->model('Page');
   }

   // MAIN VIEW
   public function index()
   {
      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
      ];
      $this->view('admin/index', $this->data);
   }

   // ROOMS VIEW
   public function rooms()
   {
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($this->formData['btn_add_rooms'])) {

            $features = implode(',', $this->formData['features']);
            $facilities = implode(',', $this->formData['facilities']);
            $r_type = "normal";
            $rand_id = random_int(111111, 999999);

            $img1 = imageUpload('image1', 'rooms');
            $img2 = imageUpload('image2', 'rooms');
            $img3 = imageUpload('image3', 'rooms');
            $img4 = imageUpload('image4', 'rooms');

            $q = "INSERT INTO `rooms`(`room_id`, `name`, `r_type`, `area`, `price`, `description`, `features`, `facilities`, `image1`, `image2`, `image3`, `image4`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $values = array($rand_id, $this->formData['name'], $r_type, $this->formData['area'], $this->formData['price'], $this->formData['desc'], $features, $facilities, $img1, $img2, $img3, $img4);

            if (insert($q, $values, "sssissssssss")) {
               alert('success', 'New room added!');
            } else {
               alert('error', 'Could not add room');
            }
         }

         if (isset($this->formData['btn_inactive'])) {

            $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
            $v = array(0, $this->formData['room_id']);

            if (update($q, $v, 'ii')) {
               alert('success', 'Room is Inactive');
            } else {
               alert('error', 'Unable to set');
            }
         } else if (isset($this->formData['btn_active'])) {

            $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
            $v = array(1, $this->formData['room_id']);

            if (update($q, $v, 'ii')) {
               alert('success', 'Room is Active');
            } else {
               alert('error', 'Unable to set');
            }
         } else if (isset($this->formData['btn_delete_rooms'])) {

            if (deleteF('rooms', 'room_id', $this->formData['room_id'])) {
               alert('success', 'Room deleted');
            } else {
               alert('error', 'Unable delete');
            }
         }
      }

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
         'getRooms' => $this->pageModel->select_Where_orderby('rooms', 'r_type', 'normal', 'room_id'),
      ];

      $this->view('admin/rooms', $this->data);
   }

   // SHORT LET VIEW
   public function shortlet()
   {
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($this->formData['btn_add_short_let'])) {

            $features = implode(',', $this->formData['features']);
            $facilities = implode(',', $this->formData['facilities']);
            $r_type = "shortlet";
            $rand_id = random_int(111111, 999999);

            $img1 = imageUpload('image1', 'rooms');
            $img2 = imageUpload('image2', 'rooms');
            $img3 = imageUpload('image3', 'rooms');
            $img4 = imageUpload('image4', 'rooms');

            $q = "INSERT INTO `rooms`(`room_id`, `name`, `r_type`, `area`, `price`, `description`, `features`, `facilities`, `image1`, `image2`, `image3`, `image4`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $values = array($rand_id, $this->formData['name'], $r_type, $this->formData['area'], $this->formData['price'], $this->formData['desc'], $features, $facilities, $img1, $img2, $img3, $img4);

            if (insert($q, $values, "sssissssssss")) {
               alert('success', 'Short-Let room added!');
            } else {
               alert('error', 'Could not add room');
            }
         }

         if (isset($this->formData['btn_inactive'])) {

            $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
            $v = array(0, $this->formData['room_id']);

            if (update($q, $v, 'ii')) {
               alert('success', 'Room is Inactive');
            } else {
               alert('error', 'Unable to set');
            }
         } else if (isset($this->formData['btn_active'])) {

            $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
            $v = array(1, $this->formData['room_id']);

            if (update($q, $v, 'ii')) {
               alert('success', 'Room is Active');
            } else {
               alert('error', 'Unable to set');
            }
         } else if (isset($this->formData['btn_delete_rooms'])) {

            if (deleteF('rooms', 'room_id', $this->formData['room_id'])) {
               alert('success', 'Room deleted');
            } else {
               alert('error', 'Unable delete');
            }
         }
      }

      $this->data = [
         'title' => 'FreeTown Hotel & Apartments',
         'getRooms' => $this->pageModel->select_Where_orderby('rooms', 'r_type', 'shortlet', 'room_id'),
      ];

      $this->view('admin/shortlet', $this->data);
   }

   // TRANSACTIONS VIEW
   public function transactions()
   {

      if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] === '1') {
         $this->data = [
            'getAll' => $this->pageModel->getAll('payments', 'id'),
         ];
      } else {
         redirect("admin/index");
      }

      $this->view('admin/transactions', $this->data);
   }

   // USER QUERY VIEW
   public function userquery()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $this->formData = filteration($_POST);

         if (isset($this->formData['btn_seen_user_query'])) {

            $q = "UPDATE `user_query` SET `seen`=? WHERE `id`=?";
            $values = array(1, $this->formData['user_query_id']);
            if (update($q, $values, 'ii')) {
               alert('success', 'Marked as read');
            } else {
               alert('success', 'Operation failed!');
            }
         } else if (isset($this->formData['btn_delete_user_query'])) {

            $res = deleteF('user_query', 'id', $this->formData['user_query_id']);
            if ($res) {
               alert('success', 'Message deleted!');
            } else {
               alert('success', 'Operation failed!');
            }
         } else if (isset($this->formData['btn_seen_all'])) {

            $q = "UPDATE `user_query` SET `seen`=?";
            $values = array(1);
            if (update($q, $values, 'i')) {
               alert('success', 'Marked all as read');
            } else {
               alert('success', 'Operation failed!');
            }
         } else if (isset($this->formData['btn_delete_all'])) {

            if ($this->pageModel->deleteAll("user_query")) {
               alert('success', 'All data deleted');
            } else {
               alert('success', 'Operation failed!');
            }
         }
      }

      $this->data = [
         'getAll' => $this->pageModel->getAll('user_query', 'id'),
      ];

      $this->view('admin/userquery', $this->data);
   }

   // FEATURES AND FACILITIES VIEW
   public function featuresfacilities()
   {
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         if (isset($this->formData['btn_add_facilities'])) {

            $image = imageUpload('icon', 'facilities');

            $q = 'INSERT INTO `facilities`(`name`, `icon`, `description`) VALUES(?,?,?)';
            $values = array($this->formData['name'], $image, $this->formData['desc']);

            $res = insert($q, $values, 'sss');
            if ($res) {
               alert('success', 'Facility added!');
            } else {
               alert('success', 'Something went wrong!');
            }
         } else if (isset($this->formData['btn_delete_facilities'])) {
            $frmData = filteration($_POST);
            global $con;

            $facility_id = $frmData['facility_id'];

            $pre_q = $con->query("SELECT * FROM `facilities` WHERE `id` = '$facility_id' LIMIT 1");
            $img = $pre_q->fetch_assoc();

            $image_path = "./assets/images/facilities/";

            if (file_exists($image_path . $img['icon'])) {
               $res = $this->pageModel->delete('facilities', 'id', $facility_id);
               if ($res) {
                  alert('success', 'Facility removed!');
                  unlink($image_path . $img['icon']);
               } else {
                  alert('success', 'Failed to add');
               }
            }
         } else if (isset($this->formData['btn_add_features'])) {

            $q = "INSERT INTO `features`(`name`) VALUES(?)";
            $values = array($this->formData['name']);

            if (insert($q, $values, 's')) {
               alert('success', 'Feature added');
            } else {
               alert('success', 'Failed to add!');
            }
         } else if (isset($this->formData['btn_delete_features'])) {

            $feature_id = $this->formData['feature_id'];
            if (deleteF('features', 'id', $feature_id)) {
               alert('success', 'Feature removed');
            } else {
               alert('success', 'Failed to add!');
            }
         }
      }

      $this->data = [
         'getFacilities' => $this->pageModel->getAll('facilities', 'id'),
         'getFeatures' => $this->pageModel->getAll('features', 'id'),
      ];

      $this->view('admin/featuresfacilities', $this->data);
   }

   // SESSIONS/USER LOGIN VIEW
   public function session()
   {

      if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] === '1') {
         $this->data = [
            'getAll' => $this->pageModel->getAll('login_sessions', 'created_at'),
         ];
      } else {
         redirect("admin/index");
      }

      $this->view('admin/session', $this->data);
   }

   // SETTINGS VIEW
   public function settings()
   {
      global $con;
      $this->formData = filteration($_POST);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         if (isset($this->formData['btn_update_settings'])) {

            $q = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `id`=?";
            $values = array($this->formData['site_title'], $this->formData['site_about'], 1);

            $res = update($q, $values, 'ssi');

            if ($res) {
               alert('message', 'Settings Updated');
            } else {
               alert('message', 'Settings failed Update');
            }
         }

         if (isset($this->formData['btn_add_team'])) {

            $image = imageUpload('team_photo', 'team');

            $q = 'INSERT INTO `team`(team_name, team_picture) VALUES(?,?)';
            $values = array($this->formData['team_name'], $image);

            $res = insert($q, $values, 'ss');
            if ($res) {
               alert('message', 'Team Member added!');
            } else {
               alert('message', 'Something went wrong!');
            }
         } else if (isset($this->formData['btn_delete_team'])) {
            $team_id = $this->formData['team_id'];

            $pre_q = $con->query("SELECT * FROM team WHERE id = '$team_id' LIMIT 1");
            $img = $pre_q->fetch_assoc();

            $image_path = "./assets/images/team/";

            if (file_exists($image_path . $img['team_picture'])) {
               $res = deleteF('team', 'id', $team_id);
               if ($res) {
                  alert('message', 'Team member removed!');
                  unlink($image_path . $img['team_picture']);
               } else {
                  alert('message', 'Something went wrong');
               }
            }
         } else if (isset($this->formData['btn_add_slider'])) {
            $image = imageUpload('slider_photo', 'carousel');
            $q = "INSERT INTO `slider` (`slider_picture`) VALUES(?)";
            $values = array($image);

            $res = insert($q, $values, 's');
            if ($res) {
               alert('message', 'Slider image added');
            } else {
               alert('message', 'Failed to add!');
            }
         } else if (isset($this->formData['btn_delete_slider'])) {
            $slider_id = $this->formData['slider_id'];

            $pre_q = $con->query("SELECT * FROM slider WHERE id = '$slider_id' LIMIT 1");
            $img = $pre_q->fetch_assoc();

            $image_path = "./assets/images/carousel/";

            if (file_exists($image_path . $img['slider_picture'])) {
               $res = deleteF('slider', 'id', $slider_id);
               if ($res) {
                  alert('message', 'Image slider removed!');
                  unlink($image_path . $img['slider_picture']);
               } else {
                  alert('message', 'Something went wrong');
               }
            }
         }
      }

      $this->data = [
         'getSettings' => $this->pageModel->selectWhere('settings', 'id', '1', 'id'),
      ];
      $this->view('admin/settings', $this->data);
   }

   // LOGIN USERS
   public function login()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $this->formData = filteration($_POST);
         // Sanitize inputs
         // Initialize data array
         $this->data = [
            'title' => 'Login',
            'description' => 'Please, Login to proceed',
            'admin_name' => $this->formData['admin_name'],
            'admin_pass' => md5($this->formData['admin_pass']),
            'name_err' => '',
            'password_err' => '',
         ];

         // Validate login inputs
         // Validate email
         if ($this->adminModel->checkUsername($this->data['admin_name'])) {
            // Success
         } elseif (empty($this->data['admin_name'])) {
            $this->data['name_err'] = 'Please, enter username';
         } else {
            // Failed
            $this->data['name_err'] = 'No user for this account';
         }

         // Validate password
         if (empty($this->formData['admin_pass'])) {
            $this->data['password_err'] = 'Please, enter password';
         }

         // Make sure errors are empty
         if (empty($this->data['name_err']) && empty($this->data['password_err'])) {
            // Success
            $loginUsers = $this->adminModel->login($this->formData['admin_name'], $this->formData['admin_pass']);

            if ($loginUsers) {
               $this->createLoggedinSession($loginUsers);
            } else {
               $this->data['password_err'] = 'Password is incorrect';
               $this->view('admin/login', $this->data);
            }
         } else {
            // Load views with error
            $this->view('admin/login', $this->data);
         }
      } else {
         $this->data = [
            'title' => 'Login',
            'description' => 'Please, Login to proceed',
            'admin_name' => '',
            'admin_pass' => '',
            'name_err' => '',
            'password_err' => '',
         ];
         $this->view('admin/login', $this->data);
      }
   }

   // ADD ADMIN
   public function addAdmin()
   {
      global $con;

      if (isset($_POST['btn_add_admin'])) {
         $data = filteration($_POST);
         $hash_password = md5($data['password']);
         $admin_id = random_int(111111, 999999);

         $res = $con->query("INSERT INTO `admin` (`user_id`, `admin_name`, `admin_pass`, `admin_access`) VALUES ('$admin_id', '$data[username]', '$hash_password', '$data[role]')");

         if ($res) {
            alert('success', 'New user added!');
         } else {
            alert('success', 'Could not add user');
         }
      }
   }

   // EDIT ROOMS
   public function editRooms($id)
   {

      if (!$id) {
         redirect('admin/index');
      }

      $this->data = [
         'id' => $id,
         'editRooms' => $this->pageModel->select_Where('rooms', 'room_id', $id),
      ];

      // UPDATE ROOMS
      $this->updateRooms($id);

      $this->view('admin/editrooms', $this->data);
   }

   // UPDATE ROOMS
   public function updateRooms($id)
   {
      global $con;
      if (isset($_POST['btn_edit_rooms'])) {
         $frm_data = filteration($_POST);
         $features = implode(',', $_POST['features'] ? $_POST['features'] : array());
         $facilities = implode(',', $_POST['facilities'] ? $_POST['facilities'] : array());

         $stmt = $con->prepare("UPDATE `rooms` SET `name`=?, `price`=?, `features`=?, `facilities`=?, `description`=? WHERE `room_id`=?");
         $stmt->bind_param("sssssi", $frm_data['name'], $frm_data['price'], $features, $facilities, $frm_data['desc'], $id);
         if ($stmt->execute()) {
            alert("success", "Room changes saved");
            // redirect("admin/rooms.php");
         } else {
            alert('success', 'Could not save room changes');
         }
      }
   }

   // CHECK LOGGED IN USER
   public function createLoggedinSession($users)
   {
      global $con;
      $_SESSION['admin_name'] = $this->formData['admin_name'];
      $sql = $con->query("SELECT * FROM `admin` WHERE `admin_name` = '$_SESSION[admin_name]'");
      $row = $sql->fetch_assoc();
      $_SESSION['admin_name'] = $row['admin_name'];
      $_SESSION['admin_id'] = $row['user_id'];
      $_SESSION['admin_access'] = $row['admin_access'];
      $_SESSION['isAdmin'] = true;

      if (isAdmin()) {
         $con->query("INSERT INTO `login_sessions`(`user_id`, `username`, `access`) VALUES ('$_SESSION[admin_id]', '$_SESSION[admin_name]', '$_SESSION[admin_access]')");
      }
      // redirect URL on SUCCESS ->>>
      redirect("admin");
   }

   // USER LOGOUT SESSION
   public function logout()
   {
      unset($_SESSION['admin_id']);
      unset($_SESSION['admin_name']);
      unset($_SESSION['admin_access']);
      unset($_SESSION['isAdmin']);
      $_SESSION['isAdmin'] = false;
      session_destroy();
      redirect('admin/login');
   }
}
