<?php
require_once('Model.php');

function getLogin($id, $mdp){
    
    global $database;
    $query = "SELECT `login` FROM administrateur";
    $req = $database->prepare($query);
    $req->execute();
    $login = $req->fetch();

    if (in_array($id,$login)) {


        $query2 = "SELECT pwd FROM administrateur WHERE `login` = '$id'";
        $req2 = $database->prepare($query2);
        $req2->execute();
        $pass = $req2->fetch();

        if (in_array($mdp, $pass)) {
            $connexion = true;
            return $connexion;
        } else {
            $connexion = false;
            return $connexion;
        }
    } else {
        $connexion = false;
            return $connexion;
    }

}