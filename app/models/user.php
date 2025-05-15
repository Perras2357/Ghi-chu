<?php
    // *********************************** Vérification des identifiants (mail + mot de passe) **********************************
    function checkUserCredentials($email, $password) {
        global $db;

        $sql = "SELECT * FROM user WHERE mail = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return ["status" => false, "message" => "no_account"];
        }

        if ($password != $user['password']) {
            return ["status" => false, "message" => "wrong_password"];
        }
        return ["status" => true, "user" => $user];
    }

    function findUserByEmail($email) {
        global $db; 
        
        $sql = "SELECT * FROM user WHERE mail = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return ["status" => false, "message" => "no_account"];
        }
        return ["status" => true, "user" => $user];
    }

?>