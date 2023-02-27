<?php
/* Smarty version 4.2.1, created on 2023-02-06 17:01:29
  from 'C:\wamp64\www\jobs_finder\int\mod_offre\vue\formulaireModifierOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e13269aa34a2_64740540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bba7f0be8afe55f9173058cf3e6ddd68584e604' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_offre\\vue\\formulaireModifierOffre.tpl',
      1 => 1675702881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e13269aa34a2_64740540 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
</head>

<h1><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h1>

<div>
    <form method="post" action="index.php">
        <table>
            <input type="hidden" name="gestion" value="entreprise">
            <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
            <input type="hidden" name="off_id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">

            <tr>
                <td>
                    <input type="text" name="off_intitule" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_intitule();?>
"
                        placeholder="intitule">
                </td>
                <td>
                    <input type="text" name="off_secteur_activite" class="form-control"
                        value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_secteur_activite();?>
" placeholder="secteur_activite">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="off_ville" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_ville();?>
"
                        placeholder="ville">
                </td>
                <td>
                    <input type="number" name="off_cp_ville" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_cp_ville();?>
"
                        placeholder="cp_ville">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="date" name="off_date_prise_poste" class="form-control"
                        value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_date_prise_poste();?>
" placeholder="date_prise_poste">
                </td>
                <td>
                    <input type="number" name="off_salaire" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_salaire();?>
"
                        placeholder="salaire">
                </td>
                <td>
                    <input type="number" name="off_duree" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_duree();?>
"
                        placeholder="duree">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="off_descriptif" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_descriptif();?>
"
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

<body><?php }
}
