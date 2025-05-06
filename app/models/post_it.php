<?php

    // ***************************************** Model pour la gestion des post-its**********************************************************

    // Tableau des attributs du post-it
    $attributs = [
        'id_postit',
        'id_user',
        'title',
        'content',
        'flag_delete',
        'date_create_postit',
        'date_modification',
        'date_delete_postit',   
    ];

    // Fonction pour créer un post-it
    function createPostIt($title, $content, $id_user) 
    {
        global $attributs;

        // requette preparé pour insérer un post-it dans la base de données
        $sql = "INSERT INTO post_it (title, content, id_user) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        // Exécuter la requête avec les valeurs fournies
        $stmt->execute([$title, $content, $id_user]);
        
        // Vérifier si l'insertion a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur d'insertion
            return 0;
        }
    
        // Récupérer l'ID du post-it créé
        $id_postit = $this->db->lastInsertId();
        // Retourner l'ID du post-it créé
        return $id_postit;

    }





?>