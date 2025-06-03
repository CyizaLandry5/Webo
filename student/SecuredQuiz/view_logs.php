<?php
session_start();

// ✅ Simple password protection
$password = "Mpayimana@00000"; // You can change this password
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['admin_password'] === $password) {
        $_SESSION['admin'] = true;
        header("Location: view_logs.php");
        exit;
    }

    echo '
    <form method="post" style="margin:50px;">
        <h2>Admin Login</h2>
        <input type="password" name="admin_password" placeholder="Enter password" required>
        <button type="submit">Login</button>
    </form>';
    exit;
}

// ✅ Display logs
$logFile = 'logs/cheat_logs.txt';
$logs = [];

if (file_exists($logFile)) {
    $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cheating Logs - SafeQuiz</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    h2 {
      margin-bottom: 20px;
    }
    .log-entry {
      background: #f9f9f9;
      padding: 10px;
      margin-bottom: 10px;
      border-left: 4px solid #e74c3c;
      font-family: monospace;
    }
    .clear-btn {
      margin-top: 20px;
      background-color: #e74c3c;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h2>Quiz Cheating Logs</h2>

  <?php if (empty($logs)): ?>
    <p>No logs yet.</p>
  <?php else: ?>
    <?php foreach ($logs as $entry): ?>
      <div class="log-entry"><?php echo htmlspecialchars($entry); ?></div>
    <?php endforeach; ?>
  <?php endif; ?>

  <form method="post">
    <button class="clear-btn" name="clear" onclick="return confirm('Clear all logs?')">Clear Logs</button>
  </form>

  <?php
  // ✅ Clear logs if requested
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
      file_put_contents($logFile, '');
      header("Location: view_logs.php");
      exit;
  }
  ?>
</body>
</html>
