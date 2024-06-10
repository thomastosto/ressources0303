function next() {
    requete = $.ajax({
        type: 'POST',
        url: 'script.php',
        dataType: 'html'
    });
    requete.done(function (response, textStatus, jqXHR) {
        $('#result').html(response);
    });
    requete.fail(function (jqXHR, textStatus, errorThrown){
        $('#result').html("Problème de requête AJaX.");
        console.log(jqXHR);
    });    
}