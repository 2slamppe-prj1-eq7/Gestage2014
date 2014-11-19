<?php

// Accès base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestage', 'root', 'joliverie');
} catch (Exception $e) {
    echo 'Echec de la connexion à la base de données';
    exit();
}


/**
 * Table ANNEESCOL
 * 
 */
echo "-- Annee scolaire";
echo "<br>";
echo "<br>";


$annee_debut = 2000;
$annee_debut = 2030;

for ($i = 2000; $i < 2030; $i++) {

    $annee_scolaire = $i . "-" . ($i + 1);

    $sql = "INSERT INTO `ANNEESCOL` (`ANNEESCOL`)VALUES ('$annee_scolaire');";
    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
}


/**
 * Table Spécialité
 */
echo "-- Specialite";
echo "<br>";
echo "<br>";

$specialite = array();
$specialite[0]['IDSPECIALITE'] = 1;
$specialite[0]['LIBELLECOURTSPECIALITE'] = "SLAM";
$specialite[0]['LIBELLELONGSPECIALITE'] = "Solutions logicielles et applications metiers";

$specialite[1]['IDSPECIALITE'] = 2;
$specialite[1]['LIBELLECOURTSPECIALITE'] = "SISR";
$specialite[1]['LIBELLELONGSPECIALITE'] = "Solutions d infrastructures systemes et reseaux";

for ($i = 0; $i <= 1; $i++) {

    $sql = "INSERT INTO `SPECIALITE` (
    `IDSPECIALITE` ,
    `LIBELLECOURTSPECIALITE` ,
    `LIBELLELONGSPECIALITE`
    )
    VALUES (" .
            $specialite[$i]['IDSPECIALITE'] . ",'" .
            $specialite[$i]['LIBELLECOURTSPECIALITE'] . "','" .
            $specialite[$i]['LIBELLELONGSPECIALITE'] . "');";

    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
}


/**
 * Table filière
 */
echo "-- Filiere";
echo "<br>";
echo "<br>";


$sql = "INSERT INTO `FILIERE` (`NUMFILIERE`, `LIBELLEFILIERE`) VALUES
(1, 'Management des Unites Commerciales'),
(2, 'Comptabilite et Gestion des Organisations'),
(3, 'Informatique de Gestion'),
(4, 'Services Informatiques aux Organisations'),
(5, 'Diplome de Comptabilite et de Gestion'),
(6, 'Formation Complementaire d''Initiative Locale');";

echo $sql;
//$pdo->query($sql);
echo "<br>";





/**
 * Table classe 
 */
echo "-- Classe";
echo "<br>";
echo "<br>";

$classe = array();
$classe[0]['NUMCLASSE'] = "1SIOA";
$classe[0]['IDSPECIALITE'] = "NULL";
$classe[0]['NUMFILIERE'] = 4;
$classe[0]['NOMCLASSE'] = "1ere annee BTS Service Informatique auxOrganisation";

$classe[1]['NUMCLASSE'] = "1SIOB";
$classe[1]['IDSPECIALITE'] = "NULL";
$classe[1]['NUMFILIERE'] = 4;
$classe[1]['NOMCLASSE'] = "1ere annee BTS Service Informatique auxOrganisation";

$classe[2]['NUMCLASSE'] = "2SISR";
$classe[2]['IDSPECIALITE'] = 2;
$classe[2]['NUMFILIERE'] = 4;
$classe[2]['NOMCLASSE'] = "2eme annee BTS Service Informatique auxOrganisation";

$classe[3]['NUMCLASSE'] = "2SLAM";
$classe[3]['IDSPECIALITE'] = 1;
$classe[3]['NUMFILIERE'] = 4;
$classe[3]['NOMCLASSE'] = "2eme annee BTS Service Informatique auxOrganisation";

for ($i = 0; $i < count($classe); $i++) {

    $sql = "INSERT INTO `CLASSE` (`NUMCLASSE`, `IDSPECIALITE`, `NUMFILIERE`, `NOMCLASSE`) VALUES ('" .
            $classe[$i]['NUMCLASSE'] . "'," .
            $classe[$i]['IDSPECIALITE'] . "," .
            $classe[$i]['NUMFILIERE'] . ",'" .
            $classe[$i]['NOMCLASSE'] . "');";

    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
}

