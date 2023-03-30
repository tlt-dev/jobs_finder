<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="mod_entreprise/assets/entreprise.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <img class="navbar-brand" style="max-width: 50px;"
             src="mod_entreprise/documents/{$entreprise->getEnt_id()}/logo.png"></img>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item pe-4">
                    <form method="post" action="index.php" name="formNavOffres">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="generer_liste_offre">
                        <input type="hidden" name="token" value="{$token}">
                        <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="consulter_profil">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavDashboard">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="consulter_suivi">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="FormNavAccueil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="generer_dashboard">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavAccueil()">Accueil</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>
<section id="price-section">
    <div class="container-fluid">
        <div class="row justify-content-center gapsectionsecond">
            <div class="col-lg-7 text-center">
                <div class="title-big pb-3 mb-3">
                    <h3>SUIVI CANDIDATURE</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card text-dark bg-light mb-1">
                    <div class="card-header">Compétences recherchées</div>
                    <div class="card-body">
                        <form method="post" action="index.php" name="rechercheCandidat">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="recherche_Candidat">
                            <input type="hidden" name="token" value="{$token}">
                            <select class="form-select" name="offreMultiSelect[]" id="multiple-select-field"
                                    data-placeholder="Choose anything" multiple>
                                {foreach $listeOffres as $offres}
                                    <option value="{$offres['off_id']}">{$offres['off_intitule']}
                                    </option>
                                {/foreach}
                            </select>
                            <div class="row text-center mt-2">
                                <div class="col-2">
                                    <input type="submit" class="btn btn-primary" value="Rechercher">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 justify-content-center">
            <div class="col-lg-3 pb-5 pb-lg-0">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">
                        <p>Liste des candidat(s)</p>
                    </div>
                    <div class="card-body" id="CardCandidat">

                    </div>
                </div>
            </div>
            <div class="col-lg-3  pb-5 pb-lg-0">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">
                        <p>Liste des entretiens </p>
                    </div>
                    <div class="card-body" id="CardEntretien">

                    </div>

                </div>
            </div>
            <div class="col-lg-3  pb-5 pb-lg-0">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">
                        <p>Réponse des entretien</p>
                    </div>
                    <div class="card-body" id="CardEntretienReponse">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{include file="mod_entreprise/vue/modalPropositionEntretien.tpl"}
{include file="mod_entreprise/vue/modalEntretien.tpl"}
{include file="mod_entreprise/vue/modalReponseEntretien.tpl"}
{include file="../../mod_authentification/vue/modalDeconnexion.tpl"}


</body>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script>
    $('#multiple-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });
</script>


<script>
    function showModalPropositionEntretien(can_chercheur, can_offre, token) {

        $("#modalPropositionEntretienTitre").text("Ajout d'une proposition d'entretien");
        $("#formPropositionEntretien_action").val('add_entretien');
        $("#formPropositionEntretienButton").val('Ajouter');

        $("#formPropositionEntretien_offre").val(can_offre);
        $("#formPropositionEntretien_chercheur").val(can_chercheur);
        $("#formPropositionEntretien_token").val(token);


        var myModal = new bootstrap.Modal(document.getElementById('modalPropositionEntretien'));
        myModal.show();


    }
</script>

<script>
    function showModalEntretien(ent_id) {

        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                "gestion": "entreprise",
                "action": "get_entretien",
                "ent_id": ent_id,
                "token": $("input[name='cardEntretienToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);
            $("#formEntretien_date_entretien").val(response.date_entretien);
            $("#formEntretien_modalites").val(response.modalites);
            $("#formEntretien_token").val(response.token);
        });


        $("#formEntretien_id").val(ent_id);
        $("#formRetirerEntretien_id").val(ent_id);
        $("#modalEntretienTitre").text("Suivi entretien");


        var myModal = new bootstrap.Modal(document.getElementById('modalEntretien'));
        myModal.show();


    }
</script>

<script>
    function showModalReponseEntretien(ent_id) {

        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                "gestion": "entreprise",
                "action": "get_entretien",
                "ent_id": ent_id,
                "token": $("input[name='cardReponseEntretienToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);
            $("#modalReponseEntretien_identite").text(response.che_prenom + ' ' + response.che_nom);
            $("#modalReponseEntretien_email").text(response.che_mail);
            $("#modalReponseEntretien_telephone").text(response.che_telephone);
            $("#formReponseEntretien_commentaire").val(response.commentaire);
            $("#formReponseEntretien_token").val(response.token);
        });


        $("#formReponseEntretien_id").val(ent_id);
        $("#modalReponseEntretienTitre").text("Réponse à l'entretien");


        var myModal = new bootstrap.Modal(document.getElementById('modalReponseEntretien'));
        myModal.show();


    }
</script>


