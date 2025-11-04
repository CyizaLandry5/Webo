<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_login();


// create or update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dept = $_POST['dept'] ?? '';
$level = $_POST['level'] ?? '';
$slug = trim($level . '_' . $dept);
$id = $_POST['id'] ?? '';


if ($id) {
$sql = "UPDATE classes SET dept=?, level=?, slug=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $dept, $level, $slug, $id);
$stmt->execute();
} else {
$sql = "INSERT INTO classes (dept, level, slug) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $dept, $level, $slug);
$stmt->execute();
}
header('Location: manage_classes.php'); exit;
}


// delete
if (isset($_GET['delete'])) {
$del = (int)$_GET['delete'];
$stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
$stmt->bind_param('i', $del);
$stmt->execute();
header('Location: manage_classes.php'); exit;
}


// load for edit
$edit = null;
if (isset($_GET['edit'])) {
$eid = (int)$_GET['edit'];
$res = $conn->query("SELECT * FROM classes WHERE id = $eid");
$edit = $res->fetch_assoc();
}


// list
$list = $conn->query("SELECT * FROM classes ORDER BY created_at DESC");


include __DIR__ . '/../includes/header.php';
?>
<h2>Manage Classes</h2>
<form method="post">
<input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
<label>Department<br><input name="dept" required value="<?=htmlspecialchars($edit['dept'] ?? '')?>"></label><br>
<label>Level<br><input name="level" required value="<?=htmlspecialchars($edit['level'] ?? '')?>"></label><br>
<button type="submit"><?= $edit ? 'Update' : 'Create' ?> Class</button>
</form>


<h3>Existing Classes</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Slug</th><th>Dept</th><th>Level</th><th>Actions</th></tr>
<?php while ($row = $list->fetch_assoc()): ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>