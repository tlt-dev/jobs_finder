<?php
/* Smarty version 4.2.1, created on 2023-02-27 10:22:42
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_entreprise/vue/profilEntrepriseV1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63fc8472683828_81764959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e68f95b403b45744a795808a1d55a8dda3a1f507' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_entreprise/vue/profilEntrepriseV1.tpl',
      1 => 1677493358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fc8472683828_81764959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    <link href="mod_entreprise/assets/entreprise.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

</head>

<body>
<form method="post" action="index.php">
    <div class="container-fluid">

        <div class="container">
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i
                            class="bi bi-arrow-left-square me-2"></i></a> Personnaliser votre entreprise</h2>
                <div class="hstack gap-3">
                    
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="modifier_entreprise">
                        <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">
                        <button type="submit" class="btn btn-primary" value="Modifier">Sauvegarder </button>
                    
                </div>
            </div>
            <!-- Main content -->
            <div class="row">
                <!-- Left side -->
                <div class="col-lg-8">
                    <!-- Basic information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Basic information</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nom *</label>
                                        <input type="text" class="form-control" name="ent_nom"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_nom();?>
">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value['usr_email'];?>
">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">SIRET *</label>
                                        <input type="text" class="form-control" name="ent_siret"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_siret();?>
">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">SIREN *</label>
                                        <input type="text" class="form-control" name="ent_siren"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_siren();?>
">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Address</h3>
                            <div class="mb-3">
                                <label class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" name="ent_adresse1"
                                    value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse1();?>
">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse2"
                                    value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse2();?>
">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse3"
                                    value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse3();?>
">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse4"
                                    value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse4();?>
">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Ville * </label>
                                        <select name="ent_ville" class="form-control">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeVilles']->value, 'villes');
$_smarty_tpl->tpl_vars['villes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['villes']->value) {
$_smarty_tpl->tpl_vars['villes']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['villes']->value['vil_id'] == $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_ville()) {?>

                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['villes']->value['vil_id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['villes']->value['vil_nom'];?>

                                                    </option>
                                                <?php } else { ?>

                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['villes']->value['vil_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['villes']->value['vil_nom'];?>
</option>

                                                <?php }?>

                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-lg-4">
                    <!-- Status -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Information complémentaire</h3>
                            <label class="form-label">SA *</label>
                            <select name="ent_secteur_activite" class="form-control">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeSecteurs']->value, 'secteurs');
$_smarty_tpl->tpl_vars['secteurs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['secteurs']->value) {
$_smarty_tpl->tpl_vars['secteurs']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['secteurs']->value['sea_id'] == $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_secteur_activite()) {?>

                                        <option value="<?php echo $_smarty_tpl->tpl_vars['secteurs']->value['sea_id'];?>
" selected>
                                            <?php echo $_smarty_tpl->tpl_vars['secteurs']->value['sea_libelle'];?>
</option>
                                    <?php } else { ?>

                                        <option value="<?php echo $_smarty_tpl->tpl_vars['secteurs']->value['sea_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['secteurs']->value['sea_libelle'];?>

                                        </option>

                                    <?php }?>

                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <label class="form-label">Statut *</label>
                            <select name="ent_statut" class="form-control">

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeStatuts']->value, 'statuts');
$_smarty_tpl->tpl_vars['statuts']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['statuts']->value) {
$_smarty_tpl->tpl_vars['statuts']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['statuts']->value['stj_id'] == $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_statut()) {?>

                                        <option value="<?php echo $_smarty_tpl->tpl_vars['statuts']->value['stj_id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['statuts']->value['stj_libelle'];?>

                                        </option>
                                    <?php } else { ?>

                                        <option value="<?php echo $_smarty_tpl->tpl_vars['statuts']->value['stj_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['statuts']->value['stj_libelle'];?>
</option>

                                    <?php }?>

                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <div class="mb-3">
                                <label class="form-label">CA *</label>
                                <input type="text" class="form-control" name="ent_chiffre_affaires" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_chiffre_affaires();?>
">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date de création *</label>
                                <input type="date" class="form-control" name="ent_date_creation" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_date_creation();?>
">
                            </div>
                        </div>
                    </div>
                    <!-- Avatar -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Avatar</h3>
                            <input class="form-control" type="file">
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Description *</h3>
                            <textarea class="form-control" name="ent_descriptif" rows="3">
                            <?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_descriptif();?>

                            </textarea>
                        </div>
                    </div>
                    <!-- Notification settings -->
                </div>
            </div>
        </div>
    </div>
</form>
</body>

</html><?php }
}
