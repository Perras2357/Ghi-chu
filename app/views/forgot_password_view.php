
<?php require_once __DIR__.'/layouts/head.php'; ?>
<link rel="stylesheet" href="../public/css/forgot_password.css">

  <div class="container">
    <div class="left">
      <img src="../public/images/logo_fond_blanc.png" alt="Logo Ghi Chú" class="logo">

      <div class="form-wrapper">
        <h1>Reset Password</h1>
        <p>Enter the email associated with your account and we’ll send an email with instructions to reset your password.</p>

        
        <form action="index.php?r=forgot_password" method="POST" id="forgot-password-form">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" placeholder="Email address" required>
            <span class="error-message"><?php echo isset($errors['email']) ? htmlspecialchars($errors['email']) : ''; ?></span> 
          </div>

          <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?= $errors ?></div>
          <?php endif; ?>


          <div class="login">
            <a href="index.php?r=login">Return to the login page</a>
          </div>

          <button type="submit" name='submit_button' class="forgot-password-btn">Send instructions</button>

        </form>
      </div>
    </div>

    <!-- <div class="right"></div> -->
    <div class="right" style="
      background-image: url('../public/images/postit.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;">
    </div>
  </div>

  <script src="../public/js/forgot_password.js"></script>
  <?php require_once __DIR__.'/layouts/footer.php'; ?>

