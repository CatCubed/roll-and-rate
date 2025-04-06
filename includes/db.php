<?php
function getDbConnection() {
    static $mysqli;

    if ($mysqli === null) {
        $database = 'ete32e_2425zs_13';
        $username = 'ete32e_2425zs_13';
        $password = '14FsF6T095!32';

        $mysqli = new mysqli('localhost', $username, $password, $database);

        if ($mysqli->connect_errno) {
            die('Failed to connect to MySQL: ' . $mysqli->connect_error);
        }

        $mysqli->set_charset('utf8mb4');
    }

    return $mysqli;
}
?>