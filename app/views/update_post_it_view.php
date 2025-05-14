<?php require_once __DIR__.'/layouts/head.php'; ?>

<div class="main-content">
    <div class="container py-4">
        <div class="row justify-content-center">
            <?php if (!empty($postit_one)): ?>
                <div class="col-md-8">
                    <div class="card shadow-sm mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0"><?= htmlspecialchars($postit_one->title) ?></h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire de modification du contenu -->
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu du post-it</label>
                                    <textarea name="content" id="content" class="form-control" rows="6" required><?= htmlspecialchars($postit_one->content) ?></textarea>
                                </div>
                                <input type="hidden" name="id_postit" value="<?= htmlspecialchars($postit_one->id_postit) ?>">
                                <button type="submit" name="update" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>

                            <!-- Affichage des messages -->
                            <?php if (isset($message)): ?>
                                <div class="alert alert-success mt-3"><?= htmlspecialchars($message) ?></div>
                            <?php elseif (isset($error)): ?>
                                <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-muted text-end">
                            Créé le : <?= htmlspecialchars($postit_one->date_create_postit) ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-8">
                    <div class="alert alert-warning text-center">Aucun post-it trouvé.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="js/create_post_it.js"></script>
<?php require_once __DIR__.'/layouts/footer.php'; ?>
