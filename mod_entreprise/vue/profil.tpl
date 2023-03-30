<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="mod_entreprise/assets/entreprise.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
          integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous"/>


    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>

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

<div class="container-xl px-4 mt-4">
    {if $messageErreur neq ""}
        <div class="row justify-content-center mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>
                    {$messageErreur}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        </div>
    {/if}
    {if $messageSucces neq ""}
        <div class="row justify-content-center mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    {$messageSucces}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        </div>
    {/if}

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="row mt-4">
            <div class="col-xl-4 mt-4">
                <div class="row justify-content-center text-center">
                    <form method="post" enctype="multipart/form-data" action="index.php"
                          name="uploadPhotoProfil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="upload_logo">
                        <input type="hidden" name="token" value="{$token}">

                        <img class="img-account-profile rounded-circle mb-2 w-25"
                             src="mod_entreprise/documents/{$entreprise->getEnt_id()}/logo.png" alt="">
                        <input type="file" name="source_logo" class="form-control">

                        <div class="small font-italic text-muted mb-4">Format PNG inférieure à 5 Mo</div>

                        <input type="submit" class="btn btn-primary" value="Modifier le logo">
                    </form>
                </div>
                <div class="card mb-4 mt-5">
                    <div class="card-header">Paramètres d'identification</div>
                    <div class="card-body">
                        <form method="post" action="index.php" name="formUpdateIdentification">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="update_parametres_identification">
                            <input type="hidden" name="token" value="{$token}">
                            <div class="mb-3">
                                <label class="small mb-1" for="usr_email">Email : </label>
                                <input class="form-control" id="usr_email" name="usr_email" type="text"
                                       value="{$user->getUsr_email()}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="usr_mot_de_passe">Mot de passe : </label>
                                <input class="form-control" id="usr_mot_de_passe" name="usr_mot_de_passe"
                                       type="password" value="">
                            </div>
                            <!-- Save changes button-->
                            <input type="submit" class="btn btn-primary" value="Modifier les paramètres">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <!-- Account details card-->
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">Informations personnelles</div>
                            <div class="card-body">
                                <form method="post" action="index.php" name="formInfosPersonnelles">
                                    <input type="hidden" name="gestion" value="entreprise">
                                    <input type="hidden" name="action" value="modifier_informations_personnelles">
                                    <input type="hidden" name="token" value="{$token}">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_nom">Nom</label>
                                            <input class="form-control" id="ent_nom" name="ent_nom" type="text"
                                                   value="{$entreprise->getEnt_nom()}">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_siret">SIRET</label>
                                            <input class="form-control" id="ent_siret" name="ent_siret" type="text"
                                                   value="{$entreprise->getEnt_siret()}">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_siren">SIREN</label>
                                            <input class="form-control" id="ent_siren" name="ent_siren" type="text"
                                                   value="{$entreprise->getEnt_siren()}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_secteur_activite">Secteur
                                                d'activité</label>
                                            <select name="ent_secteur_activite" id="ent_secteur_activite"
                                                    class="form-control">
                                                {foreach $listeSecteurs as $secteurs}
                                                    {if $secteurs['sea_id'] eq $entreprise->getEnt_secteur_activite()}
                                                        <option value="{$secteurs['sea_id']}" selected>
                                                            {$secteurs['sea_libelle']}</option>
                                                    {else}
                                                        <option value="{$secteurs['sea_id']}">{$secteurs['sea_libelle']}
                                                        </option>
                                                    {/if}

                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Save changes button-->
                                    <input class="btn btn-primary" type="submit" value="Enregistrer">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Account details card-->
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">Informations de contact</div>
                            <div class="card-body">
                                <form method="post" action="index.php" name="formInfosContact">
                                    <input type="hidden" name="gestion" value="entreprise">
                                    <input type="hidden" name="action" value="modifier_informations_contact">
                                    <input type="hidden" name="token" value="{$token}">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_email">Adresse email</label>
                                            <input class="form-control" id="ent_email" name="ent_email" type="text"
                                                   value="{$entreprise->getEnt_email()}">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_telephone">Téléphone</label>
                                            <input class="form-control" id="ent_telephone" name="ent_telephone"
                                                   type="text"
                                                   value="{$entreprise->getEnt_telephone()}">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_adresse">Adresse postale</label>
                                            <input class="form-control" id="ent_adresse" name="ent_adresse" type="text"
                                                   value="{$entreprise->getEnt_adresse()}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="ent_ville">Ville</label> d'activité</label>
                                            <select name="ent_ville" id="ent_ville" class="form-control">
                                                {foreach $listeVilles as $villes}
                                                    {if $villes['vil_id'] eq $entreprise->getEnt_ville()}
                                                        <option value="{$villes['vil_id']}"
                                                                selected>{$villes['vil_nom']}
                                                        </option>
                                                    {else}
                                                        <option value="{$villes['vil_id']}">{$villes['vil_nom']}</option>
                                                    {/if}
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Save changes button-->
                                    <input class="btn btn-primary" type="submit" value="Enregistrer">
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

</body>


<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
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
        $("form[name='formNavProfil2']").submit();
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