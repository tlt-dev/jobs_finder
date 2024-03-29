<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="mod_visiteur/assets/visiteur.css">


    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            {if $chercheurConnected}
                <ul class="navbar-nav py-2">
                    <li class="nav-item pe-4">
                        <form method="post" action="index.php" name="formNavOffres">
                            <input type="hidden" name="gestion" value="visiteur">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link m-0" onclick="submitFormNavOffres()">Offres</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavProfil">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_profil">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link m-0" onclick="submitFormNavProfil()">Profil</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavDashboard">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_dashboard">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link m-0" onclick="submitFormNavDashboard()">Tableau de bord</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavCV">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_fiche_cv">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link m-0" onclick="submitFormNavCV()">CV</p>
                        </form>
                    </li>
                </ul>
            {/if}
            {if $chercheurConnected || $entrepriseConnected}
                <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                        data-bs-target="#modalDeconnexion">Déconnexion
                </button>
            {else}
                <button class="btn btn-outline-light" data-bs-toggle="modal" id="btnLogin"
                        data-bs-target="#modalAuthentification" value="Login">Login
                </button>
            {/if}


        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="offset-3 col-6">
            <div class="row justify-content-center">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">Recherche</div>
                    <div class="card-body">
                        <form method="post" action="index.php" name="rechercheOffre">
                            <input type="hidden" name="gestion" value="visiteur">
                            <input type="hidden" name="action" value="recherche_poste">
                            <input type="hidden" name="token" id="formRechercheOffre_token" value="{$token}">

                            <label for="poste_recherche">Poste recherché</label>
                            <select class="form-select" name="off_poste" id="multiple-select-field"
                                    data-placeholder="Choose anything" multiple>
                                {foreach $listePoste as $poste}
                                    <option value="{$poste['pos_id']}">{$poste['pos_libelle']}
                                    </option>
                                {/foreach}
                            </select>
                            <input type="submit" class="btn btn-primary" value="Rechercher">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel">
                    <div class="carousel-inner">
                        {foreach $listeOffre as $offre}
                            {if $offre@first}
                                <div class="carousel-item active">
                                    <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                                        <div class="card-header">{$offre["off_intitule"]}</div>
                                        <p class="idOffre" hidden>{$offre["off_id"]}</p>
                                        <div class="card-body text-dark">
                                            <h5 class="card-title">{$offre["vil_nom"]}</h5>
                                            <p class="card-text">{$offre["tco_libelle"]}</p>
                                        </div>
                                    </div>
                                </div>
                            {else}
                                <div class="carousel-item m-auto">
                                    <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                                        <div class="card-header">{$offre["off_intitule"]}</div>
                                        <p class="idOffre" hidden>{$offre["off_id"]}</p>
                                        <div class="card-body text-dark">
                                            <h5 class="card-title">{$offre["vil_nom"]}</h5>
                                            <p class="card-text">{$offre["off_descriptif"]}</p>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row mb-3 mx-5">
                        <div class="border-radius">
                            <div class="row mt-2 text-center">
                                <div class="col">
                                    <h4 id="off_intitule"></h4>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_secteur_activite" class="form-label">Secteur
                                                activité</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p>
                                                <strong id="offre_secteur_activite"></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_ville" class="form-label">Ville</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p>
                                                <strong  id="offre_ville"></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_type_contrat" class="form-label">Type de contrat</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p><strong id="offre_type_contrat"></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_date_prise_poste" class="form-label">Prise de poste</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p><strong id="offre_date_prise_poste"></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_salaire" class="form-label">Salaire</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p><strong  id="offre_salaire"></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" id="offre_duree">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_duree_contrat" class="form-label">Durée du contrat</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p><strong id="offre_duree_contrat"></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="row text-center">
                                        <div class="col">
                                            <label for="offre_descriptif" class="form-label">Descriptif</label>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <p>
                                                <strong id="offre_descriptif"></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {if $chercheurConnected}
                            <div class="row mt-2 text-center justify-content-center mb-2">
                                <div class="col-3">
                                    <form method="post" action="index.php" name="formAddToFavori">
                                        <input type="hidden" name="gestion" value="visiteur">
                                        <input type="hidden" name="action" id="formAddToFavori_action" value="add_favori">
                                        <input type="hidden" name="off_id" id="formAddToFavori_off_id" value="">

                                        <input type="submit" class="btn btn-danger" id="buttonFavori" value="Mettre en favori">
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form method="post" action="index.php" name="formCandidater">
                                        <input type="hidden" name="gestion" value="visiteur">
                                        <input type="hidden" name="action" id="formCandidater_action" value="add_candidature">
                                        <input type="hidden" name="off_id" id="formCandidater_off_id" value="">

                                        <input type="submit" class="btn btn-primary" id="buttonCandidater" value="Candidater">
                                    </form>
                                </div>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{include file="../../mod_authentification/vue/modalAuthentification.tpl"}
{include file="../../mod_authentification/vue/modalInscription.tpl"}
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
    $(document).ready(function () {
        $("#formAuthentificationToken").val($("formRechercheOffre_token"));
    });
</script>

<script>
    $("form[name='formAuthentification']").submit(function (e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            if (response.message != '') {

                $("#messageContent").text(response.message);
                $("#message").removeClass("d-none");

            } else if (response.gestion == 'entreprise') {
                window.location.replace("index.php?gestion=" + response.gestion + "&token=" + response.token);
            } else {
                window.location.replace("index.php?gestion=visiteur&token=" + response.token);
            }
        });

    });
</script>

