<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost", "u515424954_CyizaLandry", "Mpayimana@11111", "u515424954_my_webp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET['delete']) && $_GET['delete'] !== $_SESSION['admin']) {
    $del_username = $_GET['delete'];

    $log_action = "Deleted user: $del_username";
    $log_stmt = $conn->prepare("INSERT INTO logs (username, action) VALUES (?, ?)");
    $log_stmt->bind_param("ss", $_SESSION['admin'], $log_action);
    $log_stmt->execute();
    $log_stmt->close();

    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $del_username);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_users.php");
    exit;
}

$result = $conn->query("SELECT id, username, role, created_at FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">👥 Manage Users</h2>
        <p><strong>Logged in as:</strong> <?php echo htmlspecialchars($_SESSION['admin']); ?></p>
        <a href="dashboard.php" class="btn btn-secondary mb-3">⬅ Back to Dashboard</a>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <?php if ($row['username'] !== $_SESSION['admin']): ?>
                                    <a href="manage_users.php?delete=<?php echo urlencode($row['username']); ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger btn-sm">Delete</a>
                                <?php else: ?>
                                    <span class="text-muted">This is you</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
