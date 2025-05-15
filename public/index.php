<?php
    
    // Vérification de l'existance du repertoire de maintenance au cas où le site est en maintenance 
    if(is_dir("../maintenance"))
    {
        echo "<h1> Site en maintenance</h1><p>Merci de revenir plus tard.</p>";
        exit;
    }

    // Appel de la page ou on établit la connexion à la base de données ety l'ouverture de session
    require_once("../app/web.php");

    // Redirige vers r=home si aucun paramètre 'r' dans l'URL
    if (!isset($_GET['r'])) 
    {
        header('Location: index.php?r=forgot_password');
        exit;
    }

    // Appel de la page de route, celle qui gère toutes les redirections
    require_once("../app/routes.php");
?>