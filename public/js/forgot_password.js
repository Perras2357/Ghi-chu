document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login-form");
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("email-error");
  
    function setValidStyles(input) {
      input.style.borderColor = "green";
      input.style.backgroundColor = "#e6ffea"; 
    }
  
    function setInvalidStyles(input) {
      input.style.borderColor = "#d1433d";
      input.style.backgroundColor = "#ffe6e6"; 
    }
  
    function resetStyles(input) {
      input.style.borderColor = "#ccc";
      input.style.backgroundColor = "white";
    }
  
    function validateEmail() {
      const value = emailInput.value.trim();
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
      if (!regex.test(value)) {
        setInvalidStyles(emailInput);
        emailError.textContent = "Format d'email invalide.";
        return false;
      } else {
        setValidStyles(emailInput);
        emailError.textContent = "";
        return true;
      }
    }
  
    emailInput.addEventListener("input", validateEmail);
  
    form.addEventListener("submit", function (e) {
      const isEmailValid = validateEmail();
  
      if (!isEmailValid) {
        e.preventDefault(); 
      }
    });
  });
  