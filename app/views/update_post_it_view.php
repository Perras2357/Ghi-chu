<?php require_once __DIR__.'/layouts/head.php'; ?>

<style>
  /* Supprime les ascenseurs et empêche le redimensionnement */
  .no-scroll {
    resize: none;
    overflow: hidden;
  }
</style>

<div class="container">
  <div class="row justify-content-center">
    <?php if (!empty($postit_one)): ?>
      <div class="col-8 col-sm-8 col-md-6 col-lg-6 text-center mb-5">
        <div class="card mt-5 shadow-sm">
          <div class="card-body">
            <form method="POST" action="">
              <legend>Modifier le post-it</legend>
              <div class="col-md-10 offset-md-1 mb-3 form-floating">
                <input
                  type="text"
                  class="form-control"
                  name="title"
                  id="title"
                  placeholder="Titre du post-it"
                  maxlength="15"
                  value="<?= htmlspecialchars($postit_one->title) ?>"
                  required
                >
                <label for="title">Titre du post-it</label>
              </div>
              <div class="error-message" id="errorTitle"></div>

              
              <div class="col-md-10 offset-md-1 mb-3 form-floating">
                <textarea
                  class="form-control no-scroll"
                  name="content"
                  id="content"
                  placeholder="Contenu du post-it"
                  maxlength="150"
                  rows="1"
                  required
                  oninput="
                    this.style.height='auto';
                    this.style.height=(this.scrollHeight)+'px';
                  "
                ><?= htmlspecialchars($postit_one->content) ?></textarea>
                <label for="content">Contenu du post-it</label>
              </div>
              <div class="error-message" id="errorContent"></div>

              
              <input type="hidden" name="id_postit" value="<?= htmlspecialchars($postit_one->id_postit) ?>">

              
              <div class="col-md-6 offset-md-3 mb-3 form-floating">
                <button
                  class="btn btn-lg btn-primary w-100"
                  type="submit"
                  name="update"
                  id="submit_id"
                >
                  Enregistrer les modifications
                </button>
              </div>
              <div class="error-message" id="errorForm"></div>

              <?php if (isset($message)): ?>
                <div class="alert alert-success mt-3"><?= htmlspecialchars($message) ?></div>
              <?php elseif (isset($error)): ?>
                <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
              <?php endif; ?>

            </form>
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

<script src="js/create_post_it.js"></script>
<?php require_once __DIR__.'/layouts/footer.php'; ?>
