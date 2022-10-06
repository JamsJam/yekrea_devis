<?php
require_once('Model.php');

function insertReferent($nom, $prenom)
{
    global $database;
    $query = "INSERT INTO client(id_client,nom,prenom, tel, adresse, mail) VALUES (NULL,:nom, :prenom,'','','')";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $count = $stmt->execute();
    return $count;
}

function insertDevis($numdevis, $date)
{
    global $database;
    $query = "INSERT INTO devis(id_devis, id_client, num_devis, date_devis, nba, tarifa, nbe, tarife, confirmation, final) 
    VALUES (NULL, '0', :numdevis,:date, '0', '0', '0', '0', '0', '0')";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':numdevis', $numdevis);
    $stmt->bindParam(':date', $date);
    $count = $stmt->execute();
    return $count;
}

function getIDReferent($nom, $prenom)
{
    global $database;
    $query = "SELECT id_client FROM client WHERE nom= '$nom' AND prenom = '$prenom'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}

function linkDevisReferent($id, $numdevis)
{
    global $database;
    $query = "UPDATE devis SET id_client = $id WHERE num_devis = :numdevis";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':numdevis', $numdevis);
    $count = $stmt->execute();
    return $count;
}

function insertTarif($numdevis, $nba, $tarifa, $nbe, $tarife)
{
    global $database;
    $query = "UPDATE devis SET nba = :nba, tarifa = :tarifa, nbe = :nbe, tarife = :tarife WHERE num_devis = :numdevis";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':numdevis', $numdevis);
    $stmt->bindParam(':nba', $nba);
    $stmt->bindParam(':tarifa', $tarifa);
    $stmt->bindParam(':nbe', $nbe);
    $stmt->bindParam(':tarife', $tarife);
    $count = $stmt->execute();
    return $count;
}
// Fonction qui recupere toout les devis avec les clients associé
function getAllDevis(){
    global $database;
    $query = "SELECT d.*, c.*  
                FROM devis d
                JOIN client c
                ON d.id_client = c.id_client
                ORDER BY id_devis DESC";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetchAll(PDO::FETCH_ASSOC);
    return $ligne;
}

