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
    <title>Exercice 2</title>
    <meta charset="utf-8">
  </head>
  <body>
HTML;

// Création d'un article
echo "<h1>Création d'un article</h1>";
$item0 = new Item(-1, "One Piece - T653", "Enfin le tome 653 de la célèbre série One Piece", 6.99, 2);
if(ItemModel::create($item0))
    echo "<p> Article créé </p>";
else
    echo "<p> Erreur lors de la création de l'article </p>";

$item1 = new Item(-1, "One Piece - T654", "Enfin le tome 654 de la célèbre série One Piece", 2.99, 2);
if(ItemModel::create($item1))
    echo "<p> Article créé </p>";
else
    echo "<p> Erreur lors de la création de l'article </p>";

// Modification d'un article
// Ici, on simule en récupérant l'identifiant précédent
$item2 = new Item($item1->getId(), "One Piece - T654", "Enfin le tome 654 de la célèbre série One Piece", 6.99, 2);
if(ItemModel::update($item2))
    echo "<p> Article modifié </p>";
else
    echo "<p> Erreur lors de la modification de l'article </p>";

// Récupération d'un article
$item3 = ItemModel::read($item1->getId());
echo "<p> Article récupéré : $item3 </p>";

// Suppression d'un article
if(ItemModel::delete($item1->getId()))
    echo "<p> Article supprimé </p>";
else
    echo "<p> Erreur lors de la suppression de l'article </p>";
?>
  </body>
</html>