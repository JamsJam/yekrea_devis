<?php
define('DB_NAME', 'feelingguadeloupe');
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


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
