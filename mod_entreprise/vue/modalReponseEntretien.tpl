<!-- Modal -->
<div class="modal fade" id="modalReponseEntretien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalReponseEntretienTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalReponseEntretienTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <div class="row">
                <form method="post" action="index.php" name="formReponseEntretien">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" value="modifier_reponse_entretien">
                    <input type="hidden" name="ent_id" id="formReponseEntretien_id">
                    <input type="hidden" name="ent_reponse" id="formReponseEntretien_reponse" value="">
                    <input type="hidden" name="token" id="formReponseEntretien_token" value="">

                    <div class="col">
                        <label for="formReponseEntretien_commentaire" class="form-label">Commentaire</label>
                        <input type="text" class="form-control" name="ent_commentaire" id="formReponseEntretien_commentaire"
                               value="">
                    </div>

                    <div class="row my-3">
                        <div class="col">
                            <input type="button" class="btn btn-success" onclick="submitFormReponseEntretien(2)" value="Favorable">
                        </div>
                        <div class="col">
                            <input type="button" class="btn btn-warning" onclick="submitFormReponseEntretien(1)" value="En réflexion">
                        </div>
                        <div class="col">
                            <input type="button" class="btn btn-danger" onclick="submitFormReponseEntretien(0)" value="Défavorable">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>