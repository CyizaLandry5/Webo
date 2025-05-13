<?php
$servername = "localhost"; // Or your actual server name
$username = "root";     // Your database username
$password = "";         // Your database password (it's blank in your case, from the terminal)
$dbname = "landry";         // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database!";

$conn->close();
?>