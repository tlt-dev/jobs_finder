<?php
/* Smarty version 4.2.1, created on 2023-03-19 09:27:50
  from '/Applications/MAMP/htdocs/jobs_finder/mod_authentification/vue/modalAuthentification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6416d5967cb9e3_68864480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a20ae25ac2e7747b11f7350892f6916d0202406' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_authentification/vue/modalAuthentification.tpl',
      1 => 1677838148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6416d5967cb9e3_68864480 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalAuthentification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalAuthentificationTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAuthentificationTitre">Authentification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>
            <form method="post" action="index.php" name="formAuthentification" class="mt-0">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" value="verifier_utilisateur">

                    <label for="email" class="form-label">Adresse mail : </label>
                    <input type="text" id="email" class="form-control" name="usr_email" value="">

                    <label for="mdp" class="form-label">Mot de passe :</label>
                    <input type="text" id="mdp" class="form-control" name="usr_mot_de_passe" value="">

                </div>
                <div class="modal-footer">
                    <a data-bs-target="#modalInscription" data-bs-toggle="modal" href="#modalInscription" data-bs-dismiss="modal">Pas encore inscrit ?</a>
                    <input type="submit" class="btn btn-primary" value="Se connecter">
                </div>
            </form>


        </div>
    </div>
</div><?php }
}