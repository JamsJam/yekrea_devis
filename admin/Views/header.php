<?php
if(!isset($_SESSION['admin'])){
    header('location:../index.php?useCase=login&loginfail=3');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Feeling Guadeloupe - Devis</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>


    <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Feeling Guadeloupe</a>
                <?php if(isset($_SESSION["admin"]))
                    {
                ?>
                    <a class="btn btn-outline-danger" href="index.php?useCase=deconnexion">Déconnexion</a>
                <?php
                    } 
                ?>
                
    </nav>