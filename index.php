<?php

if (session_id() == "") {
    session_start();
}

if (isset($_REQUEST['useCase'])) {
    $useCase = $_REQUEST['useCase'];

    switch ($useCase) {

        case 'admin':
            header('Location: admin/');
            break;

        case 'devis':
            include('Controllers/devisController.php'); 
            break;

        case 'login':
            include('./Views/loginAdmin.php');
            break;

        case 'connexion':
            include('./Controllers/loginController.php');
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
            header('Location: index.php');
            break;

    }
    
} else {
        include('Views/dashboard.php');
}