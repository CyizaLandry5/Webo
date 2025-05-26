window.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");

    if (status) {
        let message = "";
        let bgColor = "";
        let textColor = "";

        switch (status) {
            case "success":
                message = "✅ Message submitted successfully!";
                bgColor = "#d4edda";
                textColor = "#155724";
                break;
            case "error":
                message = "❌ There was an error submitting your message.";
                bgColor = "#f8d7da";
                textColor = "#721c24";
                break;
            case "empty":
                message = "⚠️ Please fill in all fields.";
                bgColor = "#fff3cd";
                textColor = "#856404";
                break;
            case "sqlerror":
                message = "⚠️ Server error. Please try again later.";
                bgColor = "#f8d7da";
                textColor = "#721c24";
                break;
        }

        if (message) {
            const msgBox = document.createElement("div");
            msgBox.style.padding = "12px";
            msgBox.style.marginBottom = "20px";
            msgBox.style.borderRadius = "8px";
            msgBox.style.backgroundColor = bgColor;
            msgBox.style.color = textColor;
            msgBox.style.fontWeight = "bold";
            msgBox.style.textAlign = "center";
            msgBox.textContent = message;

            const contactSection = document.getElementById("contact");
            contactSection.prepend(msgBox);

            setTimeout(() => {
                msgBox.remove();
                // Clean URL
                const url = new URL(window.location);
                url.searchParams.delete('status');
                window.history.replaceState({}, document.title, url);
            }, 5000);
        }
    }
});
