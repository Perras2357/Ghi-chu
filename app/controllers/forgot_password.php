<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require '../app/models/user.php';

$errors = [];

if (isset($_POST['submit_button'])) {
    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "The email format is invalid.";
    } else {
        $user = findUserByEmail($email);
        if ($user['status']) {
            $_SESSION['found_user_email'] = $user['mail']; 
            header("Location: index.php?r=next_step");
            exit;
        } elseif ($user['message'] === 'no_account') {
            $errors['email'] = "No account found with this email";
        }       
    }
}
require '../app/views/forgot_password_view.php';
?>