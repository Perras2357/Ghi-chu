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
                                            <li><a class="dropdown-item" href="#">Modifier</a></li>
                                            <li>
                                                <button class="btn dropdown-item" type="button" id="collapseForm">
                                                    <i class="bi bi-share"></i>
                                                    Partager
                                                </button>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Supprimer</a></li>
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

                <?= include("_shared_view.php"); ?>

            </div>
        </div>

        <!-- section du formulaire de recherche d'un utilisateur -->
        <div class="container py-4">
            <div class="row row-cols-8 row-cols-sm-8 row-cols-md-8 g-2 mt-4">
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center">
                    <div class="card shadow-sm mt-3">

                    <input type="text" id="search-user" placeholder="Rechercher un utilisateur...">

                    <table id="users-table">
                        <thead>
                            <tr><th>mail</th><th>Nom</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr data-id="<?= $user['id'] ?>" data-name="<?= $user['name'] ?>">
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><button class="select-user">Sélectionner</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h3>Utilisateurs sélectionnés</h3>
                    <table id="selected-users">
                        <thead>
                            <tr><th>mail</th><th>Nom</th></tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <script>
                        $(document).ready(function(){

                            // Recherche en live
                            $('#search-user').on('input', function(){
                                const query = $(this).val().toLowerCase();

                                $('#users-table tbody tr').each(function(){
                                    const name = $(this).data('name');
                                    $(this).toggle(name.includes(query));
                                });
                            });

                            // Sélection d'un utilisateur
                            $('#users-table').on('click', '.select-user', function(){
                                const row = $(this).closest('tr');
                                const id = row.data('id');
                                const name = row.find('td:nth-child(2)').text();

                                if ($('#selected-users tbody tr[data-id="'+id+'"]').length === 0) {
                                    $('#selected-users tbody').append(
                                        `<tr data-id="${id}"><td>${id}</td><td>${name}</td></tr>`
                                    );
                                }
                            });
                        });
                    </script>







                    </div>
                </div>
            </div>
        </div>

                           


    </div>


 

    <script src="js/create_post_it.js"></script>
                           
<?php
    require_once __DIR__.'/layouts/footer.php';
?>