<?php
require_once "inc/head.php";

unset($_SESSION['isUserLoggedIn']);
redirect('index');
session_destroy();
