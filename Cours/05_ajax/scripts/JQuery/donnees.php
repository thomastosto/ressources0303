<?php
// Lecture du fichier contenant les données 
$series = json_decode(file_get_contents("series.json"), true)['séries'];

/**
 * Ajoute les familles d'une série dans la réponse.
 * @param json la réponse
 * @param serie la série
 */
function ajouterFamilles(array &$json, array $serie) : void {
    $json['donnees'] = [];
    foreach($serie['familles'] as $famille)
        $json['donnees'][]= $famille['nom'];
}

$json = [];

try {
    if(!isset($_POST['serie']) || ($_POST['serie'] == ""))
        throw new Exception("Vous n'avez pas spécifié de série.");
    
    // Recherche de la série spécifiée
    $i = 0;    
    while($i < sizeof($series) && (strcasecmp($series[$i]['intitulé'], $_POST['serie']) != 0))
        $i++;
    
    if($i >= sizeof($series))
        throw new Exception("Cette série est inconnue.");
    
    if(!isset($_POST['famille']) || ($_POST['famille'] == "")) {
        // Famille non spécifiée => envoi de toutes les familles de la série
        $json['erreur'] = "Famille non spécifiée.";
        $json['titre'] = 'Liste des familles disponibles';
        ajouterFamilles($json, $series[$i]);
    }
    else {
        // Recherche de la famille spécifiée
        $j = 0;
        while($j < sizeof($series[$i]['familles']) && (strcasecmp($series[$i]['familles'][$j]['nom'], $_POST['famille']) != 0))
            $j++;
        
        if($j >= sizeof($series[$i]['familles'])) {
            // Famille inexistante => envoi de toutes les familles de la série
            $json['erreur'] = "Famille inconnue.";
            $json['titre'] = 'Liste des familles disponibles';
            ajouterFamilles($json, $series[$i]);
        }
        else {
            // Famille trouvée => envoi des membres de la famille
            $json['titre'] = 'Liste des membres de la famille';
            $json['donnees'] = [];
            foreach($series[$i]['familles'][$j]['membres'] as $membre)
                $json['donnees'][]= $membre['prénom'].' '.$membre['nom'];
        }
    }
}
catch(Exception $e) {
    $json['erreur'] = $e->getMessage();
    $json['titre'] = 'Liste des séries disponibles';
    $json['donnees'] = [];
    foreach($series as $serie)
        $json['donnees'][] = $serie['intitulé'];
}

// Envoi de la réponse
header("Content-type: application/json");
echo json_encode($json);