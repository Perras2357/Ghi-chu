<?php
    require_once __DIR__.'/layouts/head.php';
    require_once __DIR__.'/layouts/_nav.php' ;
?>


    <div class="main-content" style="margin-left: 250px; height: 100vh; overflow-y: auto;">
        <div class="container py-4">
            <div class="row row-cols-8 row-cols-sm-8 row-cols-md-8 g-2 mt-4">
                
                <!-- Contenu à dupliquer -->
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center">
                        <div class="card shadow-sm mt-3">
                            <form method="POST">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0"><?= $postitshare->title ?></h5>
                                </div>
                                <div class="card-body text-center">
                                    <p class="card-text">
                                        <?= $postitshare->content ?>
                                    </p>
                                        <small class="text-muted"><?= $postitshare->date_create_postit?></small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- Duplique d'autres <div class="col">...</div> pour tes autres post-its -->
                

                        



                    </div>
                </div>
            </div>
        </div>

                           


    </div>


 

    <script src="js/create_post_it.js"></script>
                           
<?php
    require_once __DIR__.'/layouts/footer.php';
?>