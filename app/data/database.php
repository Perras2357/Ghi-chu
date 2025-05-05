<?php
try {
    $dbh = new PDO("mysql:host=localhost;dbname=ghi-chu_database;port=3307",'root','');
    //echo "YES";
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
    //echo "NO";
    die('Erreur : ' . $e->getMessage());
}
/*var_dump($dbh);
var_dump($e);*/
?>
