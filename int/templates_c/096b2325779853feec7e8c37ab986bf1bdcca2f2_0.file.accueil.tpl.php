<?php
/* Smarty version 3.1.29, created on 2023-02-06 09:40:49
  from "C:\wamp64\www\jobs_finder\int\mod_visiteur\vue\accueil.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_63e0cb21651270_11965948',
  'file_dependency' => 
  array (
    '096b2325779853feec7e8c37ab986bf1bdcca2f2' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_visiteur\\vue\\accueil.tpl',
      1 => 1675676434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e0cb21651270_11965948 ($_smarty_tpl) {
?>
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

<h1>Accueil</h1>

<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="authentification">
    <input type="submit" class="btn btn-primary" value="Authentification">
</form>
<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="utilisateur">
    <input type="submit" class="btn btn-warning" value="Utilisateur">
</form>
<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="entreprise">
    <input type="submit" class="btn btn-danger" value="Entreprise">
</form>

</body>

<!--Bootstrap JS-->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"><?php echo '</script'; ?>
>

<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>

</html><?php }
}
