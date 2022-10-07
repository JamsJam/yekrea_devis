<?php
    require_once('header.php');

if(isset($_SESSION['admin'])){
    header('location:../index.php?useCase=admin');
}
?>

<style>

    #login__container{
        height: 70vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #login__formContainer{
        width: 80vw;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .login__inputContainer{
        width: 40vw;
        min-width: 300px;
        max-width: 600px;

    }

</style>

<div id="login__container">
    <?php

        // Si Requete(get) loginFail alors : tentative d'acces a une route securisée ou echec de connection,
        // alors generation du message approprié en fonction de la situation
        if (isset($_REQUEST['loginfail'])) {
            switch ($_REQUEST['loginfail']) {
                // identifiant ou mot de passe vide
                case '1':
                    ?>
                        <div class="text-center px-4">
                            <p class="text-danger">Veuillez entrer un identifiant et un mot de passe valide.</p>
                        </div>
                    <?php
                    break;
                //identifiant ou mot de passe incorrect 
                case '2':
                    ?>
                        <div>
                            <p class="text-danger">Votre mot de passe ou votre identifiant est incorrect. Veuiller réessayer.</p>
                        </div>
                    <?php
                    break;
                // Acces a une route securisé sans connection
                case '3':
                    ?>
                        <div>
                            <p class="text-danger">Veuillez vous connecter pour acceder a cette page.</p>
                        </div>
                    <?php
                    break;
            }
        }
    ?>

    <form  method="POST">
        <div id="login__formContainer">

            <div class="form-group login__inputContainer my-4 " >
                <label for="id">Identifiant</label>
                <input type="text" name="id" id="id" class="form-control">
            </div>

            <div class="form-group login__inputContainer my-4 " >
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group login__submit " >
                <input type="submit" formaction="index.php?useCase=connexion" value="Connexion" class="form-control btn btn-success my-4">
            </div>

        </div>
    </form>

    

</div>

<?php
include_once('footer.php');
?>