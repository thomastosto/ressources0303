<?php
define("DB_HOST", "localhost");
define("DB_BASE", "cm_04");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// **********************************************
// Connexion à la base de données
// **********************************************

$DB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);
if ($DB->connect_errno)
    echo "<p> Problème de connexion à la base de données (".$DB->connect_errno.") ".$DB->connect_error."</p>";
else
    echo "<p> Connexion à la base OK. </p>";
$DB->set_charset("utf8");

// **********************************************
// Selection de tous les étudiants
// **********************************************

$SQL = <<<SQL
    SELECT `etu_nom`, `etu_prenom`, `grp_intitule`
    FROM `etudiant`, `groupe` WHERE `etu_groupe`=`grp_id`;
SQL;

if($requete = $DB->query($SQL)) {
    echo "<ul>";
    while($ligne = $requete->fetch_assoc())
      echo <<<HTML
    <li><b>{$ligne['etu_nom']} {$ligne['etu_prenom']}</b> : {$ligne['grp_intitule']} </li>
HTML;
    echo "</ul>";
}
else
    echo "<p> Erreur lors de l'exécution de la requête. </p>";

// **********************************************
// Requête préparée
// **********************************************

$SQL = <<<SQL
    SELECT `etu_nom`, `etu_prenom`, `grp_intitule` FROM `etudiant`, `groupe`
    WHERE `etu_groupe`=`grp_id` AND `etu_nom`= ?;
SQL;

echo "<p> Recherche de Schwarzenegger. </p>";
if($requete = $DB->prepare($SQL)) {
    $requete->bind_param("s", $nom);
    $nom = "Schwarzenegger";
    if($requete->execute()) {
        $resultat = $requete->get_result();
        echo "<ul>";
        while($ligne = $resultat->fetch_assoc())
            echo "<li><b>{$ligne['etu_nom']} {$ligne['etu_prenom']}</b> : {$ligne['grp_intitule']}</li>";
        echo "</ul>";
    }
    else
        echo "<p> Erreur lors de l'exécution de la requête. </p>"; 
}
else
    echo "<p> Erreur lors de la préparation de la requête. </p>";

// **********************************************
// Requête préparée avec mapping variables
// **********************************************

$SQL = <<<SQL
    SELECT `etu_nom`, `etu_prenom`, `grp_intitule`
    FROM `etudiant`, `groupe`
    WHERE `etu_groupe`=`grp_id` AND `etu_nom`= ?;
SQL;
if($requete = $BD->prepare($SQL)) {
    $requete->bind_param('s', $nom);
    $nom = 'Schwarzenegger';
    if($requete->execute()) {
        $requete->bind_result($nom, $prenom, $groupe);
        echo "<ul>";
        while($resultat = $requete->fetch())
            echo "<li> <b>$nom $prenom</b> : $groupe </li>";
        echo "</ul>";
    }
    else
        echo "<p> Erreur lors de l'exécution de la requête. </p>";    
}
else
    echo "<p> Erreur lors de la préparation de la requête. </p>";