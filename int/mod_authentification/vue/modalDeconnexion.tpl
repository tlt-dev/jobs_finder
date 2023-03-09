<!-- Modal -->
<div class="modal fade" id="modalDeconnexion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalDeconnexionTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeconnexionTitre">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>
            <form method="post" action="index.php" name="formDeconnexion" class="mt-0">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" value="deconnexion">

                    <p>Voulez-vous vraiment vous déconnecter ?</p>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Confirmer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="">Annuler</button>
                </div>
            </form>


        </div>
    </div>
</div>