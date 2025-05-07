<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Vérification de l'existance du repertoire de maintenance au cas où le site est en maintenance 
    if(is_dir("../maintenance"))
    {
        echo "<h1> Site en maintenance</h1><p>Merci de revenir plus tard.</p>";
        exit;
    }

    // Chargement config
    $config = require __DIR__ . '/../app/config.php'; 
    

    // Démarrage des sessions
    session_name($config['session']['name']);  // définition du nom de cookie
    session_set_cookie_params([
        'lifetime' => $config['session']['lifetime'],
        'secure' => $config['session']['secure'],
        'httponly' => $config['session']['httponly']
    ]);
    session_start();

    // Connexion à la BDD
    require __DIR__ . '/../app/data/database.php';

    $db = connexion(
        $config['db']['host'],
        $config['db']['dbname'],
        $config['db']['user'],
        $config['db']['password']
    );

    // Appel de la page de route, celle qui gère toutes les redirections
    require __DIR__ . '/../app/routes.php';

    echo "Chargement réussi";


?>
