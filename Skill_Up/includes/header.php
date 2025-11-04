<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>SkillUp Admin</title>
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
<h1>SkillUp - Admin</h1>
<?php if (isset($_SESSION['trainer_username'])): ?>
<nav>
<a href="dashboard.php">Dashboard</a> |
<a href="manage_classes.php">Classes</a> |
<a href="manage_modules.php">Modules</a> |
<a href="manage_questions.php">Security Qs</a> |
<a href="logout.php">Logout</a>
</nav>
<?php endif; ?>
<hr>
</header>
<main>