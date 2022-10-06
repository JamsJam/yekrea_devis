<?php
    require_once('header.php');

if(isset($_SESSION['admin'])){
    header('location:../index.php?useCase=admin');
}
?>



<div>
<?php
    if (isset($_REQUEST['loginfail'])) {
        switch ($_REQUEST['loginfail']) {
            case '1':
                ?>
                <div>
                    <p class="text-danger">Veuillez entrer un identifiant et un mot de passe valide.</p>
                </div>
                <?php
                break;
            
            case '2':
                ?>
                <div>
                    <p class="text-danger">Votre mot de passe ou votre identifiant est incorrect. Veuiller réessayer.</p>
                </div>
                <?php
                break;
            
            case '3':
                ?>
                <div>
                    <p class="text-danger">Veuillez vous connecter.</p>
                </div>
                <?php
                break;
        }
    }
    ?>

    <form  method="POST">
        <div>

            <div>
                <label for="Id">Identifiant</label>
                <input type="text" name="id" id="id">
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <input type="submit" formaction="index.php?useCase=connexion" value="Connexion">
            </div>

        </div>
    </form>

    

</div>

<?php
include_once('footer.php');
?>