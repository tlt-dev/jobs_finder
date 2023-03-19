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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img class="navbar-brand" style="max-width: 50px;" src="../int/documents/2/logo.png"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" method="post" action="index.php">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" value="consulter_profil">
                    <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                    <input type="submit" class="btn btn-outline-light" value="Profil">
                </form>
                <form class="d-flex" method="post" action="index.php">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" value="consulter_suivi">
                    <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                    <input type="submit" class="btn btn-outline-light" value="Suivi">
                </form>
                <form class="d-flex" method="post" action="index.php">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" value="generer_liste_offre">
                    <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                    <input type="submit" class="btn btn-outline-light" value="Offres">
                </form>
            </div>
        </div>
    </nav>
</head>





<body>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>