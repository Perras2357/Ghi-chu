<?php
// ***************************************** Controller pour la page de creation de post it **********************************************************
//
    require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
    //require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
//


    //On vérifie si le formulaire a été soumis
    if (isset($_POST['submit_id'])) 
    {
        // On récupère les données du formulaire
        $title = $_POST['title_id'];
        $content = $_POST['content_id'];


        //formatage pour éviter les scripts
        $title = htmlspecialchars($title);
        $content = htmlspecialchars($content);

        

        // On vérifie si le titre est vide
        if (empty($title) || strlen($title) < 3 || strlen($title) > 15)
        {
            $error = "Le titre ne peut pas être envoyé à cause du nombre de caractère";
            exit;
        } 
       if (empty($content) && strlen($content) < 3 || strlen($content) > 150)
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
            // On redirige vers la page d'accueil
            header('Location: index.php?r=home');
            exit;
        }
    }
    
    require '../app/views/create_post_it_view.php';
?>
