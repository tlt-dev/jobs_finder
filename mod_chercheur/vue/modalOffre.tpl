<!-- Modal -->
<div class="modal fade" id="modalOffre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalOffreTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalOffreTitre"></h5>
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
                    <label for="off_secteur_activite" class="form-label">Secteur d'activité</label>
                    <p><strong id="off_secteur_activite"></strong></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="off_type_contrat" class="form-label">Type de contrat</label>
                    <p><strong id="off_type_contrat"></strong></p>
                </div>
                <div class="col-6" id="modalOffreDuree">
                    <label for="off_duree" class="form-label">Durée</label>
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

            <!--Formulaire pour candidater à l'offre -->
            <div class="row text-center my-3">
                <div class="col">
                    <form method="post" action="index.php" name="formCandidature">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" id="modalOffre_action" value="">
                        <input type="hidden" name="off_id" id="modalOffre_off_id" value="">
                        <input type="hidden" name="token" id="modalOffre_token" value="">

                        <input type="submit" class="btn" id="btnCandidature" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>