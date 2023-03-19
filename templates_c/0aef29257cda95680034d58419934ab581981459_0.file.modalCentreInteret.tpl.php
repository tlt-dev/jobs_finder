<?php
/* Smarty version 4.2.1, created on 2023-03-19 09:32:47
  from '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalCentreInteret.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6416d6bfca4b11_64557007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0aef29257cda95680034d58419934ab581981459' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalCentreInteret.tpl',
      1 => 1678903831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6416d6bfca4b11_64557007 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalFormation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalFormationTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalFormationTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formFormation">
                <input type="hidden" name="gestion" value="chercheur">
                <input type="hidden" name="action" id="formFormation_action" value="">
                <input type="hidden" name="for_id" id="formFormation_id" value="">
                <input type="hidden" name="token" id="formFormation_token" value="">

                <div class="row">
                    <div class="col">
                        <label for="formFormation_formation" class="form-label">Formation</label>
                        <input type="text" class="form-control" name="for_formation" id="formFormation_formation" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="formFormation_etablissement" class="form-label">Etablissement</label>
                        <input type="text" class="form-control" name="for_etablissement" id="formFormation_etablissement" value="">
                    </div>
                    <div class="col">
                        <label for="formFormation_ville" class="form-label">Ville</label>
                        <select name="for_ville" id="formFormation_ville" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="formFormation_date_debut">Date de début</label>
                        <input type="date" class="form-control" name="for_date_debut" id="formFormation_date_debut" value="">
                    </div>
                    <div class="col">
                        <label class="form-label" for="formFormation_date_fin">Date de fin</label>
                        <input type="date" class="form-control" name="for_date_fin" id="formFormation_date_fin" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="formFormation_description" class="form-label">Description</label>
                        <textarea class="form-control" name="for_description" id="formFormation_description" rows="6"></textarea>
                    </div>
                </div>

                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formFormationButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
