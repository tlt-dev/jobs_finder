<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="mod_chercheur/assets/chercheur.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item pe-4">
                    <form method="post" class="my-auto" action="index.php" name="formNavOffres">
                        <input type="hidden" name="gestion" value="visiteur">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_profil">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavDashboard">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_dashboard">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavCV">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_fiche_cv">
                        <input type="hidden" name="token" value="{$token}">

                        <p class="nav-link" onclick="submitFormNavCV()">CV</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>

<div class="container-fluid px-4 mt-4">

    <div class="row">
        <div class="col-5">
            <div class="accordion" id="accordionCV">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionInfosPersonnelles">
                        <button class="accordion-button collapsed" id="accordionButtonInfosPersonnelles" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionInfosPersonnellesContent" aria-expanded="true"
                                aria-controls="accordionInfosPersonnellesContent">
                            Informations Personnelles
                        </button>
                    </h2>
                    <div id="accordionInfosPersonnellesContent" class="accordion-collapse collapse"
                         aria-labelledby="accordionInfosPersonnelles"
                         data-bs-parent="#accordionCV">
                        <div class="accordion-body">
                            <form method="post" action="index.php" name="formInfosPersonnelles">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="update_infos_personnelles">
                                <input type="hidden" name="token" value="{$token}">

                                <div class="row">
                                    <div class="col-4">
                                        <label for="photo" class="form-label">Photo</label>
                                        <img class="w-75 d-block" id="photo"
                                             src="mod_chercheur/documents/{$chercheur->getChe_id()}/logo.png">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col">
                                                <label for="nom" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="che_nom"
                                                       value="{$chercheur->getChe_nom()}">
                                            </div>
                                            <div class="col">
                                                <label for="prenom" class="form-label">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" name="che_prenom"
                                                       value="{$chercheur->getChe_prenom()}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="mail" class="form-label">Adresse mail</label>
                                                <input type="text" class="form-control" id="mail" name="che_mail"
                                                       value="{$chercheur->getChe_mail()}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="telephone" class="form-label">Numéro de téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="che_telephone"
                                               value="{$chercheur->getChe_telephone()}">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="che_adresse"
                                               value="{$chercheur->getChe_adresse()}">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="code_postal" class="form-label">Code postal</label>
                                        <input type="text" class="form-control" id="code_postal" name="che_code_postal"
                                               value="{$chercheur->getChe_code_postal()}">
                                    </div>
                                    <div class="col">
                                        <label for="ville" class="form-label">Ville</label>
                                        <select class="form-control" id="che_ville" name="che_ville">
                                            {foreach $chercheur->getComboVilles() as $ville}
                                                {if $chercheur->getChe_ville() eq $ville['vil_id']}
                                                    <option value="{$ville['vil_id']}"
                                                            selected>{$ville['vil_nom']}</option>
                                                {else}
                                                    <option value="{$ville['vil_id']}">{$ville['vil_nom']}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="en_recherche" class="form-check-label">En recherche ?</label>
                                        <input type="checkbox" class="form-check-input" name="che_en_recherche"
                                               {if $chercheur->getChe_en_recherche() eq 1}checked{/if}
                                               value="1">
                                    </div>
                                    <div class="offset-6 col-3">
                                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionProfil">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionProfilContent" aria-expanded="false" aria-controls="accordionProfilContent">
                            Profil
                        </button>
                    </h2>
                    <div id="accordionProfilContent" class="accordion-collapse collapse" aria-labelledby="accordionProfil"
                         data-bs-parent="#accordionCV">
                        <div class="accordion-body">
                            <form method="post" action="index.php" name="formProfil">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="update_cv_description">
                                <input type="hidden" name="token" value="{$token}">

                                <div class="row">
                                    <div class="col">
                                        <label for="description" class="form-label">Profil</label>
                                        <textarea class="form-control" name="cv_description" id="description" rows="6">{$description}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="offset-9 col-3">
                                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionFormation">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionFormationContent" aria-expanded="false" aria-controls="accordionFormationContent">
                            Formation
                        </button>
                    </h2>
                    <div id="accordionFormationContent" class="accordion-collapse collapse" aria-labelledby="accordionFormation"
                         data-bs-parent="#accordionFormation">
                        <div class="accordion-body">
                            {foreach $listeFormationsChercheur as $formation}
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>{$formation['for_formation']}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditFormation">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_formation">
                                                            <input type="hidden" name="for_id" value="{$formation['for_id']}">
                                                            <input type="hidden" name="token" value="{$token}">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteFormation">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_formation">
                                                            <input type="hidden" name="for_id" value="{$formation['for_id']}">
                                                            <input type="hidden" name="token" value="{$token}">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddFormation">
                                        <input type="hidden" name="token" id="formAddFormationToken" value="{$token}">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une formation">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionExperiencePro">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionExperienceProContent" aria-expanded="false" aria-controls="accordionExperienceProContent">
                            Expérience personnelle
                        </button>
                    </h2>
                    <div id="accordionExperienceProContent" class="accordion-collapse collapse" aria-labelledby="accordionExperiencePro"
                         data-bs-parent="#accordionExperiencePro">
                        <div class="accordion-body">
                            {foreach $listeExperiencesProChercheur as $experiencePro}
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>{$experiencePro['exp_poste']}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditExperiencePro">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_experiencePro">
                                                            <input type="hidden" name="exp_id" value="{$experiencePro['exp_id']}">
                                                            <input type="hidden" name="token" value="{$token}">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteExperiencePro">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_experiencePro">
                                                            <input type="hidden" name="exp_id" value="{$experiencePro['exp_id']}">
                                                            <input type="hidden" name="token" value="{$token}">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddExperiencePro">
                                        <input type="hidden" name="token" id="formAddExperienceProToken" value="{$token}">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une expérience professionnelle">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionCompetences">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionCompetencesContent" aria-expanded="false" aria-controls="accordionCompetencesContent">
                            Compétences
                        </button>
                    </h2>
                    <div id="accordionCompetencesContent" class="accordion-collapse collapse" aria-labelledby="accordionCompetences"
                         data-bs-parent="#accordionCompetences">
                        <div class="accordion-body">
                            {foreach $listeCompetencesChercheur as $competence}
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p>{$competence['com_libelle']}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p>{$competence['niv_libelle']}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditCompetence">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_competence">
                                                            <input type="hidden" name="cce_id" value="{$competence['cce_id']}">
                                                            <input type="hidden" name="token" value="{$token}">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteCompetence">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_competence">
                                                            <input type="hidden" name="cce_id" value="{$competence['cce_id']}">
                                                            <input type="hidden" name="token" value="{$token}">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddCompetence">
                                        <input type="hidden" name="token" id="formAddCompetenceToken" value="{$token}">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une compétence">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionLangues">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionLanguesContent" aria-expanded="false" aria-controls="accordionLanguesContent">
                            Langues
                        </button>
                    </h2>
                    <div id="accordionLanguesContent" class="accordion-collapse collapse" aria-labelledby="accordionLangues"
                         data-bs-parent="#accordionLangues">
                        <div class="accordion-body">
                            {foreach $listeLanguesChercheur as $langue}
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p>{$langue['lan_nom']}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p>{$langue['niv_libelle']}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditLangue">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_langue">
                                                            <input type="hidden" name="lce_id" value="{$langue['lce_id']}">
                                                            <input type="hidden" name="token" value="{$token}">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteLangue">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="deleteLangue">
                                                            <input type="hidden" name="lce_id" value="{$langue['lce_id']}">
                                                            <input type="hidden" name="token" value="{$token}">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddLangue">
                                        <input type="hidden" name="token" id="formAddLangueToken" value="{$token}">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une langue">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionCentresInteret">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionCentresInteretContent" aria-expanded="false" aria-controls="accordionCentresInteretContent">
                            Centres d'intérêt
                        </button>
                    </h2>
                    <div id="accordionCentresInteretContent" class="accordion-collapse collapse" aria-labelledby="accordionCentresInteret"
                         data-bs-parent="#accordionCentresInteret">
                        <div class="accordion-body">
                            {foreach $listeCentresInteretChercheur as $centreInteret}
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p>{$centreInteret['cei_intitule']}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditCentreInteret">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_centre_interet">
                                                            <input type="hidden" name="cei_id" value="{$competence['cei_id']}">
                                                            <input type="hidden" name="token" value="{$token}">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteCentreInteret">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_centre_interet">
                                                            <input type="hidden" name="cei_id" value="{$centre_interet['cei_id']}">
                                                            <input type="hidden" name="token" value="{$token}">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddCentreInteret">
                                        <input type="hidden" name="token" id="formAddCentreInteretToken" value="{$token}">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter un centre d'intérêt">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{include file="../../mod_authentification/vue/modalDeconnexion.tpl"}
{include file="mod_chercheur/vue/modalFormation.tpl"}
{include file="mod_chercheur/vue/modalExperiencePro.tpl"}
{include file="mod_chercheur/vue/modalCompetence.tpl"}
{include file="mod_chercheur/vue/modalLangue.tpl"}
{include file="mod_chercheur/vue/modalCentreInteret.tpl"}


