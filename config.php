<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // TODO change
define('DB_PASS', '');      // TODO change
define('DB_NAME', 'rollandrate');

define('BASE_URL', 'http://localhost/roll-and-rate');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function redirect($page) {
    header("Location: " . BASE_URL . "?page=" . $page);
    exit;
}
?>