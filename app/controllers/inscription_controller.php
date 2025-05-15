<?php
// Initialiser un tableau d'erreurs vide
$errors = [];
$message = '';

// Vérification si le formulaire est soumis
if (isset($_POST['inscription'])) {

//pour debug
//echo '<pre>POST = '; var_dump($_POST); echo '</pre>';

    // Récupérer et nettoyer les données du formulaire
    $prenom           = trim($_POST['prenom'] ?? '');
    $nom              = trim($_POST['nom'] ?? '');
    $naissance        = trim($_POST['naissance'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
if ($prenom === '') {
    $errors['prenom'] = "Veuillez entrer un prénom.";
    echo '<p>– debug : prénom vide détecté</p>';
}
if ($nom === '') {
    $errors['nom'] = "Veuillez entrer un nom.";
    echo '<p>– debug : nom vide détecté</p>';
}

    // 1. Validation du prénom
    if ($prenom === '') {
        $errors['prenom'] = "Veuillez entrer un prénom.";
    }

    // 2. Validation du nom
    if ($nom === '') {
        $errors['nom'] = "Veuillez entrer un nom.";
    }

    // 3. Validation de la date de naissance (format AAAAMMJJ)
    if (!preg_match('/^[0-9]{8}$/', $naissance)) {
        $errors['naissance'] = "La date de naissance doit être au format AAAAMMJJ.";
    }

    // 4. Validation du format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez entrer un email valide.";
    } else {
        // 5. Vérification si l'email existe déjà
        $stmt = $db->prepare("SELECT * FROM user WHERE mail = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $errors['email'] = "L'email est déjà utilisé.";
        }
    }

    // 6. Validation du mot de passe (au moins 6 caractères)
    if (strlen($password) < 6) {
        $errors['password'] = "Le mot de passe doit comporter au moins 6 caractères.";
    }

    // 7. Vérification de la correspondance des mots de passe
    if ($password !== $password_confirm) {
        $errors['password_confirm'] = "Les deux mots de passe ne correspondent pas.";
    }

    // Si aucune erreur, procéder à l'inscription
    
    if (empty($errors)) {

        // Hachage du mot de passe

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $stmt = $db->prepare("
            INSERT INTO user (first_name, last_name, date_birth, mail, password, date_create) 
            VALUES (:prenom, :nom, :naissance, :email, :password, NOW())
        ");
        $stmt->bindParam(':prenom',           $prenom,           PDO::PARAM_STR);
        $stmt->bindParam(':nom',              $nom,              PDO::PARAM_STR);
        $stmt->bindParam(':naissance',        $naissance,        PDO::PARAM_STR);
        $stmt->bindParam(':email',            $email,            PDO::PARAM_STR);
        $stmt->bindParam(':password',         $hashed_password,  PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Succès : rediriger vers la connexion
            header("Location: index/?r=login");
            exit();
        } else {
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}

//pour debug
//echo '<pre>'; var_dump($errors); echo '</pre>';
// Charger la vue
require_once '../app/views/inscription_view.php';
