<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_login();
include __DIR__ . '/../includes/header.php';
?>
<h2>Welcome, <?=htmlspecialchars($_SESSION['trainer_username'])?></h2>
<p>Use the menu to manage Classes, Modules and Security Questions.</p>
<?php include __DIR__ . '/../includes/footer.php'; ?>