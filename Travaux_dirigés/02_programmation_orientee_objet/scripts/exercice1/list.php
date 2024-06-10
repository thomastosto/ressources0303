<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Exercice 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">Exercice 2</div>
          <div class="card-body bg-light">
            <div class="row">
<?php
include("Item.php");

if(($list = @file("items.txt")) !== FALSE) {
    foreach($list as $line) {
        $item = Item::fromString($line);
        include 'view.php';
    }
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>