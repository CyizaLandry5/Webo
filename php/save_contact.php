<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit;
}
// Database configuration
$host = "localhost";
$user = "u515424954_CyizaLandry";
$password = "Mpayimana@11111"; 
$database = "u515424954_my_webp";

// Create database connection
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['client_name']);
    $email = trim($_POST['client_email']);
    $message = trim($_POST['client_message']);

    // Check for empty fields
    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                header("Location: ../index.php?status=success#contact");
                exit();
            } else {
                $stmt->close();
                $conn->close();
                header("Location: ../index.php?status=error#contact");
                exit();
            }
        } else {
            // Failed to prepare statement
            $conn->close();
            header("Location: ../index.php?status=sqlerror#contact");
            exit();
        }
    } else {
        // Missing fields
        $conn->close();
        header("Location: ../index.php?status=empty#contact");
        exit();
    }
} else {
    // Invalid request
    header("Location: ../index.php");
    exit();
}
?>
