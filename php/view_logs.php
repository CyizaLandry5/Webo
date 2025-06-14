<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost", "u515424954_CyizaLandry", "Mpayimana@11111", "u515424954_my_webp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch logs
$result = $conn->query("SELECT id, username, action, created_at FROM logs ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>System Logs</title>
</head>
<body>
    <h2>📜 System Activity Logs</h2>
    <p>Logged in as: <strong><?php echo htmlspecialchars($_SESSION['admin']); ?></strong></p>
    <a href="dashboard.php"><button>⬅ Back to Dashboard</button></a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Date & Time</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['action']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
