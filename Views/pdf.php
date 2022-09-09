<?php
    require('fpdf184/fpdf.php');
    require_once('./Models/devisModel.php');
    
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $tel = $tel;
    $adresse = $adresse;
    $mail = $mail;

    $iddevis = $_SESSION["id_devis"]; 
    $db = $_SESSION["num_devis"]; 

    $title = 'DEVIS - ' . $iddevis . ' - ' . utf8_decode($nom) . ' '. utf8_decode($prenom) .' - Feeling Guadeloupe'; 
    $voyage = getInfoVoyage($iddevis); 
    $assurance = getInfoAssurance($iddevis); 
    $vol = getInfoVol($iddevis); 
    $devis = getInfoDevis($db); 
    
    $pdf = new FPDF();
    $pdf->AddPage('P', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTopMargin(10);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);
    $pdf->SetTitle($title);

    $logo = "logo.png";
    $pdf-> Image('./assets/img/'.$logo,105,30,90,30);
    /* --- Text --- */
    $pdf->Text(16, 23, 'Audrey');
    /* --- Text --- */
    $pdf->Text(16, 32, utf8_decode('Tél : +590 690 845 840'));
    /* --- Text --- */
    $pdf->Text(16, 42, 'Skype : Audrey FeelingGuadeloupe');
    /* --- Text --- */
    $pdf->Text(16, 52, 'Mail : contact@feelingguadeloupe.fr');
    /* --- Text --- */
    $pdf->Text(16, 62, 'Agence Feeling Guadeloupe');
    /* --- Text --- */
    $pdf->Text(16, 72, '(Licence ATOUT FRANCE 97116 0003)');
    
    $pdf->SetY(80);
    $pdf->SetX(16);

    $x = $pdf->GetX();
    $pdf->Cell(90,10,'Nom :', 1,0);
    $pdf->Cell(90,10,$nom, 1,1);
    $pdf->SetX($x);
    $pdf->Cell(90,10,'Prenom :', 1,0);
    $pdf->Cell(90,10,utf8_decode($prenom), 1,1);
    $pdf->SetX($x);
    $pdf->Cell(90,10,utf8_decode('Tél :'), 1,0);
    $pdf->Cell(90,10,$tel, 1,1);
    $pdf->SetX($x);
    $pdf->Cell(90,10,'Adresse :', 1,0);
    $pdf->Cell(90,10,utf8_decode($adresse), 1,1);
    $pdf->SetX($x);
    $pdf->Cell(90,10,'Mail :', 1,0);
    $pdf->Cell(90,10,$mail, 1,1);

    $pdf->SetY(20);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(16, 140, 'Les participants au voyage :');
    $pdf->SetFont('Arial', '', 12);

    $pdf->SetY(148);
    $pdf->SetX(16);

    $x = $pdf->GetX();
 
    $pdf->Cell(30,10,'Nom', 1,0);
    $pdf->Cell(30,10,'Prenom', 1,0);
    $pdf->Cell(30,10,'Naissance', 1,0);
    $pdf->Cell(30,10,'Nationalite', 1,0);
    $pdf->Cell(30,10,'Passeport', 1,0);
    $pdf->Cell(30,10,'Conducteur', 1,1);

    foreach($voyage as $q)
                {
                    $pdf->SetX(16);
                    $nomd = $q['nom'];
                    $prenomd = $q['prenom'];
                    $naissanced = $q['naissance'];
                    $nationalited = $q['nationalite'];
                    $passeportd = $q['passeport'];
                    $conducteurd = $q['conducteur'];
                    $conducteurde = ""; 
                    if($conducteurd == 1){
                        $conducteurde = 'Oui';  
                    }else{
                        $conducteurde = 'Non'; 
                    }

                    $pdf->Cell(30,10,utf8_decode($nomd), 1,0);
                    $pdf->Cell(30,10,utf8_decode($prenomd), 1,0);
                    $pdf->Cell(30,10,$naissanced, 1,0);
                    $pdf->Cell(30,10,utf8_decode($nationalited), 1,0);
                    $pdf->Cell(30,10,$passeportd, 1,0);
                    $pdf->Cell(30,10,utf8_decode($conducteurde), 1,1);
        }

    $pdf->SetY(218);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(16, 210, 'Les assurances des participants :');
    $pdf->SetFont('Arial', '', 12);

    $pdf->SetX(12);

    $pdf->Cell(25,10,'Nom', 1,0);
    $pdf->Cell(25,10,'Prenom', 1,0);
    $pdf->Cell(25,10,'Compagnie', 1,0);
    $pdf->Cell(25,10,utf8_decode('N°Contrat'), 1,0);
    $pdf->Cell(30,10,utf8_decode('N°Téléphone'), 1,0);
    $pdf->Cell(30,10,'Assurance', 1,0);
    $pdf->Cell(30,10,'Rapatriement', 1,1);
    
    foreach($assurance as $q)
                {
                    $pdf->SetX(12);
                    $nomd = $q['nom'];
                    $prenomd = $q['prenom'];
                    $nomcompagnie = $q['nomcompagnie'];
                    $numcontrat = $q['numcontrat'];
                    $numtel = $q['numtel'];
                    $attribution = $q['attribution'];
                    $attri = "";

                    if($attribution == 1){
                        $attri = "Assuré";
                    }else{
                        $attri = "Non assuré";
                    }

                    $assistance = $q['assistance'];
                    $assis = "";

                    if($assistance == 1){
                        $assis = "Oui";
                    }else{
                        $assis = "Non";
                    }
                    
                    $pdf->Cell(25,10,$nomd, 1,0);
                    $pdf->Cell(25,10,utf8_decode($prenomd), 1,0);
                    $pdf->Cell(25,10,$nomcompagnie, 1,0);
                    $pdf->Cell(25,10,utf8_decode($numcontrat), 1,0);
                    $pdf->Cell(30,10,utf8_decode($numtel), 1,0);
                    $pdf->Cell(30,10,utf8_decode($attri), 1,0);
                    $pdf->Cell(30,10,$assis, 1,1);                
        }

    $pdf->addPage();

    $pdf->SetY(18);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(16, 18, utf8_decode('Les délais de vos vols internationaux Aller / Retour :'));
    $pdf->SetFont('Arial', '', 12);

    $pdf->SetY(25);

    $pdf->SetX(8);

    $pdf->Cell(25,10,utf8_decode('N°Vol'), 1,0);
    $pdf->Cell(25,10,'Date', 1,0);
    $pdf->Cell(20,10,'Heure', 1,0);
    $pdf->Cell(30,10,utf8_decode('Provenance'), 1,0);
    $pdf->Cell(30,10,utf8_decode("Heure d'arrivée"), 1,0);
    $pdf->Cell(40,10,utf8_decode("Aéroport d'arrivée"), 1,0);
    $pdf->Cell(26,10,'Aller / Retour', 1,1);
    
    foreach($vol as $q)
                {
                    $pdf->SetX(8);
                    $numd = $q['numvol'];
                    $dated = $q['date'];
                    $heured = $q['heure'];
                    $provenance = $q['provenance'];
                    $heurearrivee = $q['heurearrivee'];
                    $aeroportarrivee = $q['aeroportarrivee'];
                    $aller = $q['aller'];
                    $status = "";

                    if($aller == 1){
                        $status = "Vol aller";
                    }else{
                        $status = "Vol retour";
                    }
                    $pdf->Cell(25,10,$numd, 1,0);
                    $pdf->Cell(25,10,$dated, 1,0);
                    $pdf->Cell(20,10,$heured, 1,0);
                    $pdf->Cell(30,10,utf8_decode($provenance), 1,0);
                    $pdf->Cell(30,10,utf8_decode($heurearrivee), 1,0);
                    $pdf->Cell(40,10,utf8_decode($aeroportarrivee), 1,0);
                    $pdf->Cell(26,10,$status, 1,1);                
        }

        $pdf->SetY(30);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 67, utf8_decode('Personnes à prévenir en cas de nécessité pendant votre voyage :'));
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetY(75);
        $pdf->SetX(16);

        $pdf->Cell(50,10,utf8_decode('Nom'), 1,0);
        $pdf->Cell(50,10,utf8_decode('Prénom'), 1,0);
        $pdf->Cell(50,10,utf8_decode('Tél'), 1,1);

        $assistance = getInfoAssistance($iddevis); 
    
        foreach($assistance as $v)
                    {
                        $pdf->SetX(16);
                        $nomq = $v['nom'];
                        $prenomq = $v['prenom'];
                        $numq = $v['num'];
                        $pdf->Cell(50,10,$nomq, 1,0);
                        $pdf->Cell(50,10,$prenomq, 1,0);
                        $pdf->Cell(50,10,$numq, 1,1);
                    
            }

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 120, utf8_decode('Tarifs et conditions de paiement :'));
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetY(125);
        $pdf->SetX(16);

        $numdevis = $devis['num_devis']; 
        $datedevis = $devis['date_devis']; 
        $tarifa = $devis['tarifa']; 
        $nba = $devis['nba']; 
        $tarife = $devis['tarife']; 
        $nbe = $devis['nbe']; 

        $tarif = ($tarifa * $nba)+($tarife * $nbe); 

        $pourcentage = $tarif*0.30;
        
        define('EURO',chr(128));

        $pdf->Cell(50,10,utf8_decode('Descriptif'), 1,0);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(130,10,'Tarif : ' . $tarif .' '. EURO, 1,1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetX(16);
        $pdf->Cell(50,10,utf8_decode('Itinéraire selon devis'), 1,0);
        $pdf->Cell(130,10,utf8_decode('N°'. $numdevis), 1,1);
        $pdf->SetX(16);
        $pdf->Cell(50,10,utf8_decode('Envoyé le'), 1,0);
        $pdf->Cell(130,10,utf8_decode($datedevis), 1,1);
        $pdf->SetX(16);
        $pdf->Cell(50,10,utf8_decode('Total Dossier'), 1,0);
        $pdf->Cell(130,10,utf8_decode($tarifa . ' euros pour ' . $nba . ' adulte(s) et ' . $tarife . ' euros pour ' . $nbe . ' enfant(s).'), 1,1);
        $pdf->SetX(16);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 175, utf8_decode("Conditions de paiement :"));
        $pdf->SetFont('Arial', '', 12);

        $pdf->Text(16, 185, utf8_decode("Un acompte de paiement de 30% du montant total (soit " . $pourcentage . " euros) de votre séjour est attendu"));
        $pdf->Text(16, 195, utf8_decode("pour l'entregistrement de votre réservation"));

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 205, utf8_decode("Conditions d'annulation :"));
        $pdf->SetFont('Arial', '', 12);

        $pdf->Text(16, 215, utf8_decode("Toute annulation doit faire l'objet d'un mail adressé à l'agence locale. Le montant des frais"));
        $pdf->Text(16, 225, utf8_decode("d'annulation varie en fonction du moment où intervient l'annulation"));

        $pdf->Text(16, 235, utf8_decode("à plus de 45 jours du départ : 30% du prix du voyage"));
        $pdf->Text(16, 245, utf8_decode("entre 44 et 20 jours du départ : 50% du prix du voyage,"));
        $pdf->Text(16, 255, utf8_decode("entre 19 et 11 jours du départ : 75% du prix du voyage,"));
        $pdf->Text(16, 265, utf8_decode("à moins de 10 jours du départ et après la date de départ : 100% du prix du voyage"));

        $pdf->addPage();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 20, utf8_decode('À savoir avant de partir'));
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetY(25);
        $pdf->SetX(16);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 35, utf8_decode("Rubrique conseil aux voyageurs du Ministère des Affaires Entrangères :"));
        $pdf->SetFont('Arial', '', 12);

        $pdf->Text(16, 45, utf8_decode("https://www.diplomatie.gouv.fr/fr/conseils-aux-voyageurs/conseils-par-pays-destination/"));

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 55, utf8_decode("Formalités d'entrée à destination pour les ressortissants de l'UE :"));
        $pdf->SetFont('Arial', '', 12);


        $pdf->Text(16, 65, utf8_decode("Les iles de Guadeloupe sont une partie du territoire de la France. A ce titre, elles font partie "));
        $pdf->Text(16, 75, utf8_decode("de l'Europe. Une carte d'identité ou un passeport (en cours de validité) suffit pour les citoyens"));
        $pdf->Text(16, 85, utf8_decode("français. Pour les ressortissants de l'Union Européenne et de la Suisse, un passeport sans Visa,"));
        $pdf->Text(16, 95, utf8_decode("une carte d'identité officielle ou une carte de séjour française en cours de validité sont demandées."));
        $pdf->Text(16, 105, utf8_decode("Pour les ressortissants des pays étrangers n'appartenant pas à l'Union Européenne, un passeport"));
        $pdf->Text(16, 115, utf8_decode("en cours de validité (Visa pour certains pays). Pour en savoir plus : Portail internet des services"));
        $pdf->Text(16, 125, utf8_decode("de l'Etat en Guadeloupe."));

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(16, 135, utf8_decode("Vaccins et traitements conseillés :"));
        $pdf->SetFont('Arial', '', 12);

        $pdf->Text(16, 145, utf8_decode("Aucun vaccin n'est obligatoire. Seuls les passagers en provenance des pays tropicaux doivent"));
        $pdf->Text(16, 155, utf8_decode("un certificat international de vaccination contre la variole. Des formalités strictes regissent"));
        $pdf->Text(16, 165, utf8_decode("le transport de vegetaux protégés vers et hors de Guadeloupe. Renseignez-vous aupres des "));
        $pdf->Text(16, 175, utf8_decode("Renseignez-vous aupres des autorites douanières. Pour en savoir plus : Site internet de la Douane"));


    $pdf->Output('DEVIS.pdf','I');

    ?>