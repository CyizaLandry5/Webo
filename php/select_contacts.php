<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

// Database configuration
$host = "localhost";
$user = "u515424954_CyizaLandry";
$password = "Mpayimana@11111"; 
$database = "u515424954_my_webp";

// Create database connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all contacts
$sql = "SELECT id, name, email, message, submitted_at FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
    <style>
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        .delete-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Contact Messages</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>S/N</th>
                <th>Client Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row["id"]) ?></td>
                    <td><?= htmlspecialchars($row["name"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td><?= nl2br(htmlspecialchars($row["message"])) ?></td>
                    <td><?= htmlspecialchars($row["submitted_at"]) ?></td>
                    <td>
                        <form method="POST" action="delete_contact.php" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            <input type="hidden" name="delete_id" value="<?= $row["id"] ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align: center;">No messages found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
