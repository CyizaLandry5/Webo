<?php
// Database configuration
$host = "__________";
$user = "__________";
$password = "__________"; 
$database = "__________";

// Create database connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    // Using die() is okay for development, but for a live site,
    // you might want to log the error and show a generic error page.
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Use trim() to remove any accidental whitespace from the beginning or end of the input
    $name = trim($_POST['client_name']);
    $email = trim($_POST['client_email']);
    $message = trim($_POST['client_message']);

    // Check that none of the fields are empty after trimming
    if (!empty($name) && !empty($email) && !empty($message)) {
        
        // Prepare an SQL statement to prevent SQL injection attacks.
        // This is a very good security practice!
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");

        if ($stmt) {
            // Bind the user's input to the prepared statement.
            // "sss" means all three parameters are strings.
            $stmt->bind_param("sss", $name, $email, $message);

            // Execute the statement and check if it was successful
            if ($stmt->execute()) {
                // If successful, close everything and redirect to the new success page.
                $stmt->close();
                $conn->close();
                // Redirect to a dedicated success page instead of the main page with a parameter.
                header("Location: ../success.html"); 
                exit();
            } else {
                // If execution fails, handle the error.
                $stmt->close();
                $conn->close();
                header("Location: ../index.php?status=error#contact");
                exit();
            }
        } else {
            // If the statement preparation fails, handle the error.
            $conn->close();
            header("Location: ../index.php?status=sqlerror#contact");
            exit();
        }
    } else {
        // If any fields are empty, redirect back with an error status.
        $conn->close();
        header("Location: ../index.php?status=empty#contact");
        exit();
    }
} else {
    // If the page is accessed directly without a POST request, redirect to the homepage.
    header("Location: ../index.php");
    exit();
}
?>
