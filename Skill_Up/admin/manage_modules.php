<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_login();

// handle POST (create/update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $class_slug = $_POST['class_slug'] ?? '';
    $module_name = $_POST['module_name'] ?? '';
    $description = $_POST['description'] ?? '';

    if ($id) {
        // Update existing module
        $stmt = $conn->prepare("UPDATE modules SET class_slug=?, module_name=?, description=? WHERE id=?");
        $stmt->bind_param('sssi', $class_slug, $module_name, $description, $id);
        $stmt->execute();
    } else {
        // Insert new module
        $stmt = $conn->prepare("INSERT INTO modules (class_slug, module_name, description) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $class_slug, $module_name, $description);
        $stmt->execute();
    }
    header('Location: manage_modules.php');
    exit;
}

// delete
if (isset($_GET['delete'])) {
    $del = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM modules WHERE id = ?");
    $stmt->bind_param('i', $del);
    $stmt->execute();
    header('Location: manage_modules.php');
    exit;
}

// load edit
$edit = null;
if (isset($_GET['edit'])) {
    $eid = (int)$_GET['edit'];
    $res = $conn->query("SELECT * FROM modules WHERE id = $eid");
    $edit = $res->fetch_assoc(); // ✅ This is the missing part
}

// fetch all modules
$result = $conn->query("SELECT * FROM modules ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Modules</title>
</head>
<body>
    <h2>Manage Modules</h2>

    <!-- Module Form -->
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($edit['id'] ?? '') ?>">
        <p>
            <label>Class Slug:</label>
            <input type="text" name="class_slug" value="<?= htmlspecialchars($edit['class_slug'] ?? '') ?>" required>
        </p>
        <p>
            <label>Module Name:</label>
            <input type="text" name="module_name" value="<?= htmlspecialchars($edit['module_name'] ?? '') ?>" required>
        </p>
        <p>
            <label>Description:</label>
            <textarea name="description"><?= htmlspecialchars($edit['description'] ?? '') ?></textarea>
        </p>
        <button type="submit"><?= $edit ? 'Update' : 'Add' ?> Module</button>
    </form>

    <hr>

    <!-- Modules List -->
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Class</th>
            <th>Module Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['class_slug']) ?></td>
                <td><?= htmlspecialchars($row['module_name']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this module?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
