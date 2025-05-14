<?php

// Initialiser un tableau d'erreurs vide
$errors = [];
$message = '';

//var_dump($_POST);

if ((isset($_POST['inscription']))) {
    // Récupérer les données du formulaire

    var_dump($_POST['password']);

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom']; 
    $naissance = $_POST['naissance'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];


    // Vérification si l'email existe déjà dans la base de données
    $stmt = $db->prepare("SELECT * FROM user WHERE mail = :email");
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
    if (strlen($password) < 6) {
        $errors['password'] = "Le mot de passe doit comporter au moins 6 caractères.";
    }

    // Vérification de la correspondance des mots de passe
    if ($password !== $password_confirm) { // Correction de la condition pour comparer les valeurs, pas la longueur
        $errors['password_confirm'] = "Les deux mots de passe ne correspondent pas.";
    }

    // Si pas d'erreurs, procéder à l'inscription
    if (empty($errors)) {
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $stmt = $db->prepare("INSERT INTO user (first_name, last_name, date_birth, mail, password, date_create) 
                              VALUES (:prenom, :nom, :naissance, :email, :password, NOW())");
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':naissance', $naissance, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);


        if ($stmt->execute()) {
            $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            header("Location: index/?r=home"); // Rediriger vers la page de connexion
        } else {
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
            //header("Location: index/?r=login.php"); // Rediriger vers la page de connexion
        }
    }
}

require_once '../app/views/inscription_view.php'; // Charger la vue
?>
