<?php
// Include your database connection file
include'includes/db.php';

// Check if a class name was passed in the URL
if (!isset($_GET['class'])) {
    echo "<h3>No class selected.</h3>";
    exit;
}

$class = trim($_GET['class']);

// Prepare SQL query to get modules for this class
$stmt = $conn->prepare("SELECT id, module_name, description, material_link 
                        FROM modules 
                        WHERE class_slug = ?");
$stmt->bind_param("s", $class);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Module</title>
    
</head>
<body>
    <h2>Modules for Class: <?php echo htmlspecialchars($class); ?></h2>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="module-card">
                <h3><?php echo htmlspecialchars($row['module_name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                
                <?php if (!empty($row['material_link'])): ?>
                    <a href="<?php echo htmlspecialchars($row['material_link']); ?>" 
                                target="_blank">Open Material</a>
                <?php else: ?>
                    <p><em>No material link provided.</em></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No modules found for this class.</p>
    <?php endif; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
