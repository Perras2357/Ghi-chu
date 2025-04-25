<?php

    //chargement de base_url
    // $base_url = $config['base_url'];

    // $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // //var_dump($uri);
    // $uri = trim($uri, $base_url.'public/'); // enlève "/ghi-chu/public/" du début de l'URL pour obtenir la route

    // //var_dump($uri); // pour le debug
    // switch ($uri) {
    //     case '':
    //         require __DIR__ .'/controllers/home.php';
    //         break;
    //     case 'home':
    //         require __DIR__ .'/controllers/home.php';
    //         break;
    //     case 'login':
    //         require __DIR__ .'/controllers/login.php';
    //         break;
    //     case 'signup':
    //         require __DIR__ .'/controllers/signup.php';
    //         break;
    //     default:
    //         require __DIR__ .'/controllers/login.php';

    //         break;
    // }

// // Récupération de l'URL et nettoyage
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $basePath = '/ghi-chu/public/';
// if (strpos($uri, $basePath) === 0) {
//     $uri = substr($uri, strlen($basePath));
// }
// $uri = trim($uri, '/');

// $routes = [
//     '' => 'home',
//     'home' => 'home',
//     'login' => 'login',
//     'signup' => 'signup',
// ];

// $controller = $routes[$uri] ?? 'home';
// require_once __DIR__.'/controllers/home.php';

// // $controllerFile = __DIR__ . "/controllers/{$controller}.php";
// // if (file_exists($controllerFile)) {
// //     require_once $controllerFile;
// // } else {
// //     require_once __DIR__.'/controllers/home.php';
// // }


$page = $_GET['page'] ?? 'home'; // par défaut 'home'

switch ($page) {
    case 'login':
        require '../app/controllers/login.php';
        break;
    case 'signup':
        require '../app/controllers/signup.php';
        break;
    case 'home':
        require '../app/controllers/home.php';
        break;
    default:
        require '../app/controllers/home.php';
        break;
}
