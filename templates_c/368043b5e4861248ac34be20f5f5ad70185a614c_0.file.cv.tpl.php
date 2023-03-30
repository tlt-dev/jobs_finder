<?php
/* Smarty version 4.2.1, created on 2023-03-30 18:36:23
  from 'C:\wamp64\www\jobs_finder\mod_chercheur\vue\cv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6425d6a709a362_44031825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '368043b5e4861248ac34be20f5f5ad70185a614c' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\mod_chercheur\\vue\\cv.tpl',
      1 => 1680194987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
    'file:mod_chercheur/vue/modalFormation.tpl' => 1,
    'file:mod_chercheur/vue/modalExperiencePro.tpl' => 1,
    'file:mod_chercheur/vue/modalCompetence.tpl' => 1,
    'file:mod_chercheur/vue/modalLangue.tpl' => 1,
    'file:mod_chercheur/vue/modalCentreInteret.tpl' => 1,
  ),
),false)) {
function content_6425d6a709a362_44031825 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="mod_chercheur/assets/chercheur.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item pe-4">
                    <form method="post" class="my-auto" action="index.php" name="formNavOffres">
                        <input type="hidden" name="gestion" value="visiteur">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_profil">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavDashboard">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_dashboard">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavCV">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_fiche_cv">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavCV()">CV</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>

<div class="container-fluid px-4 mt-4">

    <div class="row">
        <div class="col-5">
            <div class="accordion" id="accordionCV">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionInfosPersonnelles">
                        <button class="accordion-button collapsed" id="accordionButtonInfosPersonnelles" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionInfosPersonnellesContent" aria-expanded="true"
                                aria-controls="accordionInfosPersonnellesContent">
                            Informations Personnelles
                        </button>
                    </h2>
                    <div id="accordionInfosPersonnellesContent" class="accordion-collapse collapse"
                         aria-labelledby="accordionInfosPersonnelles"
                         data-bs-parent="#accordionCV">
                        <div class="accordion-body">
                            <form method="post" action="index.php" name="formInfosPersonnelles">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="update_infos_personnelles">
                                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                <div class="row">
                                    <div class="col-4">
                                        <label for="photo" class="form-label">Photo</label>
                                        <img class="w-75 d-block" id="photo"
                                             src="mod_chercheur/documents/<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_id();?>
/logo.png">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col">
                                                <label for="nom" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="che_nom"
                                                       value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_nom();?>
">
                                            </div>
                                            <div class="col">
                                                <label for="prenom" class="form-label">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" name="che_prenom"
                                                       value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_prenom();?>
">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="mail" class="form-label">Adresse mail</label>
                                                <input type="text" class="form-control" id="mail" name="che_mail"
                                                       value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_mail();?>
">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="telephone" class="form-label">Numéro de téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="che_telephone"
                                               value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_telephone();?>
">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="che_adresse"
                                               value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_adresse();?>
">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="code_postal" class="form-label">Code postal</label>
                                        <input type="text" class="form-control" id="code_postal" name="che_code_postal"
                                               value="<?php echo $_smarty_tpl->tpl_vars['chercheur']->value->getChe_code_postal();?>
">
                                    </div>
                                    <div class="col">
                                        <label for="ville" class="form-label">Ville</label>
                                        <select class="form-control" id="che_ville" name="che_ville">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chercheur']->value->getComboVilles(), 'ville');
$_smarty_tpl->tpl_vars['ville']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ville']->value) {
$_smarty_tpl->tpl_vars['ville']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['chercheur']->value->getChe_ville() == $_smarty_tpl->tpl_vars['ville']->value['vil_id']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_id'];?>
"
                                                            selected><?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_nom'];?>
</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ville']->value['vil_nom'];?>
</option>
                                                <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="en_recherche" class="form-check-label">En recherche ?</label>
                                        <input type="checkbox" class="form-check-input" name="che_en_recherche"
                                               <?php if ($_smarty_tpl->tpl_vars['chercheur']->value->getChe_en_recherche() == 1) {?>checked<?php }?>
                                               value="1">
                                    </div>
                                    <div class="offset-6 col-3">
                                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionProfil">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionProfilContent" aria-expanded="false" aria-controls="accordionProfilContent">
                            Profil
                        </button>
                    </h2>
                    <div id="accordionProfilContent" class="accordion-collapse collapse" aria-labelledby="accordionProfil"
                         data-bs-parent="#accordionCV">
                        <div class="accordion-body">
                            <form method="post" action="index.php" name="formProfil">
                                <input type="hidden" name="gestion" value="chercheur">
                                <input type="hidden" name="action" value="update_cv_description">
                                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                <div class="row">
                                    <div class="col">
                                        <label for="description" class="form-label">Profil</label>
                                        <textarea class="form-control" name="cv_description" id="description" rows="6"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="offset-9 col-3">
                                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionFormation">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionFormationContent" aria-expanded="false" aria-controls="accordionFormationContent">
                            Formation
                        </button>
                    </h2>
                    <div id="accordionFormationContent" class="accordion-collapse collapse" aria-labelledby="accordionFormation"
                         data-bs-parent="#accordionFormation">
                        <div class="accordion-body">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeFormationsChercheur']->value, 'formation');
$_smarty_tpl->tpl_vars['formation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['formation']->value) {
$_smarty_tpl->tpl_vars['formation']->do_else = false;
?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p><?php echo $_smarty_tpl->tpl_vars['formation']->value['for_formation'];?>
</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditFormation">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_formation">
                                                            <input type="hidden" name="for_id" value="<?php echo $_smarty_tpl->tpl_vars['formation']->value['for_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteFormation">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_formation">
                                                            <input type="hidden" name="for_id" value="<?php echo $_smarty_tpl->tpl_vars['formation']->value['for_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddFormation">
                                        <input type="hidden" name="token" id="formAddFormationToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une formation">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionExperiencePro">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionExperienceProContent" aria-expanded="false" aria-controls="accordionExperienceProContent">
                            Expérience personnelle
                        </button>
                    </h2>
                    <div id="accordionExperienceProContent" class="accordion-collapse collapse" aria-labelledby="accordionExperiencePro"
                         data-bs-parent="#accordionExperiencePro">
                        <div class="accordion-body">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeExperiencesProChercheur']->value, 'experiencePro');
$_smarty_tpl->tpl_vars['experiencePro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['experiencePro']->value) {
$_smarty_tpl->tpl_vars['experiencePro']->do_else = false;
?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p><?php echo $_smarty_tpl->tpl_vars['experiencePro']->value['exp_poste'];?>
</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditExperiencePro">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_experiencePro">
                                                            <input type="hidden" name="exp_id" value="<?php echo $_smarty_tpl->tpl_vars['experiencePro']->value['exp_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteExperiencePro">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_experiencePro">
                                                            <input type="hidden" name="exp_id" value="<?php echo $_smarty_tpl->tpl_vars['experiencePro']->value['exp_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddExperiencePro">
                                        <input type="hidden" name="token" id="formAddExperienceProToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une expérience professionnelle">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionCompetences">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionCompetencesContent" aria-expanded="false" aria-controls="accordionCompetencesContent">
                            Compétences
                        </button>
                    </h2>
                    <div id="accordionCompetencesContent" class="accordion-collapse collapse" aria-labelledby="accordionCompetences"
                         data-bs-parent="#accordionCompetences">
                        <div class="accordion-body">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeCompetencesChercheur']->value, 'competence');
$_smarty_tpl->tpl_vars['competence']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['competence']->value) {
$_smarty_tpl->tpl_vars['competence']->do_else = false;
?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p><?php echo $_smarty_tpl->tpl_vars['competence']->value['com_libelle'];?>
</p>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $_smarty_tpl->tpl_vars['competence']->value['niv_libelle'];?>
</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditCompetence">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_competence">
                                                            <input type="hidden" name="cce_id" value="<?php echo $_smarty_tpl->tpl_vars['competence']->value['cce_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteCompetence">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_competence">
                                                            <input type="hidden" name="cce_id" value="<?php echo $_smarty_tpl->tpl_vars['competence']->value['cce_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddCompetence">
                                        <input type="hidden" name="token" id="formAddCompetenceToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une compétence">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionLangues">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionLanguesContent" aria-expanded="false" aria-controls="accordionLanguesContent">
                            Langues
                        </button>
                    </h2>
                    <div id="accordionLanguesContent" class="accordion-collapse collapse" aria-labelledby="accordionLangues"
                         data-bs-parent="#accordionLangues">
                        <div class="accordion-body">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeLanguesChercheur']->value, 'langue');
$_smarty_tpl->tpl_vars['langue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['langue']->value) {
$_smarty_tpl->tpl_vars['langue']->do_else = false;
?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p><?php echo $_smarty_tpl->tpl_vars['langue']->value['lan_nom'];?>
</p>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $_smarty_tpl->tpl_vars['langue']->value['niv_libelle'];?>
</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditLangue">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_langue">
                                                            <input type="hidden" name="lce_id" value="<?php echo $_smarty_tpl->tpl_vars['langue']->value['lce_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteLangue">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_langue">
                                                            <input type="hidden" name="lce_id" value="<?php echo $_smarty_tpl->tpl_vars['langue']->value['lce_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddLangue">
                                        <input type="hidden" name="token" id="formAddLangueToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une langue">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="accordionCentresInteret">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordionCentresInteretContent" aria-expanded="false" aria-controls="accordionCentresInteretContent">
                            Centres d'intérêt
                        </button>
                    </h2>
                    <div id="accordionCentresInteretContent" class="accordion-collapse collapse" aria-labelledby="accordionCentresInteret"
                         data-bs-parent="#accordionCentresInteret">
                        <div class="accordion-body">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeCentresInteretChercheur']->value, 'centreInteret');
$_smarty_tpl->tpl_vars['centreInteret']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['centreInteret']->value) {
$_smarty_tpl->tpl_vars['centreInteret']->do_else = false;
?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p><?php echo $_smarty_tpl->tpl_vars['centreInteret']->value['cei_intitule'];?>
</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formEditCentreInteret">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="form_edit_centre_interet">
                                                            <input type="hidden" name="cei_id" value="<?php echo $_smarty_tpl->tpl_vars['centreInteret']->value['cei_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                                            <input type="submit" class="btn btn-outline-dark" value="Modifier">
                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <form method="post" action="index.php" name="formDeleteCentreInteret">
                                                            <input type="hidden" name="gestion" value="chercheur">
                                                            <input type="hidden" name="action" value="delete_centre_interet">
                                                            <input type="hidden" name="cei_id" value="<?php echo $_smarty_tpl->tpl_vars['centreInteret']->value['cei_id'];?>
">
                                                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">


                                                            <input type="submit" class="btn btn-outline-dark" value="Supprimer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row mt-3 text-center">
                                <div class="col">
                                    <form method="post" action="index.php" name="formAddCentreInteret">
                                        <input type="hidden" name="token" id="formAddCentreInteretToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                                        <input type="submit" class="btn btn-outline-dark" value="Ajouter un centre d'intérêt">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalDeconnexion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalFormation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalExperiencePro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalCompetence.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalLangue.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalCentreInteret.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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

<?php echo '<script'; ?>
>
    function submitFormNavOffres() {
        $("form[name='formNavOffres']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavProfil() {
        $("form[name='formNavProfil']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavDashboard() {
        $("form[name='formNavDashboard']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavCV() {
        $("form[name='formNavCV']").submit();
    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formInfosPersonnelles']").submit(function (e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission


        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

        });

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formProfil']").submit(function (e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission


        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

        });

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAddFormation']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalFormation'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
            {
                gestion:"chercheur",
                action:"get_liste_villes",
                token: $("#formAddFormationToken").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeVilles, function (index, value) {
                $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
            });
        });

        $("#modalFormationTitre").text("Ajout d'une formation");
        $("#formFormation_action").val('add_formation');
        $("#formFormation_token").val($("#formAddFormationToken").val());
        $("#formFormationButton").val('Ajouter');

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formDeleteInformation']").submit(function (e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission


        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

        });

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formEditFormation']").submit(function (e)
    {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#formFormation_formation").val(response.for_formation);
            $("#formFormation_etablissement").val(response.for_etablissement);
            $("#formFormation_date_debut").val(response.for_date_debut);
            $("#formFormation_date_fin").val(response.for_date_fin);
            $("#formFormation_description").val(response.for_description);
            $("#formFormation_id").val(response.for_id);
            $("#formFormation_token").val(response.token);
            $("#formFormation_action").val(response.action);
            $("#formFormationButton").val("Modifier");
            $("#modalFormationTitre").text("Modifier la formation");


            $.each(response.listeVilles, function (index, value) {
                if(value.vil_id === response.for_ville)
                    {
                        $("#formFormation_ville").append('<option value="' + value.vil_id + '" selected>' + value.vil_nom + '</option>');
                    }
                else
                    {
                        $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
                    }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalFormation'));
        myModal.show();



    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAddExperiencePro']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalExperiencePro'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"get_liste_villes",
                    token: $("#formAddExperienceProToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeVilles, function (index, value) {
                $("#formExperiencePro_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
            });
        });

        $("#modalExperienceProTitre").text("Ajout d'une expérience professionnelle");
        $("#formExperiencePro_action").val('add_experiencePro');
        $("#formExperiencePro_token").val($("#formAddExperienceProToken").val());
        $("#formExperienceProButton").val('Ajouter');

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formEditExperiencePro']").submit(function (e)
    {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#formExperiencePro_poste").val(response.exp_poste);
            $("#formExperiencePro_employeur").val(response.exp_employeur);
            $("#formExperiencePro_date_debut").val(response.exp_date_debut);
            $("#formExperiencePro_date_fin").val(response.exp_date_fin);
            $("#formExperiencePro_description").val(response.exp_description);
            $("#formExperiencePro_id").val(response.exp_id);
            $("#formExperiencePro_token").val(response.token);
            $("#formExperiencePro_action").val(response.action);
            $("#modalExperienceProTitre").text("Modifier l'expérience professionnelle");
            $("#formExperienceProButton").val("Modifier");



            $.each(response.listeVilles, function (index, value) {
                if(value.vil_id === response.for_ville)
                {
                    $("#formFormation_ville").append('<option value="' + value.vil_id + '" selected>' + value.vil_nom + '</option>');
                }
                else
                {
                    $("#formFormation_ville").append('<option value="' + value.vil_id + '">' + value.vil_nom + '</option>');
                }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalExperiencePro'));
        myModal.show();



    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAddCompetence']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalCompetence'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"form_add_competence",
                    token: $("#formAddCompetenceToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeCompetences, function (index, value) {
                $("#formCompetence_competence").append('<option value="' + value.com_id + '">' + value.com_libelle + '</option>');
            });
        });

        $("#modalCompetenceTitre").text("Ajout d'une compétence");
        $("#formCompetence_action").val('add_competence');
        $("#formCompetence_token").val($("#formAddCompetenceToken").val());
        $("#formCompetenceButton").val('Ajouter');

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formEditCompetence']").submit(function (e)
    {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#formCompetence_niveau").val(response.cce_niveau);
            $("#formCompetence_id").val(response.cce_id);
            $("#formCompetence_token").val(response.token);
            $("#formCompetence_action").val(response.action);
            $("#modalCompetenceTitre").text("Modifier la compétence");
            $("#formCompetenceButton").val("Modifier");



            $.each(response.listeCompetences, function (index, value) {
                if(value.com_id === response.cce_competence)
                {
                    $("#formCompetence_competence").append('<option value="' + value.com_id + '" selected>' + value.com_libelle + '</option>');
                }
                else
                {
                    $("#formCompetence_competence").append('<option value="' + value.com_id + '">' + value.com_libelle + '</option>');
                }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalCompetence'));
        myModal.show();



    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAddLangue']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalLangue'));
        myModal.show();

        $.ajax({
            url: "index.php",
            type: "POST",
            data:
                {
                    gestion:"chercheur",
                    action:"form_add_langue",
                    token: $("#formAddLangueToken").val()
                },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $.each(response.listeLangues, function (index, value) {
                $("#formLangue_langue").append('<option value="' + value.lan_id + '">' + value.lan_nom + '</option>');
            });
        });

        $("#modalLangueTitre").text("Ajout d'une langue");
        $("#formLangue_action").val('add_langue');
        $("#formLangue_token").val($("#formAddLangueToken").val());
        $("#formLangueButton").val('Ajouter');

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formEditLangue']").submit(function (e)
    {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#formLangue_niveau").val(response.lce_niveau);
            $("#formLangue_id").val(response.lce_id);
            $("#formLangue_token").val(response.token);
            $("#formLangue_action").val(response.action);
            $("#modalLangueTitre").text("Modifier la langue");
            $("#formLangueButton").val("Modifier");



            $.each(response.listeLangues, function (index, value) {
                if(value.lan_id === response.lce_langue)
                {
                    $("#formLangue_langue").append('<option value="' + value.lan_id + '" selected>' + value.lan_nom + '</option>');
                }
                else
                {
                    $("#formLangue_langue").append('<option value="' + value.lan_id + '">' + value.lan_nom + '</option>');
                }
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalLangue'));
        myModal.show();



    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAddCentreInteret']").submit(function (e)
    {
        e.preventDefault();

        var myModal = new bootstrap.Modal(document.getElementById('modalCentreInteret'));
        myModal.show();

        $("#modalCentreInteretTitre").text("Ajout d'un centre d'intérêt");
        $("#formCentreInteret_action").val('add_centre_interet');
        $("#formCentreInteret_token").val($("#formAddCentreInteretToken").val());
        $("#formCentreInteretButton").val('Ajouter');

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formEditCentreInteret']").submit(function (e)
    {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#formCentreInteret_id").val(response.cei_id);
            $("#formCentreInteret_token").val(response.token);
            $("#formCentreInteret_action").val(response.action);
            $("#modalCentreInteretTitre").text("Modifier le centre d'intérêt");
            $("#formCentreInteretButton").val("Modifier");
            $("#formCentreInteret_intitule").val(response.cei_intitule);
        });

        var myModal = new bootstrap.Modal(document.getElementById('modalCentreInteret'));
        myModal.show();



    });
<?php echo '</script'; ?>
>


</html><?php }
}
