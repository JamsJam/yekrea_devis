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
                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="" aria-valuemin="" aria-valuemax="100">60%</div>
        </div>


        <h3 class="mb-4 mt-2">Etape 4 - Les délais de vos vols internationaux (Aller).</h3>

        <form id="contactForm" action="" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">N° de vol (Aller)</span>
            </div>
            <input name="numvol" type="text" class="form-control" placeholder="N° de vol (Aller)">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Date :</span>
            </div>
            <input name="date" type="date" class="form-control" placeholder="Date">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Heure :</span>
            </div>
            <input name="heure" type="time" class="form-control" placeholder="Heure">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Provenance du vol :</span>
            </div>
            <input name="provenance" type="text" class="form-control" placeholder="Provenance du vol">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Heure d'arrivée à (Destination) / ETA : </span>
            </div>
            <input name="heurearrivee" type="time" class="form-control" placeholder="Heure d'arrivée">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Aéroport d'arrivée à (destination) : </span>
            </div>
            <input name="aeroportarrivee" type="text" class="form-control" placeholder="Aéroport d'arrivée">
        </div>

        <button type="submit" formaction="index.php?useCase=devis&action=formulaire5" name="submit" class="btn btn-outline-success" >Suivant</button>

    </div><br>

<?php
include_once('footer.php');
?>