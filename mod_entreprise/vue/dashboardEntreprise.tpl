<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


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

<div class="row mt-3 justify-content-center">
    <div class="col-6">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Recherche</div>
            <div class="card-body">
                <form method="post" action="index.php" name="rechercheEmploi">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" value="recherche_chercheur_emploi">
                    <input type="hidden" name="token" value="{$token}">
                    <label for="poste_recherche">Poste recherché</label>
                    <select class="form-select" name="competenceMultiSelect[]" id="multiple-select-field"
                            data-placeholder="Choose anything" multiple>
                        {foreach $listeCompetence as $competence}
                            <option value="{$competence['com_id']}">{$competence['com_libelle']}
                            </option>
                        {/foreach}
                    </select>

                    <input type="submit" class="btn btn-primary mt-3" value="Rechercher">
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

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
        </div>

    </div>


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
    $("form[name='rechercheEmploi']").submit(function (e) {
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
            console.log(response);
            $.each(response.listeChercheurEmploiFilter, function (i, val) {
                $.each(val, function (index, value) {
                    if (index == 0) {
                        $("#carouselExampleControls").append(
                            '<div class="carousel-item active"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                            value.che_nom + " " + value.che_prenom +
                            '</div><div class="card-body"><img style="max-width: 50px;" src="mod_chercheur/documents/' +
                            value.che_id +
                            '/logo.png"></img><p class="card-text"></p></div></div><div class="row justify-content-center"><img style="max-width: 450px;" src="../int/mod_chercheur/documents/' +
                            value.che_id + '/cv.png"></img></div></div>'
                        );
                    } else {
                        $("#carouselExampleControls").append(
                            '<div class="carousel-item"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                            value.che_nom + " " + value.che_prenom +
                            '</div><div class="card-body"><img style="max-width: 50px;" src="mod_chercheur/documents/' +
                            value.che_id +
                            '/logo.png"></img><p class="card-text"></p></div></div>  <div class="row justify-content-center"><img style="max-width: 450px;" src="../int/mod_chercheur/documents/' +
                            value.che_id + '/cv.png"></img></div></div>'
                        );
                    }
                });
            });
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
    function submitFormNavAccueil() {
        $("form[name='FormNavAccueil']").submit();
    }
</script>

</html>