<?php
$host = "localhost";
$user = "u515424954_CyizaLandry";
$password = "Mpayimana@11111"; 
$database = "u515424954_my_webp";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_id"])) {
    $id = intval($_POST["delete_id"]);
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
header("Location: select_contacts.php");
exit();
?>