<script>
    $("form[name='formInscription']").submit(function (e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);


            if (response.message != '') {

                $("#inscriptionMessageContent").text(response.message);
                $("#inscriptionMessage").removeClass("d-none");

            } else {

                $("#formInscription_che_nom").val(response.che_nom);
                $("#formInscription_che_prenom").val(response.che_prenom);
                $("#formInscription_ent_nom").val(response.ent_nom);
                $("#formInscription_est_chercheur_emploi").val(response.usr_est_chercheur_emploi);
                $("#formInscription_email").val(response.usr_email);
                $("#formInscription_mot_de_passe").val(response.usr_mot_de_passe);

                $("#formInscriptionHidden").submit();
            }

        });

    });
</script>

<script>
    $("input[name='usr_est_chercheur_emploi']").on('click', function (e) {
        if ($("#type_1").is(":checked")) {
            $("#ent_nom").addClass("d-none");
            $("#label_ent_nom").addClass("d-none");
            $("#che_prenom").removeClass("d-none");
            $("#label_prenom").removeClass("d-none");
            $("#che_nom").removeClass("d-none");
            $("#label_che_nom").removeClass("d-none");
        } else {
            $("#che_prenom").addClass("d-none");
            $("#label_prenom").addClass("d-none");
            $("#che_nom").addClass("d-none");
            $("#label_che_nom").addClass("d-none");
            $("#ent_nom").removeClass("d-none");
            $("#label_ent_nom").removeClass("d-none");
        }
    });
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
    $("form[name='rechercheOffre']").submit(function (e) {
        e.preventDefault(); //empêcher une action par défaut
        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        // Récupérer toutes les valeurs sélectionnées dans le champ de formulaire multiple
        var off_poste = $('select[name="off_poste"]').val();
        // Sérialiser les champs de formulaire en une chaîne de requête
        var form_data = $(this).serialize();
        // Ajouter les valeurs sélectionnées dans la chaîne de requête
        $.each(off_poste, function (index, value) {
            form_data += '&off_poste[]=' + encodeURIComponent(value);
        });
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'json'
        }).done(function (response) {
            console.log(response);
            $("#carouselExampleControls").children("div").remove();
            $.each(response, function (index, value) {
                console.log(value);
                if (index == 0) {
                    $("#carouselExampleControls").append(
                        '<div class="carousel-item active"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                        value.off_intitule + '</div><p class="idOffre" hidden>' + value
                            .off_id +
                        '</p><div class="card-body text-dark"><h5 class="card-title">' +
                        value.vil_nom + '</h5><p class="card-text">' + value
                            .off_descriptif + '</p></div></div></div>'
                    );
                } else {
                    $("#carouselExampleControls").append(
                        '<div class="carousel-item m-auto"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                        value.off_intitule + '</div><p class="idOffre" hidden>' + value
                            .off_id +
                        '</p><div class="card-body text-dark"><h5 class="card-title">' +
                        value.vil_nom + '</h5><p class="card-text">' + value
                            .off_descriptif + '</p></div></div></div>'
                    );
                }
            });

        });
    });

    $('#carouselExampleControls').bind('slid.bs.carousel', function (e) {
        descOffre();
    });

    window.onload = function () {
        descOffre();
    }

    function descOffre() {
        var form_url = "index.php" //récupérer l'URL du formulaire
        var form_method = "post" //récupérer la méthode GET/POST du formulaire
        // Récupérer toutes les valeurs sélectionnées dans le champ de formulaire multiple
        var off_id = $('div.carousel-item.active p.idOffre')[0].innerText;
        var form_data = "gestion=visiteur&action=get_current_offre&off_id=" + off_id;
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'json',
        }).done(function (response) {
            $("#off_intitule").text(response.off_intitule);
            $("#offre_secteur_activite").text(response.off_secteur);
            $("#offre_ville").text(response.off_ville);
            $("#offre_date_prise_poste").text(response.off_date_prise_poste);
            $("#offre_salaire").text(response.off_salaire);
            if (response.off_type_contrat == "CDI") {
                $("#offre_duree").attr("hidden", "hidden");
            } else {
                $("#offre_duree").removeAttribute("hidden");
                $("#offre_duree_contrat").text(response.off_duree_contrat);
            }
            $("#offre_type_contrat").text(response.off_type_contrat);
            $("#offre_descriptif").text(response.off_description);

            $("#formAddToFavori_off_id").val(response.off_id);
            $("#formCandidater_off_id").val(response.off_id);

            if(response.is_favori)
                {
                    $("#formAddToFavori_action").val("retirer_favori");
                    $("#buttonFavori").val("Retirer favori");
                }
            else
                {
                    $("#formAddToFavori_action").val("add_favori");
                    $("#buttonFavori").val("Ajouter favori");
                }

            if(response.is_candidater)
            {
                $("#formCandidater_action").val("retirer_candidature");
                $("#buttonCandidature").val("Retirer candidature");
            }
            else
            {
                $("#formCandidater_action").val("add_candidature");
                $("#buttonCandidature").val("Déposer sa candidature");
            }



        });
    }
</script>

<script>
    $("form[name='formAddToFavori']").submit(function(e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            if (response.is_favori) {
                $("#formAddToFavori_action").val("retirer_favori");
                $("#buttonFavori").val("Retirer favori");
            } else {
                $("#formAddToFavori_action").val("add_favori");
                $("#buttonFavori").val("Ajouter favori");
            }
        });

    });
</script>

<script>
    $("form[name='formCandidater']").submit(function(e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            if (response.is_candidater) {
                $("#formCandidater_action").val("retirer_candidature");
                $("#buttonCandidater").val("Retirer candidature");
            } else {
                $("#formCandidater_action").val("add_candidature");
                $("#buttonCandidater").val("Ajouter candidature");
            }
        });

    });
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
    function submitFormNavCV() {
        $("form[name='formNavCV']").submit();
    }
</script>


</html>