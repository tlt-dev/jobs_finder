<?php
/* Smarty version 4.2.1, created on 2023-02-08 14:38:48
  from 'C:\wamp64\www\jobs_finder\int\mod_entreprise\vue\dashboardEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e3b3f8558010_56978654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea5dd1fa26808ce477fdf7e8bf4f7879e2d7698c' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_entreprise\\vue\\dashboardEntreprise.tpl',
      1 => 1675867066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e3b3f8558010_56978654 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <input type="hidden" name="ent_id"  value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">
    <input type="submit" class="btn btn-danger" value="Profil">
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
