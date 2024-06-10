function recherche() {
    requete = $.ajax({
        type: 'POST',
        url: 'donnees.php',
        data: { "serie" : $('#serie').val(), "famille" : $('#famille').val() },
        dataType: 'json'
    });
    requete.done(function (response, textStatus, jqXHR) {
        if("erreur" in response)
            $('#erreur').text(response['erreur']).show();
        else
            $('#erreur').hide();
        
        $('#resultat').text(response['titre']).append('<ul>').show();
        for(i = 0; i < response['donnees'].length; i++)
            $('#resultat').append("<li>" + response['donnees'][i] + "</li>");
        $('#resultat').append("</ul>");
    });
    requete.fail(function (jqXHR, textStatus, errorThrown){
        $('#resultat').hide();
        $('#erreur').text("Problème de requête AJaX.").show();
        console.log(jqXHR);
    });    
}