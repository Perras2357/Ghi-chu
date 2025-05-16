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
    $postits_list = getAllPostIt($id_user);


    //on récupère un seul post-it dans postits_list dont l'id est dans l'url
    if(isset($_GET['id_postit']))
    {
        $id_postit = $_GET['id_postit'];

        //on récupère les utilisateurs qui partage ce post-it
        $users_shared = getAllUsersShared($id_postit);

        //tableau avec les id_user pour comparer
        //$shared_id_user = array_column($users_shared, 'id_user');

        // on récupère tous les utilisateurs
        $all_users = getAllUsers($id_postit,$id_user);

        

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
        $result = archivePostIt($id_postit,$id_user);
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

    // //on traite la modification d'accès
    // if(isset($_POST['write']))
    // {
    //     // On récupère l'id du post-it à supprimer
    //     $id_user = $_POST['write'];
    //     $val = 1;

    //     // On modifie le flag dans share
    //     $result = setFlagWrite($id_user, $id_postit , $val);
    //     if($result == 0)
    //     {
    //         $error = "Erreur lors de la suppression du post-it";
    //         exit;
    //     }
    //     else
    //     {
    //         //afficher un message de succès à gerer avec JavaScript

    //         // On redirige vers la page d'accueil
    //         header('Location: index.php?r=one_post_it&id_postit='.$id_postit);

    //         exit;
    //     }
    // }
    // if(isset($_POST['read']))
    // {
    //     // On récupère l'id du post-it à supprimer
    //     $id_user = $_POST['read'];
    //     $val = 0;

    //     // On modifie le flag dans share
    //     $result = setFlagWrite($id_user, $id_postit , $val);
    //     if($result == 0)
    //     {
    //         $error = "Erreur lors de la suppression du post-it";
    //         exit;
    //     }
    //     else
    //     {
    //         //afficher un message de succès à gerer avec JavaScript

    //         // On redirige vers la page d'accueil
    //         header('Location: index.php?r=one_post_it&id_postit='.$id_postit);

    //         exit;
    //     }
    // }

    // on ajoute un user dans le partage
    if(isset($_POST['add_user']))
    {
        // On récupère l'id du post-it à supprimer
        $id_user = $_POST['add_user'];
        $val = 0;

        // On modifie le flag dans share
        $result = addUserShare($id_user, $id_postit);
        if($result == 0)
        {
            $error = "Erreur lors de la suppression du post-it";
            exit;
        }
        else
        {
            //afficher un message de succès à gerer avec JavaScript

            // On redirige vers la page d'accueil
            header('Location: index.php?r=one_post_it&id_postit='.$id_postit);

            exit;
        }
    }

    // on retire un user dans le partage
    if(isset($_POST['move']))
    {
        // On récupère l'id du post-it à supprimer
        $id_user = $_POST['move'];
        $val = 0;

        // On modifie le flag dans share
        $result = moveUserShare($id_user, $id_postit);
        if($result == 0)
        {
            $error = "Erreur lors de la suppression du post-it";
            exit;
        }
        else
        {
            //afficher un message de succès à gerer avec JavaScript

            // On redirige vers la page d'accueil
            header('Location: index.php?r=one_post_it&id_postit='.$id_postit);

            exit;
        }
    }


    
    require '../app/views/one_post_it_view.php';
?>
