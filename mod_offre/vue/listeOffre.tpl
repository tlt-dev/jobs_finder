<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <h1>{$titre}</h1>


</body>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

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
                    <td>{$offre->getOff_duree()} mois</td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="form_offre">
                            <input type="hidden" name="id" value="{$offre->getOff_id()}">

                            <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="supprimer_offre">
                            <input type="hidden" name="id" value="{$offre->getOff_id()}">

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
        <button type="submit" class="btn btn-primary" value="Creer">Créer</button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>