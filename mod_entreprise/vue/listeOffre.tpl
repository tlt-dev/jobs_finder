<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mod_entreprise/assets/entreprise.css">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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

<div class="container-fluid">
    <div class="row text-center mt-3">
        <div class="col">
            <h2>{$titre}</h2>
        </div>
    </div>
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
    <div class="row mt-3 justify-content-center">
        {foreach $listeOffres as $offre}
            <div class="col-3 m-4  border-radius">
                <div class="row text-center mt-2">
                    <div class="col">
                        <h5>{$offre->getOff_intitule()}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_ville" class="form-label">Ville</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_ville"><strong>{$listeVilles[$offre->getOff_ville()]['vil_nom']}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_date_prise_poste" class="form-label">Prise de poste</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_date_prise_poste"><strong>{$offre->getOff_date_prise_poste()}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_type_contrat" class="form-label">Type de contrat</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_type_contrat"><strong>{$listeTypeContrat[$offre->getOff_type_contrat()]}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_duree" class="form-label">Durée</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_duree"><strong>
                                        {if $offre->getOff_type_contrat() neq 1}
                                            {$offre->getOff_duree()} mois
                                        {else}
                                            -
                                        {/if}
                                    </strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col">
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="form_offre">
                            <input type="hidden" name="id" value="{$offre->getOff_id()}">
                            <input type="hidden" name="token" value="{$token}">

                            <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="supprimer_offre">
                            <input type="hidden" name="id" value="{$offre->getOff_id()}">
                            <input type="hidden" name="token" value="{$token}">

                            <button type="submit" class="btn btn-danger" value="Supprimer">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>

</div>


{include file="../../mod_authentification/vue/modalDeconnexion.tpl"}

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
    function submitFormNavAccueil()
    {
        $("form[name='FormNavAccueil']").submit();
    }
</script>

</html>