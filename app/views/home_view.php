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
                        <a class="card-text text-center text-white text-decoration-none" href="#">
                            <i class="bi bi-plus">New post-it</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ligne qui contiendra les post-it partagés et propriétaires -->
        <div class="row row-cols-8 row-cols-sm-8 row-cols-md-8 g-2 mt-4">

            <!-- Colonne mes post-it   -->
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 offset-4 offset-sm-3 offset-md-3 offset-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text libelle">
                            <p> My Post-Its</p>
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
                                <tr>
                                <th scope="row">1</th>
                                <td>Anniv</td>
                                <td>11-04-2025</td>
                                <td>23-03-2025</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Courses</td>
                                <td>01-01-2024</td>
                                <td>12-03-2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    



                <!-- Colonne post-it partagés   -->
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Voyage</td>
                                        <td>11-04-2025</td>
                                        <td>23-03-2025</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Médicaments à acheter</td>
                                        <td>01-01-2024</td>
                                        <td>12-03-2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

    </div>

<?php
    require_once __DIR__.'/layouts/footer.php';
?>