<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
    <link href="mod_entreprise/assets/entreprise.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

</head>

<body>
<form method="post" action="index.php">
    <div class="container-fluid">

        <div class="container">
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i
                            class="bi bi-arrow-left-square me-2"></i></a> Personnaliser votre entreprise</h2>
                <div class="hstack gap-3">
                    
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="modifier_entreprise">
                        <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                        <button type="submit" class="btn btn-primary" value="Modifier">Sauvegarder </button>
                    
                </div>
            </div>
            <!-- Main content -->
            <div class="row">
                <!-- Left side -->
                <div class="col-lg-8">
                    <!-- Basic information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Basic information</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nom *</label>
                                        <input type="text" class="form-control" name="ent_nom"
                                            value="{$entreprise->getEnt_nom()}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" value="{$userName['usr_email']}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">SIRET *</label>
                                        <input type="text" class="form-control" name="ent_siret"
                                            value="{$entreprise->getEnt_siret()}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">SIREN *</label>
                                        <input type="text" class="form-control" name="ent_siren"
                                            value="{$entreprise->getEnt_siren()}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Address</h3>
                            <div class="mb-3">
                                <label class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" name="ent_adresse1"
                                    value="{$entreprise->getEnt_adresse1()}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse2"
                                    value="{$entreprise->getEnt_adresse2()}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse3"
                                    value="{$entreprise->getEnt_adresse3()}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="ent_adresse4"
                                    value="{$entreprise->getEnt_adresse4()}">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Ville * </label>
                                        <select name="ent_ville" class="form-control">
                                            {foreach $listeVilles as $villes}
                                                {if $villes['vil_id'] eq $entreprise->getEnt_ville()}

                                                    <option value="{$villes['vil_id']}" selected>{$villes['vil_nom']}
                                                    </option>
                                                {else}

                                                    <option value="{$villes['vil_id']}">{$villes['vil_nom']}</option>

                                                {/if}

                                            {/foreach}
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-lg-4">
                    <!-- Status -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Information complémentaire</h3>
                            <label class="form-label">SA *</label>
                            <select name="ent_secteur_activite" class="form-control">
                                {foreach $listeSecteurs as $secteurs}
                                    {if $secteurs['sea_id'] eq $entreprise->getEnt_secteur_activite()}

                                        <option value="{$secteurs['sea_id']}" selected>
                                            {$secteurs['sea_libelle']}</option>
                                    {else}

                                        <option value="{$secteurs['sea_id']}">{$secteurs['sea_libelle']}
                                        </option>

                                    {/if}

                                {/foreach}
                            </select>
                            <label class="form-label">Statut *</label>
                            <select name="ent_statut" class="form-control">

                                {foreach $listeStatuts as $statuts}
                                    {if $statuts['stj_id'] eq $entreprise->getEnt_statut()}

                                        <option value="{$statuts['stj_id']}" selected>{$statuts['stj_libelle']}
                                        </option>
                                    {else}

                                        <option value="{$statuts['stj_id']}">{$statuts['stj_libelle']}</option>

                                    {/if}

                                {/foreach}
                            </select>
                            <div class="mb-3">
                                <label class="form-label">CA *</label>
                                <input type="text" class="form-control" name="ent_chiffre_affaires" value="{$entreprise->getEnt_chiffre_affaires()}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date de création *</label>
                                <input type="date" class="form-control" name="ent_date_creation" value="{$entreprise->getEnt_date_creation()}">
                            </div>
                        </div>
                    </div>
                    <!-- Avatar -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Avatar</h3>
                            <input class="form-control" type="file">
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Description *</h3>
                            <textarea class="form-control" name="ent_descriptif" rows="3">
                            {$entreprise->getEnt_descriptif()}
                            </textarea>
                        </div>
                    </div>
                    <!-- Notification settings -->
                </div>
            </div>
        </div>
    </div>
</form>
</body>

</html>