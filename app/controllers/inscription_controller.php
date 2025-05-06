<?php




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


require '../app/views/inscription_view.php';

?>