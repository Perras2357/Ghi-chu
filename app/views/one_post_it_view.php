<?php
    require_once __DIR__.'/layouts/head.php';
?>


    <div class="main-content">
        <div class="container py-4">
            <div class="row row-cols-8 row-cols-sm-8 row-cols-md-8 g-2 mt-4">
                
                <!-- Contenu à dupliquer -->
                 <?php if(!empty($postit_one)): ?>
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center">
                        <div class="card shadow-sm mt-3">
                            <form method="POST">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0"><?= $postit_one->title ?></h5>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        style="cursor: pointer;"></i>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="index.php?r=update_post_it&id_postit=<?= $postit->id_postit ?>">Modifier</a></li>
                                            <li><a class="dropdown-item" href="#">Partager</a></li>
                                            <li><a class="dropdown-item" href="#">Supprimer</a></li>
                                            <li><a class="dropdown-item" href="index.php?r=new_version_post_it&id_postit=<?= $postit->id_postit ?>">New version</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <p class="card-text">
                                        <?= $postit_one->content ?>
                                    </p>
                                        <div class="btn-group"> 
                                            <button type="submit" name="delete" value="<?= $postit_one->id_postit ?>" class="btn btn-sm btn-outline-secondary">Delete</button>
                                                <!-- A retraiter en JavaScriot -->
                                            <?php 
                                                if(!empty($error))
                                                {
                                                    echo '<div class="error-message" style="color: red;">';
                                                    echo $error;
                                                    echo '</div>';    
                                                }
                                            ?>
                                        </div>
                                        <small class="text-muted"><?= $postit_one->date_create_postit ?></small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Duplique d'autres <div class="col">...</div> pour tes autres post-its -->

            </div>
        </div>
    </div>


 

    <script src="js/create_post_it.js"></script>
                           
<?php
    require_once __DIR__.'/layouts/footer.php';
?>