<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Grab & sanitize POST data
$name    = filter_input(INPUT_POST, 'name',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email   = filter_input(INPUT_POST, 'email',   FILTER_VALIDATE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$name || !$email || !$subject || !$message) {
    die('Please complete the form properly.');
}

// 2. Save to database
$db = new mysqli('localhost', 'root', '', 'landry');  // ***UPDATE THESE***
if ($db->connect_error) {
    error_log('DB Connect Error: ' . $db->connect_error);
    die('Database error.');
}
$stmt = $db->prepare(
    "INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param('ssss', $name, $email, $subject, $message);
$stmt->execute();
$stmt->close();
$db->close();

// 3. Send notification email
$to      = 'cyizalandry5@gmail.com';  // ***UPDATE THIS***
$headers = "From: {$name} <{$email}>\r\n"
         . "Reply-To: {$email}\r\n"
         . "Content-Type: text/plain; charset=UTF-8\r\n";
$body    = "You’ve received a new contact message:\n\n"
         . "Name: {$name}\n"
         . "Email: {$email}\n"
         . "Subject: {$subject}\n\n"
         . "Message:\n{$message}\n";

if (mail($to, "Contact Form: {$subject}", $body, $headers)) {
    echo 'Thank you! Your message has been sent.';
} else {
    echo 'Oops—there was an error sending email.';
}

?>