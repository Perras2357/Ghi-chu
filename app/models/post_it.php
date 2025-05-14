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

    //function qui modifie un post-it
    function updatePostItContent($id_postit, $new_content, $id_user)
{
    global $db;

    // Vérification : nombre minimal/maximal de caractères
    $minLength = 1;
    $maxLength = 500;
    $new_content = trim($new_content);

    if (strlen($new_content) < $minLength || strlen($new_content) > $maxLength) {
        return ['success' => false, 'error' => "Le contenu doit contenir entre $minLength et $maxLength caractères."];
    }

    // Récupère le post-it existant
    $sql = "SELECT content FROM postit WHERE id_postit = ? AND id_user = ? AND flag_delete = 0";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_postit, $id_user]);
    $postit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$postit) {
        return ['success' => false, 'error' => "Post-it introuvable ou non autorisé."];
    }

    // Vérifie si le contenu a changé
    if ($postit['content'] === $new_content) {
        return ['success' => false, 'error' => "Aucun changement détecté dans le contenu."];
    }

    // Mise à jour du contenu
    $sql = "UPDATE postit SET content = ?, date_modification = NOW() WHERE id_postit = ? AND id_user = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$new_content, $id_postit, $id_user]);

    return ['success' => $success];
}







?>