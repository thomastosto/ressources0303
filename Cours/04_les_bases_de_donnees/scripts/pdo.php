<?php
define("DB_HOST", "localhost");
define("DB_BASE", "cm_04");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// **********************************************
// Connexion à la base de données
// **********************************************

try {
    $DB = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_BASE.";charset=UTF8",
            DB_USER, DB_PASSWORD
        );
} catch(Exception $e) {
    echo "<p> Problème de connexion à la base de données. </p>";
    die();
}
echo "<p> Connexion à la base ".DB_BASE." réussie. </p>";

// **********************************************
// Selection de tous les étudiants
// **********************************************

$SQL = <<<SQL
    SELECT `etu_nom`, `etu_prenom`, `grp_intitule`
    FROM `etudiant`, `groupe` WHERE `etu_groupe`=`grp_id`;
SQL;

if($requete = $DB->query($SQL)) {
    echo "<ul>";
    while($ligne = $requete->fetch()) {
        echo <<<HTML
        <li>
            <b>{$ligne["etu_nom"]} {$ligne["etu_prenom"]}</b> : {$ligne['grp_intitule']}
        </li>
HTML;
    }
    echo "</ul>";
}
else
    echo "<p> Erreur lors de l'exécution de la requête. </p>";

// **********************************************
// Insertion d'un étudiant
// **********************************************

$SQL = <<<SQL
    INSERT INTO `etudiant` (`etu_id`, `etu_nom`, `etu_prenom`, `etu_groupe`)
    VALUES (NULL, 'De Niro', 'Robert', 2);
SQL;
if($requete = $DB->exec($SQL))
    echo "<p> Données ajoutées. </p>";
else
    echo "<p> Erreur lors de l'ajout. </p>";

// **********************************************
// Requête préparée
// **********************************************

$SQL = <<<SQL
    SELECT `etu_nom`, `etu_prenom`, `grp_intitule`
    FROM `etudiant`, `groupe`
    WHERE `etu_groupe`=`grp_id` AND `etu_nom`= :nom;
SQL;

echo "<p> Recherche de Schwarzenegger. </p>";
if($requete = $DB->prepare($SQL)) {
    if($requete->execute([':nom' => "Schwarzenegger"])) {
        echo "<ul>";
        while($ligne = $requete->fetch(PDO::FETCH_ASSOC))
            echo <<<HTML
        <li><b>{$ligne['etu_nom']} {$ligne['etu_prenom']}</b> : {$ligne['grp_intitule']} </li>
HTML;
        echo "</ul>";
    }
    else
        echo "<p> Erreur lors de l'exécution de la requête. </p>";
}
else
    echo "<p> Erreur lors de la préparation de la requête. </p>";