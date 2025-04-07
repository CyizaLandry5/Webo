<?php
include('db/db_connect.php');
// // Database configuration
// $servername = "localhost"; // or your database host
// $username = "root"; // your database username
// $password = ""; // your database password (leave empty if using default XAMPP)
// $dbname = "landry"; // the name of your database (replace 'landry' with your actual database name)

// Email configuration
$from = 'info@cyizalandry.com'; // Replace it with your Hosting Admin email
$sendTo = 'cyizalandry5@gmail.com'; // Replace it with your email
$subject = 'New message from contact form';
$fields = array('name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message'); // Fields mapping
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later.';

// // Create database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check for successful connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Handle form submission
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
    // Your site secret key
    $secret = '6Le1l_QqAAAAAICyxI8a8jJs1fD-vT5tiVW2mU1v';
    // Get verify response data from Google
    $c = curl_init('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $verifyResponse = curl_exec($c);
    $responseData = json_decode($verifyResponse);

    if($responseData->success):
        try {
            // Collect form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // Insert form data into the database
            $stmt = $conn->prepare("INSERT INTO form_submissions (name, email, subject, message) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $subject, $message);
            $stmt->execute();

            // Prepare email content
            $emailText = nl2br("You have new message from Contact Form\n");
            foreach ($_POST as $key => $value) {
                if (isset($fields[$key])) {
                    $emailText .= nl2br("$fields[$key]: $value\n");
                }
            }

            // Set email headers
            $headers = array(
                'Content-Type: text/html; charset="UTF-8";',
                'From: ' . $from,
                'Reply-To: ' . $from,
                'Return-Path: ' . $from,
            );

            // Send email
            mail($sendTo, $subject, $emailText, implode("\n", $headers));

            // Success message
            $responseArray = array('type' => 'success', 'message' => $okMessage);

        } catch (\Exception $e) {
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
        }

        // Return response
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;
        } else {
            echo $responseArray['message'];
        }

    else:
        // reCAPTCHA failed
        $errorMessage = 'Robot verification failed, please try again.';
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
        echo json_encode($responseArray);
    endif;
else:
    // reCAPTCHA not checked
    $errorMessage = 'Please click on the reCAPTCHA box.';
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    echo json_encode($responseArray);
endif;

// Close database connection
$conn->close();

?>
