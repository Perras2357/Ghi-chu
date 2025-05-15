<?php
    // Inclure le head si nécessaire
    // require_once __DIR__.'/layouts/head.php';
?>

<link rel="stylesheet" href="css/inscription.css">
<div class="form-container">
  <!-- Formulaire -->
  <div class="form-box">
    <img src="images/logo_fond_blanc.png" class="logo" alt="Logo Ghi Chu">

    <!-- UN seul FORM avec id et novalidate -->
   <?php $hasError = !empty($errors) ? ' error-all' : ''; ?>
<form id="inscriptionForm"
      class="<?= $hasError ?>"
      method="POST"
      novalidate>

      <h2>Welcome</h2>
      <p>Please enter your details</p>

      <!-- Champ Prénom -->
      <div class="field-group<?= isset($errors['prenom']) ? ' error' : '' ?>" id="group-prenom">
        <input
          type="text"
          name="prenom"
          id="prenom"
          placeholder="First Name"
          value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>"
          required
        >
        <span class="error-message">
          <?= htmlspecialchars($errors['prenom'] ?? '') ?>
        </span>
      </div>

      <!-- Champ Nom -->
      <div class="field-group<?= isset($errors['nom']) ? ' error' : '' ?>" id="group-nom">
        <input
          type="text"
          name="nom"
          id="nom"
          placeholder="Last Name"
          value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
          required
        >
        <span class="error-message">
          <?= htmlspecialchars($errors['nom'] ?? '') ?>
        </span>
      </div>

      <!-- Champ date de naissance -->
      <div class="field-group<?= isset($errors['naissance']) ? ' error' : '' ?>" id="group-naissance">
        <input
          type="texte"
          name="naissance"
          id="naissance"
          placeholder="AAAA/MM/JJ"
          value="<?= htmlspecialchars($_POST['naissance'] ?? '') ?>"
          required
        >
        <input type="hidden" name="naissance" id="naissance" value="<?= htmlspecialchars($_POST['naissance'] ?? '') ?>">
        <span class="error-message">
          <?= htmlspecialchars($errors['naissance'] ?? '') ?>
        </span>
      </div>

      <!-- Champ email -->
      <div class="field-group<?= isset($errors['email']) ? ' error' : '' ?>" id="group-email">
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Email address"
          value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
          required
        >
        <span class="error-message">
          <?= htmlspecialchars($errors['email'] ?? '') ?>
        </span>
      </div>

      <!-- Champ mot de passe -->
      <div class="field-group<?= isset($errors['password']) ? ' error' : '' ?>" id="group-password">
        <input
          type="password"
          name="password"
          id="password"
          placeholder="6 characters minimum"
          required
        >
        <span class="error-message">
          <?= htmlspecialchars($errors['password'] ?? '') ?>
        </span>
      </div>
      
      <!-- Champ confirmation mot de passe -->
      <div class="field-group<?= isset($errors['password_confirm']) ? ' error' : '' ?>" id="group-password_confirm">
        <input
          type="password"
          name="password_confirm"
          id="password_confirm"
          placeholder="6 characters minimum"
          required
        >
        <span class="error-message">
          <?= htmlspecialchars($errors['password_confirm'] ?? '') ?>
        </span>
      </div>
      
      <button type="submit" name="inscription" id="inscription">Sign up</button>

      <!-- Message d'erreur général ou succès -->
      <p class="message"><?= htmlspecialchars($message) ?></p>

      <p>Already have an account? <a href="login.php">Sign in</a></p>
    </form>
  </div>
  
  <!-- Image -->
  <div class="image-part">
    <img src="images/postit.jpg" alt="Inscription Image" class="inscription-image">
  </div>
</div>

<!-- Ajout du fichier javascript -->
<script src="js/inscription.js"></script>

<?php
    require_once __DIR__.'/layouts/footer.php';
?>
