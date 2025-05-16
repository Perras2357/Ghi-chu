<?php
// ***************************************** Controller pour la page de profil utilisateur **********************************************************

require '../app/models/post_it.php'; // À créer ou à compléter si besoin
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
// Récupération des infos utilisateur
$user = getUserById($id_user);

if (!$user) {
    header('Location: index.php?r=login');
    exit();
}

// Traitement de la mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $first_name = trim($_POST['first_name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (empty($first_name) || empty($email)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        $result = updateProfil($id_user, $first_name, $email);

        if ($result['success']) {
            $message = "Profil mis à jour avec succès.";
            $user = getUserById($id_user); // Recharger les données après maj
        } else {
            $error = $result['error'] ?? "Erreur lors de la mise à jour.";
        }
    }
}

$stats = [
    'postit_total' => count(getAllPostIt($id_user)),
    'shared_total' => count(getPostItShared($id_user)),
    'last_update' => getLastUpdateDate($id_user)
];

// Chargement de la vue
require '../app/views/profil_view.php';
