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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if (strlen($content) < 1 || strlen($content) > 500) {
        $error = "Le contenu doit contenir entre 1 et 500 caractères.";
    } else {
        $new_id = createPostIt($title, $content, $id_user);

        if ($new_id > 0) {
            header('Location: index.php?r=my_list_post_it&created=1');
            exit();
        } else {
            $error = "Erreur lors de la création de la nouvelle version.";
        }
    }
}

require '../app/views/new_version_post_it_view.php';
