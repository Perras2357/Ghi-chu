<?php
// app/routes.php

// Lấy URI từ yêu cầu
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/'); // Xóa các dấu '/' ở đầu và cuối

// Kiểm tra nếu có từ "public" trong URI, bỏ qua nó
if (strpos($uri, 'Ghi-chu/public') !== false) {
    $uri = str_replace('Ghi-chu/public/', '', $uri);
}

// Xử lý route
switch ($uri) {
    case '':
    case 'login':
        echo "Page de connexion"; // Kiểm tra xem đã vào đúng route chưa
        require __DIR__ . '/controllers/login.php';
        break;
    case 'logout':
        echo "Page de déconnexion"; // Kiểm tra xem đã vào đúng route chưa
        require __DIR__ . '/controllers/logout.php';
        break;
    case 'signup':
        echo "Page d'inscription"; // Kiểm tra xem đã vào đúng route chưa
        require __DIR__ . '/controllers/signup.php';
        break;
    case 'forgot_password':
        echo "Page mot de passe oublié"; // Kiểm tra xem đã vào đúng route chưa
        require __DIR__ . '/controllers/forgot_password.php';
        break;
    default:
        http_response_code(404);
        echo "404 - Page non trouvée ";
        break;
}
?>
