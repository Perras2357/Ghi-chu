<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/'); // enlève les / au début et à la fin

switch ($uri) {
    case '':
    case 'login':
        require '/controllers/login.php';
        break;
    case 'signup':
        require '/controllers/signup.php';
        break;
    default:
        http_response_code(404);
        echo "404 - Page non trouvée";
}
