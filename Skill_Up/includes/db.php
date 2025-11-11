<?php
// includes/db.php
$DB_HOST = 'localhost';
$DB_USER = "u515424954_CyizaLandry";
$DB_PASS = "Mpayimana@11111"; 
$DB_NAME = "u515424954_my_webp";


$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
die('DB Connection failed: ' . $conn->connect_error);
}
// set charset
$conn->set_charset('utf8mb4');