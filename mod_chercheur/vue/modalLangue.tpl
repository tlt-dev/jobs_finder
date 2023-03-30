<!-- Modal -->
<div class="modal fade" id="modalLangue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalLangueTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-5">
            <div class="modal-header">
                <img src="" class="mx-5" style="max-width: 50px" id="logo_entreprise">
                <h5 class="modal-title" id="modalLangueTitre"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>

            <form method="post" action="index.php" name="formLangue">
                <input type="hidden" name="gestion" value="chercheur">
                <input type="hidden" name="action" id="formLangue_action" value="">
                <input type="hidden" name="lce_id" id="formLangue_id" value="">
                <input type="hidden" name="token" id="formLangue_token" value="">

                <div class="row">
                    <div class="col">
                        <label for="formLangue_langue" class="form-label">Langue</label>
                        <select class="form-control" id="formLangue_langue" name="lce_langue">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="formLangue_niveau" class="form-label">Niveau</label>
                        <input type="range" class="form-range" name="lce_niveau" id="formLangue_niveau" min="1" max="5" step="1" value="">
                    </div>
                </div>


                <div class="row my-2 justify-content-center">
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary" id="formLangueButton" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>