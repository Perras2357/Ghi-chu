<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirige vers la page d'accueil si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Chargement de la configuration
$configPath = realpath(__DIR__ . '/../config.php');

if (!$configPath || !file_exists($configPath)) {
    die("Erreur : Impossible de charger le fichier config.php");
}

$config = require $configPath;

if (!isset($config['db'])) {
    die("Erreur : Clé 'db' manquante dans config.php");
}

$dbConfig = $config['db'];

// Connexion PDO
try {
    $pdo = new PDO(
        "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8",
        $dbConfig['user'],
        $dbConfig['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Variables du formulaire
$mail = '';
$password = '';
$error_message = '';
$error_email = '';
$error_password = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail     = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($mail) || empty($password)) {
        $error_message = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM user WHERE mail = ?");
        $stmt->execute([$mail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $error_email = "Aucun compte trouvé. <a href='index.php?r=register'>Créer un compte</a>";
        } else {
            $dbPassword = $user['password'];

            // mot de passe déjà hashé
            if (password_verify($password, $dbPassword)) {
                $_SESSION['user_id']       = $user['id_user'];
                $_SESSION['user_email']    = $user['mail'];
                $_SESSION['last_activity'] = time();

                header("Location: index.php");
                exit;

            // mot de passe stocké en clair 
            } elseif ($password === $dbPassword) {
                // migration vers mot de passe hashé
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $updateStmt = $pdo->prepare("UPDATE user SET password = ? WHERE id_user = ?");
                $updateStmt->execute([$newHash, $user['id_user']]);

                $_SESSION['user_id']       = $user['id_user'];
                $_SESSION['user_email']    = $user['mail'];
                $_SESSION['last_activity'] = time();

                header("Location: index.php");
                exit;

            //mot de passe incorrect
            } else {
                $error_password = "Mot de passe incorrect, veuillez réessayer.";
            }
        }
    }
}

// Affiche le formulaire
require_once __DIR__ . '/../views/login_view.php';
