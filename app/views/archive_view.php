<?php
    require_once __DIR__.'/layouts/head.php';
?>


    <div class="main-content" style="margin-left: 260px;">
        <div class="container py-4" style="margin-left: 250px; height: 100vh; overflow-y: auto;">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                
                <!-- Contenu à dupliquer -->
                <?php if(!empty($potits_archives)): ?>
                    <?php foreach($potits_archives as $postit): ?>

                        <div class="col">
                            <div class="card shadow-sm mt-3">
                                <form method="POST">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0"><?= $postit->title ?></h5>
                                        <!-- <div class="dropdown">
                                            <i class="bi bi-three-dots-vertical"
                                            role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            style="cursor: pointer;"></i>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="index.php?r=shared&id_postit=<?= $postit->id_postit ?>">Partager</a></li>
                                                <li><a class="dropdown-item" href="index.php?r=one_post_it&id_postit=<?= $postit->id_postit ?>">view more</a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group center">
                                                <div class="col-md-4 ">
                                                    <button type="submit" name="delete_permanently" value="<?= $postit->id_postit ?>" class="btn btn-sm btn-outline-danger">permanently delete</button>
                                                </div>
                                                <div class="col-md-4 offset-md-4">
                                                    <button type="submit" name="restore" value="<?= $postit->id_postit ?>" class="btn btn-sm btn-outline-primary offset">restore</button>
                                                </div>

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
                                            <small class="text-muted"><?= $postit->date_modification ?></small>
                                        </div>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- Duplique d'autres <div class="col">...</div> pour tes autres post-its -->

            </div>
        </div>
    </div>


 

    <script src="js/create_post_it.js"></script>
                           
<?php
    require_once __DIR__.'/layouts/footer.php';
?>