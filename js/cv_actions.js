// cv_actions.js

// Function for CV confirmation and view/download
function confirmViewCV() {
    var userConfirmation = confirm("You are about to view my CV. Do you wish to proceed?");
    if (userConfirmation) {
        // Ensure the path is correct relative to your HTML file
        window.open('resume/MPAYIMANA_CYIZA_Landry-CV1.2.pdf', '_blank');
    }
    // If user clicks 'Cancel', nothing happens.
}
