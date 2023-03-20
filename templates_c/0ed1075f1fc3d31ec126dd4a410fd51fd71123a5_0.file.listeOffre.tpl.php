<?php
/* Smarty version 4.2.1, created on 2023-03-20 08:58:34
  from 'C:\wamp64\www\jobs_finder\mod_entreprise\vue\listeOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6418203a965c79_01528306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ed1075f1fc3d31ec126dd4a410fd51fd71123a5' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\mod_entreprise\\vue\\listeOffre.tpl',
      1 => 1679302649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
  ),
),false)) {
function content_6418203a965c79_01528306 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <h1><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h1>

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
                        <?php if ($_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat() != 1) {?>
                            <td><?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_type_contrat();?>
 mois</td>
                        <?php } else { ?>
                            <td>CDI</td>
                        <?php }?>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="gestion" value="offre">
                                <input type="hidden" name="action" value="form_offre">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['offre']->value->getOff_id();?>
">
                                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
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
                                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
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
            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
            <button type="submit" class="btn btn-primary" value="Creer">Créer</button>
        </form>
        <form method="post" action="index.php">
            <input type="hidden" name="gestion" value="entreprise">
            <input type="hidden" name="action" value="generer_dashboard">
            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

            <button type="submit" class="btn btn-primary" value="Retour">Retour</button>
        </form>
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
