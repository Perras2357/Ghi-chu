<?php

    // Récupère la route dans l'URL (ex: login, home)

    // A LIRE : Veuillez remplacer la ligne ci-dessous par votre controller (exple : connexion_controller)
    $route = $_GET['r'] ?? 'inscription_controller'; 

    // Définit le chemin vers le fichier de route
    $controllerFile = "../app/controllers/$route.php";

    if (file_exists($controllerFile)) {
        require $controllerFile;
    } else {
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
    }