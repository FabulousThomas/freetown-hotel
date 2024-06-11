<?php
require_once "config/config.php";
require_once "config/connection.php";
require_once "helpers/helpers.php";
require_once "helpers/dbHelper.php";
require_once "helpers/messages.php";
// require_once "helpers/logic.php";
require_once "server/place_order.php";
require_once "config/error_config.php";

// Auto Load Classes
spl_autoload_register(function ($className) {
   require_once 'libraries/' . $className . '.php';
});
