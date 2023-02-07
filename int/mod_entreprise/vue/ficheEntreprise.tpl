<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>

</head>
<body>



<div>
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="entreprise">
        <input type="hidden" name="action" value="{$action}">
        <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
        <input type="text" name="ent_nom" class="form-control" value="{$entreprise->getEnt_nom()}" placeholder="titre">
        <input type="submit" value="{$action|capitalize}">
    </form>
</div>

</body>
</html>