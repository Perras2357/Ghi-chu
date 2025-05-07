<?php

    // Chargement config
        $config = require_once('config.php'); 

        // chargement base_url
        $base_url = $config['base_url'];

        // Démarrage des sessions
        session_name($config['session']['name']);  // définition du nom de cookie
        session_set_cookie_params([
            'lifetime' => $config['session']['lifetime'],
            'secure' => $config['session']['secure'],
            'httponly' => $config['session']['httponly']
        ]);
        session_start();

        //Connexion à la BDD
        require_once 'data/database.php';
        $db = connexion(
            $config['db']['host'],
            $config['db']['dbname'],
            $config['db']['user'],
            $config['db']['password']
        );

