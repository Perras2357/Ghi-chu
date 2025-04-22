<?php
    return [
        'db' => [
            'host' => 'localhost',
            'dbname' => 'nom_de_ta_bdd',
            'user' => 'utilisateur',
            'password' => 'motdepasse',
        ],
        'session' => [
            'name' => 'my_app_session',
            'lifetime' => 3600, // 1h
            'secure' => false, // à true en HTTPS
            'httponly' => true
        ]
    ];

?>