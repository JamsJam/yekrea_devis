
<!-- Modal : Ajouter Assitance -->

<div class="modal fade" id="AjouterAssistance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Fiche de renseignement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 


            <form id="contactForm" action="" method="POST">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nom :</span>
                    </div>
                    <input name="nomd" type="text" class="form-control" placeholder="Nom">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Prénom :</span>
                    </div>
                    <input name="prenomd" type="text" class="form-control" placeholder="Prénom">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Numéro de téléphone : </span>
                    </div>
                    <input name="teld" type="text" class="form-control" placeholder="Numéro de téléphone">
                </div>
                <button type="submit" formaction="index.php?useCase=devis&action=formulaireAssistance" name="submit" class="btn btn-outline-success" >Suivant</button>
                </form>
                </div><br>

      </div>
    </div>
 </div>

</div>


<!-- Modal : Modifier Vol -->

<div class="modal fade" id="ModifierVol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Fiche de renseignement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 

          <form id="contactForm" action="index.php?useCase=devis&action=formulaireUpdateVol" method="POST">

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

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-outline-success">Suivant</button>
          </div>        
        </form>
        </div>
      </div>
    </div>
 </div>

<!-- Modal : Les assurances des participants -->

<div class="modal fade" id="assuranceParticipants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Fiche de renseignement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 

          <form id="contactForm" action="index.php?useCase=devis&action=formulaireUpdate4" method="POST">

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

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-outline-success">Suivant</button>
          </div>        
        </form>
        </div>
      </div>
    </div>
 </div>

<!-- Modal : Les participants au voyage ( Ajout ) -->

<div class="modal fade" id="AjoutVoyage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Fiche de renseignement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">        
          <form id="contactForm" action="index.php?useCase=devis&action=formulaireAjout3" method="POST">

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

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-outline-success">Suivant</button>
          </div>        
        </form>
        </div>
      </div>
    </div>
 </div>

<!-- Modal -->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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

        <form id="contactForm" action="index.php?useCase=devis&action=formulaireUpdate2" method="POST">

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
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-outline-success">Suivant</button>
          </div>        
        </form>
        </div>
      </div>
    </div>