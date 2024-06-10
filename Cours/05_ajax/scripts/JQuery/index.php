<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Familles de série</title>
    <meta name="description" content="Exemple d'AJaX avec JQuery"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="author" content="Cyril Rabat">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">Les familles des séries</div>
        <div class="card-body">
          <form>
            <p>
              Saisissez une série et/ou un nom de famille puis tapez le bouton <span class="badge badge-primary">Recherche</span>.
            </p>
            <div class="mb-3 row">
              <label ref="serie" class="col-sm-2 col-form-label">Série</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="serie"/>
              </div>
            </div>
            <div class="mb-3 row">
              <label ref="famille" class="col-sm-2 col-form-label">Famille</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="famille"/>
              </div>
            </div>                
            <button type="button" class="btn btn-primary" onclick="javascript:recherche()">Recherche</button>
          </form>
        </div>
        <div class="card-footer bg-warning" id="erreur">
        </div>
        <div class="card-footer" id="resultat">
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
                $('#resultat').hide();
                $('#erreur').hide();
            }
        );
    </script>
  </body>
 </html>