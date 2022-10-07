<?php
require_once('Models/devisModel.php');

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) 
    {
        case 'devisInsert':
            // recupere le nbDevis et ses information puis verifie:
                //1- si il est en BDD sinon 
                //  -> retour sur le dashboard et return un message d'erreur
                //2- si le formulaire a deja été finalisé (final == 1)
                //  -> Enregistrement des données client dans une variable de session
                //  -> redirect to formulaireFinal
                //3- si le  devis a ete confirmé (confirmation == 1)
                //  -> Enregistrement des données client dans une variable de session
                //  -> redirect to formulaireFinal
                //4- sinon (devis existant mais pas de finalisation ni de confimation)
                //  -> Enregistrement des donnée existante dans une variable de session
                //  -> redirect to formulaire
            $db = $_REQUEST['numdevis'];
            $nomDevis = $_REQUEST['name'];
            $info = hasDevis($db, $nomDevis);

            if ($info == null) 
            {
                $message = "Devis incorrect, ressayez avec un autre numéro.";
                include_once('Views/dashboard.php');

            }
            else{

            

            $confirmation = $info['confirmation'];
            $final = $info['final'];
            
            
                if($final == 1)
                {
                
                    $id = $info['id_devis']; 
                    $idclient = $info['id_client'];
                    $suiviClient = getInfoClient($idclient);
                    $nom = $suiviClient['nom'];
                    $prenom = $suiviClient['prenom'];
                    $tel = $suiviClient['tel'];
                    $adresse = $suiviClient['adresse'];
                    $mail = $suiviClient['mail'];
                    $numdevis = $info['num_devis'] ;
                    $datedevis = $info['date_devis'];
                    $nba = $info['nba'];
                    $tarifa = $info['tarifa'];
                    $nbe = $info['nbe'];
                    $tarife = $info['tarife'];
                    $confirmation = $info['confirmation'];
                    
                    devisIn($id, $nom, $prenom, $idclient, $numdevis, $datedevis, $nba, $tarifa, $nbe, $tarife, $confirmation);
                    include_once('Views/formulairefinal.php');
                    
                } 
                else if($confirmation == 1)
                {
                    $id = $info['id_devis']; 
                    $idclient = $info['id_client'];
                    $suiviClient = getInfoClient($idclient);
                    $nom = $suiviClient['nom'];
                    $prenom = $suiviClient['prenom'];
                    $tel = $suiviClient['tel'];
                    $adresse = $suiviClient['adresse'];
                    $mail = $suiviClient['mail'];
                    $numdevis = $info['num_devis'] ;
                    $datedevis = $info['date_devis'];
                    $nba = $info['nba'];
                    $tarifa = $info['tarifa'];
                    $nbe = $info['nbe'];
                    $tarife = $info['tarife'];
                    $confirmation = $info['confirmation'];
                    
                    devisIn($id, $nom, $prenom, $idclient, $numdevis, $datedevis, $nba, $tarifa, $nbe, $tarife, $confirmation);
                    include_once('Views/formulairefinal.php');

                }
                else
                {

                    $id = $info['id_devis']; 
                    $idclient = $info['id_client'];
                    $suiviClient = getInfoClient($idclient);
                    $nom = $suiviClient['nom'];
                    $prenom = $suiviClient['prenom'];
                    $tel = $suiviClient['tel'];
                    $adresse = $suiviClient['adresse'];
                    $mail = $suiviClient['mail'];
                    $numdevis = $info['num_devis'] ;
                    $datedevis = $info['date_devis'];
                    $nba = $info['nba'];
                    $tarifa = $info['tarifa'];
                    $nbe = $info['nbe'];
                    $tarife = $info['tarife'];
                    $confirmation = $info['confirmation'];
                    
                    
                    devisIn($id, $nom, $prenom, $idclient, $numdevis, $datedevis, $nba, $tarifa, $nbe, $tarife, $confirmation);
                    
                    include_once('Views/formulaire.php');
                    
                }
            }
            break; 

        case 'formulaire2':
            $tel = $_REQUEST['tel'];
            $adresse = $_REQUEST['adresse'];
            $mail = $_REQUEST['mail'];
            updateClient($tel, $adresse, $mail); 
            include('Views/formulaire2.php');
            break;
    
        case 'formulaire3':
            
            $nomv = $_REQUEST['nomv'];
            $prenomv = $_REQUEST['prenomv'];
            $naissancev = $_REQUEST['naissancev'];
            $nationnalitev = $_REQUEST['nationnalitev'];
            $numpv = $_REQUEST['numpv'];
            $conducteur = $_REQUEST['conducteur'];
            if($conducteur == NULL)
            {
                $conducteur = '0'; 
            }
            include('Views/formulaire3.php');
            insertParticipantVoyage($nomv, $prenomv, $naissancev, $nationnalitev, $numpv,$conducteur); 
            
            break;

        case 'formulaire3bis':
        
            $nomv = $_REQUEST['nomv'];
            $prenomv = $_REQUEST['prenomv'];
            $naissancev = $_REQUEST['naissancev'];
            $nationnalitev = $_REQUEST['nationnalitev'];
            $numpv = $_REQUEST['numpv'];
            $conducteur = $_REQUEST['conducteur'];
            if($conducteur == NULL)
            {
                $conducteur = '0'; 
            }
            include('Views/formulaire2.php');
            insertParticipantVoyage($nomv, $prenomv, $naissancev, $nationnalitev, $numpv,$conducteur); 
            break;

        case 'formulaire4':
            $id = $_SESSION["id_devis"];
            $noma = $_REQUEST['noma'];
            $prenoma = $_REQUEST['prenoma'];
            $compagniea = $_REQUEST['compagniea'];
            $contrata = $_REQUEST['contrata'];
            $tela = $_REQUEST['tela'];
            if(isset($_REQUEST['assuranceA'])){

                $assuranceA = $_REQUEST['assuranceA'];
            }
            else
            {
                $assuranceA = '0';
            }

            if (isset($_REQUEST['assuranceB'])) {
                
                $assuranceB = $_REQUEST['assuranceB'];
            }
            else
            {
                $assuranceB = '0'; 
            }



            include('Views/formulaire4.php');
            insertParticipantAssurance($id, $noma, $prenoma, $compagniea, $contrata, $tela,$assuranceA, $assuranceB); 

            break;
                    
        case 'formulaire4bis':
            $id = $_SESSION["id_devis"];
            $noma = $_REQUEST['noma'];
            $prenoma = $_REQUEST['prenoma'];
            $compagniea = $_REQUEST['compagniea'];
            $contrata = $_REQUEST['contrata'];
            $tela = $_REQUEST['tela'];
            $assuranceA = $_REQUEST['assuranceA'];
                if($assuranceA == NULL){
                $assuranceA = '0'; 
            }

            $assuranceB = $_REQUEST['assuranceB'];
                if($assuranceB == NULL){
                $assuranceB = '0'; 
            }

            include('Views/formulaire3.php');
            insertParticipantAssurance($id, $noma, $prenoma, $compagniea, $contrata, $tela,$assuranceA, $assuranceB); 
            break;
                    
                    
        case 'formulaire5':
            $id = $_SESSION["id_devis"];
            $numvol = $_REQUEST['numvol'];
            $date = $_REQUEST['date'];
            $heure = $_REQUEST['heure'];
            $provenance = $_REQUEST['provenance'];
            $heurearrivee = $_REQUEST['heurearrivee'];
            $aeroportarrivee = $_REQUEST['aeroportarrivee'];
            $aller = $_REQUEST['aller'];
            if($aller == NULL){
                $aller = '1'; 
            }
            $retour = $_REQUEST['retour'];
            if($retour == NULL){
                $retour = '0'; 
            }

            include('Views/formulaire5.php');
            insertParticipantVol($id, $numvol, $date, $heure, $provenance, $heurearrivee,$aeroportarrivee, $aller, $retour); 
            break;
                    
        case 'formulaire6':

            $id = $_SESSION["id_devis"];
            $numvol = $_REQUEST['numvol'];
            $date = $_REQUEST['date'];
            $heure = $_REQUEST['heure'];
            $provenance = $_REQUEST['provenance'];
            $heurearrivee = $_REQUEST['heurearrivee'];
            $aeroportarrivee = $_REQUEST['aeroportarrivee'];
            $aller = $_REQUEST['aller'];
            if($aller == NULL){
                $aller = '0'; 
            }
            $retour = $_REQUEST['retour'];
            if($retour == NULL){
                $retour = '1'; 
            }
            
            insertParticipantVol($id, $numvol, $date, $heure, $provenance, $heurearrivee,$aeroportarrivee, $aller, $retour); 
            include('Views/formulaire6.php');
            break;
                                                    
        case 'formulairefinal':
            $db = $_SESSION['num_devis'];
            $info = getInfoDevis($db);
            $confirmation = $info['confirmation'];    
            $id = $_SESSION["id_devis"];
            $nomd = $_REQUEST['nomd'];
            $prenomd = $_REQUEST['prenomd'];
            $teld = $_REQUEST['teld'];
            insertParticipantAssistance($id, $nomd, $prenomd, $teld); 
            updateDevisConfirmation($id);
            // Mailer
            sendMail();
            include('Views/formulairefinal.php');
            break;

        case 'formulairefinalbis':
            $info = getInfoDevis($db);
            $confirmation = $info['confirmation'];    
            $id = $_SESSION["id_devis"];
            $nomd = $_REQUEST['nomd'];
            $prenomd = $_REQUEST['prenomd'];
            $teld = $_REQUEST['teld'];
            insertParticipantAssistance($id, $nomd, $prenomd, $teld); 
            updateDevisConfirmation($id); 
            // Mailer

            include('Views/formulaire6.php');
            break;     
            
        case 'confirmation':
            if (isset($_SESSION['id_devis'])) {
                $id = $_SESSION["id_devis"];
                updateDevis($id);  
                $message = "Si vous voulez téléchargez votre PDF, renseignez à nouveau votre numéro de devis.";
                include_once('Views/dashboard.php');
            //   $message = "Le devis a été enregistré avec succès !.";
                }
            break;     
                
        case 'formulaireUpdate2':
            $tel = $_REQUEST['tel'];
            $adresse = $_REQUEST['adresse'];
            $mail = $_REQUEST['mail'];
            updateClient($tel, $adresse, $mail); 
            include('Views/formulairefinal.php');
            break;

        case 'formulaireAjout3':
            $nomv = $_REQUEST['nomv'];
            $prenomv = $_REQUEST['prenomv'];
            $naissancev = $_REQUEST['naissancev'];
            $nationnalitev = $_REQUEST['nationnalitev'];
            $numpv = $_REQUEST['numpv'];
            $conducteur = $_REQUEST['conducteur'];
            if($conducteur == NULL)
            {
                $conducteur = '0'; 
            }
            insertParticipantVoyage($nomv, $prenomv, $naissancev, $nationnalitev, $numpv,$conducteur); 
            include('Views/formulairefinal.php');
            break;

        case 'supprimerVoyage':
            $id_voyage = $_REQUEST['voyage'];
            supVoyage($id_voyage); 
            include('Views/formulairefinal.php');
            break;

        case 'supprimerAssurance':
            $id_assurance = $_REQUEST['assurance'];
            supAssurance($id_assurance); 
            include('Views/formulairefinal.php');
            break;

        case 'supprimerPersonneContact':
            $id_assistance = $_REQUEST['assistance'];
            supPersonne($id_assistance); 
            include('Views/formulairefinal.php');
            break;

        case 'formulaireUpdate4':
            $id = $_SESSION["id_devis"];
            $noma = $_REQUEST['noma'];
            $prenoma = $_REQUEST['prenoma'];
            $compagniea = $_REQUEST['compagniea'];
            $contrata = $_REQUEST['contrata'];
            $tela = $_REQUEST['tela'];
            $assuranceA = $_REQUEST['assuranceA'];
                if($assuranceA == NULL)
                {
                    $assuranceA = '0'; 
                }
            $assuranceB = $_REQUEST['assuranceB'];
                if($assuranceB == NULL)
                {
                    $assuranceB = '0'; 
                }
            insertParticipantAssurance($id, $noma, $prenoma, $compagniea, $contrata, $tela,$assuranceA, $assuranceB);
            include('Views/formulairefinal.php');
            break;

        case 'formulaireUpdate4bis':
            $numvol = $_REQUEST['vol'];
            $vol = getInfoNumVol($numvol);                       
            include('Views/formulaireUpdateVol.php');
            break;

        case 'UpdateVol':
            $numvol = $_REQUEST['numvol'];
            $date = $_REQUEST['date'];
            $heure = $_REQUEST['heure'];
            $provenance = $_REQUEST['provenance'];
            $heurearrivee = $_REQUEST['heurearrivee'];
            $aeroportarrivee = $_REQUEST['aeroportarrivee'];
            UpdateVol($numvol, $date, $heure, $provenance, $heurearrivee,$aeroportarrivee); 
            include('Views/formulairefinal.php');
            break;

        case 'formulaireAssistance':
            $info = getInfoDevis($db);
            $id = $_SESSION["id_devis"];
            $nomd = $_REQUEST['nomd'];
            $prenomd = $_REQUEST['prenomd'];
            $teld = $_REQUEST['teld'];
            insertParticipantAssistance($id, $nomd, $prenomd, $teld); 
            include('Views/formulairefinal.php');
            break;
            
        case 'pdf':
            $db = $_SESSION['num_devis'];
            $info = getInfoDevis($db);
            $idclient = $_SESSION['id_client'];
            $suiviClient = getInfoClient($idclient);
            $nom = $suiviClient['nom'];
            $prenom = $suiviClient['prenom'];
            $tel = $suiviClient['tel'];
            $adresse = $suiviClient['adresse'];
            $mail = $suiviClient['mail'];
            include('Views/pdf.php'); 
            break;
}
}