function validateLoginForm() {
    const email = document.getElementById("loginEmail").value.trim();
    const password = document.getElementById("loginPassword").value;
    const error = document.getElementById("loginError");
  
    if (!email || !password) {
      error.textContent = "Email and password are required.";
      return false;
    }
  
    if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
      error.textContent = "Invalid email format.";
      return false;
    }
  
    error.textContent = "";
    alert("Login successful!");
    return true;
  }