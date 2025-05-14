<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion | Ghi Chú</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>

  <div class="container">
    <div class="left">
      <img src="../public/images/logo_fond_blanc.png" alt="Logo Ghi Chú" class="logo">

      <div class="form-wrapper">
        <h1>Bienvenue</h1>
        <p>Entrez vos informations de connexion</p>

        
        <form action="index.php?r=login" method="POST" id="login-form">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($mail ?? '') ?>" required>
            <div id="email-error" class="error-message"><?= $error_email ?? '' ?></div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div id="password-error" class="error-message"><?= $error_password ?? '' ?></div>
          </div>

          <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?= $error_message ?></div>
          <?php endif; ?>

          <div class="forgot">
            <a href="#">Forgot Password</a>
          </div>

          <button type="submit" class="signin-btn">Sign in</button>

          <div class="signup">
            Don't have an account ? <a href="index.php?r=register">Sign up</a>
          </div>
        </form>
      </div>
    </div>

    <div class="right"></div>
  </div>

  <script src="../public/js/login.js"></script>
</body>
</html>
