<?php
    // Inclure le head si nécessaire
    //require_once __DIR__.'/layouts/head.php';
?>

<link rel="stylesheet" href="css/inscription.css">
<div class="form-container">
    <!-- Formulaire -->
    <div class="form-box">
        <img src="images/logo_fond_blanc.png" class="logo" alt="Logo Ghi Chu">
        <form method="POST">
            <h2>Welcome</h2>
            <p>Please enter your details</p>

            <!-- Champ prénom -->
            <input type="text" name="prenom" id="prenom" placeholder="First Name" required>
            <span class="error-message"><?php echo isset($errors['prenom']) ? htmlspecialchars($errors['prenom']) : ''; ?></span> <!-- Message d'erreur -->

            <!-- Champ nom -->
            <input type="text" name="nom" id="nom" placeholder="Last Name" required>
            <span class="error-message"><?php echo isset($errors['nom']) ? htmlspecialchars($errors['nom']) : ''; ?></span> <!-- Message d'erreur -->

            <!-- Champ date de naissance -->
            <input type="date" name="naissance" id="naissance" placeholder="Date of birth" required>
            <span class="error-message"><?php echo isset($errors['naissance']) ? htmlspecialchars($errors['naissance']) : ''; ?></span> <!-- Message d'erreur -->

            <!-- Champ email -->
            <input type="email" name="email" id="email" placeholder="Email address" required>
            <span class="error-message"><?php echo isset($errors['email']) ? htmlspecialchars($errors['email']) : ''; ?></span> <!-- Message d'erreur -->

            <!-- Champ mot de passe -->
            <input type="password" name="password" id="password" placeholder="6 characters minimum" required>
            <span class="error-message"><?php echo isset($errors['password']) ? htmlspecialchars($errors['password']) : ''; ?></span> <!-- Message d'erreur -->
            
            <!-- Champ mot de confirmation de mot de passe  -->
            <input type="password" name="password_confirm" id="password_confirm" placeholder="6 characters minimum" required>
            <span class="error-message"><?php echo isset($errors['password_confirm']) ? htmlspecialchars($errors['password_confirm']) : ''; ?></span> <!-- Message d'erreur -->
            
            <button type="submit" name="inscription" id="inscription">Sign up</button>

            <!-- Message d'erreur général ou succès -->
            <p class="message"><?php echo htmlspecialchars($message); ?></p>

            <p>Already have an account? <a href="login.php">Sign in</a></p>
        </form>
    </div>
    
    <!-- Image -->
    <div class="image-part">
        <img src="images/postit.jpg" alt="Inscription Image" class="inscription-image">
    </div>
</div>
<!-- Ajout du fichier javascriipt -->
<script src="js/inscription.js"></script>

<?php
    require_once __DIR__.'/layouts/footer.php';
?>