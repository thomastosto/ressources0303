<?php
define("LOGIN", "toto");
define("MOTDEPASSE", "admin");

$login = "";
$motDePasse = "";
$msg = "";
$lien = "index.html";
        
if(isset($_POST['inputLogin']))
    $login = $_POST['inputLogin'];
if(isset($_POST['inputMotDePasse']))
    $motDePasse = $_POST['inputMotDePasse'];

if(($login == "") || ($motDePasse == "")) {
    $msg = "Vous devez saisir le login et le mot de passe.";
}
elseif(($login != LOGIN) || ($motDePasse != MOTDEPASSE)) {
    $msg = "Login et/ou mot de passe incorrect(s).";
}
else {
    $msg = "Vous êtes connecté.";
    $lien = "tableau.php";
}
?>
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
      <div class="card mt-4">
        <div class="card-header bg-primary text-white text-center">Vérification</div>
        <div class="card-body">
          <div class="row">
            <?php echo $msg; ?>
          </div>
          <div class="row">
            <a href="<?php echo $lien; ?>">Continuer</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>