<script>
    $("form[name='rechercheCandidat']").submit(function (e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            $.each(response.listeCandidats, function (i, val) {
                $.each(val, function (index, value) {

                    $("#CardCandidat").append(
                        '<div class="card-body"><div class="border-radius highlight" onclick="showModalPropositionEntretien(' +
                        value.can_chercheur + ',' + value.can_offre + ',' + response.token +
                        ')"><h5 class="text-center mb-0 pt-2">' + value.che_nom + ' ' +
                        value.che_prenom +
                        '</h5> <div class="row align-items-center"><div class="col-3 mx-2 mb-2 mt-1">' +
                        '<img src="mod_chercheur/documents/' + value.che_id + '/logo.png" class="w-100">' +
                        '</div><div class="col-8"> <p class="m-0">' +
                        value.che_mail + '</p><p class="m-0">' + value.che_telephone +
                        '</p></div></div></div></div>'
                    );

                });
            });

            $.each(response.listeEntretien, function (index, value) {
                $.each(value, function (i, val) {
                    $("#CardEntretien").append(
                        '<div class="card-body"><div class="border-radius highlight" onclick="showModalEntretien('+val.ent_id+')"><h5 class="text-center mb-1 pt-2">' +
                        val.che_prenom + ' ' + val.che_nom +
                        '<input type="hidden" name="cardEntretienToken" value="' + response
                            .token + '">'+
                        '</h5> <div class="row align-items-center"><div class="col-3 mx-2 mb-2 mt-1">' +
                        '<img src="mod_chercheur/documents/' + val.che_id + '/logo.png" class="w-100">' +
                        '</div><div class="col-8"> <p class="m-0">' +
                        val.che_mail + '</p><p class="m-0">'+ val.che_telephone + '</p></div></div></div></div>'
                    );

                });

            });

            $.each(response.listeEntretienReponse, function (index, value) {
                $.each(value, function (i, val) {
                    console.log(val.ent_reponse);
                    if (val.ent_reponse == 1) {

                        $("#CardEntretienReponse").append(
                            '<div class="card-body"><div class="border-radius highlight" style="background-color: darkorange;" onclick="showModalReponseEntretien('+val.ent_id+')">'+
                            '<input type="hidden" name="cardReponseEntretienToken" value="' + response.token + '">'+
                            '<h5 class="text-center mb-1 pt-2">' +
                            val.che_prenom + ' ' + val.che_nom +
                            '</h5> <div class="row align-items-center"><div class="col-3 mx-2 mb-2 mt-1">' +
                            '<img src="mod_chercheur/documents/' + val.che_id + '/logo.png" class="w-100">' +
                            '</div><div class="col-8"> <p class="m-0">En attente de votre réponse</p></p></div></div></div></div>'
                        );


                    }

                    if (val.ent_reponse == 0) {
                        $("#CardEntretienReponse").append(
                            '<div class="card-body"><div class="border-radius highlight" style="background-color: red;" onclick="showModalReponseEntretien('+val.ent_id+')"><h5 class="text-center mb-1 pt-2">' +
                            val.che_prenom + ' ' + val.che_nom +
                            '</h5> <div class="row align-items-center"><div class="col-3 mx-2 mb-2 mt-1">' +
                            '<input type="hidden" name="cardReponseEntretienToken" value="' + response.token + '">'+
                            '<img src="mod_chercheur/documents/' + val.che_id + '/logo.png" class="w-100">' +
                            '</div><div class="col-8"> <p class="m-0">Refusé</p></p></div></div></div></div>'
                        );
                    }

                    if (val.ent_reponse == 2) {
                        $("#CardEntretienReponse").append(
                            '<div class="card-body"><div class="border-radius highlight" style="background-color: forestgreen" onclick="showModalReponseEntretien('+val.ent_id+')"><h5 class="text-center mb-1 pt-2">' +
                            val.che_prenom + ' ' + val.che_nom +
                            '</h5> <div class="row align-items-center"><div class="col-3 mx-2 mb-2 mt-1">' +
                            '<input type="hidden" name="cardReponseEntretienToken" value="' + response.token + '">'+
                            '<img src="mod_chercheur/documents/' + val.che_id + '/logo.png" class="w-100">' +
                            '</div><div class="col-8"> <p class="m-0">Accepté</p></p></div></div></div></div>'
                        );
                    }

                });
            });

        });

    });
</script>

<script>
    function submitFormReponseEntretien(reponse)
    {
        $("#formReponseEntretien_reponse").val(reponse);

        $("form[name='formReponseEntretien']").submit();
    }
</script>

<script>
    function submitFormNavOffres() {
        $("form[name='formNavOffres']").submit();
    }
</script>
<script>
    function submitFormNavProfil() {
        $("form[name='formNavProfil']").submit();
    }
</script>
<script>
    function submitFormNavDashboard() {
        $("form[name='formNavDashboard']").submit();
    }
</script>
<script>
    function submitFormNavAccueil() {
        $("form[name='FormNavAccueil']").submit();
    }
</script>


</html>