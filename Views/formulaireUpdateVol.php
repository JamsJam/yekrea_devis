<?php
include_once('header.php');
if(!isset($_SESSION["id_devis"])){
    header("Location: index.php");
    exit();
}
?>

    <div>
        <div class="container">

        <h3 class="mb-4 mt-2">Modifiez les informations de vos vols internationaux 
         
        <?php $aller = $vol['aller'];  ?>
        <?php if($aller == 1){ ?>
        (Aller).
            <?php
            } else { ?>   
        (Retour).
        <?php } ?>
    
    </h3>

        <form id="contactForm" action="index.php?useCase=devis&action=UpdateVol" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">N° de vol (Aller)</span>
            </div>
            <input name="numvol" type="text" class="form-control" placeholder="N° de vol (Aller)" value="<?php echo $vol['numvol']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Date :</span>
            </div>
            <input name="date" type="date" class="form-control" placeholder="Date" value="<?php echo $vol['date']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Heure :</span>
            </div>
            <input name="heure" type="time" class="form-control" placeholder="Heure" value="<?php echo $vol['heure']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Provenance du vol :</span>
            </div>
            <input name="provenance" type="text" class="form-control" placeholder="Provenance du vol" value="<?php echo $vol['provenance']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Heure d'arrivée à (Destination) / ETA : </span>
            </div>
            <input name="heurearrivee" type="time" class="form-control" placeholder="Heure d'arrivée" value="<?php echo $vol['heurearrivee']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Aéroport d'arrivée à (destination) : </span>
            </div>
            <input name="aeroportarrivee" type="text" class="form-control" placeholder="Aéroport d'arrivée" value="<?php echo $vol['aeroportarrivee']; ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-outline-success">Suivant</button>

    </div><br>

            </form>

<?php
include_once('footer.php');
?>