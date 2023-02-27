<?php
/* Smarty version 3.1.29, created on 2023-02-22 10:55:29
  from "/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/modalAuthentification.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_63f5f4a170fba6_43532262',
  'file_dependency' => 
  array (
    'd3f8d4ee0d864f3def88315de2fc53a6fe218192' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/modalAuthentification.tpl',
      1 => 1677063327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63f5f4a170fba6_43532262 ($_smarty_tpl) {
?>
<!-- Modal -->
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
