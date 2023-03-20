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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img class="navbar-brand" style="max-width: 50px;"
                src="mod_entreprise/documents/{$entreprise->getEnt_id()}/logo.png"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item pe-4">
                        <form class="d-flex" method="post" action="index.php">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="consulter_profil">
                            <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                            <input type="submit" class="btn btn-outline-light" value="Profil">
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form class="d-flex" method="post" action="index.php">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="consulter_suivi">
                            <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                            <input type="submit" class="btn btn-outline-light" value="Suivi">
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form class="d-flex" method="post" action="index.php">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="generer_liste_offre">
                            <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                            <input type="submit" class="btn btn-outline-light" value="Offres">
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form class="d-flex" method="post" action="index.php">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="generer_dashboard">
                            <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                            <input type="submit" class="btn btn-outline-light" value="Accueil">
                        </form>
                    </li>
                </ul>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
                </button>
            </div>
        </div>
    </nav>
</head>

<body>
    <section id="price-section">
        <div class="container-fluid">
            <div class="row justify-content-center gapsectionsecond">
                <div class="col-lg-7 text-center">
                    <div class="title-big pb-3 mb-3">
                        <h3>SUIVI CANDIDATURE</h3>
                    </div>
                    <p class="description-p text-muted pe-0 pe-lg-0">
                        Suivi des candidatures pour gérer les entretients etc..
                    </p>
                </div>
            </div>
            <div class="offset-5 col-2">
                <div class="row justify-content-center">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">Recherche</div>
                        <div class="card-body">
                            <form method="post" action="index.php" name="rechercheCandidat">
                                <input type="hidden" name="gestion" value="entreprise">
                                <input type="hidden" name="action" value="recherche_Candidat">
                                <input type="hidden" name="token" value="{$token}">
                                <label for="candidat_recherche">Poste recherché</label>
                                <select class="form-select" name="offreMultiSelect[]" id="multiple-select-field"
                                    data-placeholder="Choose anything" multiple>
                                    {foreach $listeOffres as $offres}
                                        <option value="{$offres['off_id']}">{$offres['off_intitule']}
                                        </option>
                                    {/foreach}
                                </select>
                                <input type="submit" class="btn btn-primary" value="Rechercher">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
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
                        <div class="card-body" id="CardEntretient">

                        </div>

                    </div>
                </div>
                <div class="col-lg-3  pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <p>Réponse des entretien</p>
                        </div>
                        <div class="card-body" id="CardEntretientReponse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {include file="mod_entreprise/vue/modalEntretien.tpl"}


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
    function showModalEntretien(can_chercheur, can_offre) {

        $("#formEntretien_offre").val(can_offre);
        $("#formEntretien_chercheur").val(can_chercheur);
        $("#formEntretien_token").val($("input[name='cardCandidatToken']").val());


        var myModal = new bootstrap.Modal(document.getElementById('modalEntretien'));
        myModal.show();


    }
</script>


<script>
    $("form[name='rechercheCandidat']").submit(function(e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function(response) {
            $.each(response.listeCandidats, function(i, val) {
            $.each(val, function(index, value) {

                $("#CardCandidat").append(

                    '<div class="border-radius highlight" onclick="showModalEntretien(' +
                    value.can_chercheur + ',' + value.can_offre +
                    ')"><input type="hidden" name="cardCandidatToken" value="' + response
                    .token + '"><h5 class="text-center mb-0 pt-2">' + value.che_nom + ' ' +
                    value.che_prenom +
                    '</h5> <div class="row align-items-center"><div class="col-9 pb-2"> <p class="m-0">' +
                    value.che_mail + '</p><p class="m-0">' + value.che_telephone +
                    '</p></div></div></div>'
                );

            });
            });

            $.each(response.listeEntretien, function(index, value) {
                $.each(value, function(i, val) {
                    $("#CardEntretient").append(

                        '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2">' +
                        val.ent_date_entretien + '</h5></div>'
                    );

                });

            });

            $.each(response.listeEntretienReponse, function(index, value) {
                $.each(value, function(i, val) {
                    console.log(val.ent_reponse);
                    if (val.ent_reponse == 2) {

                        $("#CardEntretientReponse").append(

                            '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2" style="background-color: green;">Accepté</h5></div>'
                        );


                    }

                    if (val.ent_reponse == 0) {
                        $("#CardEntretientReponse").append(
                        '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2" style="background-color: red;">Refusé</h5></div>'
                        );
                    }

                    if (val.ent_reponse == 1) {
                        $("#CardEntretientReponse").append(
                        '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2" style="background-color: orange;">En réflexion</h5></div>'
                        );
                    }

                });
            });

        });

        $("#modalEntretienTitre").text("Ajout d'une proposition d'entretien");
        $("#formEntretien_action").val('add_entretien');
        $("#formEntretien_token").val($("#formAddEntretienToken").val());
        $("#formEntretienButton").val('Ajouter');
    });
</script>

<script>
    $("form[name='formEntretien']").submit(function(e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function(response) {
            console.log(response);

            $("#CardEntretient").append(

                '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2">' + response
                .ent_date_entretien + '</h5></div>'
            );



        });
    });
</script>

<script>
    $("form[name='formEntretien']").submit(function(e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function(response) {
            $("#CardEntretientReponse").append(

                '<div class="border-radius highlight"><h5 class="text-center mb-0 pt-2">' + response
                .ent_reponse + '</h5></div>'


            );
        });
    });
</script>



</html>