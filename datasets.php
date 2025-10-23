<?php
// dataset and checklist file paths
$datasetFile = "dataset_mid_term.csv";
$checklistFile = "checklist.pdf";
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
      <!-- Left section (Dataset) -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm">
        <p class="text-gray-700 mb-2">
          Please download the dataset to use tomorrow:
        </p>
        <a href="<?php echo $datasetFile; ?>" 
           download
           class="inline-flex items-center px-4 py-2 mt-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
          📊 Download Dataset (CSV)
        </a>
      </div>

      <!-- Right section (Checklist) -->
      <div class="border border-gray-300 rounded-xl p-5 shadow-sm">
        <p class="text-gray-700 mb-2">
          Please read the checklist that will be used tomorrow to prepare accordingly:
        </p>
        <a href="<?php echo $checklistFile; ?>" 
           target="_blank"
           class="inline-flex items-center px-4 py-2 mt-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
          ✅ View Checklist (PDF)
        </a>
      </div>
    </div>
  </div>

</body>
</html>
