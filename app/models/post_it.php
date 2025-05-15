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
        $sql = "SELECT * FROM postit WHERE id_user = ? AND flag_delete = 0 ORDER BY date_modification DESC";
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
        $sql = "SELECT * FROM share WHERE id_user = ? ORDER BY date_share DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_user]);

        // Récupérer tous les résultats
        $postits_share = $stmt->fetchAll();

        // Retourner les résultats
        return $postits_share;
    }


    //fonction post-it archivé 
    function getPostItArchived($id_user) 
    {
        global $attributs;
        global $db;

        // Requête préparée pour récupérer tous les post-its archivés d'un utilisateur
        $sql = "SELECT * FROM postit WHERE id_user = ? AND flag_delete = 1 ORDER BY date_delete_postit DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_user]);

        // Récupérer tous les résultats
        $postits_archived = $stmt->fetchAll();

        // Retourner les résultats
        return $postits_archived;
    }

    //fonction qui permet d'archiver un post-it
    function archivePostIt($id_postit) 
    {
        global $db;

        // Requête préparée pour archiver un post-it
        $sql = "UPDATE postit SET flag_delete = 1 , date_delete_postit = NOW() WHERE id_postit = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_postit]);

        // Vérifier si la mise à jour a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur de mise à jour
            return 0;
        }
        else // Ajout dans la table historique
        {
            $id_user = 1;
            //On récupère les infos du postit
            // Requête préparée pour récupérer tous les post-its d'un utilisateur
            $sql = "SELECT * FROM postit WHERE id_postit = ? AND flag_delete = 1";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id_postit]);

            // Récupérer tous les résultats
            $postit = $stmt->fetch(PDO::FETCH_OBJ);

            
          
            $title = $postit->title;
            $content = $postit->content;
            $date_create_postit = $postit->date_create_postit;
            $date_delete_postit = $postit->date_delete_postit;
            var_dump($title);


            //requette preparé pour l'ajout dans la base de donnée 
            $sql = "INSERT INTO historic (id_postit, title, content, date_create_postit, date_delete_postit) VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

            // Exécuter la requête avec les valeurs fournies
            $stmt->execute([$id_postit, $title, $content, $date_create_postit, $date_delete_postit]);
            
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
        // Retourner 1 si la mise à jour a réussi
        return 1;
    }

    //fonction pour supprimer un post-it définitivement
    function deletePostIt($id_postit) 
    {
        global $db;

        // Requête préparée pour supprimer définitivement un post-it
        $sql = "DELETE FROM postit WHERE id_postit = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_postit]);

        // Vérifier si la suppression a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur de suppression
            return 0;
        }

        // Retourner 1 si la suppression a réussi
        return 1;
    }

    //fonction pour restaurer le post-it
    function restorePostIt($id_postit) 
    {
        global $db;

        // Requête préparée pour restaurer un post-it
        $sql = "UPDATE postit SET flag_delete = 0 , date_delete_postit = NULL WHERE id_postit = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_postit]);
        // Vérifier si la mise à jour a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur de mise à jour
            return 0;
        }
        // Retourner 1 si la mise à jour a réussi
        return 1;
    }

    // Fonction pour récupérer les utilisateurs
    function getAllUsers() 
    {
        global $db;

        // Requête préparée pour récupérer tous les utilisateurs
        $sql = "SELECT first_name, mail, id_user FROM user";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        // Vérifier si la requête a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur de récupération
            return 0;
        }

        // Récupérer tous les résultats
        $users = $stmt->fetchAll();

        // Retourner les résultats
        return $users;
    }

    //fonction qui récupère les utilisateurs avec qui on a partagé le post-it
    function getAllUsersShared($id_postit) 
    {
        global $db;

        $sql = "SELECT s.id_user, s.flag_write_learn, u.first_name, u.mail 
                FROM share s
                JOIN user u ON s.id_user = u.id_user
                WHERE s.id_postit = ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$id_postit]);

        // Vérifier si la requête a réussi
        if ($stmt->rowCount() == 0) {
            // Gérer l'erreur de récupération
            return 0;
        }

        return $stmt->fetchAll();
    }





?>