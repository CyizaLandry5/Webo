<?php
// Debug mode (remove on production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
require_once __DIR__ . '/includes/db.php';

// Fetch all classes
$sql = "SELECT * FROM classes ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Your Class</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 40px; background: #f9f9f9; }
    h2 { color: #333; }
    ul { list-style: none; padding: 0; }
    li { margin: 10px 0; }
    a { text-decoration: none; color: #007BFF; font-weight: bold; }
    a:hover { text-decoration: underline; }
    .no-classes { color: #cc0000; font-style: italic; }
  </style>
</head>
<body>
  <h2>Step 2: Choose Your Class</h2>

  <?php if ($result->num_rows > 0): ?>
    <ul>
      <?php while ($row = $result->fetch_assoc()): 
        // Combine department and level for display
        $className = htmlspecialchars($row['dept'] . ' - ' . $row['level']);
        $slug = urlencode($row['slug']);
      ?>
        <li>
          <a href="choose_module.php?class=<?= $slug ?>">
            <?= $className ?>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php else: ?>
    <p class="no-classes">No classes found in the database.</p>
  <?php endif; ?>
</body>
</html>
