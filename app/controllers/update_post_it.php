<?php
// ***************************************** Controller pour la page de modification de post-it **********************************************************

require '../app/models/post_it.php'; // Inclure le modèle pour la gestion des post-its
// require '../app/models/user.php'; // Inclure le modèle pour la gestion des utilisateurs
// $id_user = $_SESSION['user']['id_user'];
$id_user = 1; // Pour les tests

// Récupération de tous les post-its de l'utilisateur
$postits_list = getAllPostIt($id_user);

// On récupère un seul post-it dans postits_list dont l'id est dans l'url

if (isset($_GET['id_postit'])) {
    $id_postit = $_GET['id_postit'];
    foreach ($postits_list as $postit) {
        if ($postit->id_postit == $id_postit) {
            $postit_one = $postit;
            break;
        }
    }
} else {
    // Redirection si l'id n'est pas présent
    header('Location: index.php?r=my_list_post_it');
    exit();
}

if (!isset($postit_one)) {
    // Si le post-it n'existe pas
    header('Location: index.php?r=my_list_post_it');
    exit();
}

// Traitement de la modification du post-it
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $new_content = $_POST['content'] ?? '';
    $new_title = $_POST['title'] ?? '';
    $result = updatePostItContent($postit_one->id_postit,$new_title, $new_content, $id_user);

    if ($result['success']) {
        header('Location: index.php?r=one_post_it&id_postit=' . $postit_one->id_postit);
        exit();
    } else {
        $error = $result['error'] ?? "Une erreur est survenue lors de la mise à jour.";
    }
}

//Suppression logique du post-it
if (isset($_POST['delete'])) {
    $id_postit = $_POST['delete'];
    $result = archivePostIt($id_postit);

    if ($result == 0) {
        $error = "Erreur lors de la suppression du post-it.";
        exit;
    } else {
        // Redirection après suppression
        header('Location: index.php?r=my_list_post_it');
        exit();
    }
}

// Chargement de la vue
require '../app/views/update_post_it_view.php';
