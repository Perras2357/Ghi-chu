<?php
// ***************************************** Controller pour la page de creation de post it **********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//

    //on récupère l'id de la session après avoir vérifié que l'utilisateur est connecté
    if($_SESSION['user_id'])
    {
        $id_user = $_SESSION['user_id'];
    }
    else
    {
        header('Location: index.php?r=login');
        exit();
    }
    //on récupère les utilisateurs pour les ajoouter dans une liste
    $users_list = getAllUsersCreate($id_user); 

    //On vérifie si le formulaire a été soumis
    if (isset($_POST['submit_id'])) 
    {
        // On récupère les données du formulaire
        $title = $_POST['title_id'];
        $content = $_POST['content_id'];
        $shared_users = isset($_POST['shared_users']) ? $_POST['shared_users'] : []; // tableau d'IDs


        //formatage pour éviter les scripts
        $title = htmlspecialchars($title);
        $content = htmlspecialchars($content);

        

        // On vérifie si le titre est vide
        if (empty($title) || strlen($title) < 3 || strlen($title) > 150)
        {
            $error = "Le titre ne peut pas être envoyé à cause du nombre de caractère";
            exit;
        } 
       if (empty($content) && strlen($content) < 3 || strlen($content) > 600)
        {
            $error = "Le contenu ne peut pas être envoyé à cause du nombre de caractère";
            exit;
        } 

        // Si tout est bon, on peut créer le post-it
        $new_post_it = createPostIt($title, $content, 1);

        

       if($new_post_it == 0)
        {
            $error = "Erreur lors de la création du post-it";
            exit;
        }
        else
        {
            // Supposons que tu as $new_postit_id (ID du post-it nouvellement créé)
            foreach ($shared_users as $id_user) 
            {

                $valdation_add = addUserShare($id_user, $new_post_it);
                if($valdation_add == 0)
                {
                    $error = "Erreur d'ajout";
                    exit;
                }
                
            }

            // On redirige vers la page d'accueil
            header('Location: index.php?r=home');
            exit;
        }
    }
    
    require '../app/views/create_post_it_view.php';
?>