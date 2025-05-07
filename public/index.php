<?php
    
    // Vérification de l'existance du repertoire de maintenance au cas où le site est en maintenance 
    if(is_dir("../maintenance"))
    {
        echo "<h1> Site en maintenance</h1><p>Merci de revenir plus tard.</p>";
        exit;
    }

    // Appel de la page ou on établit la connexion à la base de données ety l'ouverture de session
    //require_once("../app/web.php");

    // Appel de la page de route, celle qui gère toutes les redirections
    require_once("../app/routes.php");

?>
