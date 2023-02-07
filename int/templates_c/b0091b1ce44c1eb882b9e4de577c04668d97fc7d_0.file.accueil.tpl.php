<?php
/* Smarty version 4.2.1, created on 2023-02-07 14:17:02
  from '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_visiteur/vue/accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e25d5e7a57e0_55206238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0091b1ce44c1eb882b9e4de577c04668d97fc7d' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_visiteur/vue/accueil.tpl',
      1 => 1675745720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e25d5e7a57e0_55206238 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
