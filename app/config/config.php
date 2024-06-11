<?php
session_start();
date_default_timezone_set("Africa/Lagos");
// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'freetown');

// App Root file
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', 'http://localhost/freetown-hotel');
// Site Name
define('SITENAME', 'FreeTown Hotel and Apartments');
define('SITELOGO', "<img src='".URLROOT."/assets/images/logo/logo-4-.png' class='img-fluid' alt='Logo_4466232' width='120px' height='100px' />");
// Currency Symbol
define('CURRENCY', '<p class="fw-light m-0 d-inline-block">₦</p> ');
// define('CURRENCY', '$ ');
// App Version
define('APPVERSION', '1.0.0');
