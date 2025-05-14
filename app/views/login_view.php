<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion | Ghi Chú</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body, html {
      height: 100%;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .left {
      flex: 1;
      background-color: #fff;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left h1 {
      margin-bottom: 10px;
      font-size: 2.2em;
    }

    .left p {
      margin-bottom: 30px;
      color: #666;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .forgot {
      text-align: right;
      margin-bottom: 20px;
    }

    .forgot a {
      text-decoration: none;
      font-size: 0.9em;
      color: #666;
    }

    .signin-btn {
      width: 100%;
      background-color: #8e44ad;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }

    .signin-btn:hover {
      background-color: #732d91;
    }

    .signup {
      margin-top: 15px;
      text-align: center;
    }

    .signup a {
      color: #8e44ad;
      text-decoration: none;
    }

    .right {
      flex: 1;
      background: url('../public/images/postit.jpg') no-repeat center center;
      background-size: cover;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .right {
        height: 200px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="left">
      <img src="../public/images/logo_fond_blanc.png" alt="Logo Ghi Chú" style="width: 100px; margin-bottom: 30px;">
      <h1>Welcome</h1>
      <p>Please enter your details</p>
      <form action="../../app/Controllers/login.php" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="forgot">
          <a href="#">Forgot Password</a>
        </div>
        <button type="submit" class="signin-btn">Sign in</button>
        <div class="signup">
          Don't have an account ? <a href="#">Sign up</a>
        </div>
      </form>
    </div>

    <div class="right"></div>
  </div>

</body>
</html>
