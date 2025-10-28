<?php
// === FUNCTIONS ===
function log_action($type) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = time();
    $logFile = __DIR__ . '/downloads/download_log.csv'; // path to downloads folder
    $oneHour = 3600;

    // Load existing logs
    $logs = [];
    if (file_exists($logFile)) {
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($logIp, $logType, $logTime) = explode(',', $line);
            if (($time - (int)$logTime) < $oneHour) {
                $logs[] = [$logIp, $logType, $logTime];
            }
        }
    }

    // Prevent duplicate within 1 hour
    foreach ($logs as $entry) {
        if ($entry[0] === $ip && $entry[1] === $type && ($time - (int)$entry[2]) < $oneHour) {
            return false;
        }
    }

    // Add new log
    $logs[] = [$ip, $type, $time];
    $fp = fopen($logFile, 'w');
    foreach ($logs as $entry) {
        fputcsv($fp, $entry);
    }
    fclose($fp);
    return true;
}

// === FILE HANDLERS ===
if (isset($_GET['download']) && $_GET['download'] === 'dataset') {
    $file = __DIR__ . '/downloads/dataset_mid_term.csv';
    if (file_exists($file)) {
        log_action('dataset');
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo "Dataset file not found.";
        exit;
    }
}

if (isset($_GET['view']) && $_GET['view'] === 'checklist') {
    $file = __DIR__ . '/downloads/checklist.pdf';
    if (file_exists($file)) {
        log_action('checklist');
        header("Location: downloads/checklist.pdf");
        exit;
    } else {
        echo "Checklist file not found.";
        exit;
    }
}

// Marks handler
if (isset($_GET['view']) && $_GET['view'] === 'marks') {
    $file = __DIR__ . '/downloads/marks.pdf';
    if (file_exists($file)) {
        log_action('marks');
        header("Location: downloads/marks.pdf");
        exit;
    } else {
        echo "Marks file not found.";
        exit;
    }
}

// === Count totals ===
$totalDataset = 0;
$totalChecklist = 0;
$totalMarks = 0;

$logFile = __DIR__ . '/downloads/download_log.csv';
if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($ip, $type, $t) = explode(',', $line);
        if ($type === 'dataset') $totalDataset++;
        if ($type === 'checklist') $totalChecklist++;
        if ($type === 'marks') $totalMarks++;
    }
}

$datasetFile = "?download=dataset";
$checklistFile = "?view=checklist";
$marksFile = "?view=marks";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Machine Learning Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-xl rounded-2xl p-8 max-w-3xl w-full border border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Dear Students,</h1>
    <p class="text-gray-700 mb-8">Welcome to your Machine Learning course page. Please find all resources below.</p>

    <div class="grid md:grid-cols-2 gap-6">
      <!-- Dataset -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm">
        <p class="text-gray-700 mb-2">Please download the dataset to use:</p>
        <a href="<?php echo $datasetFile; ?>" 
           class="inline-flex items-center px-4 py-2 mt-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
          Download Dataset (CSV)
        </a>
        <p class="text-sm text-gray-500 mt-2">
          Total downloads : <strong><?php echo $totalDataset; ?></strong>
        </p>
      </div>

      <!-- Checklist -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm">
        <p class="text-gray-700 mb-2">Please read the checklist that will be used:</p>
        <a href="<?php echo $checklistFile; ?>" 
           class="inline-flex items-center px-4 py-2 mt-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
          View Checklist (PDF)
        </a>
        <p class="text-sm text-gray-500 mt-2">
          Total checklist views : <strong><?php echo $totalChecklist; ?></strong>
        </p>
      </div>

      <!-- Marks -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm md:col-span-2">
        <p class="text-gray-700 mb-2">You can view your marks below:</p>
        <a href="<?php echo $marksFile; ?>" 
           class="inline-flex items-center px-4 py-2 mt-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition">
          View Marks (PDF)
        </a>
        <p class="text-sm text-gray-500 mt-2">
          Total marks views : <strong><?php echo $totalMarks; ?></strong>
        </p>
      </div>
    </div>
  </div>

</body>
</html>
