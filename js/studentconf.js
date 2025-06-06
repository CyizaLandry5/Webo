// assets/js/main.js

function confirmRedirect(event) {
  event.preventDefault();
  const confirmed = confirm("This page is specifically made for my students. Do you wish to proceed?");
  if (confirmed) {
    window.location.href = "student/SecuredQuiz";
  }
}
