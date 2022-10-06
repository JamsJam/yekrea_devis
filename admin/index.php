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
                include('admin\Controllers\adminDashboardController.php');
                break;
                
            case 'insertDevis':
                include('Controllers/adminController.php');
                break;
                
            case 'preinscription':
                include('Views/preinscription.php');
                break;

        }
        
    } else {
        include('Controllers\adminDashboardController.php');
    }
}