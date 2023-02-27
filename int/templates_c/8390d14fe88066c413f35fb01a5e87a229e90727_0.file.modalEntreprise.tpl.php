<?php
/* Smarty version 4.2.1, created on 2023-02-27 09:48:59
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_entreprise/vue/modalEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63fc7c8b928b63_68947316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8390d14fe88066c413f35fb01a5e87a229e90727' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_entreprise/vue/modalEntreprise.tpl',
      1 => 1675745720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fc7c8b928b63_68947316 (Smarty_Internal_Template $_smarty_tpl) {
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
