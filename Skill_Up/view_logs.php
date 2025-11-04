<?php
session_start();

// ✅ Simple password protection
$password = "Mpayimana@00000"; // Change if needed
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['admin_password'] === $password) {
        $_SESSION['admin'] = true;
        header("Location: view_logs.php");
        exit;
    }

    // 🔐 Admin login form
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Admin Login - SafeQuiz</title>
      <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
      <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Admin Login</h2>
        <form method="post" class="flex flex-col space-y-4">
          <input type="password" name="admin_password" placeholder="Enter password" required
            class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button type="submit"
            class="bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Login
          </button>
        </form>
      </div>
    </body>
    </html>';
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
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-6">
      <h2 class="text-2xl font-semibold text-gray-800">🧠 Quiz Cheating Logs</h2>
      <a href="logout.php" 
         class="text-sm bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
         Logout
      </a>
    </div>

    <?php if (empty($logs)): ?>
      <p class="text-gray-600 text-center">No logs yet.</p>
    <?php else: ?>
      <div class="space-y-3 max-h-[70vh] overflow-y-auto pr-2">
        <?php foreach ($logs as $entry): ?>
          <div class="bg-gray-50 border-l-4 border-red-500 p-3 rounded-lg font-mono text-sm text-gray-800 shadow-sm">
            <?php echo htmlspecialchars($entry); ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <p class="mt-6 text-sm text-gray-500 text-center italic">
      🔒 Logs are permanently stored and cannot be deleted for security reasons.
    </p>
  </div>
</body>
</html>
