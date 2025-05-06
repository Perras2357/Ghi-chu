<?php
    // require_once __DIR__.'/layouts/head.php';
?>

    <link rel="stylesheet" href="css/inscription.css">
    <div class="form-container">
        <div class="form-box">
            <img src="images/logo_fond_blanc.png" class="logo" alt="Logo Ghi Chu">
            <form method="POST">
                <h2>Welcome</h2>
                <p>Please enter your details</p>
                <input type="text" name="prenom" placeholder="First Name" required>
                <input type="text" name="nom" placeholder="Last Name" required>
                <input type="date" name="naissance" placeholder="Date of birth" required>
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="8 characters minimum" required>
                <button type="submit">Sign up</button>
                <p class="message"><?php echo $message; ?></p>
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
        <div class="image-part">
            <img src="images/postit.jpg" alt="Inscription Image">
        </div>
    </div>






    

<?php
    require_once __DIR__.'/layouts/footer.php';
?>

