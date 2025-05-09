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
        global $db;

        // On vérifie si le titre exixte déjà dans la base de données
        $sql = "SELECT * FROM postit WHERE id_user = ? AND title = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_user, $title]);
        $title_postit = $stmt->fetch();
        // Si le titre existe déjà on ajoute un suffixe
        if ($title_postit) 
        {
            //je rajoute un suffixe -copie
            $title = $title."-copie";
        }

        // requette preparé pour insérer un post-it dans la base de données
        $sql = "INSERT INTO postit (title, content, id_user) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);

        // Exécuter la requête avec les valeurs fournies
        $stmt->execute([$title, $content, $id_user]);
        
        // Vérifier si l'insertion a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur d'insertion
            return 0;
        }
    
        // Récupérer l'ID du post-it créé
        $id_postit = $db->lastInsertId();
        // Retourner l'ID du post-it créé
        return $id_postit;
    }

    // Fonction qui permet de récupérer tous les post-it d'un utilisateur
    function getAllPostIt($id_user) 
    {
        global $attributs;
        global $db;

        // Requête préparée pour récupérer tous les post-its d'un utilisateur
        $sql = "SELECT * FROM postit WHERE id_user = ? AND flag_delete = 0";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_user]);

        // Récupérer tous les résultats
        $postits = $stmt->fetchAll();

        // Retourner les résultats
        return $postits;
    }

    // Fonction qui permet de récupérer un post-it partagé
    function getPostItShared($id_user) 
    {
        global $attributs;
        global $db;

        // Requête préparée pour récupérer tous les post-its partagés d'un utilisateur
        $sql = "SELECT * FROM share WHERE id_user = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_user]);

        // Récupérer tous les résultats
        $postits_share = $stmt->fetchAll();

        // Retourner les résultats
        return $postits_share;
    }





?>