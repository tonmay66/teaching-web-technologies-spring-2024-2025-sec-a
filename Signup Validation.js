function validateSignupForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const error = document.getElementById("signupError");
  
    if (!name || !email || !password || !confirmPassword) {
      error.textContent = "All fields are required.";
      return false;
    }
  
    if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
      error.textContent = "Invalid email format.";
      return false;
    }
  
    if (password.length < 6) {
      error.textContent = "Password must be at least 6 characters.";
      return false;
    }
  
    if (password !== confirmPassword) {
      error.textContent = "Passwords do not match.";
      return false;
    }
  
    error.textContent = "";
    alert("Signup successful. Please verify your email.");
    return true;
  }