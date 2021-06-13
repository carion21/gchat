$(document).ready(() => {

    var myform = $("#myform")
    var btnsend = $("#btnsend")
    var message = $("#message")
    var pseudo  = $("#pseudo").text()
    var contact = $("#contact").text()
    var recept = $("#recept")
    var interlocuteur = {
        destinataire: contact
    }

    console.log("pseudo : "+pseudo)
    console.log("contact : "+contact)

    

    myform.submit((e) => {
        e.preventDefault();


        var urlFormulaire = myform.attr("action")
        var methodeFormulaire = myform.attr("method");

        var data = {
            destinataire : contact,
            message : message.val()
        }



        $.ajax({
            url: urlFormulaire,
            type: methodeFormulaire,
            data: data,
            success: (response) => {
                
                console.log('ok')
                console.log(response)
            },
            error: (reponse) => {
                console.log('erreur')
                console.log(response)
            }
        })
    })

    setInterval(
        () => { 
            $.ajax({
                url:'./listeMessage.php',
                type: 'GET',
                data: interlocuteur,
                dataType : 'html',
                success : (reponse, statut) => {
                    console.log("appel effectué")
                },
                error : (resultat, statut, erreur) => {
                    console.log('appel non effectué')
                },
                complete : (resultat, statut) => {
                    console.log('appel completement effectué')
                    recept.html(resultat.responseText)
                    console.log(resultat.responseText)
                }
    
            })
        }, 200);
})
