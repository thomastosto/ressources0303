<?php
include 'citations.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title> Exemple d'AJaX - envoi de données </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Exemple d'AJaX">
    <meta name="author" content="Cyril Rabat">
  </head>
  <body>
    <h1> Citation du jour </h1>
    <p id="destAJaX"></p>
<?php
for($i = 0; $i < count(CITATIONS); $i++)
    echo "<button type=\"button\" onclick=\"exemple({$i})\"> Citation ".($i+1)."</button> ";
?>
    <script type="text/javascript">
      function exemple(numero) {
        var requeteHTTP = new XMLHttpRequest();
        requeteHTTP.onload = function() {        
          document.getElementById("destAJaX").innerHTML = requeteHTTP.responseText;
        }
        requeteHTTP.open("POST", "generateur.php");
        requeteHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        requeteHTTP.send("numero=" + numero);
      }
    </script>
  </body>	
</html>