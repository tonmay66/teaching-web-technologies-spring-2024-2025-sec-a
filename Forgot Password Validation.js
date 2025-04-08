function validateForgotPassword() {
    const email = document.getElementById("forgotEmail").value.trim();
    const error = document.getElementById("forgotError");
  
    if (!email) {
      error.textContent = "Please enter your email.";
      return false;
    }
  
    if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
      error.textContent = "Invalid email format.";
      return false;
    }
  
    error.textContent = "";
    alert("Recovery link sent to your email.");
    return true;
  }