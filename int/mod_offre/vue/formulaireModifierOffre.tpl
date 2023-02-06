<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
</head>

<h1>{$titre}</h1>

<div>
    <form method="post" action="index.php">
        <table>
            <input type="hidden" name="gestion" value="entreprise">
            <input type="hidden" name="action" value="{$action}">
            <input type="hidden" name="off_id" value="{$offre->getOff_id()}">
            <tr>
                <td>
                    <input type="text" name="off_intitule" class="form-control" value="{$offre->getOff_intitule()}"
                        placeholder="intitule">
                </td>
                <td>
                    <input type="text" name="off_secteur_activite" class="form-control"
                        value="{$offre->getOff_secteur_activite()}" placeholder="secteur_activite">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="off_ville" class="form-control" value="{$offre->getOff_ville()}"
                        placeholder="ville">
                </td>
                <td>
                    <input type="number" name="off_cp_ville" class="form-control" value="{$offre->getOff_cp_ville()}"
                        placeholder="cp_ville">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="date" name="off_date_prise_poste" class="form-control"
                        value="{$offre->getOff_date_prise_poste()}" placeholder="date_prise_poste">
                </td>
                <td>
                    <input type="number" name="off_salaire" class="form-control" value="{$offre->getOff_salaire()}"
                        placeholder="salaire">
                </td>
                <td>
                    <input type="number" name="off_duree" class="form-control" value="{$offre->getOff_duree()}"
                        placeholder="duree">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="off_descriptif" class="form-control" value="{$offre->getOff_descriptif()}"
                        placeholder="descriptif">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Modifier">
                </td>
            </tr>
        </table>
    </form>
</div>

<body>