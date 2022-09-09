<?php
include_once('header.php');
if(!isset($_SESSION["id_devis"])){
    header("Location: index.php");
    exit();
}
?>

    <div>
        <div class="container">

        <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="" aria-valuemin="" aria-valuemax="100">90%</div>
        </div>

        <h3 class="mb-4 mt-2">Etape 6 - Personnes à prévenir en cas de nécessité pendant votre voyage</h3>

        <form id="contactForm" action="" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom :</span>
            </div>
            <input name="nomd" type="text" class="form-control" placeholder="Nom">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom :</span>
            </div>
            <input name="prenomd" type="text" class="form-control" placeholder="Prénom">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Numéro de téléphone : </span>
            </div>
            <input name="teld" type="text" class="form-control" placeholder="Numéro de téléphone">
    </div>

        <button type="submit" formaction="index.php?useCase=devis&action=formulairefinalbis" class="btn btn-outline-warning">Ajoutez d'autre personne à prévenir</button>
        <button type="submit" formaction="index.php?useCase=devis&action=formulairefinal" name="submit" class="btn btn-outline-success" >Suivant</button>
        </form>
    </div><br>

<?php
include_once('footer.php');
?>