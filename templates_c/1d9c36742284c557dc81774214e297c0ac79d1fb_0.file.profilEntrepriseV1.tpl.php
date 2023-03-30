<?php
/* Smarty version 4.2.1, created on 2023-03-24 08:57:17
  from '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/profilEntrepriseV1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_641d65ed854171_36211744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d9c36742284c557dc81774214e297c0ac79d1fb' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/profilEntrepriseV1.tpl',
      1 => 1679648211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
  ),
),false)) {
function content_641d65ed854171_36211744 (Smarty_Internal_Template $_smarty_tpl) {
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



    <!--AJAX-->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <?php echo '</script'; ?>
>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
    <img class="navbar-brand" style="max-width: 50px;"
    src="mod_entreprise/documents/<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
/logo.png"></img>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item pe-4">
                    <form method="post" action="index.php" name="formNavOffres">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="generer_liste_offre">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                        <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="consulter_profil">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="consulter_profil_2">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil 2</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavDashboard">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="consulter_suivi">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="FormNavAccueil">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="generer_dashboard">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavAccueil()">Acceuil</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>

<form method="post" action="index.php" enctype="multipart/form-data">
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
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                        <button type="submit" class="btn btn-primary" value="Modifier">Sauvegarder</button>  
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
                            <h3 class="h6">Logo</h3>
                            <input class="form-control" type="file" name="source_logo" accept="image/png, image/jpeg">
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
<?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalDeconnexion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function submitFormNavOffres()
    {
        $("form[name='formNavOffres']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavProfil()
    {
        $("form[name='formNavProfil']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavDashboard()
    {
        $("form[name='formNavDashboard']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavAccueil()
    {
        $("form[name='FormNavAccueil']").submit();
    }
<?php echo '</script'; ?>
>

</html><?php }
}
