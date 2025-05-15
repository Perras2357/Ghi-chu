
<?php require_once __DIR__.'/layouts/head.php'; ?>
<link rel="stylesheet" href="../public/css/login.css">

  <div class="container">
    <div class="left">
      <img src="../public/images/logo_fond_blanc.png" alt="Logo Ghi Chú" class="logo">

      <div class="form-wrapper">
        <h1>Welcome</h1>
        <p>Please enter your details</p>

        
        <form action="index.php?r=login" method="POST" id="login-form">
          <div class="form-group">
            <label for="email">Email address</label>
            <!-- <input type="email" id="email" name="email" value="</?= htmlspecialchars($mail ?? '') ?>" required>
            <div id="email-error" class="error-message"></?= $error_email ?? '' ?></div> -->
            <input type="email" name="email" id="email" placeholder="Email address" required>
            <span class="error-message"><?php echo isset($errors['email']) ? htmlspecialchars($errors['email']) : ''; ?></span> 
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <!-- <input type="password" id="password" name="password" required>
            <div id="password-error" class="error-message"></?= $error_password ?? '' ?></div> -->
            <input type="password" name="password" id="password" placeholder="6 characters minimum" required>
            <span class="error-message"><?php echo isset($errors['password']) ? htmlspecialchars($errors['password']) : ''; ?></span>
          </div>

          <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?= $errors ?></div>
          <?php endif; ?>


          <div class="forgot">
            <a href="index.php?r=forgot_password">Forgot Password</a>
          </div>

          <button type="submit" name='submit_button' class="signin-btn">Sign in</button>

          <div class="signup">
            Don't have an account ? <a href="index.php?r=inscription_controller">Sign up</a>
          </div>
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

  <script src="../public/js/login.js"></script>
  <?php require_once __DIR__.'/layouts/footer.php'; ?>

