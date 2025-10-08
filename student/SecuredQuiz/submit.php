<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafeQuiz - Submit</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    window.onload = () => {
      if (document.fullscreenElement) {
        document.exitFullscreen();
      }
    };
  </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-2xl p-10 text-center max-w-lg mx-auto">
    <h2 class="text-3xl font-semibold text-blue-700 mb-4">Time’s Up!</h2>
    <p class="text-gray-700 mb-3">
      Your time has ended. If you haven’t submitted the form yet, please do so now before closing this page.
    </p>
    <p class="font-medium text-gray-800 mt-4">
      <strong>Thank you for taking the quiz!</strong>
    </p>
    <a href="index.php" 
       class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
       Back to Home
    </a>
  </div>
</body>
</html>
