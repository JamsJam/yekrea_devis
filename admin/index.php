<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location:../index.php?useCase=login&loginfail=3');
}
else {
    
    if (isset($_REQUEST['useCase'])) {
        $useCase = $_REQUEST['useCase'];
        
        switch ($useCase) {
            case 'admin':
                include('Views\landing.php');
                break;
                
            case 'insertDevis':
                include('Controllers/adminController.php');
                break;
                
            case 'preinscription':
                include('Views/preinscription.php');
                break;
                
            case 'dash':
                include('Controllers\adminDashboardController.php');
                break;


            case 'deconnexion':
                unset($_SESSION['id_devis']);
                unset($_SESSION['id_client']);
                unset($_SESSION['nom']);
                unset($_SESSION['prenom']);
                unset($_SESSION['num_devis']);
                unset($_SESSION['date_devis']);
                unset($_SESSION['nba']);
                unset( $_SESSION['tarifa']);
                unset($_SESSION['nbe']);
                unset($_SESSION['tarife']);
                unset($_SESSION['confirmation']);
                unset($_SESSION["admin"]);
                header('Location: ../index.php');
                break;

        }
        
    } else {
        include('Views\landing.php');
    }
}