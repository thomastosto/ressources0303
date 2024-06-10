<?php
include("DBConfig.php");

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$DB = MyPDO::getInstance();

echo <<<HTML
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Exercice 1</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Enregistrement dont l'identifiant est 2</h1>
HTML;

$SQL = "SELECT * FROM `user` WHERE `id`=:id";
if($requete = $DB->prepare($SQL)) {
    if($requete->execute([':id' => 2])) {
        if($res = $requete->fetch()) {
            echo "<p>{$res['id']} : {$res['firstname']} ; {$res['lastname']} </p>";
        }
    }
    else
        echo "<p> Erreur lors de l'exécution de la requête. </p>";
}
else
    echo "<p> Erreur lors de la préparation de la requête. </p>";

echo "<h1>Tous les enregistrements</h1>";

$SQL = "SELECT * FROM `user`";
if($requete = $DB->prepare($SQL)) {
    if($requete->execute()) {
        while($res = $requete->fetch()) {
            echo "<p>{$res['id']} : {$res['firstname']} ; {$res['lastname']} </p>";
        }
    }
    else
        echo "<p> Erreur lors de l'exécution de la requête. </p>";
}
else
    echo "<p> Erreur lors de la préparation de la requête. </p>";

?>
  </body>
</html>