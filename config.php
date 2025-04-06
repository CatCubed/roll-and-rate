<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'ete32e_2425zs_13');
define('DB_PASS', '14FsF6T095!32');
define('DB_NAME', 'ete32e_2425zs_13');

define('BASE_URL', 'http://localhost/roll-and-rate');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function redirect($page) {
    header("Location: " . BASE_URL . "?page=" . $page);
    exit;
}
?>