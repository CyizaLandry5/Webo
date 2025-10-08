<?php
session_start();
require_once 'config/settings.php';

$topic = $_GET['topic'] ?? '';
if (!isset($quizzes[$topic])) {
    echo "<h2 class='text-center text-red-600 font-bold mt-10 text-xl'>Invalid quiz topic.</h2>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $_SESSION['student_name'] = trim($_POST['name']);
} elseif (!isset($_SESSION['student_name'])) {
    // Show the name entry form and stop the script here
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Enter Your Name - SafeQuiz</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md text-center">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Enter Your Name</h2>
            <form method="POST" class="flex flex-col space-y-4">
                <input type="text" name="name" required placeholder="Your full name"
                    class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Start Quiz
                </button>
            </form>
        </div>
    </body>
    </html>';
    exit;
}

$quiz = $quizzes[$topic];
$duration = $quiz['duration'] * 60; // seconds
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($quiz['title']); ?> - SafeQuiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    let timeLeft = <?php echo $duration; ?>;

    // Custom nice alert
    function showPopup(message, type = "warning") {
      const popup = document.createElement("div");
      popup.className = `fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50`;
      popup.innerHTML = `
        <div class="bg-white p-6 rounded-xl shadow-2xl w-80 text-center animate-fadeIn">
          <h2 class="text-xl font-semibold mb-3 text-${type === "error" ? "red" : "yellow"}-600">${type === "error" ? "Alert!" : "Warning!"}</h2>
          <p class="text-gray-700 mb-5">${message}</p>
          <button id="okBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">OK</button>
        </div>`;
      document.body.appendChild(popup);
      document.getElementById("okBtn").onclick = () => popup.remove();
    }

    function startTimer() {
      const timerEl = document.getElementById("timer");
      const countdown = setInterval(() => {
        if (timeLeft <= 0) {
          clearInterval(countdown);
          window.location.href = "submit.php";
        } else {
          let min = Math.floor(timeLeft / 60);
          let sec = timeLeft % 60;
          timerEl.innerText = `Time Left: ${min}m ${sec}s`;
          timeLeft--;
        }
      }, 1000);
    }

    function requestFullscreen() {
      const elem = document.documentElement;
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
      }
    }

    function logCheating(reason) {
      fetch("log_cheat.php?topic=<?php echo $topic; ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "reason=" + encodeURIComponent(reason)
      });
    }

    function warnOnFocusLoss() {
      document.addEventListener("visibilitychange", () => {
        if (document.hidden) {
          showPopup("Do not switch tabs or minimize the window during the quiz! <br><strong>NTIWONGERE KABISA</strong>");
          logCheating("Tab switch or minimized");
        }
      });

      window.addEventListener("blur", () => {
        showPopup("You switched away from the quiz window.<br><strong>NTIWONGERE GU CLICKA KU RUHANDE!!</strong>");
        logCheating("Window blur");
      });
    }

    window.onload = () => {
      requestFullscreen();
      startTimer();
      warnOnFocusLoss();
    };
  </script>

  <style>
    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.9);}
      to {opacity: 1; transform: scale(1);}
    }
    .animate-fadeIn {
      animation: fadeIn 0.2s ease-in-out;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="max-w-5xl mx-auto my-10 bg-white shadow-lg rounded-2xl p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
      <h2 class="text-2xl font-semibold text-gray-800">
        <?php echo htmlspecialchars($quiz['title']); ?>
      </h2>
      <p id="timer" class="text-lg font-mono text-blue-600">Loading timer...</p>
    </div>

    <div class="rounded-lg overflow-hidden border border-gray-200 shadow-inner">
      <iframe 
        src="<?php echo htmlspecialchars($quiz['form_url']); ?>?embedded=true" 
        width="100%" height="800" frameborder="0"
        allowfullscreen
        class="w-full rounded-lg">
        Loading…
      </iframe>
    </div>
  </div>
</body>
</html>
