<?php
// ***************************************** Controller pour la page de creation de post it **********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//


     // On récupère l'id de l'utilisateur connecté
    // $id_user = $_SESSION['user']['id_user'];
    $id_user = 1; // Pour le test, on met l'id de l'utilisateur à 1

    // On récupère tous les post-it de l'utilisateur
    $postits_list = getAllPostIt($id_user);

    if(isset($_POST['delete']))
    {
        // On récupère l'id du post-it à supprimer
        $id_postit = $_POST['delete'];
        // On supprime le post-it
        $result = archivePostIt($id_postit);
        if($result == 0)
        {
            $error = "Erreur lors de la suppression du post-it";
            exit;
        }
        else
        {
            //afficher un message de succès à gerer avec JavaScript

            // On redirige vers la page d'accueil
            header('Location: index.php?r=my_list_post_it');

            exit;
        }
    }
    
    require '../app/views/my_list_post_it_view.php';
?>