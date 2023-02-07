<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Titre</th>
        <th></th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        {foreach $listeEntreprises as $entreprise}
            <tr>
                <td>{$entreprise->getEnt_id()}</td>
                <td>{$entreprise->getEnt_nom()}</td>

                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="form_modifier_entreprise">
                        <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">

                        <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                    </form>
                </td>
            </form>
                <td>
                    <form method="post" action="index.php" name="formModifierEntrepriseModal">

                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="form_modifier_entreprise_modal">
                        <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">

                        <input type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEntreprise" value="Modifier modal">
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="supprimer_entreprise">
                        <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                        <button type="submit" class="btn btn-danger" value="Supprimer">Supprimer</button>
                    </form>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>


{include file='./modalEntreprise.tpl'}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $("form[name='formModifierEntrepriseModal']").submit(function (e) {
        e.preventDefault(); //empêcher une action par défaut
        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: form_data,
            contentType: !1,
            cache: !1,
            processData: !1,
            dataType: 'JSON'
        }).done(function (response) {
            /*console.log(response);
            $('#action_modal').val(response.action);
            $('#titre_modal').val(response.ent_nom);
            $('#modalEntrepriseLabel').text(response.modal_label);
            $('#id_modal').val(response.ent_id);
            $('#button_modal').val(response.button);*/
        });
    });
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</html>