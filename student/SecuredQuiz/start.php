<?php
require_once 'config/settings.php';

$topic = $_GET['topic'] ?? '';
if (!isset($quizzes[$topic])) {
    echo "<h2>Invalid quiz topic.</h2>";
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
          alert("Time's up!");
          document.exitFullscreen?.();
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

    function warnOnFocusLoss() {
      document.addEventListener("visibilitychange", () => {
        if (document.hidden) {
          alert("Warning: Do not switch tabs or minimize the window during the quiz!");
        }
      });

      window.addEventListener("blur", () => {
        alert("Warning: You switched away from the quiz window.");
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
