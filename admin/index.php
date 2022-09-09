<?php

if (isset($_REQUEST['useCase'])) {
    $useCase = $_REQUEST['useCase'];

    switch ($useCase) {
        case 'admin':
            include('Views/dashboard.php');
            break;

        case 'insertDevis':
                include('Controllers/adminController.php');
                break;

        case 'preinscription':
                include('Views/preinscription.php');
                break;

    }
    
} else {
        include('Views/dashboard.php');
}