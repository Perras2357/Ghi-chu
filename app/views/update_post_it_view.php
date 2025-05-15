<?php
    require_once __DIR__.'/layouts/head.php';
?>


    <div class="container">
        <div class="row">
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center mb-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-text">
                        <form method="POST">
                            <legend>Modifier Post-It</legend>

                            <!-- Partie titre -->
                            <div class="col-md-6 offset-md-3 mb-3 form-floating">
                                <input type="text" id="title" name="title" class="form-control"
                                        value="<?= htmlspecialchars($postit_one->title) ?>" required>
                                <label for="title_id">Title</label>
                            </div>
                            <div class="error-message" id="errorTitle"></div>

                            <!-- Partie Contenue -->
                            <div class="col-md-8 offset-md-2 mb-3 form-floating">
                                <textarea id="content" name="content" rows="6" class="form-control" required><?= htmlspecialchars($postit_one->content) ?></textarea>
                                <label for="content_id">Content  of post-it...</label>
                            </div>
                            <div class="error-message" id="errorContent"></div>

                            
                            <!-- Partie couleur -->
                            <div class="col-md-4 offset-md-4 mb-3 form-floating">
                                <button class="btn btn-lg btn-primary" type="submit" name="update" id="submit_id">Modifier</button>
                            </div>
                            <div class="error-message" id="errorForm"></div>
                            <?php if (isset($error)): ?>
                                <div class="error-message" style="color: red;">
                                    <?php echo $error; ?>
                                </div>
                                <?php unset($error); // Supprimer l'erreur après l'affichage ?>
                            <?php endif; ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <script src="js/create_post_it.js"></script>
                           
<?php
    require_once __DIR__.'/layouts/footer.php';
?>