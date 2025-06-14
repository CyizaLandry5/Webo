<?php
session_start();
$conn = new mysqli("localhost", "u515424954_CyizaLandry", "Mpayimana@11111", "u515424954_my_webp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        // TEMPORARY fallback to plain text for testing
        $is_valid = password_verify($password, $hashed_password) || $password === $hashed_password;

        if ($is_valid && $role === 'admin') {
            $_SESSION['admin'] = $username;

            // Log login
            $log_stmt = $conn->prepare("INSERT INTO logs (username, action) VALUES (?, 'Logged in')");
            $log_stmt->bind_param("s", $username);
            $log_stmt->execute();
            $log_stmt->close();

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid credentials or not an admin.";
        }
    } else {
        $error = "User not found.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form method="POST" action="index.php">
        <h2>🔐 Admin Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
