<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "osms_db";
$db_port = 3306;

$conn = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port);

// Checking Connection
if($conn->connect_error){
    die("Unable to Connect");
}


?>