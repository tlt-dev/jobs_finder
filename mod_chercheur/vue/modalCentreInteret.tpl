<!-- Modal -->
<div class="modal fade" id="modalCentreInteret" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalCentreInteretTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalCentreInteretTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formCentreInteret">
                <input type="hidden" name="gestion" value="chercheur">
                <input type="hidden" name="action" id="formCentreInteret_action" value="">
                <input type="hidden" name="cei_id" id="formCentreInteret_id" value="">
                <input type="hidden" name="token" id="formCentreInteret_token" value="">

                <div class="row">
                    <div class="col">
                        <label for="formCentreInteret_intitule" class="form-label">Centre d'intérêt</label>
                        <input type="text" class="form-control" name="cei_intitule" id="formCentreInteret_intitule" value="">
                    </div>
                </div>

                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formCentreInteretButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>