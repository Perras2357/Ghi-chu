<?php
// ***************************************** Controller pour la page de creation de post it **********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//


     // On récupère l'id de l'utilisateur connecté
    // $id_user = $_SESSION['user']['id_user'];
    $id_user = 1; // Pour le test, on met l'id de l'utilisateur à 1


    //on récupère un seul post-it dans postits_list dont l'id est dans l'url
    if(isset($_GET['id_postit']))
    {
        $id_postit = $_GET['id_postit'];

        $postitshare = getOnePostit($id_postit);
    }
    else
    {
        // Si l'id n'est pas dans l'url, on redirige vers my_list_post_it
        header('Location: index.php');
        exit();
    }




    
    require '../app/views/one_post_it_share_view.php';
?>
