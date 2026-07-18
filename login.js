// ==========================
// SHOW OR HIDE PASSWORD
// ==========================
function togglePassword() {
    let password = document.getElementById("password");

    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}

// ==========================
// HIDE ERROR MESSAGE
// ==========================
function hideError() {
    let errorMessage = document.getElementById("error-message");

    if (errorMessage) {
        errorMessage.style.display = "none";
    }
}

// ==========================
// CLEAR ERROR WHEN USER TYPES
// ==========================
window.onload = function () {

    let username = document.getElementById("username");
    let password = document.getElementById("password");

    if (username) {
        username.addEventListener("input", hideError);
    }

    if (password) {
        password.addEventListener("input", hideError);
    }
}
