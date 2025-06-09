<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php"); // now points to your renamed login page
    exit;
}
 
// ==== CONFIGURATION ====
// Set your secret password
$admin_password = "Cyiza@123"; // change this!

// Optional: Lock to your IP (uncomment the next line and update IP)
// if ($_SERVER['REMOTE_ADDR'] !== '123.123.123.123') die('Access denied: IP restricted.');

// ==== DATABASE CONNECTION ====
$conn = new mysqli("localhost", "u515424954_CyizaLandry", "Mpayimana@11111", "u515424954_my_webp");
if ($conn->connect_error) die("❌ Connection failed: " . $conn->connect_error);

// ==== PASSWORD CHECK ====
if (!isset($_POST['pass']) || $_POST['pass'] !== $admin_password) {
    echo '<form method="POST">
        <input type="password" name="pass" placeholder="Enter Admin Password" required>
        <button type="submit">Access SQL Panel</button>
    </form>';
    exit;
}
?>

<h2>🛠️ Cyiza SQL Admin Panel</h2>
<form method="POST">
    <input type="hidden" name="pass" value="<?= htmlspecialchars($_POST['pass']) ?>">
    <textarea name="sql" rows="6" cols="100" placeholder="Write SQL query here..." required></textarea><br>
    <button type="submit">✅ Run SQL</button>
</form>

<?php
if (!empty($_POST['sql'])) {
    $sql = $_POST['sql'];
    echo "<h3>🔍 Executing:</h3><pre>$sql</pre>";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "<p style='color:green;'>✅ Query executed successfully.</p>";
    } elseif ($result) {
        echo "<table border='1' cellpadding='5'><tr>";
        while ($field = $result->fetch_field()) echo "<th>{$field->name}</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $val) echo "<td>" . htmlspecialchars($val) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
