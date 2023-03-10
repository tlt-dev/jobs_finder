<?php
/* Smarty version 4.2.1, created on 2023-03-12 11:53:08
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/modalOffre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_640dbd24a4dc89_98622163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ead4c7ebf43efd20259efc5aa83b3848212233f9' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/modalOffre.tpl',
      1 => 1678621945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640dbd24a4dc89_98622163 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalFavori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalFavoriTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalFavoriTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>
            <!-- Affichage des informations de l'offre -->
            <div class="row text-center">
                <div class="col-6">
                    <label for="off_entreprise" class="form-label">Entreprise</label>
                    <p><strong id="off_entreprise"></strong></p>
                </div>
                <div class="col-6">
                    <label for="off_ville" class="form-label">Ville</label>
                    <p><strong id="off_ville">test</strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="off_secteur_activite" class="form-label">Secteur d'activit??</label>
                    <p><strong id="off_secteur_activite"></strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="off_type_contrat" class="form-label">Type de contrat</label>
                    <p><strong id="off_type_contrat"></strong></p>
                </div>
                <div class="col-6" id="modalFavoriDuree">
                    <label for="off_duree" class="form-label">Dur??e</label>
                    <p><strong id="off_duree"></strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-6">
                    <label for="off_salaire" class="form-label">Salaire</label>
                    <p><strong id="off_salaire"></strong></p>
                </div>
                <div class="col-6">
                    <label for="off_date_prise_poste" class="form-label">Prise de poste le </label>
                    <p><strong id="off_date_prise_poste"></strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="off_descriptif" class="form-label">Descriptif de l'offre</label>
                    <p id="off_descriptif"></p>
                </div>
            </div>

            <!--Formulaire pour candidater ?? l'offre -->
            <div class="row text-center my-3">
                <div class="col">
                    <form method="post" action="index.php" name="formCandidature">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="candidater_offre">
                        <input type="hidden" name="off_id" value="">

                        <input type="submit" class="btn btn-success" value="D??poser sa candidature">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
