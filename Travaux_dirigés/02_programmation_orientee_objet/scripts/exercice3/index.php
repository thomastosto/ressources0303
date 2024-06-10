<?php
include("TCommon.php");
include("Form.php");
include("FormElement.php");
include("TextElement.php");

$form = new Form("myform", "myform", "post", "#");
$form->addElement(new TextElement("login", "login", "Login", TextElementType::text, ""));
$form->addElement(new TextElement("password", "password", "Password", TextElementType::password, ""));
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Exercice 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">Exercice 2</div>
        <div class="card-body bg-light">    
<?php $form->display(); ?>
        </div>
      </div>
    </div>
  </body>
</html>