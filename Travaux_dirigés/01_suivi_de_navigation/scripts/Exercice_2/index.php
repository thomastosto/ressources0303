<?php
function ouvrir(string $fichier) : array {
  if(($liste = @file("actualites.txt")) !== FALSE) { 
    foreach($liste as &$ligne) {
      $tmp = explode(";", $ligne);
      $ligne = [ "date" => $tmp[0], "titre" => $tmp[1], "texte" => $tmp[2] ];
    }
    return $liste;
  }
  else
    return [];
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Exercice 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">Liste d'actualités</div>
        <div class="card-body">
          <div class="row">
<?php
$actualites = ouvrir("actualites.txt");
foreach($actualites as $actualite) {
  echo <<<HTML
    <div class='col-sm-4'>
  <div class='card border-dark mb-4'>
    <div class='card-header text-center'>{$actualite['titre']}</div>
    <div class='card-body'>{$actualite['texte']}</div>
    <div class='card-footer text-center'>{$actualite['date']}</div>
  </div>
</div>
HTML;
}
?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>