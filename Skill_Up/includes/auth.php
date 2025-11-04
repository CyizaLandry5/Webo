<?php
// includes/auth.php
if (session_status() === PHP_SESSION_NONE) session_start();
function require_login() {
if (empty($_SESSION['trainer_id'])) {
header('Location: index.php');
exit;
}
}