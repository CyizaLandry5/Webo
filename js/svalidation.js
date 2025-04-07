document.addEventListener("DOMContentLoaded", function () {
    // Function to show the Registration Form and hide the Login Form
    window.showRegistration = function () {
        document.getElementById("registration-section").style.display = "block";
        document.getElementById("login-section").style.display = "none";
    };

    // Function to show the Login Form and hide the Registration Form
    window.showLogin = function () {
        document.getElementById("login-section").style.display = "block";
        document.getElementById("registration-section").style.display = "none";
    };

    // Ensure that one form is displayed by default
    showLogin(); // You can change this to showRegistration() if you prefer

    // LOGIN FUNCTIONALITY (AJAX)
    var loginForm = document.getElementById("login-form");
    var loginError = document.getElementById("login-error");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent normal form submission

        var email = document.getElementById("login_email").value.trim();
        var password = document.getElementById("login_password").value.trim();

        if (!email || !password) {
            loginError.textContent = "Please enter both email and password.";
            loginError.style.display = "block";
            return;
        }

        loginError.style.display = "none"; // Hide error message if any

        var formData = new FormData();
        formData.append("login_email", email);
        formData.append("login_password", password);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "student/process_login.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                
                if (response.success) {
                    window.location.href = "student/dashboard.html"; // Ensure this file exists
                } else {
                    loginError.textContent = response.message;
                    loginError.style.display = "block";
                }
            }
        };

        xhr.send(formData);
    });

    // REGISTRATION SECRET CODE VALIDATION
    document.getElementById("registration-form").addEventListener("submit", function (event) {
        var secretCode = document.getElementById("secret_code").value.trim();
        var errorMessage = document.getElementById("error-message");

        var allowedCodes = ["L3NIT", "L4NIT", "L5NIT", "L5ETE"];

        if (!allowedCodes.includes(secretCode)) {
            errorMessage.style.display = "block";
            event.preventDefault(); // Stop form submission
        } else {
            errorMessage.style.display = "none";
        }
    });
});
