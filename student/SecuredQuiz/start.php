<?php
session_start();
require_once 'config/settings.php';

$topic = $_GET['topic'] ?? '';
if (!isset($quizzes[$topic])) {
    echo "<h2>Invalid quiz topic.</h2>";
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
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <form method="POST">
                <h2>Enter Your Name</h2>
                <input type="text" name="name" required placeholder="Your full name">
                <button type="submit">Start Quiz</button>
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
  <link rel="stylesheet" href="assets/css/style.css">
  <script>
    let timeLeft = <?php echo $duration; ?>;

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
          alert("Warning: Do not switch tabs or minimize the window during the quiz!");
          logCheating("Tab switch or minimized");
        }
      });

      window.addEventListener("blur", () => {
        alert("Warning: You switched away from the quiz window.");
        logCheating("Window blur");
      });
    }

    window.onload = () => {
      requestFullscreen();
      startTimer();
      warnOnFocusLoss();
    };
  </script>
</head>
<body>
  <div class="container">
    <h2><?php echo htmlspecialchars($quiz['title']); ?></h2>
    <p id="timer">Loading timer...</p>
    <iframe 
      src="<?php echo htmlspecialchars($quiz['form_url']); ?>?embedded=true" 
      width="100%" height="800" frameborder="0"
      allowfullscreen>
      Loading…
    </iframe>
  </div>
</body>
</html>
