<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require '../app/models/user.php';

$errors = [];

if (isset($_POST['submit_button'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "The email format is invalid.";
    } elseif (empty($password)) {
        $errors['password'] = "Password is required.";
    } else {
        $auth = checkUserCredentials($email, $password);
        // var_dump($auth);
        if ($auth['status']) {
            $_SESSION['user_id'] = $auth['user']['id_user'];
            $_SESSION['user_name'] = $auth['user']['name'];
            header("Location: index.php?r=home");
            exit;
        } else {
            if ($auth['message'] === 'no_account') {
                $errors['email'] = "No account found with this email. Please register";
            } elseif ($auth['message'] === 'wrong_password') {
                $errors['password'] = "Incorrect password. Please try again.";
            } else {
                $errors['email'] = "Incorrect login details. Please check your email and password.";
                
            }
            
        }
    }
}
require '../app/views/login_view.php';
?>