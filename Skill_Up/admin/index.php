<?php
require_once __DIR__ . '/../includes/db.php';
session_start();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$sql = "SELECT id, username, password_hash FROM trainers WHERE username = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$res = $stmt->get_result();
if ($row = $res->fetch_assoc()) {
if (password_verify($password, $row['password_hash'])) {
// success
$_SESSION['trainer_id'] = $row['id'];
$_SESSION['trainer_username'] = $row['username'];
header('Location: dashboard.php');
exit;
} else {
$err = 'Invalid credentials';
}
} else {
$err = 'Invalid credentials';
}
}
?>


<?php include __DIR__ . '/../includes/header.php'; ?>
<h2>Admin Login</h2>
<?php if ($err): ?><p style="color:red"><?=htmlspecialchars($err)?></p><?php endif; ?>
<form method="post">
<label>Username<br><input name="username" required></label><br>
<label>Password<br><input name="password" type="password" required></label><br>
<button type="submit">Login</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>