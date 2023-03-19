<?php
/* Smarty version 4.2.1, created on 2023-03-19 19:04:08
  from '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalEntretien.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64175ca8819f00_19345894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e86bd704010401ce194cdcdf19eb7c0a2498b1fd' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_chercheur/vue/modalEntretien.tpl',
      1 => 1679252437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64175ca8819f00_19345894 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalEntretien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalEntretienTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="modalEntretien_logo_entreprise">
                <h5 class="modal-title" id="modalEntretienTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="modalEntretien_date_entretien" class="form-label">Date de l'entretien</label>
                    <p><strong id="modalEntretien_date_entretien"></strong></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <label for="modalEntretien_modalites" class="form-label">Modalités</label>
                    <p><strong id="modalEntretien_modalites"></strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <form method="post" action="index.php" name="formReponseEntretien">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="repondre_entretien">
                        <input type="hidden" name="reponse" value="1">
                        <input type="hidden" name="token" id="modalEntretien_token" value="">
                        <input type="hidden" name="off_id" id="modalEntretien_off_id" value="">

                        <input type="submit" class="btn btn-success" value="Accepter l'entretien">
                    </form>
                </div>
                <div class="col">
                    <form method="post" action="index.php" name="formReponseEntretien">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="repondre_entretien">
                        <input type="hidden" name="reponse" value="0">
                        <input type="hidden" name="token" id="modalEntretien_token2" value="">

                        <input type="hidden" name="off_id" id="modalEntretien_off_id2" value="">

                        <input type="submit" class="btn btn-danger" value="Refuser l'entretien">
                    </form>
                </div>
            </div>

            <div class="row">
                <a class="btn btn-link" data-bs-toggle="collapse" href="#infosOffre" role="button"
                   aria-expanded="false" aria-controls="infosOffre">
                    Afficher l'offre
                </a>
            </div>

            <div class="collapse" id="infosOffre">
                <!-- Affichage des informations de l'offre -->
                <div class="row text-center">
                    <div class="col-6">
                        <label for="modalEntretien_off_entreprise" class="form-label">Entreprise</label>
                        <p><strong id="modalEntretien_off_entreprise"></strong></p>
                    </div>
                    <div class="col-6">
                        <label for="modalEntretien_off_ville" class="form-label">Ville</label>
                        <p><strong id="modalEntretien_off_ville">test</strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalEntretien_off_secteur_activite" class="form-label">Secteur d'activité</label>
                        <p><strong id="modalEntretien_off_secteur_activite"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalEntretien_off_type_contrat" class="form-label">Type de contrat</label>
                        <p><strong id="modalEntretien_off_type_contrat"></strong></p>
                    </div>
                    <div class="col-6" id="modalEntretienDuree">
                        <label for="modalEntretien_off_duree" class="form-label">Durée</label>
                        <p><strong id="modalEntretien_off_duree"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-6">
                        <label for="modalEntretien_off_salaire" class="form-label">Salaire</label>
                        <p><strong id="modalEntretien_off_salaire"></strong></p>
                    </div>
                    <div class="col-6">
                        <label for="modalEntretien_off_date_prise_poste" class="form-label">Prise de poste le </label>
                        <p><strong id="modalEntretien_off_date_prise_poste"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalEntretien_off_descriptif" class="form-label">Descriptif de l'offre</label>
                        <p id="modalEntretien_off_descriptif"></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><?php }
}
