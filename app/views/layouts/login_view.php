<!-- views/login.php -->
<!-- View hiển thị form đăng nhập. Đặt file này trong thư mục views. -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Connexion</title>
  <link rel="stylesheet" href="css/login.css" />
</head>
<body>
  <div class="login-container">
    <h2>Connexion</h2>
    <!-- Thông báo lỗi từ server (nếu có) -->
    <?php if (!empty($error_message)): ?>
      <p class="error-msg"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <?php if (!empty($error_email)): ?>
      <p class="error-msg"><?php echo $error_email; ?></p>
    <?php endif; ?>
    <?php if (!empty($error_password)): ?>
      <p class="error-msg"><?php echo $error_password; ?></p>
    <?php endif; ?>

    <!-- Form Đăng nhập -->
    <form id="loginForm" action="" method="post">
      <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required />
        <span id="email-error" class="error-field"></span>
      </div>
      <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required />
        <span id="password-error" class="error-field"></span>
      </div>
      <button type="submit">Se connecter</button>
    </form>

    <!-- Link Quên mật khẩu / Đăng ký -->
    <div class="links">
      <a href="index.php?page=forgot_password">Mot de passe oublié&nbsp;?</a><br />
      <a href="index.php?page=register">Créer un compte</a>
    </div>
  </div>

  <!-- Nhúng file JavaScript kiểm tra form -->
  <script src="js/login.js"></script>
</body>
</html>
