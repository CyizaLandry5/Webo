<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?> 🎉</h1>
    <p>Select a task below:</p>

    <a href="my_secure_sql_tool.php"><button>Open SQL Tool</button></a>
    <a href="manage_users.php"><button>Manage Users</button></a>
    <a href="view_logs.php"><button>View Logs</button></a>
    <a href="select_contacts.php"><button>Select Contacts</button></a>
    <a href="save_contacts.php"><button>Save Contacts</button></a>
    <a href="describe_contacts.php"><button>DESC CONTACT</button></a>
    <a href="delete_contact.php"><button>DELETE CONTACT</button></a>
    
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>
