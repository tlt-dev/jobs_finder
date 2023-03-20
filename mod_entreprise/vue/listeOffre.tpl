<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                        <p class="nav-link" onclick="submitFormNavAccueil()">Acceuil</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>
    <h1>{$titre}</h1>

    {if $messageSucces}
        <p><strong>{$messageSucces}</strong></p>
    {/if}
    <div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Intitulé</th>
                <th>Ville</th>
                <th>Secteur</th>
                <th>Date début</th>
                <th>Durée</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                {foreach $listeOffres as $offre}
                    <tr>
                        <td>{$offre->getOff_id()}</td>
                        <td>{$offre->getOff_intitule()}</td>
                        <td>{$listeVilles[$offre->getOff_ville()]['vil_nom']}</td>
                        <td>{$listeSecteurActivite[$offre->getOff_secteur_activite()]}</td>
                        <td>{$offre->getOff_date_prise_poste()}</td>
                        {if $offre->getOff_type_contrat() != 1}
                            <td>{$offre->getOff_type_contrat()} mois</td>
                        {else}
                            <td>CDI</td>
                        {/if}
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="gestion" value="offre">
                                <input type="hidden" name="action" value="form_offre">
                                <input type="hidden" name="id" value="{$offre->getOff_id()}">
                                <input type="hidden" name="token" value="{$token}">

                                <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="gestion" value="offre">
                                <input type="hidden" name="action" value="supprimer_offre">
                                <input type="hidden" name="id" value="{$offre->getOff_id()}">
                                <input type="hidden" name="token" value="{$token}">

                                <button type="submit" class="btn btn-primary" value="Supprimer">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        <form method="post" action="index.php">
            <input type="hidden" name="gestion" value="offre">
            <input type="hidden" name="action" value="form_offre">
            <input type="hidden" name="token" value="{$token}">
            <button type="submit" class="btn btn-primary" value="Creer">Créer</button>
        </form>
        <form method="post" action="index.php">
            <input type="hidden" name="gestion" value="entreprise">
            <input type="hidden" name="action" value="generer_dashboard">
            <input type="hidden" name="token" value="{$token}">

            <button type="submit" class="btn btn-primary" value="Retour">Retour</button>
        </form>
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