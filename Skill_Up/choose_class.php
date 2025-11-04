<?php
require_once __DIR__ . '/../includes/db.php';
$result = $conn->query("SELECT * FROM classes ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Your Class</title>
</head>
<body>
  <h2>Step 2: Choose Your Class</h2>
  <ul>
    <?php while($row = $result->fetch_assoc()): ?>
      <li>
        <a href="choose_module.php?class=<?= urlencode($row['slug']) ?>">
          <?= htmlspecialchars($row['class_name']) ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
</body>
</html>
