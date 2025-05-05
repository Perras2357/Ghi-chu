<?php
include('../app/data/database.php');
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $naissance = $_POST['naissance'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $dbh->prepare("INSERT INTO users (prenom, nom, date_naissance, mail, mot_de_passe) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$prenom, $nom, $naissance, $email, $password])) {
        $message = "Inscription réussie !";
    } else {
        $message = "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <img src="images/logo_fond_blanc.png" class="logo" alt="Logo Ghi Chu">
            <form method="POST">
                <h2>Welcome</h2>
                <p>Please enter your details</p>
                <input type="text" name="prenom" placeholder="First Name" required>
                <input type="text" name="nom" placeholder="Last Name" required>
                <input type="date" name="naissance" placeholder="Date of birth" required>
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="8 characters minimum" required>
                <button type="submit">Sign up</button>
                <p class="message"><?php echo $message; ?></p>
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
        <div class="image-part"></div>
    </div>
</body>
</html>
