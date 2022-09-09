<?php
require_once('Models/adminModel.php');

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'insert':
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            insertReferent($nom, $prenom);

            $numdevis = $_REQUEST['numdevis'];
            $date = $_REQUEST['date'];

            $res = getIDReferent($nom, $prenom); 
            $id = $res['id_client']; 
            
            insertDevis($numdevis, $date);

            linkDevisReferent($id, $numdevis); 

            $tarifa = $_REQUEST['tarifa'];
            $nba = $_REQUEST['nba'];
            $tarife = $_REQUEST['tarife'];
            $nbe = $_REQUEST['nbe'];

            insertTarif($numdevis, $tarifa, $nba, $tarife, $nbe);
            
            include('Views/dashboard.php');
            
            break;
    }
}