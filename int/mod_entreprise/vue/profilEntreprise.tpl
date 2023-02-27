<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
    <link href="../../mod_entreprise/assets/entreprise.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-6 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nom *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_nom" aria-label="Nom"
                                            value="{$entreprise->getEnt_nom()}">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut *</label>
                                        <div class="col">
                                            <select name="ent_statut" class="form-control">
                                                <option value="">--Please choose an option--</option>
                                                {foreach $listeStatuts as $statuts}
                                                    {if $statuts['stj_id'] eq $entreprise->getEnt_statut()}

                                                        <option value="{$statuts['stj_id']}" selected>{$statuts['stj_libelle']}
                                                        </option>
                                                    {else}

                                                        <option value="{$statuts['stj_id']}">{$statuts['stj_libelle']}</option>

                                                    {/if}

                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">SIRET *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_siret" aria-label="SIRET"
                                            value="{$entreprise->getEnt_siret()}">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">SIREN *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_siren" aria-label="SIREN"
                                            value="{$entreprise->getEnt_siren()}">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input type="email" class="form-control" value="{$userName['usr_email']}">
                                    </div>
                                    <!-- Skype -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut *</label>
                                        <div class="col">
                                            <select name="ent_ville" class="form-control">
                                                <option value="">--Please choose an option--</option>
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
                                    <div class="col-md-6">
                                        <label class="form-label">CA *</label>
                                        <input type="text" class="form-control" placeholder="" name="ent_chiffre_affaires" aria-label="CA"
                                            value="{$entreprise->getEnt_chiffre_affaires()}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">SA *</label>
                                        <div class="col">
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
                                        </div>
                                    </div>
                                    <!-- Mobile number -->

                                    <div class="col">
                                        <label class="form-label">date *</label>
                                        <input type="date" class="form-control" placeholder="" name="ent_date_creation" aria-label="date"
                                            value="{$entreprise->getEnt_date_creation()}">

                                        <div class="col">
                                            <label class="form-label">Adresse 1*</label>
                                            <input type="text" class="form-control" name="ent_adresse1" placeholder=""
                                                aria-label="Adresse 1" value="{$entreprise->getEnt_adresse1()}">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 2 *</label>
                                            <input type="text" class="form-control" name="ent_adresse2" placeholder=""
                                                aria-label="Adresse 2" value="{$entreprise->getEnt_adresse2()}">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 3 *</label>
                                            <input type="text" class="form-control" name="ent_adresse3" placeholder=""
                                                aria-label="Adresse 3" value="{$entreprise->getEnt_adresse3()}">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Adresse 4 *</label>
                                            <input type="text" class="form-control" name="ent_adresse4" placeholder=""
                                                aria-label="Adresse 4" value="{$entreprise->getEnt_adresse4()}">
                                        </div>
                                    </div>
                                    <label for="toto">Description *</label>

                                    <textarea id="toto" name="ent_descriptif">
                                 {$entreprise->getEnt_descriptif()}
                                </textarea>


                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <form method="post" action="index.php">
                                <input type="hidden" name="gestion" value="entreprise">
                                <input type="hidden" name="action" value="modifier_entreprise">
                                <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
                                <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                            </form>
                        </div>
                    </div>
            </div>
</body>

</html>