<?php
/* Smarty version 4.2.1, created on 2023-03-30 18:35:37
  from 'C:\wamp64\www\jobs_finder\mod_authentification\vue\modalInscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6425d679863563_77328401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16eb26388733e7a845721a212a208f7298b2b02b' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\mod_authentification\\vue\\modalInscription.tpl',
      1 => 1680194987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6425d679863563_77328401 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalInscription" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalInscriptionTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInscriptionTitre">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="inscriptionMessage">
                    <p id="inscriptionMessageContent"></p>
                </div>
            </div>
            <form method="post" action="index.php" name="formInscription" id="formInscription" class="mt-0">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" id="formInscription_action" value="verifier_inscription">

                    <label for="type_1">Qui êtes-vous ?</label>

                    <input type="radio" class="form-check-input" id="type_1" name="usr_est_chercheur_emploi" value="1"
                           checked>
                    <label for="type_1" class="form-check-label">Chercheur d'emploi</label>

                    <input type="radio" class="form-check-input" id="type_2" name="usr_est_chercheur_emploi" value="0">
                    <label for="type_2" class="form-check-label">Entreprise</label>

                    <label for="che_nom" id="label_che_nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" name="che_nom" id="che_nom" value="">

                    <label for="ent_nom" id="label_ent_nom" class="form-label d-none">Nom :</label>
                    <input type="text" class="form-control d-none" name="ent_nom" id="ent_nom" value="">

                    <label for="che_prenom" class="form-label" id="label_prenom">Prénom</label>
                    <input type="text" class="form-control" name="che_prenom" id="che_prenom" value="">

                    <label for="usr_email" class="form-label">Adresse mail :</label>
                    <input type="text" class="form-control" name="usr_email" id="usr_email" value="">

                    <label for="usr_mot_de_passe" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="usr_mot_de_passe" id="usr_mot_de_passe" value="">


                </div>
                <div class="modal-footer">
                    <a data-bs-target="#modalAuthentification" data-bs-toggle="modal" href="#modalAuthentification" data-bs-dismiss="modal">Déjà
                        un compte ? Connectez-vous</a>
                    <input type="submit" class="btn btn-primary" value="S'inscrire">
                </div>
            </form>

            <form method="post" action="index.php" id="formInscriptionHidden">
                <input type="hidden" name="gestion" value="authentification">
                <input type="hidden" name="action" id="formInscription_action" value="inscription">
                <input type="hidden" name="usr_est_chercheur_emploi" id="formInscription_est_chercheur_emploi" value="">
                <input type="hidden" name="che_nom" id="formInscription_che_nom" value="">
                <input type="hidden" name="che_prenom" id="formInscription_che_prenom" value="">
                <input type="hidden" name="ent_nom" id="formInscription_ent_nom" value="">
                <input type="hidden" name="usr_email" id="formInscription_email" value="">
                <input type="hidden" name="usr_mot_de_passe" id="formInscription_mot_de_passe" value="">
            </form>


        </div>
    </div>
</div><?php }
}
