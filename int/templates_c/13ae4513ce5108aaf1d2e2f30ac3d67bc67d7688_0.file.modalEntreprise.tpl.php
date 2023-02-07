<?php
/* Smarty version 4.2.1, created on 2023-02-07 14:20:58
  from '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/modalEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e25e4ab7d438_72721248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13ae4513ce5108aaf1d2e2f30ac3d67bc67d7688' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/modalEntreprise.tpl',
      1 => 1675745720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e25e4ab7d438_72721248 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalEntreprise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntrepriseModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEntrepriseLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="index.php">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" id="action_modal" value="">
                    <input type="hidden" name="ent_id" id="id_modal" value="">

                    <input type="text" class="form-control" name="ent_nom" id="titre_modal" value="">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="button_modal" value="">
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
