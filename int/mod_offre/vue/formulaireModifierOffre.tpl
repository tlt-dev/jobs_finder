<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>{$titre}</title>
        <link href="../../mod_offre/assets/offre.css" rel="stylesheet" />
        <link href="../../mod_offre/assets/offre.js" rel="text/javascript" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
            integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    </head>
    <script type="text/javascript">
        function setDureeInput() {
            var selection = document.getElementById("typeContratSelect").value;
            document.getElementById("dureeInput").style.display = selection == 1 ? 'none' : 'block';
        }

        // Date aujourd'hui
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datePrisePoste").setAttribute("min", today);
    </script>

    <body>

        <div class="container-fluid">
            <form method="post" action="index.php">
                <div class="container">
                    <!-- Title -->
                    <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                        <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i
                                    class="bi bi-arrow-left-square me-2"></i></a> {$titre}</h2>
                        <div class="hstack gap-3">

                            <input type="hidden" name="gestion" value="offre">
                            <input type="hidden" name="action" value="{$action}">
                            <input type="hidden" name="off_id" value="{$offre->getOff_id()}">
                            <button type="submit" class="btn btn-primary" value="Sauvegarder">Sauvegarder </button>

                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row">
                        <!-- Left side -->
                        <div class="col-lg-8">
                            <!-- Basic information -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Intitulé</label>
                                                <input type="text" name="off_intitule" class="form-control"
                                                    value="{$offre->getOff_intitule()}" placeholder="Intitule du poste"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Secteur d'activité</label>
                                                <select name="off_secteur_activite" class="form-control">
                                                    {foreach $listeSecteurActivite as $secteurId => $secteur}
                                                        {if $secteurId == $offre->getOff_secteur_activite()}
                                                            <option value="{$secteurId}" selected>{$secteur}</option>
                                                        {else}
                                                            <option value="{$secteurId}">{$secteur}</option>
                                                        {/if}
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Poste</label>
                                            <select name="off_poste" class="form-control">
                                                {foreach $listePoste as $poste}
                                                    <option value="{$poste["pos_id"]}">{$poste["pos_libelle"]}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Ville</label>
                                        <select name="off_ville" class="form-control">
                                            {foreach $listeVilles as $villeId => $ville}
                                                {if $villeId == $offre->getOff_ville()}
                                                    <option value="{$villeId}" selected>{$ville['vil_nom']}</option>
                                                {else}
                                                    <option value="{$villeId}">{$ville['vil_nom']}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="mb-3">
                                <label class="form-label">Date de prise de fonction</label>
                                <input type="date" name="off_date_prise_poste" class="form-control" id="datePrisePoste"
                                    value="{$offre->getOff_date_prise_poste()}" placeholder="Date de prise du poste"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Salaire</label>
                                <select name="off_salaire" class="form-control">
                                    {foreach $listeSalaire as $salaireId => $salaire}
                                        {if $salaireId == $offre->getOff_salaire()}
                                            <option value="{$salaireId}" selected>{$salaire}</option>
                                        {else}
                                            <option value="{$salaireId}">{$salaire}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Type de contrat</label>
                                    <select id="typeContratSelect" name="off_type_contrat" class="form-control"
                                        onchange="setDureeInput()">
                                        {foreach $listeTypeContrat as $typeContratId => $typeContrat}
                                            {if $typeContratId == $offre->getOff_type_contrat()}
                                                <option value="{$typeContratId}" selected>{$typeContrat}</option>
                                            {else}
                                                <option value="{$typeContratId}">{$typeContrat}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                {if $offre->getOff_type_contrat() == 1}
                                    <div id="dureeInput" class="col-lg-6" style="display: none">
                                        <label class="form-label">Durée du contrat en mois</label>
                                        <input type="number" name="off_duree" class="form-control" id="inputDuree" min="1"
                                            value="{$offre->getOff_duree()}" placeholder="Durée du poste">
                                    </div>
                                {else}
                                    <div id="dureeInput" class="col-lg-6">
                                        <label class="form-label">Durée du contrat en mois</label>
                                        <input type="number" name="off_duree" class="form-control" id="inputDuree" min="1"
                                            value="{$offre->getOff_duree()}" placeholder="Durée du poste">
                                    </div>
                                {/if}
                            </div>
                        </div>
                        <!-- Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Description</h3>
                                <textarea name="off_descriptif" class="form-control" rows="3">
                                                {$offre->getOff_descriptif()}
                                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>