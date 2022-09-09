<?php
include_once('header.php');
if(!isset($_SESSION["id_devis"])){
    header("Location: index.php");
    exit();
}
?>

    <div>
        <div class="container"><br>
        <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="" aria-valuemin="" aria-valuemax="100">10%</div>
        </div>

        <h3 class="mb-4 mt-2">Etape 1 - Information complémentaire.</h3>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom :</span>
            </div>
            <input type="text" class="form-control" placeholder="Nom" value=" <?php echo $_SESSION['nom']; ?>" required disabled>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom :</span>
            </div>
            <input type="text" class="form-control" placeholder="Prénom" value=" <?php echo $_SESSION['prenom']; ?>" required disabled> 
        </div>

        <form id="contactForm" action="index.php?useCase=devis&action=formulaire2" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tel :</span>
            </div>
            <input name="tel" type="text" class="form-control" placeholder="Numéro de téléphone portable" 
            value="<?php echo $tel; ?>" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Adresse :</span>
            </div>
            <input name="adresse" type="text" class="form-control" placeholder="Adresse" value="<?php echo $adresse; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Mail :</span>
            </div>
            <input name="mail" type="text" class="form-control" placeholder="Mail" value="<?php echo $mail; ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-outline-success">Suivant</button>

        </form>

    </div><br>

<?php
include_once('footer.php');
?>