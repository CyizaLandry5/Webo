<?php
session_start();

$name = $_SESSION['student_name'] ?? 'Unknown';
$topic = $_GET['topic'] ?? 'unknown';
$reason = $_POST['reason'] ?? 'unspecified';
$time = date("Y-m-d H:i:s");

$log = "[$time] [$topic] $name - $reason\n";
file_put_contents("logs/cheat_logs.txt", $log, FILE_APPEND);

echo "logged";
