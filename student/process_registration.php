<?php
// Include database connection file
include('../db/db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $secret_code = trim($_POST['secret_code']);
    $full_name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Allowed secret codes
    $allowed_codes = ["L3NIT", "L4NIT", "L5NIT", "L5ETE"];

    // Check if the secret code is valid
    if (!in_array($secret_code, $allowed_codes)) {
        echo json_encode(["success" => false, "message" => "Invalid Secret Code."]);
        exit();
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO regi_login (secret_code, full_name, email, password) 
            VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $secret_code, $full_name, $email, $hashed_password);
        
        if ($stmt->execute()) {
            header("Location: ../index.html");
            exit();
        } else {
            echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
            exit();
        }
        
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
        exit();
    }
}

// Close the database connection
$conn->close();
?>
