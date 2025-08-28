
<?php

// --- Error Reporting for Development ---
// Shows all errors, which is helpful for debugging.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// --- Session Management ---
// Starts a session and checks if the 'admin' user is logged in.
// If not, it redirects them to the login page.
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

// --- Database Configuration ---
$host = "localhost";
$user = "u515424954_CyizaLandry";
$password = "Mpayimana@11111"; 
$database = "u515424954_my_webp";


// --- Database Connection ---
// Creates a new connection to the MySQL database.
$conn = new mysqli($host, $user, $password, $database);

// Checks if the connection failed and stops the script if it did.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Data Fetching ---
// SQL query to select all contacts, ordered by the most recent submission.
$sql = "SELECT id, name, email, message, submitted_at FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Applying the Inter font to the whole page */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4 sm:mb-0">
                Contact Messages
            </h1>
            <a href="/php/dashboard.php" class="bg-blue-600 text-white font-semibold py-2 px-5 rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
                Return to Dashboard
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <?php if ($result && $result->num_rows > 0): ?>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S/N</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted At</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= htmlspecialchars($row["id"]) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row["name"]) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row["email"]) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate"><?= nl2br(htmlspecialchars($row["message"])) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row["submitted_at"]) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <!-- Delete form for each message -->
                                        <form method="POST" action="delete_contact.php" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                            <input type="hidden" name="delete_id" value="<?= $row["id"] ?>">
                                            <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-red-600 transition-colors duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <!-- Message shown when there are no contacts -->
                    <div class="text-center py-16">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No messages</h3>
                        <p class="mt-1 text-sm text-gray-500">There are currently no contact messages to display.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    // --- Close Connection ---
    // It's good practice to close the database connection when you're done.
    if (isset($conn)) {
        $conn->close();
    }
    ?>
</body>
</html>
