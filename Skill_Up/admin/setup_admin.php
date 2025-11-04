<?php
// admin/setup_admin.php
require_once __DIR__ .'/../includes/db.php';


// change these before running
$username = 'Cyiza';
$password = 'Cyiza@123';
$fullname = 'MPAYIMANA CYIZA LANDRY';


$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO trainers (username, password_hash, fullname) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $username, $hash, $fullname);
if ($stmt->execute()) {
echo "Admin user created. Username: $username | Password: $password";
} else {
echo "Error: " . $stmt->error;
}
$stmt->close();