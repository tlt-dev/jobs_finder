<?php
/* Smarty version 4.2.1, created on 2023-02-08 19:35:50
  from 'C:\wamp64\www\jobs_finder\int\mod_entreprise\vue\profilEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e3f9963e1da5_97750419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '772e751d7e9609282d28c66dd11ea7f0892af25c' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_entreprise\\vue\\profilEntreprise.tpl',
      1 => 1675884939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e3f9963e1da5_97750419 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    <link href="../../mod_entreprise/assets/entreprise.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-6 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nom *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_nom" aria-label="Nom"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_nom();?>
">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut *</label>
                                        <div class="col">
                                            <select name="ent_statut" class="form-control">
                                                <option value="">--Please choose an option--</option>
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
                                        </div>
                                    </div>

                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">SIRET *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_siret" aria-label="SIRET"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_siret();?>
">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">SIREN *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_siren" aria-label="SIREN"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_siren();?>
">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input type="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value['usr_email'];?>
">
                                    </div>
                                    <!-- Skype -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut *</label>
                                        <div class="col">
                                            <select name="ent_ville" class="form-control">
                                                <option value="">--Please choose an option--</option>
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
                                    <div class="col-md-6">
                                        <label class="form-label">CA *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_chiffre_affaires" aria-label="CA"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_chiffre_affaires();?>
">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">SA *</label>
                                        <div class="col">
                                            <select name="ent_secteur_activite" class="form-control">
                                                <option value="">--Please choose an option--</option>
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
                                        </div>
                                    </div>
                                    <!-- Mobile number -->

                                    <div class="col">
                                        <label class="form-label">date *</label>
                                        <input type="date" class="form-control" placeholder="" name="ent_date_creation" aria-label="date"
                                            value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_date_creation();?>
">

                                        <div class="col">
                                            <label class="form-label">Adresse 1*</label>
                                            <input type="text" class="form-control" name="ent_adresse1" placeholder=""
                                                aria-label="Adresse 1" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse1();?>
">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 2 *</label>
                                            <input type="text" class="form-control" name="ent_adresse2" placeholder=""
                                                aria-label="Adresse 2" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse2();?>
">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 3 *</label>
                                            <input type="text" class="form-control" name="ent_adresse3" placeholder=""
                                                aria-label="Adresse 3" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse3();?>
">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 4 *</label>
                                            <input type="text" class="form-control" name="ent_adresse4" placeholder=""
                                                aria-label="Adresse 4" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_adresse4();?>
">
                                        </div>
                                    </div>
                                    <label for="toto">Description *</label>

                                    <textarea id="toto" name="ent_descriptif">
                                 <?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_descriptif();?>

                                </textarea>


                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <form method="post" action="index.php">
                                <input type="hidden" name="gestion" value="entreprise">
                                <input type="hidden" name="action" value="modifier_entreprise">
                                <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">
                                <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                            </form>
                        </div>
                    </div>
            </div>

</body>

</html><?php }
}
