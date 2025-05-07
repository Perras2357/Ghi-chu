<?php
require_once __DIR__.'/../data/database.php'; // Connexion à la base de données

// Initialiser un tableau d'erreurs vide
$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $naissance = $_POST['naissance'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification si l'email existe déjà dans la base de données
    $stmt = $dbh->prepare("SELECT * FROM user WHERE mail = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $errors['email'] = "L'email est déjà utilisé.";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez entrer un email valide.";
    }

    // Validation du mot de passe
    if (strlen($password) < 8) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères.";
    }

    // Si pas d'erreurs, procéder à l'inscription
    if (empty($errors)) {
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $stmt = $dbh->prepare("INSERT INTO user (first_name, last_name, date_birth, mail, password, date_create) VALUES (:prenom, :nom, :naissance, :email, :password, NOW())");
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':naissance', $naissance, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } else {
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}

require_once __DIR__.'/../views/inscription_view.php'; // Charger la vue
?>
