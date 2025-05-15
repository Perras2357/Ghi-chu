<?php
// ***************************************** Controller pour la page de creation de post it **********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//


     // On récupère l'id de l'utilisateur connecté
    // $id_user = $_SESSION['user']['id_user'];
    if($_SESSION['user_id'])
    {
        $id_user = $_SESSION['user_id'];
    }
    else
    {
        header('Location: index.php?r=login');
        exit();
    }
    // On récupère tous les post-it de l'utilisateur
    $potits_archives = getPostItArchived($id_user);

    if(isset($_POST['delete_permanently']))
    {
        // On récupère l'id du post-it à supprimer
        $id_postit = $_POST['delete_permanently'];
        // On supprime le post-it définitivement
        $result = deletePostIt($id_postit);
        if($result == 0)
        {
            $error = "Erreur lors de la suppression du post-it";
            exit;
        }
        else
        {
            //afficher un message de succès à gerer avec JavaScript

            // On redirige vers la page d'accueil
            header('Location: index.php?r=archive');

            exit;
        }
    }
    if(isset($_POST['restore']))
    {
        // On récupère l'id du post-it à restore
        $id_postit = $_POST['restore'];
        // On restaure le post-it
        $result = restorePostIt($id_postit);
        if($result == 0)
        {
            $error = "Erreur lors de la restauration du post-it";
            exit;
        }
        else
        {
            //afficher un message de succès à gerer avec JavaScript

            // On redirige vers la page d'accueil
            header('Location: index.php?r=archive');
            exit;
        }
    }
    
    require '../app/views/archive_view.php';
?>