<?php
// Initialiser un tableau d'erreurs vide
$errors = [];
$message = '';

// Vérification si le formulaire est soumis
if (isset($_POST['inscription'])) {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom']; 
    $naissance = $_POST['naissance'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];


//pour debug
//echo '<pre>POST = '; var_dump($_POST); echo '</pre>';

    // Récupérer et nettoyer les données du formulaire
    $prenom           = trim($_POST['prenom'] ?? '');
    $nom              = trim($_POST['nom'] ?? '');
    $naissance        = trim($_POST['naissance'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';


    // 1. Validation du prénom
    if ($prenom === '') {
        $errors['prenom'] = "Veuillez entrer un prénom.";
    }

    // 2. Validation du nom
    if ($nom === '') {
        $errors['nom'] = "Veuillez entrer un nom.";
    }

    // Validation de la date de naissance (format AAAA/MM/JJ)
    if (!preg_match('/^[0-9]{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])$/', $naissance)) {
        $errors['naissance'] = "La date de naissance doit être au format AAAA/MM/JJ.";
    }


    //4. Validation du format de l'email
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

        // Si l'insertion est réussie
        if ($stmt->execute()) {
            $message = "Inscription réussie ! Vous allez être redirigé vers la page de connexion.";
            echo("<script>console.log('PHP: " . $stmt . "');</script>");
            //header("Location: index/?r=login");  // Rediriger vers la page de connexion
            exit();
        } else {
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }


require_once '../app/views/inscription_view.php'; // Charger la vue
?>
