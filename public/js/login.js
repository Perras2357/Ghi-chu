// public/js/login.js
// JavaScript for client-side validation of the login form (real-time validation).
// This script provides instant feedback on the email and password fields.

document.addEventListener('DOMContentLoaded', function() {
    // Lấy các phần tử form và trường input
    var form = document.getElementById('loginForm');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var emailError = document.getElementById('email-error');
    var passwordError = document.getElementById('password-error');

    // Kiểm tra trường email khi người dùng nhập
    emailInput.addEventListener('input', function() {
        // Sử dụng cơ chế validation của HTML5: validity.valueMissing & typeMismatch
        if (emailInput.validity.valueMissing) {
            // Email trống
            emailError.textContent = "Veuillez entrer votre adresse email."; // "Vui lòng nhập địa chỉ email."
            emailError.style.display = 'block';
            emailInput.classList.add('invalid');
        } else if (emailInput.validity.typeMismatch) {
            // Định dạng email không đúng
            emailError.textContent = "Format d'email invalide."; // "Định dạng email không hợp lệ."
            emailError.style.display = 'block';
            emailInput.classList.add('invalid');
        } else {
            // Email hợp lệ
            emailError.textContent = "";
            emailError.style.display = 'none';
            emailInput.classList.remove('invalid');
        }
    });

    // Kiểm tra trường password khi người dùng nhập
    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.trim() === "") {
            // Mật khẩu trống
            passwordError.textContent = "Veuillez entrer votre mot de passe."; // "Vui lòng nhập mật khẩu."
            passwordError.style.display = 'block';
            passwordInput.classList.add('invalid');
        } else {
            passwordError.textContent = "";
            passwordError.style.display = 'none';
            passwordInput.classList.remove('invalid');
        }
    });

    // Kiểm tra lần cuối khi form được submit
    form.addEventListener('submit', function(event) {
        // Nếu trường nào không hợp lệ thì chặn form submit
        if (emailInput.value.trim() === '' || !emailInput.checkValidity() || passwordInput.value.trim() === '') {
            event.preventDefault(); // Ngăn không cho form submit

            // Tùy chọn: đưa con trỏ đến field lỗi đầu tiên
            if (emailInput.value.trim() === '' || !emailInput.checkValidity()) {
                emailInput.focus();
            } else if (passwordInput.value.trim() === '') {
                passwordInput.focus();
            }
        }
    });
});
