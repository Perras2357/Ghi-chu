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


    //on récupère un seul post-it dans postits_list dont l'id est dans l'url
    if(isset($_GET['id_postit']))
    {
        $id_postit = $_GET['id_postit'];

        //on récupère les utilisateurs qui partage ce post-it
        $users_shared = getAllUsersShared($id_postit);
        var_dump($users_shared);

        
        foreach($postits_list as $postit)
        {
            if($postit->id_postit == $id_postit)
            {
                $postit_one = $postit;
                break;
            }
        }
    }
    else
    {
        // Si l'id n'est pas dans l'url, on redirige vers my_list_post_it
        header('Location: index.php?r=my_list_post_it');
        exit();
    }

    if(!isset($postit_one))
    {
        // Si le post-it n'existe pas, on redirige vers my_list_post_it
        header('Location: index.php?r=my_list_post_it');
        exit();
    }

    //suprression du post-it
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




    // on récupère tous les utilisateurs
    $users = getAllUsers();
     if(!empty($users))
     {
        //on active une div pour afficher les utilisateurs
        
     }
    
    require '../app/views/one_post_it_view.php';
?>
