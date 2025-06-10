<?php
function flash_msg($name = '', $message = '', $class = 'alert-success')
{
   if (!empty($name)) {
      if (!empty($message) && empty($_SESSION[$name])) {
         if (!empty($_SESSION[$name])) {
            unset($_SESSION[$name]);
         }
         if (!empty($_SESSION[$name . '_class'])) {
            unset($_SESSION[$name . '_class']);
         }
         $_SESSION[$name] = $message;
         $_SESSION[$name . '_class'] = $class;
      } elseif (empty($message) && !empty($_SESSION[$name])) {
         $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
         // echo '<div class="' . $class . ' py-1 rounded-0" id="msg-flash">' . $_SESSION[$name] . '</div>';
         echo <<<alert
            <div class="alert $class fade show float-end custom-alert py-1 rounded-0" role="alert" id="flash-msg">
               <div class="d-flex align-items-center justify-content-between me-">
                  <div class="me-3"><small>$_SESSION[$name]</small></div>
                  <a type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></a>
               </div>
            </div>
         alert;
         unset($_SESSION[$name]);
         unset($_SESSION[$name . '_class']);
      }
   }
}

function alert($type, $message)
{
   $class = ($type == "success") ? "alert-success" : "alert-danger";

   echo <<<alert
      <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 2000">
         <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <strong class="me-auto">Message alert</strong>
               <small>Just Now</small>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               $message
            </div>
         </div>
      </div>
   alert;
}

function redirect($url)
{
   // header("Location: " . URLROOT . '/' . $url);
   echo "<script>window.location.href = '" . URLROOT . "/$url';</script>";
}

function isAdmin()
{
   if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
      return true;
   } else {
      return false;
   }
}

function isUserLoggedIn()
{
   if (isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn'] == true) {
      return true;
   } else {
      return false;
   }
}

function isActiveBar($value)
{
   return $_SERVER['REQUEST_URI'] === URLROOT . '/' . $value;
}

function isUrl($value)
{
   $url = $_SERVER['REQUEST_URI'];
   $urlParts = explode('/', $url);
   $page = end($urlParts);
   if ($page === $value) {
      echo 'active';
   }
}

function isCurrentUser()
{
   if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $_GET['ud']) {
      return true;
   } else {
      return false;
   }
}

function imageUpload($img_name, $folder)
{
   $ext = pathinfo($_FILES[$img_name]['name'], PATHINFO_EXTENSION);
   $image = 'IMG_' . random_int(11111, 99999) . '.' . $ext;

   $path = "./assets/images/$folder/";
   if (move_uploaded_file($_FILES[$img_name]['tmp_name'], $path . $image)) {
      return $image;
   } else {
      // flash_msg('success', 'Image Upload Error', 'alert-danger');
   }
}

// INPUT FIELDS FILTERS
function filteration($type)
{
   foreach ($type as $key => $value) {
      // $value = trim($value);
      // $value = stripslashes($value);
      // $value = strip_tags($value);
      // $value = htmlspecialchars($value);

      $type[$key] = $value;
   }
   return $type;
}

// SELECT ALL QUERY METHOD(FUNCTION)
function selectAll($table, $col)
{
   global $con;
   $res = $con->query("SELECT * FROM $table ORDER BY $col DESC");
   return $res;
}

// SELECT QUERY METHOD(FUNCTION)
function select($query, $value, $datatypes)
{
   global $con;

   if ($stmt = $con->prepare($query)) {
      // Used the splat operator for Arrays(...$value)
      $stmt->bind_param($datatypes, ...$value);
      if ($stmt->execute()) {
         $result = $stmt->get_result();
         return $result;
      } else {
         $stmt->close();
         die("This action cannot be performed - 'SELECT QUERY'");
      }
   } else {
      die("This action cannot be performed - 'SELECT PREPARED QUERY'");
   }
}

// UPDATE QUERY METHOD(FUNCTION)
function update($query, $value, $datatypes)
{
   global $con;

   if ($stmt = $con->prepare($query)) {
      // Used the splat operator for Arrays(...$value)
      $stmt->bind_param($datatypes, ...$value);
      if ($stmt->execute()) {
         $result = $stmt->store_result();
         return $result;
      } else {
         $stmt->close();
         die("This action cannot be performed - 'UPDATE QUERY'");
      }
   } else {
      die("This action cannot be performed - 'UPDATE PREPARED QUERY'");
   }
}

// INSERT QUERY METHOD(FUNCTION)
function insert($query, $value, $datatypes)
{
   global $con;

   if ($stmt = $con->prepare($query)) {
      // Used the splat operator for Arrays(...$value)
      $stmt->bind_param($datatypes, ...$value);
      if ($stmt->execute()) {
         $result = $stmt->store_result();
         return $result;
      } else {
         $stmt->close();
         die("This action cannot be performed - 'INSERT QUERY'");
      }
   } else {
      die("This action cannot be performed - 'INSERT PREPARED QUERY'");
   }
}

// DELETE QUERY METHOD(FUNCTION)
function delete($query, $value, $datatypes)
{
   global $con;

   if ($stmt = $con->prepare($query)) {
      // Used the splat operator for Arrays(...$value)
      $stmt->bind_param($datatypes, ...$value);
      if ($stmt->execute()) {
         $result = $stmt->store_result();
         return $result;
      } else {
         $stmt->close();
         die("This action cannot be performed - 'DELETE QUERY'");
      }
   } else {
      die("This action cannot be performed - 'DELETE PREPARED QUERY'");
   }
}

function random_num($length)
{
   $number = "";
   $len = rand($length, $length);

   for ($i = 0; $i < $len; $i++) {
      $number .= rand(2, 9);
   }
   return $number;
}
