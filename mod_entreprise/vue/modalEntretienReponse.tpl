<!-- Modal -->
<div class="modal fade" id="modalEntretienReponse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalEntretienReponseTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalEntretienReponseTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formEntretienReponse">
                <input type="hidden" name="gestion" value="entreprise">
                <input type="hidden" name="action" id="formEntretienReponse_action" value="">
                <input type="hidden" name="ent_id" id="formEntretienReponse_id" value="">
                <input type="hidden" name="token" id="formEntretienReponse_token" value="">


                <div class="row text-center">
                    <div class="col">
                        <label for="formEntretienReponse_reponse" class="form-label">Reponse</label>
                        <input type="date" class="form-control" name="ent_reponse"
                            id="formEntretienReponse_reponse" value="">
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
</div>