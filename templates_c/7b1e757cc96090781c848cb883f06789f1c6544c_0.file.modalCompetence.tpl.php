<?php
/* Smarty version 4.2.1, created on 2023-03-20 23:13:13
  from '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalCompetence.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6418e889606746_88809727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b1e757cc96090781c848cb883f06789f1c6544c' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalCompetence.tpl',
      1 => 1679353230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6418e889606746_88809727 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalCompetence" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalCompetenceTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalCompetenceTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formCompetence">
                <input type="hidden" name="gestion" value="chercheur">
                <input type="hidden" name="action" id="formCompetence_action" value="">
                <input type="hidden" name="cce_id" id="formCompetence_id" value="">
                <input type="hidden" name="token" id="formCompetence_token" value="">

                <div class="row">
                    <div class="col">
                        <label for="formCompetence_competence" class="form-label">Compétence</label>
                        <select class="form-control" id="formCompetence_competence" name="cce_competence">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="formCompetence_niveau" class="form-label">Niveau</label>
                        <input type="range" class="form-range" name="cce_niveau" id="formCompetence_niveau" min="1" max="5" step="1" value="">
                    </div>
                </div>


                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formCompetenceButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
