<?php
/* Smarty version 4.2.1, created on 2023-03-20 08:15:53
  from 'C:\wamp64\www\jobs_finder\mod_entreprise\vue\modalEntretien.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6418163972af34_51509318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec5b730131ced1be5f1ee472fd70349d428585af' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\mod_entreprise\\vue\\modalEntretien.tpl',
      1 => 1679249967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6418163972af34_51509318 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalEntretien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalEntretienTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalEntretienTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formEntretien">
                <input type="hidden" name="gestion" value="entreprise">
                <input type="hidden" name="action" id="formEntretien_action" value="add_entretien">
                <input type="hidden" name="ent_offre" id="formEntretien_offre" value="">
                <input type="hidden" name="ent_chercheur" id="formEntretien_chercheur" value="">
                <input type="hidden" name="token" id="formEntretien_token" value="">
                
                <div class="row text-center">
                    <div class="col">
                        <label for="formEntretien_date_entretien" class="form-label">Date d'entretien</label>
                        <input type="date" class="form-control" name="ent_date_entretien"
                            id="formEntretien_date_entretien" value="">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <label for="formEntretien_modalites" class="form-label">Modalités</label>
                        <input type="text" class="form-control" name="ent_modalites" id="formEntretien_modalites"
                            value="">
                    </div>
                </div>
                

                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formEntretienButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
