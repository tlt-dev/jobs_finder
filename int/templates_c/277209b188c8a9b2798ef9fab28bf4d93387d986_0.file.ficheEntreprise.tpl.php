<?php
/* Smarty version 4.2.1, created on 2023-02-07 14:24:36
  from '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/ficheEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e25f24dac568_42066328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '277209b188c8a9b2798ef9fab28bf4d93387d986' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/ficheEntreprise.tpl',
      1 => 1675745720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e25f24dac568_42066328 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/jobs_finder-matthieu/int/include/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>

</head>
<body>



<div>
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="entreprise">
        <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
        <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">
        <input type="text" name="ent_nom" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_nom();?>
" placeholder="titre">
        <input type="submit" value="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
">
    </form>
</div>

</body>
</html><?php }
}