</body>


<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
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

<script>
    $("form[name='formInfosPersonnelles']").submit(function (e) {
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

        });

    });
</script>

<script>
    $("form[name='formProfil']").submit(function (e) {
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

        });

    });
</script>

<script>
    $("form[name='formAddFormation']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalFormation'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
            {
                gestion:"chercheur",
                action:"get_liste_villes",
                token: $("#formAddFormationToken").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeVilles, function (index, value) {
                $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
            });
        });

        $("#modalFormationTitre").text("Ajout d'une formation");
        $("#formFormation_action").val('add_formation');
        $("#formFormation_token").val($("#formAddFormationToken").val());
        $("#formFormationButton").val('Ajouter');

    });
</script>

<script>
    $("form[name='formDeleteInformation']").submit(function (e) {
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

        });

    });
</script>

<script>
    $("form[name='formEditFormation']").submit(function (e)
    {
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

            $("#formFormation_formation").val(response.for_formation);
            $("#formFormation_etablissement").val(response.for_etablissement);
            $("#formFormation_date_debut").val(response.for_date_debut);
            $("#formFormation_date_fin").val(response.for_date_fin);
            $("#formFormation_description").val(response.for_description);
            $("#formFormation_id").val(response.for_id);
            $("#formFormation_token").val(response.token);
            $("#formFormation_action").val(response.action);
            $("#formFormationButton").val("Modifier");
            $("#modalFormationTitre").text("Modifier la formation");


            $.each(response.listeVilles, function (index, value) {
                if(value.vil_id === response.for_ville)
                    {
                        $("#formFormation_ville").append('<option value="' + value.vil_id + '" selected>' + value.vil_nom + '</option>');
                    }
                else
                    {
                        $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
                    }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalFormation'));
        myModal.show();



    });
</script>

<script>
    $("form[name='formAddExperiencePro']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalExperiencePro'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"get_liste_villes",
                    token: $("#formAddExperienceProToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeVilles, function (index, value) {
                $("#formExperiencePro_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
            });
        });

        $("#modalExperienceProTitre").text("Ajout d'une expérience professionnelle");
        $("#formExperiencePro_action").val('add_experiencePro');
        $("#formExperiencePro_token").val($("#formAddExperienceProToken").val());
        $("#formExperienceProButton").val('Ajouter');

    });
