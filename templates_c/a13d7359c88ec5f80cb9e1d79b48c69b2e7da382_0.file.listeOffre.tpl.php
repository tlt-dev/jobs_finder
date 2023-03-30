<?php
/* Smarty version 4.2.1, created on 2023-03-21 13:54:11
  from '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/listeOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6419b70358a1d3_68581572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a13d7359c88ec5f80cb9e1d79b48c69b2e7da382' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/listeOffre.tpl',
      1 => 1679406849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
  ),
),false)) {
function content_6419b70358a1d3_68581572 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mod_entreprise/assets/entreprise.css">
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
                        <p class="nav-link" onclick="submitFormNavAccueil()">Accueil</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row text-center mt-3">
        <div class="col">
            <h2><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h2>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['messageErreur']->value != '') {?>
        <div class="row justify-content-center mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo $_smarty_tpl->tpl_vars['messageErreur']->value;?>

                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['messageSucces']->value != '') {?>
        <div class="row justify-content-center mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo $_smarty_tpl->tpl_vars['messageSucces']->value;?>

                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        </div>
    <?php }?>
    <div class="row mt-3 justify-content-center">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeOffres']->value, 'offre');
$_smarty_tpl->tpl_vars['offre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offre']->value) {
$_smarty_tpl->tpl_vars['offre']->do_else = false;
?>
            <div class="col-3 m-4  border-radius">
                <div class="row text-center mt-2">
                    <div class="col">
                        <h5><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_intitule();?>
</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_ville" class="form-label">Ville</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_ville"><strong><?php echo $_smarty_tpl->tpl_vars['listeVilles']->value[$_smarty_tpl->tpl_vars['offre']->value->getOff_ville()]['vil_nom'];?>
</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_date_prise_poste" class="form-label">Prise de poste</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_date_prise_poste"><strong><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_date_prise_poste();?>
</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_type_contrat" class="form-label">Type de contrat</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_type_contrat"><strong><?php echo $_smarty_tpl->tpl_vars['listeTypeContrat']->value[$_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat()];?>
</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-center">
                            <div class="col">
                                <label for="off_duree" class="form-label">Durée</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p id="off_duree"><strong>
                                        <?php if ($_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat() != 1) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_duree();?>
 mois
                                        <?php } else { ?>
                                            -
                                        <?php }?>
                                    </strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col">
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="form_offre">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">
                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                            <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="supprimer_offre">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">
                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                            <button type="submit" class="btn btn-danger" value="Supprimer">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

</div>


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
