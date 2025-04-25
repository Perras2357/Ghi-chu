<?php
    require_once __DIR__.'/layouts/head.php';
?>

    <div class="container p-3">

        <!-- Ligne qui contiedra uniquement l'ajout de post-it -->
        <div class="row row-cols-6 row-cols-sm-6 row-cols-md-6 g-2">
            <!-- Colonne unique   -->
            <div class="col-5 col-sm-4 col-md-2 col-lg-2 offset-4 offset-sm-2 offset-md-2 offset-lg-2">
                <div class="card">
                    <div class="card-body plus">
                        <a class="card-text text-center text-white text-decoration-none" href="index.php?r=create_post_it">
                            <i class="bi bi-plus">New post-it</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ligne qui contiendra les post-it partagés et propriétaires -->
        <div class="row row-cols-8 row-cols-sm-8 row-cols-md-8 g-2 mt-4">
            <!-- Colonne mes post-it   -->
                <?php if(!empty($postits_home)): ?>

                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center mb-5">
                        <div class="card">
                            <div class="card-body">
                                <a class="text-center text-decoration-none" href="index.php?r=my_post_it">
                                    <div class="card-text libelle">
                                        <p> My Post-Its</p>
                                    </div>
                                </a>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Date-create</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; ?>  <!--pour le numéro de ligne -->
                                        <?php foreach ($postits_home as $postit): ?>
                                            <tr>
                                                <th scope="row"> <?=$i++ ?> </th> <!-- post incrementation -->
                                                <td>
                                                    <a class="text-black text-decoration-none" href="index.php?r=test&id_postit=<?= $postit->id_postit ?>">
                                                        <?= $postit->title ?></td>
                                                    </a>
                                                <td><?= $postit->date_create_postit ?></td>
                                                <td><?= $postit->date_modification ?></td>
                                            </tr>
                                            </a>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                    
                <?php endif; ?>   

<<<<<<< HEAD


            <!-- Colonne post-it partagés   -->
            <?php if(!empty($postits_shared_home)): ?>
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <p class='libelle2'> Post-Its shared</p>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Date-create</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>  <!--pour le numéro de ligne -->
                                    <?php foreach ($postits_shared_home as $postit_shared): ?>
                                        <tr>
                                            <th scope="row"> <?=$i++ ?> </th> <!-- post incrementation -->
                                            <td><?= $postit_shared->title ?></td>
                                            <td><?= $postit_shared->date_create_postit ?></td>
                                            <td><?= $postit_shared->date_modification ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>

    </div>
=======
<!-- 
    <div class="container">
        <h1>Bienvenue sur notre site !</h1>
        <p>Nous sommes ravis de vous accueillir.</p>
        <p>Explorez nos fonctionnalités et n'hésitez pas à nous contacter si vous avez des questions.</p>
        <p>Nous vous souhaitons une excellente expérience sur notre site !</p>
    </div> -->
>>>>>>> 9455623 (mise en forme des liens pour qu'ils ressemblent à : chu/public/index.php?r=XXX avec XXX=le nom du controller associé controllers/XXX.php)

<?php
    require_once __DIR__.'/layouts/footer.php';
?>