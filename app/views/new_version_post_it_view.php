<?php require_once __DIR__.'/layouts/head.php'; ?>
<link rel="stylesheet" href="css/new_version.css">

<div class="main-content">
    <div class="container py-4">
        <div class="row justify-content-center">
            <?php if (!empty($postit_one)): ?>
                <div class="col-md-8">
                    <div class="card shadow-sm mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Créer une nouvelle version</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="<?= htmlspecialchars($postit_one->title) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu</label>
                                    <textarea id="content" name="content" rows="6" class="form-control" required><?= htmlspecialchars($postit_one->content) ?></textarea>
                                </div>
                                <button type="submit" name="create_version" class="btn btn-success">Créer la nouvelle version</button>
                            </form>

                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-8">
                    <div class="alert alert-warning text-center">Aucun post-it à dupliquer trouvé.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="js/create_post_it.js"></script>
<?php require_once __DIR__.'/layouts/footer.php'; ?>