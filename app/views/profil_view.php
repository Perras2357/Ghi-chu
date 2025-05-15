<?php require_once __DIR__.'/layouts/head.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center mb-5">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="card-text">
                        <form method="POST" id="profileForm">
                            <legend class="d-flex justify-content-center align-items-center gap-2">
                                Mon profil
                                <i class="bi bi-pencil-square" id="editIcon" style="cursor: pointer;" title="Modifier"></i>
                            </legend>

                            <!-- Prénom -->
                            <div class="col-md-6 offset-md-3 mb-3 form-floating">
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                    value="<?= htmlspecialchars($user['first_name']) ?>" readonly required>
                                <label for="first_name">Prénom</label>
                            </div>

                            <!-- Nom -->
                            <div class="col-md-6 offset-md-3 mb-3 form-floating">
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                    value="<?= htmlspecialchars($user['last_name'] ?? '') ?>" readonly required>
                                <label for="last_name">Nom</label>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 offset-md-3 mb-3 form-floating">
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?= htmlspecialchars($user['mail']) ?>" readonly required
                                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+">
                                <label for="email">Email</label>
                            </div>

                            <!-- Bouton (masqué au départ) -->
                            <div class="col-md-4 offset-md-4 mb-3" id="submitContainer" style="display: none;">
                                <button class="btn btn-lg btn-success" type="submit" name="update_profile">
                                    Valider les modifications
                                </button>
                            </div>

                            <!-- Messages -->
                            <?php if (isset($message)): ?>
                                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
                            <?php endif; ?>

                            <?php if (isset($error)): ?>
                                <div class="error-message" style="color: red;"><?= htmlspecialchars($error) ?></div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistiques utilisateur -->
<div class="row mt-5">
    <div class="col-8 offset-4 text-center">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Post-its créés</h5>
                        <p class="card-text fs-4"><?= $stats['postit_total'] ?? 0 ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">¨Post-It Partagé(s)</h5>
                        <p class="card-text fs-4"><?= $stats['shared_total'] ?? 0 ?></p>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JS pour activer les champs -->
<script>
    document.getElementById('editIcon').addEventListener('click', () => {
        const inputs = document.querySelectorAll('#profileForm input');
        inputs.forEach(input => input.removeAttribute('readonly'));

        document.getElementById('submitContainer').style.display = 'block';
    });
</script>

<script src="js/create_post_it.js"></script>
<?php require_once __DIR__.'/layouts/footer.php'; ?>
