<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost", "u515424954_CyizaLandry", "Mpayimana@11111", "u515424954_my_webp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Delete user if requested
if (isset($_GET['delete']) && $_GET['delete'] !== $_SESSION['admin']) {
    $del_username = $_GET['delete'];

    // Log before deletion
    $log_action = "Deleted user: $del_username";
    $log_stmt = $conn->prepare("INSERT INTO logs (username, action) VALUES (?, ?)");
    $log_stmt->bind_param("ss", $_SESSION['admin'], $log_action);
    $log_stmt->execute();
    $log_stmt->close();

    // Perform deletion
    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $del_username);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_users.php");
    exit;
}

// Fetch all users
$result = $conn->query("SELECT id, username, role, created_at FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
    <h2>👥 Manage Users</h2>
    <p>Logged in as: <strong><?php echo htmlspecialchars($_SESSION['admin']); ?></strong></p>
    <a href="dashboard.php"><button>⬅ Back to Dashboard</button></a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <?php if ($row['username'] !== $_SESSION['admin']): ?>
                    <a href="manage_users.php?delete=<?php echo urlencode($row['username']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                        <button style="color:red;">Delete</button>
                    </a>
                <?php else: ?>
                    <em>This is you</em>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
