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

        $is_valid = password_verify($password, $hashed_password) || $password === $hashed_password;

        if ($is_valid && $role === 'admin') {
            $_SESSION['admin'] = $username;

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">🔐 Admin Login</h3>
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center text-muted mt-3">&copy; <?php echo date('Y'); ?> Cyiza Admin Panel</p>
            </div>
        </div>
    </div>
</body>
</html>
