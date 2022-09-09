<?php
include_once('header.php');
?>

<header class="masthead">

<div class="container position-relative">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="text-center text-white">
                <h1 class="mb-5">Renseignez votre numéro de devis</h1>

                <form method="POST" class="form-subscribe" action="index.php?useCase=devis&action=devisInsert">
                    <div class="row">
                        <div class="col">
                            <input class="form-control form-control-lg" name="numdevis" type="text" placeholder="Numéro de devis"/><br>
                            <p>    <?= /** @var TYPE_NAME $message */ $message; ?></p>
                        </div>
                        <div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Entrer</button></div>
                    </div>
                </form>
                

                
            </div>
        </div>
    </div> 
</div>

</header>

<?php
include_once('footer.php');
?>