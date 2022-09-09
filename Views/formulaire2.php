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
                <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="" aria-valuemin="" aria-valuemax="100">30%</div>
        </div>

        <h3 class="mb-4 mt-2">Etape 2 - Les participants au voyage.</h3>

        <form id="contactForm" action="" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom :</span>
            </div>
            <input name="nomv" type="text" class="form-control" placeholder="Nom" value="" required>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom :</span>
            </div>
            <input name="prenomv" type="text" class="form-control" placeholder="Prénom" value="" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Date de naissance :</span>
            </div>
            <input name="naissancev" type="date" class="form-control" placeholder="Date de naissance">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nationnalité :</span>
            </div>
            <input name="nationnalitev" type="text" class="form-control" placeholder="Nationnalité">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Numéro passeport OU CNI : </span>
            </div>
            <input name="numpv" type="text" class="form-control" placeholder="Numéro passeport ou CNI" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Être vous conducteur ? </span>
            </div>
            <div class="conducteur">
            &nbsp;&nbsp;&nbsp;
            <input name="conducteur" id="read" class="form-check-input" type="checkbox" value="0" id="flexCheckDefault"><br></div>   
        </div>

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
        </script>


        <button type="submit" formaction="index.php?useCase=devis&action=formulaire3bis" class="btn btn-outline-warning">Ajoutez d'autre participants</button>
        <button type="submit" formaction="index.php?useCase=devis&action=formulaire3" name="submit" class="btn btn-outline-success" >Suivant</button>

        </form>

    </div><br>


<?php
include_once('footer.php');
?>