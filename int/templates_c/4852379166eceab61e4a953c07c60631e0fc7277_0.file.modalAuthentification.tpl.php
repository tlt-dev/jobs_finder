<?php
/* Smarty version 4.2.1, created on 2023-02-27 10:00:49
  from '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_authentification/vue/modalAuthentification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63fc7f51a4a3c6_22686577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4852379166eceab61e4a953c07c60631e0fc7277' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_authentification/vue/modalAuthentification.tpl',
      1 => 1677485052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fc7f51a4a3c6_22686577 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalAuthentification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAuthentificationTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAuthentificationTitre">Authentification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="index.php">
            <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" value="verifier_utilisateur">

                    <label for="email" class="form-label">Adresse mail : </label>
                    <input type="text" id="email" class="form-control" name="usr_email" value="">

                    <label for="mdp" class="form-label">Mot de passe :</label>
                    <input type="text" id="mdp" class="form-control" name="usr_mot_de_passe" value="">

            </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Se connecter">
                </div>
            </form>


        </div>
    </div>
</div><?php }
}
