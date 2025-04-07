<?php
// Start the session
session_start();

// Include the database connection
include('../db/db_connect.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = trim($_POST['login_email']);
    $password = trim($_POST['login_password']);

    // Prepare and execute the query to check the credentials
    $stmt = $conn->prepare("SELECT * FROM regi_login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a user is found with that email
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debugging: Check stored and input passwords
        error_log("Stored Hash: " . $user['password']);
        error_log("User Input Password: " . $password);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Correct password, start the session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];

            // Return success response
            echo json_encode(["success" => true]);
            exit();
        } else {
            // Incorrect password
            echo json_encode(["success" => false, "message" => "Incorrect password. Please try again."]);
            exit();
        }
    } else {
        // No user found with that email
        echo json_encode(["success" => false, "message" => "No user found with that email."]);
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
