<!-- Modal -->
<div class="modal fade" id="modalResultat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalResultatTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="modalResultat_logo_entreprise">
                <h5 class="modal-title" id="modalResultatTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <label for="modalResultat_reponse" class="form-label">Avis de l'entreprise</label>
                    <p><strong id="modalResultat_reponse"></strong></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <label for="modalResultat_commentaire" class="form-label">Commentaire</label>
                    <p><strong id="modalResultat_commentaire"></strong></p>
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
                        <label for="modalResultat_off_entreprise" class="form-label">Entreprise</label>
                        <p><strong id="modalResultat_off_entreprise"></strong></p>
                    </div>
                    <div class="col-6">
                        <label for="modalResultat_off_ville" class="form-label">Ville</label>
                        <p><strong id="modalResultat_off_ville">test</strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalResultat_off_secteur_activite" class="form-label">Secteur d'activité</label>
                        <p><strong id="modalResultat_off_secteur_activite"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalResultat_off_type_contrat" class="form-label">Type de contrat</label>
                        <p><strong id="modalResultat_off_type_contrat"></strong></p>
                    </div>
                    <div class="col-6" id="modalResultatDuree">
                        <label for="modalResultat_off_duree" class="form-label">Durée</label>
                        <p><strong id="modalResultat_off_duree"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-6">
                        <label for="modalResultat_off_salaire" class="form-label">Salaire</label>
                        <p><strong id="modalResultat_off_salaire"></strong></p>
                    </div>
                    <div class="col-6">
                        <label for="modalResultat_off_date_prise_poste" class="form-label">Prise de poste le </label>
                        <p><strong id="modalResultat_off_date_prise_poste"></strong></p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label for="modalResultat_off_descriptif" class="form-label">Descriptif de l'offre</label>
                        <p id="modalResultat_off_descriptif"></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>