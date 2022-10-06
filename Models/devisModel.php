<?php
//connexion BDD
require_once('Model.php');

//Verifie si $bd est present dans la table num_devis
function getNumDevis($db)
{
    global $database;
    $query = "SELECT num_devis FROM devis WHERE num_devis = '$db'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}

function getClientId($nom){

    global $database;
    $query = "SELECT id_client FROM client WHERE nom = '$nom'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}

//Recupere les toutes les info d'un devis a partir d'un numero de devis, ou du nom du client
function getInfoDevis($db)
{
    global $database;
    $query = "SELECT * FROM devis WHERE num_devis = '$db'";
        // $query = "SELECT d.* 
        //             FROM `devis` d
        //             JOIN client c
        //             ON d.id_client = c.id_client
        //             WHERE 
        //                 c.nom = '$db' 
        //             OR
        //                 d.num_devis = '$db'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}

//Recupere les toutes les info d'un devis a partir d'un numero de devis, ou du nom du client
function hasDevis($db, $nomDevis)
{

    global $database;
    // query 1 -> verifie si le nom est bien en bdd
    $query = "SELECT nom FROM client";
    $req = $database->prepare($query);
    $req->execute();
    //PDO::FETCH_COLUMN -> retourne les valeur de la colone dans un tableau
    $nomClient = $req->fetchAll(PDO::FETCH_COLUMN);

    
    
    if(!in_array($nomDevis, $nomClient))
    {
        $ligne = null;
        return $ligne;
    }
    else
    {
        
        // $query 2 -> recupere le devis correspondant a ce nom ET au nb devis donnée
        $query2 = "SELECT * 
                    FROM devis d
                    JOIN client c
                    ON d.id_client = c.id_client
                    WHERE 
                        c.nom = '$nomDevis' 
                    AND
                        d.num_devis = '$db'";
                    
        $req2 = $database->prepare($query2);
        $req2->execute();
        $ligne = $req2->fetch();
        return $ligne;
    }

}
//Recupere les info client a partir de son id
function getInfoClient($idclient)
{
    global $database;
    $query = "SELECT * FROM client WHERE id_client = '$idclient'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}
//Recupere les info d'un voyage a partir de l'id du devis
function getInfoVoyage($id_devis)
{
    global $database;
    $query = "SELECT * FROM voyage WHERE id_devis = '$id_devis'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetchAll();
    return $ligne;
}

// recupere le nombre de conducteur correspondant a un id de devis
function getInfoVoyageCountConducteur($id_devis)
{
    global $database;
    $query = "SELECT COUNT(`conducteur`) as conducteur FROM voyage WHERE id_devis = '$id_devis' AND conducteur ='1'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}
//recupere toutes les information d'un voyage en fonction de l'id du voyage
function getInfoVoyageID($id_voyage)
{
    global $database;
    $query = "SELECT * FROM voyage WHERE id_voyage = '$id_voyage'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}
//recupere toutes les informations d'un de l'assurance relative a un numero de devis
function getInfoAssurance($id_devis)
{
    global $database;
    $query = "SELECT * FROM assurance WHERE id_devis = '$id_devis'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetchAll();
    return $ligne;
}
//recupere toutes les informations d'un vol relatif a un numero de devis
function getInfoVol($id_devis)
{
    global $database;
    $query = "SELECT * FROM vol WHERE id_devis = '$id_devis'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetchAll();
    return $ligne;
}

// recupere les information d'un vol a partir de son numero de vol
function getInfoNumVol($numvol)
{
    global $database;
    $query = "SELECT * FROM vol WHERE numvol = '$numvol'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetch();
    return $ligne;
}

// recupere les information de l'assistance a partir de l'id du devis
function getInfoAssistance($id_devis)
{
    global $database;
    $query = "SELECT * FROM assistance WHERE id_devis = '$id_devis'";
    $req = $database->prepare($query);
    $req->execute();
    $ligne = $req->fetchAll();
    return $ligne;
}
// enregistre les information du formulaire ou recuperer en bdd dans des variable de session
function devisIn($id, $nom, $prenom, $idclient, $numdevis, $datedevis, $nba, $tarifa, $nbe, $tarife, $confirmation)
{
    $_SESSION['id_devis'] = $id;
    $_SESSION['id_client'] = $idclient;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['num_devis'] = $numdevis;
    $_SESSION['date_devis'] = $datedevis;
    $_SESSION['nba'] = $nba;
    $_SESSION['tarifa'] = $tarifa;
    $_SESSION['nbe'] = $nbe;
    $_SESSION['tarife'] = $tarife;
    $_SESSION['confirmation'] = $confirmation;
}
// enregistre l'id d'un voyage dans une variable de session
function voyageIn($id)
{
    $_SESSION['id_voyage'] = $id;
}

//mise a jour des informations du client
function updateClient($tel, $adresse, $mail)
{
    global $database;
    $id =  $_SESSION['id_client'];
    $query = "UPDATE client SET tel = :tel, adresse = :adresse, mail = :mail WHERE id_client = '$id'";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':mail', $mail);
    $count = $stmt->execute();
    return $count;
}
//
function insertParticipantVoyage($nomv, $prenomv, $naissancev, $nationnalitev, $numpv,$conducteur)
{
    global $database;
    $id =  $_SESSION['id_devis'];
    $query = "INSERT INTO voyage(id_voyage, id_devis, nom, prenom, naissance, nationalite, passeport, conducteur) 
    VALUES (NULL, '$id', :nomv, :prenomv,:naissancev, :nationnalitev, :numpv, :conducteur)";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':nomv', $nomv);
    $stmt->bindParam(':prenomv', $prenomv);
    $stmt->bindParam(':naissancev', $naissancev);
    $stmt->bindParam(':nationnalitev', $nationnalitev);
    $stmt->bindParam(':numpv', $numpv);
    $stmt->bindParam(':conducteur', $conducteur);
    $count = $stmt->execute();
    return $count;
}

function insertParticipantAssurance($id, $noma, $prenoma, $compagniea, $contrata, $tela,$assuranceA, $assuranceB)
{
    global $database;
    $query = "INSERT INTO assurance (id_assurance, id_devis, nom, prenom, nomcompagnie, numcontrat, numtel, attribution, assistance) 
    VALUES (NULL, '$id', :noma,:prenoma, :compagniea, :contrata, :tela, :assuranceA, :assuranceB)";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':noma', $noma);
    $stmt->bindParam(':prenoma', $prenoma);
    $stmt->bindParam(':compagniea', $compagniea);
    $stmt->bindParam(':contrata', $contrata);
    $stmt->bindParam(':tela', $tela);
    $stmt->bindParam(':assuranceA', $assuranceA);
    $stmt->bindParam(':assuranceB', $assuranceB);
    $count = $stmt->execute();
    return $count;
}

function insertParticipantVol($id, $numvol, $date, $heure, $provenance, $heurearrivee,$aeroportarrivee, $aller, $retour)
{
    global $database;
    $query = "INSERT INTO vol (id_vol, id_devis, numvol, date, heure, provenance, heurearrivee, aeroportarrivee, aller, retour) 
    VALUES (NULL, '$id', :numvol,:date, :heure, :provenance, :heurearrivee, :aeroportarrivee, :aller, :retour)";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':numvol', $numvol);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':provenance', $provenance);
    $stmt->bindParam(':heurearrivee', $heurearrivee);
    $stmt->bindParam(':aeroportarrivee', $aeroportarrivee);
    $stmt->bindParam(':aller', $aller);
    $stmt->bindParam(':retour', $retour);
    $count = $stmt->execute();
    return $count;
}

function UpdateVol($numvol, $date, $heure, $provenance, $heurearrivee,$aeroportarrivee)
{
    global $database;
    $id =  $_SESSION['id_devis'];
    $query = "UPDATE vol SET date = '$date', heure = '$heure', provenance = '$provenance', heurearrivee = '$heurearrivee', aeroportarrivee = '$aeroportarrivee' WHERE numvol = '$numvol'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}

function insertParticipantAssistance($id, $nomd, $prenomd, $teld)
{
    global $database;
    $query = "INSERT INTO assistance (id_assistance, id_devis, nom, prenom, num) VALUES (NULL, '$id', :nomd, :prenomd, :teld)";
    $stmt = $database->prepare($query);
    $stmt->bindParam(':nomd', $nomd);
    $stmt->bindParam(':prenomd', $prenomd);
    $stmt->bindParam(':teld', $teld);
    $count = $stmt->execute();
    return $count;
}

function updateDevis($id)
{
    global $database;
    $query = "UPDATE devis SET confirmation = '1' WHERE id_devis = '$id'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}

function updateDevisConfirmation($id)
{
    global $database;
    $query = "UPDATE devis SET final = '1' WHERE id_devis = '$id'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}

function supVoyage($id)
{
    global $database;
    $query = "DELETE FROM voyage WHERE id_voyage = '$id'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}


function supAssurance($id)
{
    global $database;
    $query = "DELETE FROM assurance WHERE id_assurance = '$id'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}

function supPersonne($id)
{
    global $database;
    $query = "DELETE FROM assistance WHERE id_assistance = '$id'";
    $stmt = $database->prepare($query);
    $count = $stmt->execute();
    return $count;
}