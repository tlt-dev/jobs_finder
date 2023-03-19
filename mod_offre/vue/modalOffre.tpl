<!-- Modal -->
<div class="modal fade" id="modalEntreprise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntrepriseModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEntrepriseLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="index.php">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="entreprise">
                    <input type="hidden" name="action" id="action_modal" value="">
                    <input type="hidden" name="id" id="id_modal" value="">

                    <input type="text" class="form-control" name="titre" id="titre_modal" value="">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="button_modal" value="">
                </div>
            </form>
        </div>
    </div>
</div>