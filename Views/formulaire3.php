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
        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="" aria-valuemin="" aria-valuemax="100">50%</div>

        </div>

        <h3 class="mb-4 mt-2">Etape 3 - Les assurances des participants</h3>

        <form id="contactForm" action="" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom :</span>
            </div>
            <input name="noma" ype="text" class="form-control" placeholder="Nom">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom :</span>
            </div>
            <input name="prenoma" type="text" class="form-control" placeholder="Prénom">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom de la compagnie :</span>
            </div>
            <input name="compagniea" type="text" class="form-control" placeholder="Nom de la compagnie">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">N°du contrat d'assurance	 :</span>
            </div>
            <input name="contrata" type="text" class="form-control" placeholder="N°du contrat d'assurance">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">N°de téléphone de l'asssurance : </span>
            </div>
            <input name="tela" type="text" class="form-control" placeholder="Numéro passeport">
        </div>

        <div class="input-group mb-3">
        <div class="form-check">
            <input name="assuranceA" id="read" class="form-check-input" type="checkbox" value="0" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Avez vous une assurance ?
            </label>
            </div>
        </div>

        <div class="form-check">
            <input name="assuranceB" id="read2" class="form-check-input" type="checkbox" value="0" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Vous avez une assistance rapatriement ? 
            </label><br>
            </div><br>

        <script>
            $("#read").click(function() {

            if($("#read").val()==0)
            {
            $("#read").val(1);
            }
            else
            {
            $("#read").val(0);
            }
            });

            $("#read2").click(function() {

            if($("#read2").val()==0)
            {
            $("#read2").val(1);
            }
            else
            {
            $("#read2").val(0);
            }
            });
        </script>

        <button type="submit" formaction="index.php?useCase=devis&action=formulaire4bis" class="btn btn-outline-warning">Ajoutez d'autre participants</button>
        <button type="submit" formaction="index.php?useCase=devis&action=formulaire4" name="submit" class="btn btn-outline-success" >Suivant</button>

        </form>

        </div>
    </div>
    </div><br>

<?php
include_once('footer.php');
?>