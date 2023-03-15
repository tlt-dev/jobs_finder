<?php
/* Smarty version 4.2.1, created on 2023-03-15 23:23:20
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/modalExperiencePro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_641253681f8bc5_90118500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19eebf25255db955d3d9811c0429936ae5aa112d' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/modalExperiencePro.tpl',
      1 => 1678920946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641253681f8bc5_90118500 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalExperiencePro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalExperienceProTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalExperienceProTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formExperiencePro">
                <input type="hidden" name="gestion" value="chercheur">
                <input type="hidden" name="action" id="formExperiencePro_action" value="">
                <input type="hidden" name="for_id" id="formExperiencePro_id" value="">
                <input type="hidden" name="token" id="formExperiencePro_token" value="">

                <div class="row">
                    <div class="col">
                        <label for="formExperiencePro_poste" class="form-label">Poste</label>
                        <input type="text" class="form-control" name="exp_poste" id="formExperiencePro_poste" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="formExperiencePro_employeur" class="form-label">Employeur</label>
                        <input type="text" class="form-control" name="exp_employeur" id="formExperiencePro_employeur" value="">
                    </div>
                    <div class="col">
                        <label for="formExperiencePro_ville" class="form-label">Ville</label>
                        <select name="exp_ville" id="formExperiencePro_ville" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="formExperiencePro_date_debut">Date de début</label>
                        <input type="date" class="form-control" name="exp_date_debut" id="formExperiencePro_date_debut" value="">
                    </div>
                    <div class="col">
                        <label class="form-label" for="formExperiencePro_date_fin">Date de fin</label>
                        <input type="date" class="form-control" name="exp_date_fin" id="formExperiencePro_date_fin" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="formExperiencePro_description" class="form-label">Description</label>
                        <textarea class="form-control" name="exp_description" id="formExperiencePro_description" rows="6"></textarea>
                    </div>
                </div>

                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formExperienceProButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
