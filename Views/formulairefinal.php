<?php
include_once('header.php');
if(!isset($_SESSION["id_devis"])){
  header("Location: index.php");
  exit();
}
?>

    <div>
        <div class="container">

        <?php if($confirmation == 0){ ?>

          <h3 class="mb-4 mt-2">Etape Final - Récapitulatif</h3>

        <h5> Fiche de renseignement : </h5>
        <div style="overflow: auto"> 
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Tel</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Mail</th>
            <?php if($confirmation == 0){ ?>
                  <th scope="col">Action</th>  
            <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php 
                $idclient = $_SESSION['id_client']; 
                $client = getInfoClient($idclient); 
                {
              ?>
                <tr> 
                  <td><?php echo $client["nom"]; ?></td>
                  <td><?php echo $client['prenom']; ?></td>
                  <td><?php echo $client['tel']; ?></td>
                  <td><?php echo $client['adresse']; ?></td>
                  <td><?php echo $client['mail']; ?></td>
                  <?php if($confirmation == 0){ ?>
                  <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Modifier</button>
            </td>
            <?php } ?>
                </tr>
                <?php
    }
?>
              </tbody>
      </table></div>
      <br><br>

      <h5> Les participants au voyage :</h5>
      <div style="overflow: auto"> 
      <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Date de Naissance</th>
                  <th scope="col">Nationalite</th>
                  <th scope="col">Passeport</th>
                  <th scope="col">Conducteur</th>
                  <?php if($confirmation == 0){ ?>
                  <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php 
                $id = $_SESSION["id_devis"]; 
                $devis = getInfoVoyage($id); 
                foreach($devis as $q)
                {
              ?>
                <tr>       
                  <td><?php echo $q['nom'] ?></td>
                  <td><?php echo $q['prenom'] ?></td>
                  <td><?php echo $q['naissance'] ?></td>
                  <td><?php echo $q['nationalite'] ?></td>
                  <td><?php echo $q['passeport'] ?></td>
                  <td><?php echo $q['conducteur'] ?></td>
                  
                  <?php if($confirmation == 0){ ?>
                  <td>
                  <form  method="post" action="index.php?useCase=devis&action=supprimerVoyage" >
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AjoutVoyage" >Ajouter</button>
                    <button type="submit" name="voyage" class="btn btn-danger" value="<?php echo $q["id_voyage"]; ?>">Supprimer</button>
                    </form>
                  </td>
                  <?php } ?>
                </tr>
                <?php
    }
?>
              </tbody>
      </table></div>
    <br><br>

      <h5> Les assurances des participants :</h5>
      <div style="overflow: auto"> 
      <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Nom de la compagnie</th>
                  <th scope="col">Numéro de contrat</th>
                  <th scope="col">Numéro de téléphone</th>
                  <th scope="col">Assurance</th>
                  <th scope="col">Assistance rapatriement</th>
                  <?php if($confirmation == 0){ ?>
                  <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php 
                $id = $_SESSION["id_devis"]; 
                $assurance = getInfoAssurance($id); 
                foreach($assurance as $q)
                {
              ?>
                <tr>
                  <td><?php echo $q['nom'] ?></td>
                  <td><?php echo $q['prenom'] ?></td>
                  <td><?php echo $q['nomcompagnie'] ?></td>
                  <td><?php echo $q['numcontrat'] ?></td>
                  <td><?php echo $q['numtel'] ?></td>
                  <td><?php echo $q['attribution'] ?></td>
                  <td><?php echo $q['assistance'] ?></td>
                  <?php if($confirmation == 0){ ?>
                    <td>
                    <form  method="post" action="index.php?useCase=devis&action=supprimerAssurance" >
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#assuranceParticipants" >Ajouter</button>
                    <button type="submit" name="assurance" class="btn btn-danger" value="<?php echo $q["id_assurance"]; ?>">Supprimer</button>
                    </form></td>
                  <?php } ?>
                </tr>
                <?php
    }
?>
              </tbody>
      </table></div>
      <br><br>

      <h5> Les délais de vos vols internationaux Aller / Retour :</h5>
      <div style="overflow: auto"> 
      <table class="table">
              <thead>
                <tr>
                  <th scope="col">Numéro de Vol</th>
                  <th scope="col">Date</th>
                  <th scope="col">Heure</th>
                  <th scope="col">Provenance</th>
                  <th scope="col">Heure d'arrivée</th>
                  <th scope="col">Aéroport d'arrivée</th>
                  <th scope="col">Aller</th>
                  <th scope="col">Retour</th>
                  <?php if($confirmation == 0){ ?>
                  <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php 
                $id = $_SESSION["id_devis"]; 
                $vol = getInfoVol($id); 
                foreach($vol as $q)
                {
              ?>
                <tr>
                  <td><?php echo $q['numvol'] ?></td>
                  <td><?php echo $q['date'] ?></td>
                  <td><?php echo $q['heure'] ?></td>
                  <td><?php echo $q['provenance'] ?></td>
                  <td><?php echo $q['heurearrivee'] ?></td>
                  <td><?php echo $q['aeroportarrivee'] ?></td>
                  <td><?php echo $q['aller'] ?></td>
                  <td><?php echo $q['retour'] ?></td>
                  <?php $aller = $q['aller']; 
                        $retour = $q['retour'];  ?>
                  <?php if($confirmation == 0){ ?>
                  <td>
                    <form  method="post" action="index.php?useCase=devis&action=formulaireUpdate4bis" >
                    <button type="submit" name="vol" class="btn btn-primary" value="<?php echo $q["numvol"]; ?>">Modifier</button>
                    </form>
                  </td>
                    <?php }?>
                </tr>
                <?php
    }
?>
              </tbody>
      </table></div>
    <br><br>

      <h5> Personnes à prévenir en cas de nécessité pendant votre voyage :</h5>
      <div style="overflow: auto"> 
      <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Numéro de téléphone</th>
                  <?php if($confirmation == 0){ ?>
                  <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php 
                $id = $_SESSION["id_devis"]; 
                $assistance = getInfoAssistance($id); 
                foreach($assistance as $q)
                {
              ?>
                <tr>
                  <td><?php echo $q['nom'] ?></td>
                  <td><?php echo $q['prenom'] ?></td>
                  <td><?php echo $q['num'] ?></td>
                  <?php if($confirmation == 0){ ?>
                  <td>
                  <form  method="post" action="index.php?useCase=devis&action=supprimerPersonneContact" >
                      <button type="button" class="btn btn-success" class="btn btn-success" data-toggle="modal" data-target="#AjouterAssistance">Ajouter</button>
                      <button type="submit" name="assistance" class="btn btn-danger" value="<?php echo $q["id_assistance"]; ?>">Supprimer</button>
                  </form>
                  </td>
                  <?php } ?>
                </tr>
                <?php
          }
      ?>
              </tbody>
      </table>
      
      <?php include ('Views/modal.php') ?>

      <?php if($confirmation == 0){ ?>
        <div>
          <div>
            <input type="checkbox"  id="conditionGeneral">
            <label for="conditionGeneral">Je declare avoir pris connaissance des <a href="#">Conditions generales de vente</a></label>
          </div>
          <div>
            <input type="checkbox" id="revisionFormulaire">
            <label for="revisionFormulaire">Je certifie l’exactitude de tous les renseignements portés sur le devis n°<?php echo $_SESSION['numDevis'] ?></label>
          </div>
        </div>
      <button onclick="window.location.href = 'index.php?useCase=devis&action=confirmation'" name="submit" class="btn btn-outline-success" id="confirmation" disabled>Envoyez les informations</button></div><br>
      <?php } ?>

    <?php }else{ ?>

      <div>

      <?php 

          $id = $_SESSION["id_devis"]; 
          $devis = getInfoVoyageCountConducteur($id); 
          
      ?>

      <h3 class="mb-4 mt-2">Nous constatons que vous êtes <?php echo $devis['conducteur'] ?> conducteur(es)</h3>
      <p>De ce fait, envoyer une photo votre permis de conduire du conducteur principal.</p></div>

      <form id="contactForm" action="" method="POST">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom :</span>
            </div>
            <input name="nomc" type="text" class="form-control" placeholder="Nom" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom :</span>
            </div>
            <input name="prenomc" type="text" class="form-control" placeholder="Prénom">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Mail : </span>
            </div>
            <input name="mailc" type="mail" class="form-control" placeholder="Mail" required>

    </div>       


    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Message : </span>
            </div>
            <textarea class="form-control" rows="1"  placeholder="Message"></textarea>
    </div>       

    <div class="form-group mb-3">
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
      <?php if($confirmation == 1){ ?>
      <button type="submit" formaction="index.php?useCase=devis&action=formulairefinal" name="submit" class="btn btn-outline-success" >Envoyez le mail</button>
      <button onclick="window.open('index.php?useCase=devis&action=pdf', '_blank');" name="submit" class="btn btn-success">Télécharger le récapitulatif</button>
      <?php } ?> 
    </form> 

    </div><br>

    <?php } ?>
    <script>
      let checkRevision = document.querySelector('#revisionFormulaire') 
      let checkCGU = document.querySelector('#conditionGeneral') 
      let btnConfirm = document.querySelector('#confirmation')

      checkRevision.addEventListener('change',areChecked)

      function areChecked(){
        if (checkRevision.checked == true && checkCGU.checked == true)
        {
          btnConfirm.removeAttribute('disabled');
        }
        else
        {
          btnConfirm.setAttribute('disabled', '');
        }
      }
    </script>
<?php
include_once('footer.php');
?>