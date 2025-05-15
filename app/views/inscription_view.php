<?php
// require_once __DIR__ . '/layouts/head.php';
?>
<link rel="stylesheet" href="css/inscription.css">

<div class="form-container">
  <div class="form-box">
    <img src="images/logo_fond_blanc.png" class="logo" alt="Logo Ghi Chu">

    <?php $hasError = !empty($errors) ? ' error-all' : ''; ?>
    <form id="inscriptionForm" class="<?= $hasError ?>" method="POST" novalidate>
      <h2>Welcome</h2>
      <p>Please enter your details</p>

      <!-- Prénom -->
      <div class="field-group<?= isset($errors['prenom']) ? ' error' : '' ?>">
        <input
          type="text"
          name="prenom"
          id="prenom"
          placeholder="First Name"
          value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['prenom'] ?? '') ?></span>
      </div>

      <!-- Nom -->
      <div class="field-group<?= isset($errors['nom']) ? ' error' : '' ?>">
        <input
          type="text"
          name="nom"
          id="nom"
          placeholder="Last Name"
          value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['nom'] ?? '') ?></span>
      </div>

      <!-- Date de naissance (AAAA/MM/JJ) -->
      <div class="field-group<?= isset($errors['naissance']) ? ' error' : '' ?>">
        <input
          type="text"
          name="naissance"
          id="naissance"
          placeholder="AAAA/MM/JJ"
          value="<?= htmlspecialchars($_POST['naissance'] ?? '') ?>"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['naissance'] ?? '') ?></span>
      </div>

      <!-- Email -->
      <div class="field-group<?= isset($errors['email']) ? ' error' : '' ?>">
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Email address"
          value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['email'] ?? '') ?></span>
      </div>

      <!-- Mot de passe -->
      <div class="field-group<?= isset($errors['password']) ? ' error' : '' ?>">
        <input
          type="password"
          name="password"
          id="password"
          placeholder="6 characters minimum"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['password'] ?? '') ?></span>
      </div>

      <!-- Confirmation mot de passe -->
      <div class="field-group<?= isset($errors['password_confirm']) ? ' error' : '' ?>">
        <input
          type="password"
          name="password_confirm"
          id="password_confirm"
          placeholder="6 characters minimum"
          required
        >
        <span class="error-message"><?= htmlspecialchars($errors['password_confirm'] ?? '') ?></span>
      </div>

      <button type="submit" name="inscription" id="inscription">Sign up</button>
      <p class="message"><?= htmlspecialchars($message) ?></p>
      <p>Already have an account? <a href="login.php">Sign in</a></p>
    </form>
  </div>

  <div class="image-part">
    <img src="images/postit.jpg" alt="Inscription Image" class="inscription-image">
  </div>
</div>

<script src="js/inscription.js"></script>
<?php
// require_once __DIR__ . '/layouts/footer.php';
?>