/**
 * Table role
 */
echo "-- Role";
echo "<br>";
echo "<br>";


$sql = "INSERT INTO `ROLE` (`IDROLE`, `RANG`, `LIBELLE`) VALUES
(0, 0, 'Autre'),
(1, 1, 'Administrateur'),
(2, 2, 'Secretaire'),
(3, 3, 'Professeur'),
(4, 4, 'Etudiant'),
(5, 5, 'MaitreDeStage');";


echo $sql;
//$pdo->query($sql);
echo "<br>";


/**
 * TABLE PERSONNE
 */
echo "-- Classe SLAM";
echo "<br>";
echo "<br>";

//2SLAM
$listePrenom = array('MAEL', 'DAVID', 'FLORIAN', 'JEREMY', 'EMILIE', 'PIERRE', 'BENJAMIN', 'MAXIME', 'LOIC', 'THOMAS', 'AURELIEN', 'FLORIAN', 'PIERRE', 'STANISLAS', 'LAURENT', 'STEPHANE', 'YANNIS', 'THIBAULT', 'JULIEN', 'VALENTIN', 'ANTOINE', 'TANGUY', 'ANTOINE');
$listeNom = array('ANDRE', 'BONNET', 'BRETIN', 'BROYARD', 'CHANSON', 'CHARRIAU', 'CORBINEAU', 'COUTEAU', 'DESIREST', 'DION', 'DROUAUD', 'DURIEUX', 'FRENEAU', 'LEDUC', 'LEPEE', 'LOISEAU', 'MACHOURI', 'PERROIN', 'REDOR', 'RIO', 'SAINDRENAN', 'THIBEAU', 'TOUCHARD');


for ($i = 0; $i < count($listePrenom); $i++) {


    //Table Personne
    $IDPERSONNE = "NULL";
    $IDSPECIALITE = 1; //SLAM
    $IDROLE = 4; //Eleve
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = strtolower($listePrenom[$i]) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);

    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            '$IDSPECIALITE',
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";
    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
    $idpersonne = $pdo->lastInsertId();

    //Table Promotion
    $ANNEESCOL = "2014-2015";
    $IDPERSONNE = $idpersonne;
    $NUMCLASSE = '2SLAM';

    $sql2 = "INSERT INTO `PROMOTION` (
    `ANNEESCOL` ,
    `IDPERSONNE` ,
    `NUMCLASSE`
    )
    VALUES 
    ('$ANNEESCOL',$IDPERSONNE,'$NUMCLASSE');";
    echo $sql2;
    //$pdo->query($sql2);
    echo "<br>";
    echo "<br>";
}


echo "-- Classe SISR";
echo "<br>";
echo "<br>";


//2SISR
$listePrenom = array('KEVIN', 'FLORIAN', 'JORDAN', 'GAETAN', 'PIERRE', 'AMANDINE', 'THOMAS', 'AURELIEN', 'FABIEN', 'NICOLAS', 'ANTOINE', 'YANN', 'CYRIL', 'VIANNEY', 'VALENTIN', 'LAURENT', 'STEPHANE', 'WILLIAM', 'YANNIS', 'SEBASTIEN', 'MAXIME', 'YOANN', 'THIBAULT', 'FELIX', 'KEVIN', 'JULIEN', 'AXEL', 'TANGUY', 'ANTOINE', 'KILLIAN');
$listeNom = array('BOITIVEAU', 'BRETIN', 'BUREAU', 'CHAPRENTIER', 'CHARRIAU', 'CUNIBERTI', 'DION', 'DROUAUD', 'DURAND', 'DURET', 'FERRE', 'GOURLAOUEN', 'HAMON', 'HASTINGS', 'LEMONNIER', 'LEPEE', 'LE MONNIER', 'LOISEAU', 'MABILEAU', 'MACHOURI', 'MARCOUYOUX', 'MORNET', 'PARISOT', 'PERROIN', 'POIRSON', 'RADOJKOVIC', 'REDOR', 'SALARDAINE', 'THIBEAU', 'TOUCHARD');


