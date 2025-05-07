<?php 
/*if(function_exists('connexion')){
    return;
}*/
    function connexion($host, $dbname, $user, $mdp)
    {
        try {
            $dbh = new PDO("mysql:host=$host;port=3307;dbname=$dbname", $user, $mdp);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $dbh;
        } catch (PDOException $e) {
            error_log("Erreur connexion BDD : " . $e->getMessage());
            die("Erreur de connexion à la base de données.". $e->getMessage());
        }
    } 
    
?>
