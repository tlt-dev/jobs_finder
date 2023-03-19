<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        <div class="row mt-3">
            <div class="row">
                <div class="col-xl-4">
                    <div class="row justify-content-center text-center">
                        <form method="post" enctype="multipart/form-data" action="index.php"
                              name="uploadPhotoProfil">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="upload_photo_profil">
                            <input type="hidden" name="token" value="{$token}">

                            <img class="img-account-profile rounded-circle mb-2 w-25"
                                 src="mod_chercheur/documents/{$chercheur->getChe_id()}/logo.png" alt="">
                            <input type="file" name="source_photo_profil" class="form-control">

                            <div class="small font-italic text-muted mb-4">Format PNG inférieure à 5 Mo</div>

                            <input type="submit" class="btn btn-primary" value="Modifier l'image">
                        </form>
                    </div>
                    <div class="card mb-4 mt-4">
                        <div class="card-header">Paramètres d'identification</div>
                        <div class="card-body">
                            <form method="post" action="index.php" name="formUpdateIdentification">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="update_parametres_identification">
                                <input type="hidden" name="token" value="{$token}">
                                <div class="mb-3">
                                    <label class="small mb-1" for="usr_email">Email : </label>
                                    <input class="form-control" id="usr_email" name="usr_email" type="text" value="{$user->getUsr_email()}">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="usr_mot_de_passe">Mot de passe : </label>
                                    <input class="form-control" id="usr_mot_de_passe" name="usr_mot_de_passe" type="password" value="">
                                </div>
                                <!-- Save changes button-->
                                <input type="submit" class="btn btn-primary" value="Modifier les paramètres">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Informations personnelles</div>
                        <div class="card-body">
                            <form method="post" action="index.php" name="formInfosPersonnelles">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="modifier_profil">
                                <input type="hidden" name="token" value="{$token}">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_nom">Nom</label>
                                        <input class="form-control" id="che_nom" name="che_nom" type="text"
                                               value="{$chercheur->getChe_nom()}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_prenom">Prénom</label>
                                        <input class="form-control" id="che_prenom" name="che_prenom" type="text"
                                               value="{$chercheur->getChe_prenom()}">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_sexe">Sexe</label>
                                        <select class="form-control" name="che_sexe" id="che_sexe">
                                            {foreach $chercheur->getComboSexes() as $sexe}
                                                {if $chercheur->getChe_sexe() eq $sexe['sex_id']}
                                                    <option value="{$sexe['sex_id']}"
                                                            selected>{$sexe['sex_libelle']}</option>
                                                {else}
                                                    <option value="{$sexe['sex_id']}">{$sexe['sex_libelle']}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_date_naissance">Date de naissance</label>
                                        <input class="form-control" id="che_date_naissance" type="date"
                                               name="che_date_naissance"
                                               value="{$chercheur->getChe_date_naissance()}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_mail">Adresse mail :</label>
                                        <input class="form-control" id="che_mail" name="che_mail" type="text"
                                               value="{$chercheur->getChe_mail()}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_telephone">Téléphone</label>
                                        <input class="form-control" id="che_telephone" name="che_telephone" type="text"
                                               value="{$chercheur->getChe_telephone()}">
                                    </div>
                                </div>

                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="che_adresse">N° et voie</label>
                                    <input class="form-control" id="che_adresse" type="text" name="che_adresse"
                                           value="{$chercheur->getChe_adresse()}">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="che_ville">Ville</label>
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
    function submitFormNavOffres()
    {
        $("form[name='formNavOffres']").submit();
    }
</script>
<script>
    function submitFormNavProfil()
    {
        $("form[name='formNavProfil']").submit();
    }
</script>
<script>
    function submitFormNavDashboard()
    {
        $("form[name='formNavDashboard']").submit();
    }
</script>
<script>
    function submitFormNavCV()
    {
        $("form[name='formNavCV']").submit();
    }
</script>


</html>