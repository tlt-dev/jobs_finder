<?php
/* Smarty version 4.2.1, created on 2023-03-14 20:06:25
  from 'C:\wamp64\www\jobs_finder\int\mod_offre\vue\listeOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6410d3c1c92f20_23743263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba575b09c1283c9101feb40948eb064b1c250b96' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_offre\\vue\\listeOffre.tpl',
      1 => 1678818506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6410d3c1c92f20_23743263 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <h1><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h1>


</body>

<!--Bootstrap JS-->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
<?php echo '</script'; ?>
>

<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['messageSucces']->value) {?>
    <p><strong><?php echo $_smarty_tpl->tpl_vars['messageSucces']->value;?>
</strong></p>
<?php }?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeOffres']->value, 'offre');
$_smarty_tpl->tpl_vars['offre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offre']->value) {
$_smarty_tpl->tpl_vars['offre']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_intitule();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['listeVilles']->value[$_smarty_tpl->tpl_vars['offre']->value->getOff_ville()]['vil_nom'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['listeSecteurActivite']->value[$_smarty_tpl->tpl_vars['offre']->value->getOff_secteur_activite()];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_date_prise_poste();?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat() == 1) {?>
                        <td>CDI</td>
                    <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_duree();?>
 mois</td>
                    <?php }?>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="form_offre">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">

                            <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="supprimer_offre">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">

                            <button type="submit" class="btn btn-primary" value="Supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="offre">
        <input type="hidden" name="action" value="form_offre">
        <button type="submit" class="btn btn-primary" value="Creer">Créer</button>
    </form>
</div>
</body>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
<?php echo '</script'; ?>
>

</html><?php }
}
