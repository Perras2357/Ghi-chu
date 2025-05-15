<?php
// ***************************************** Controller pour créer une nouvelle version d’un post-it *********************************************

require '../app/models/post_it.php';

// $id_user = $_SESSION['user']['id_user'];
$id_user = 1; // Pour test

// Récupération de tous les post-its de l'utilisateur
$postits_list = getAllPostIt($id_user);

// On récupère un post-it spécifique via l'URL
if (isset($_GET['id_postit'])) {
    $id_postit = $_GET['id_postit'];

    foreach ($postits_list as $postit) {
        if ($postit->id_postit == $id_postit) {
            $postit_one = $postit;
            break;
        }
    }
} else {
    header('Location: index.php?r=my_list_post_it');
    exit();
}

if (!isset($postit_one)) {
    header('Location: index.php?r=my_list_post_it');
    exit();
}

// Traitement du formulaire pour créer une nouvelle version
if (isset($_POST['create_version'])) {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $id_postit = $postit_one->id_postit;
    $id_user = $postit_one->id_user;

    if (strlen($content) < 1 || strlen($content) > 500) {
        $error = "Le contenu doit contenir entre 1 et 500 caractères.";
    } else {
        $result = newPostItVersion($id_postit,$content,$title,$id_user); 
        if ($result) {
            header('Location: index.php?r=home');
            exit();
        } else {
            $error = "Une erreur s'est produite lors de la création de la nouvelle version.";
        }
    }
}

require '../app/views/new_version_post_it_view.php';