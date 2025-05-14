<?php
// ***************************************** Controller pour la page d'accueil**********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//

    // On récupère l'id de l'utilisateur connecté
    // $id_user = $_SESSION['user']['id_user'];
    $id_user = 1; // Pour le test, on met l'id de l'utilisateur à 1

    // On récupère tous les post-it de l'utilisateur
    $postits_home = getAllPostIt($id_user);
    if(!empty($postits_home))
    {
        // // on récupère juste les trois premiers post-it
        //$postits_home = array_slice($postits_home, 0, 3);

        // On récupère les post-it partagés
        $postits_shared_home = getPostItShared($id_user);
        if(!empty($postits_shared_home))
        {
            
            // on récupère juste les deux premiers post-it
            $postits_shared_home = array_slice($postits_shared_home, 0, 2);
        }
    }

    // On récupère les post-it archivés
    $postits_archived_home = getPostItArchived($id_user);
    



    require '../app/views/home_view.php';
?>