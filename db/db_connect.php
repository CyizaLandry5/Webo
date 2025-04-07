<?php
$servername = "localhost";
$username = "root";  // Use your MySQL username here
$password = "";      // Use your MySQL password here (leave empty if none)
$dbname = "landry";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
