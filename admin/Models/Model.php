<?php
define('DB_NAME', 'feelingguadeloupe_frdevis');
define('DB_SERVER', 'feelingguadeloupe.fr.mysql');
define('DB_USER', 'feelingguadeloupe_frdevis');
define('DB_PASSWORD', 'CR97120@@');

function connect()
{
    try {
        $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;

    } catch (PDOException $e) {

        echo "Oups ! Connexion SGBD impossible ! " . $e->getMessage();

    }
}

$database = connect();
