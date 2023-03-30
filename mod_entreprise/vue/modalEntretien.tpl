<!-- Modal -->
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

            <form method="post" action="index.php">
                <input type="hidden" name="gestion" value="entreprise">
                <input type="hidden" name="action" value="modifier_entretien">
                <input type="hidden" name="ent_id" id="formEntretien_id" value="">
                <input type="hidden" name="token" id="formEntretien_token" value="">

                <div class="row text-center">
                    <div class="col">
                        <label for="formEntretien_date_entretien" class="form-label">Date
                            d'entretien</label>
                        <input type="date" class="form-control" name="ent_date_entretien"
                               id="formEntretien_date_entretien" value="">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <label for="formEntretien_modalites" class="form-label">Modalités</label>
                        <input type="text" class="form-control" name="ent_modalites"
                               id="formEntretien_modalites"
                               value="">
                    </div>
                </div>

                <div class="row text-center my-3">
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Modifier">
                    </div>
                </form>
                    <div class="col">
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="entreprise">
                            <input type="hidden" name="action" value="retirer_entretien">
                            <input type="hidden" name="ent_id" id="formRetirerEntretien_id" value="">
                            <input type="hidden" name="token" id="formRetirerEntretien_token" value="">

                            <input type="submit" class="btn btn-danger" value="Retirer">
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>