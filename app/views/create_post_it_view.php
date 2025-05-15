<?php
    require_once __DIR__.'/layouts/head.php';
?>


    <div class="container" style="margin-left: 250px; height: 100vh; overflow-y: auto;">
        <div class="row">
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center mb-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-text">
                        <form method="POST">
                            <legend>Create a new post-it</legend>

                            <!-- Partie titre -->
                            <div class="col-md-6 offset-md-3 mb-3 form-floating">
                                <input type="text" class="form-control" name="title_id" id="title_id" placeholder="Title" maxlength="150" required>
                                <label for="title_id">Title</label>
                            </div>
                            <div class="error-message" id="errorTitle"></div>

                            <!-- Partie Contenue -->
                            <div class="col-md-8 offset-md-2 mb-3 form-floating">
                                <textarea class="form-control" name="content_id" id="content_id" placeholder="content" maxlength="650" required></textarea>
                                <label for="content_id">Content  of post-it...</label>
                            </div>
                            <div class="error-message" id="errorContent"></div>

                            <!-- Checklist -->
                            <label class="form-label">Share with other users:</label>
                            <div class="list-group">
                                <?php foreach ($users_list as $user): ?>
                                    <label class="list-group-item">
                                        <input 
                                            type="checkbox" 
                                            name="shared_users[]" 
                                            value="<?= $user['id_user'] ?>" 
                                            class="form-check-input me-1">
                                        <?= $user['first_name'] ?> (<?= $user['mail'] ?>)
                                    </label>
                                <?php endforeach; ?>
                            </div>


                            


                            
                             <!-- Partie couleur -->
                            <div class="col-md-4 offset-md-4 mb-3 form-floating">
                                <button class="btn btn-lg btn-primary" type="submit" name="submit_id" id="submit_id">Create</button>
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