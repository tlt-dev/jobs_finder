<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entreprise</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="entreprise">
    <input type="hidden" name="action" value="consulter_profil">
    <input type="hidden" name="ent_id"  value="{$entreprise->getEnt_id()}">
    <input type="submit" class="btn btn-danger" value="Profil">
</form>


</body>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

</html>