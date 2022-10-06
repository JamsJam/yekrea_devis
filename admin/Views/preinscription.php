<?php

include_once('header.php');

?>
<body>
    <div>
        <div class="container">

        <h2 class="page-section-heading text-center text-uppercase">Formulaire de pré-inscription</h2><br><br>

        <form id="contactForm" action="index.php?useCase=insertDevis&action=insert" method="POST">

            <div class="col-lg-8">
            <h2>Informations sur le référent :</h2>
                <div class="form-floating mb-3">
                    <p>Nom :  <input class="form-control" type="text" name="nom" placeholder="Votre nom..."/></p>
                    <p>Prénom :  <input   class="form-control"type="text" name="prenom" placeholder="Votre prénom..." /><br></p>
            </div><br>
        </div>

        <div class="col-lg-8">
                <h2>Informations concernant le devis :</h2>
                <div class="form-floating mb-3">
                    <p>Numéro du devis :    <input class="form-control" type="number" value="0" name="numdevis" /><br></p>
                    <p>Date :   <input class="form-control" type="date" name="date" placeholder="Date d'envoie du devis..." /><br></p>
                </div><br>

        </div>

        <div class="col-lg-8">
                <h2>Détails tarif :</h2>
                <div class="form-floating mb-3">
                    <p>Tarif par adulte : <input class="form-control" type="number" name="tarifa" value="0" /> <br></p>
                    <p>Nombre adulte : <input class="form-control" type="number" name="nba" value="0" /><br></p>
                    <p>Tarif par enfant : <input class="form-control"  type="number" name="tarife" value="0" /><br></p>
                    <p>Nombre enfant : <input class="form-control" type="number" name="nbe" value="0" /></p>
          </div>
        </div>
        
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="submit" name="submit" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Envoyez</i>
            </button>
        </form>
        
        </div>
</body>

<?php
include_once('footer.php');
?>