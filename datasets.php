<?php
// === FUNCTIONS ===
function log_action($type) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = time();
    $logFile = 'download_log.csv';
    $oneHour = 3600;

    // Load existing logs
    $logs = [];
    if (file_exists($logFile)) {
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($logIp, $logType, $logTime) = explode(',', $line);
            // Keep only logs from the last hour
            if (($time - (int)$logTime) < $oneHour) {
                $logs[] = [$logIp, $logType, $logTime];
            }
        }
    }

    // Check if this IP already logged this action within the last hour
    foreach ($logs as $entry) {
        if ($entry[0] === $ip && $entry[1] === $type && ($time - (int)$entry[2]) < $oneHour) {
            return false; // Already counted within the hour
        }
    }

    // Log new entry
    $logs[] = [$ip, $type, $time];
    $fp = fopen($logFile, 'w');
    foreach ($logs as $entry) {
        fputcsv($fp, $entry);
    }
    fclose($fp);

    return true;
}

// === FILE DOWNLOAD HANDLER ===
if (isset($_GET['download']) && $_GET['download'] === 'dataset') {
    $file = 'dataset_mid_term.csv';
    if (file_exists($file)) {
        log_action('dataset'); // Log dataset download
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

// === CHECKLIST VIEW HANDLER ===
if (isset($_GET['view']) && $_GET['view'] === 'checklist') {
    log_action('checklist'); // Log checklist view
    header("Location: checklist.pdf");
    exit;
}

// === Count totals ===
$totalDataset = 0;
$totalChecklist = 0;
if (file_exists('download_log.csv')) {
    $lines = file('download_log.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($ip, $type, $t) = explode(',', $line);
        if ($type === 'dataset') $totalDataset++;
        if ($type === 'checklist') $totalChecklist++;
    }
}

$datasetFile = "?download=dataset";
$checklistFile = "?view=checklist";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mid-Term Preparation</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-xl rounded-2xl p-8 max-w-3xl w-full border border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Dear Students,</h1>
    <p class="text-gray-700 mb-8">Welcome.</p>

    <div class="grid md:grid-cols-2 gap-6">
      <!-- Dataset -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm">
        <p class="text-gray-700 mb-2">
          Please download the dataset to use tomorrow:
        </p>
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
        <p class="text-gray-700 mb-2">
          Please read the checklist that will be used tomorrow:
        </p>
        <a href="<?php echo $checklistFile; ?>" 
           class="inline-flex items-center px-4 py-2 mt-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
          View Checklist (PDF)
        </a>
        <p class="text-sm text-gray-500 mt-2">
          Total checklist views : <strong><?php echo $totalChecklist; ?></strong>
        </p>
      </div>

      <!-- Google Form Submission -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm col-span-2">
        <p class="text-gray-700 mb-2">
          Please submit your venv (zipped) through this link
        </p>
        <!-- Embedded Google Form -->
        <!-- <iframe src="https://forms.gle/xSHKS6p4mbkxsHnw7/viewform?embedded=false"  -->
                width="640" height="800" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
      </div>
    </div>
  </div>

</body>
</html>