</script>

<script>
    $("form[name='formEditExperiencePro']").submit(function (e)
    {
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

            $("#formExperiencePro_poste").val(response.exp_poste);
            $("#formExperiencePro_employeur").val(response.exp_employeur);
            $("#formExperiencePro_date_debut").val(response.exp_date_debut);
            $("#formExperiencePro_date_fin").val(response.exp_date_fin);
            $("#formExperiencePro_description").val(response.exp_description);
            $("#formExperiencePro_id").val(response.exp_id);
            $("#formExperiencePro_token").val(response.token);
            $("#formExperiencePro_action").val(response.action);
            $("#modalExperienceProTitre").text("Modifier l'expérience professionnelle");
            $("#formExperienceProButton").val("Modifier");



            $.each(response.listeVilles, function (index, value) {
                if(value.vil_id === response.for_ville)
                {
                    $("#formFormation_ville").append('<option value="' + value.vil_id + '" selected>' + value.vil_nom + '</option>');
                }
                else
                {
                    $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
                }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalExperiencePro'));
        myModal.show();



    });
</script>

<script>
    $("form[name='formAddCompetence']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalCompetence'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"form_add_competence",
                    token: $("#formAddCompetenceToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeCompetences, function (index, value) {
                $("#formCompetence_competence").append('<option value="' + value.com_id + '">' + value.com_libelle + '</option>');
            });
        });

        $("#modalCompetenceTitre").text("Ajout d'une compétence");
        $("#formCompetence_action").val('add_competence');
        $("#formCompetence_token").val($("#formAddCompetenceToken").val());
        $("#formCompetenceButton").val('Ajouter');

    });
</script>

<script>
    $("form[name='formEditCompetence']").submit(function (e)
    {
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

            $("#formCompetence_niveau").val(response.cce_niveau);
            $("#formCompetence_id").val(response.cce_id);
            $("#formCompetence_token").val(response.token);
            $("#formCompetence_action").val(response.action);
            $("#modalCompetenceTitre").text("Modifier la compétence");
            $("#formCompetenceButton").val("Modifier");



            $.each(response.listeCompetences, function (index, value) {
                if(value.com_id === response.cce_competence)
                {
                    $("#formCompetence_competence").append('<option value="' + value.com_id + '" selected>' + value.com_libelle + '</option>');
                }
                else
                {
                    $("#formCompetence_competence").append('<option value="' + value.com_id + '">' + value.com_libelle + '</option>');
                }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalCompetence'));
        myModal.show();



    });
</script>

<script>
    function updateNivLibelle()
    {

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"get_libelle_niveau",
                    token: $("#formAddCompetenceToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#niv_competence_libelle").text(response.niv_libelle);
        });

    }
</script>

</html>