for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = 2; //SISR
    $IDROLE = 4; //Eleve
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            '$IDSPECIALITE',
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";

    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
    $idpersonne = $pdo->lastInsertId();

    //Table Promotion
    $ANNEESCOL = "2014-2015";
    $IDPERSONNE = $idpersonne;
    $NUMCLASSE = '2SLAM';

    $sql2 = "INSERT INTO `PROMOTION` (
    `ANNEESCOL` ,
    `IDPERSONNE` ,
    `NUMCLASSE`
    )
    VALUES 
    ('$ANNEESCOL',$IDPERSONNE,'$NUMCLASSE');";
    echo $sql2;
    //$pdo->query($sql2);
    echo "<br>";
    echo "<br>";
}


echo "-- Professeur";
echo "<br>";
echo "<br>";
//Insertion Professeur

$listePrenom = array('NICOLAS', 'FRANCOISE', 'JEAN-PIERRE', 'SAMI');
$listeNom = array('BEAUVAIS', 'CARBONNIER', 'BORUGEOIS', 'GHADDAR');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 3; //Professeur
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
    echo "<br>";
}


echo "-- Administrateur";
echo "<br>";
echo "<br>";
//Insertion Administrateur

$listePrenom = array('Dupond');
$listeNom = array('Jean');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 1; //Admin
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
    echo "<br>";
}



echo "-- Maitre de Stage";
echo "<br>";
echo "<br>";
//Insertion Maitre de Stage

$listeNom = array('JOBS','LAO','LANGLE','HOUBON','DIXNEUF');
$listePrenom = array('Steve','Jean','Thierry','Daniel','Guillaume');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 5; //Maitre de Stage
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    //$pdo->query($sql);
    echo "<br>";
    echo "<br>";
}


/**
 * Table Orgnisation
 * 
 */
echo "-- Organisation";
echo "<br>";
echo "<br>";
//Insertion Organisation

$sql = "ALTER TABLE `ORGANISATION` CHANGE `IDORGANISATION` `IDORGANISATION` INT( 11 ) NOT NULL AUTO_INCREMENT ";
//$pdo->query($sql);

$listeNom = array('ECOLE DES MINES DE NANTES', 'ALERTE INFORMATIQUE', 'APS SOLUTIONS INFORMATIQUES', 'CITRUS INGENIERIE', 'QUATERNAIRE', 'PC NEW LIFE', 'LYCEE NOTRE DAME', 'MAKINA CORPUS', 'ATHLONE EXTRUSIONS LTCL', 'AKOS', 'TOUANG K.M.', 'France TELECOM ORANGE', 'BULL SAS', 'AGENCE 404', 'MANITOU BF', 'REPRO CONSEIL', 'STRATOS', 'HG INFORMATIQUE', 'CAPGEMINI', 'IBM', 'HP', 'BOULANGER', 'FNAC');
$listeAdresse = array('4 RUE ALFRED KASTLER', '186 BIS RUE DES COUPERIES', '8 RUE DU MARCHE COMMUN', 'LIEU DIT LENIPHEN', '9 RUE JULES VERNE', '1 TER AVENUE DE LA VERTONNE', '50 RUE JEAN JAURES', '29 QUAI DE VERSAILLES', 'GRACE ROAD ATHLONE', '8 RUE DESCARTES', '11 RUE Allemagne', '4 RUE ALFRED KASTLER', '12 H rue du Pâtis Tatelin - CS 50855', '8 BLD ALBERT EINSTEIN', '1 RUE SUFFREN', '430 RUE DE lAUBINIERE', 'RUE ST GREGOIRE', '14 PLACE DU COMMERCE', 'ZI DE VILLEJAMES', 'rue capgeminie', 'rue de hp', 'rue de boulanger', 'rue de la fnac');

for ($i = 0; $i < count($listeAdresse); $i++) {

    $sql = "INSERT INTO `ORGANISATION` (
        `IDORGANISATION`,
        `NOM_ORGANISATION`,
        `VILLE_ORGANISATION`,
        `ADRESSE_ORGANISATION`,
        `CP_ORGANISATION`,
        `TEL_ORGANISATION`,
        `FAX_ORGANISATION`,
        `FORMEJURIDIQUE`,
        `ACTIVITE`)
  VALUES(NULL, '" . $listeNom[$i] . "', 'Nantes', '" . $listeAdresse[$i] . "', '44000','0" . rand(000000000, 999999999) . "', '0" . rand(000000000, 999999999) . "', 'SARL','Developpement');";





    echo $sql;
   // $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}
?>