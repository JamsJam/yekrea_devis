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
                        <p class='text-light' style="backdrop-filter: blur(1px);">    
                            <?php 
                                if(isset($message)){
                                    echo /** @var TYPE_NAME $message */ $message;
                                }
                            ?>
                        </p>
                        <div class="col-12">
                            <input class="form-control form-control-lg" name="name" type="text" placeholder="Nom"/><br>
                            
                        </div>
                        <div class="col-12">
                            <input class="form-control form-control-lg" name="numdevis" type="text" placeholder="Numéro de devis"/><br>
                            
                        </div>
                        <div class="col mx-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Entrer</button></div>
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