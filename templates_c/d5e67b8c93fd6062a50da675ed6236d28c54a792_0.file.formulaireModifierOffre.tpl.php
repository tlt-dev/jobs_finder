<?php
/* Smarty version 4.2.1, created on 2023-03-30 18:34:15
  from 'C:\wamp64\www\jobs_finder\mod_offre\vue\formulaireModifierOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6425d6275057e7_08922713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5e67b8c93fd6062a50da675ed6236d28c54a792' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\mod_offre\\vue\\formulaireModifierOffre.tpl',
      1 => 1680194987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6425d6275057e7_08922713 (Smarty_Internal_Template $_smarty_tpl) {
?><body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
        <link href="../../mod_offre/assets/offre.css" rel="stylesheet" />
        <link href="../../mod_offre/assets/offre.js" rel="text/javascript" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
            integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    </head>
    <?php echo '<script'; ?>
 type="text/javascript">
        function setDureeInput() {
            var selection = document.getElementById("typeContratSelect").value;
            document.getElementById("dureeInput").style.display = selection == 1 ? 'none' : 'block';
        }

        // Date aujourd'hui
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd; 
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("#datePrisePoste").setAttribute("min", today);
    <?php echo '</script'; ?>
>

    <body>

        <div class="container-fluid">
            <form method="post" action="index.php">
                <div class="container">
                    <!-- Title -->
                    <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                        <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i
                                    class="bi bi-arrow-left-square me-2"></i></a> <?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h2>
                        <div class="hstack gap-3">

                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                            <input type="hidden" name="off_id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">
                            <button type="submit" class="btn btn-primary" value="Sauvegarder">Sauvegarder </button>

                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row">
                        <!-- Left side -->
                        <div class="col-lg-8">
                            <!-- Basic information -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Intitulé</label>
                                                <input type="text" name="off_intitule" class="form-control"
                                                    value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_intitule();?>
" placeholder="Intitule du poste"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Secteur d'activité</label>
                                                <select name="off_secteur_activite" class="form-control">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeSecteurActivite']->value, 'secteur', false, 'secteurId');
$_smarty_tpl->tpl_vars['secteur']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['secteurId']->value => $_smarty_tpl->tpl_vars['secteur']->value) {
$_smarty_tpl->tpl_vars['secteur']->do_else = false;
?>
                                                        <?php if ($_smarty_tpl->tpl_vars['secteurId']->value == $_smarty_tpl->tpl_vars['offre']->value->getOff_secteur_activite()) {?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['secteurId']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['secteur']->value;?>
</option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['secteurId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['secteur']->value;?>
</option>
                                                        <?php }?>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Poste</label>
                                            <select name="off_poste" class="form-control">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePoste']->value, 'poste');
$_smarty_tpl->tpl_vars['poste']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['poste']->value) {
$_smarty_tpl->tpl_vars['poste']->do_else = false;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['poste']->value["pos_id"];?>
"><?php echo $_smarty_tpl->tpl_vars['poste']->value["pos_libelle"];?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Ville</label>
                                        <select name="off_ville" class="form-control">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeVilles']->value, 'ville', false, 'villeId');
$_smarty_tpl->tpl_vars['ville']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['villeId']->value => $_smarty_tpl->tpl_vars['ville']->value) {
$_smarty_tpl->tpl_vars['ville']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['villeId']->value == $_smarty_tpl->tpl_vars['offre']->value->getOff_ville()) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['villeId']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_nom'];?>
</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['villeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_nom'];?>
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
                        <div class="card mb-4">
                            <div class="mb-3">
                                <label class="form-label">Date de prise de fonction</label>
                                <input type="date" name="off_date_prise_poste" class="form-control" id="datePrisePoste"
                                    value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_date_prise_poste();?>
" placeholder="Date de prise du poste"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Salaire</label>
                                <select name="off_salaire" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeSalaire']->value, 'salaire', false, 'salaireId');
$_smarty_tpl->tpl_vars['salaire']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['salaireId']->value => $_smarty_tpl->tpl_vars['salaire']->value) {
$_smarty_tpl->tpl_vars['salaire']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['salaireId']->value == $_smarty_tpl->tpl_vars['offre']->value->getOff_salaire()) {?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['salaireId']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['salaire']->value;?>
</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['salaireId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['salaire']->value;?>
</option>
                                        <?php }?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Type de contrat</label>
                                    <select id="typeContratSelect" name="off_type_contrat" class="form-control"
                                        onchange="setDureeInput()">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeTypeContrat']->value, 'typeContrat', false, 'typeContratId');
$_smarty_tpl->tpl_vars['typeContrat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['typeContratId']->value => $_smarty_tpl->tpl_vars['typeContrat']->value) {
$_smarty_tpl->tpl_vars['typeContrat']->do_else = false;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['typeContratId']->value == $_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat()) {?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeContratId']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['typeContrat']->value;?>
</option>
                                            <?php } else { ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeContratId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['typeContrat']->value;?>
</option>
                                            <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat() == 1) {?>
                                    <div id="dureeInput" class="col-lg-6" style="display: none">
                                        <label class="form-label">Durée du contrat en mois</label>
                                        <input type="number" name="off_duree" class="form-control" id="inputDuree" min="1"
                                            value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_duree();?>
" placeholder="Durée du poste">
                                    </div>
                                <?php } else { ?>
                                    <div id="dureeInput" class="col-lg-6">
                                        <label class="form-label">Durée du contrat en mois</label>
                                        <input type="number" name="off_duree" class="form-control" id="inputDuree" min="1"
                                            value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_duree();?>
" placeholder="Durée du poste">
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <!-- Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Description</h3>
                                <textarea name="off_descriptif" class="form-control" rows="3">
                                                <?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_descriptif();?>

                                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html><?php }
}
