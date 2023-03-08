<?php
/* Smarty version 4.2.1, created on 2023-03-08 23:01:58
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/modalInscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_640913e6546b23_89426718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e899573afa996320f54bcd8e2585a7220e4bc5c5' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/modalInscription.tpl',
      1 => 1677840109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640913e6546b23_89426718 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>
            <form method="post" action="index.php" name="formInscription" class="mt-0">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" value="inscription">

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


        </div>
    </div>
</div><?php }
}
