<?php
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD",'');
define("DB_NAME","arrange15-game-data");


$mysqli = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//print_r($mysqli);

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

date_default_timezone_set("Asia/Calcutta");

?>
