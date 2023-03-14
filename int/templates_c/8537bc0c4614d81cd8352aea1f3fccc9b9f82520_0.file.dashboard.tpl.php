<?php
/* Smarty version 4.2.1, created on 2023-03-14 12:41:27
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64106b77c83b04_46523726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8537bc0c4614d81cd8352aea1f3fccc9b9f82520' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_chercheur/vue/dashboard.tpl',
      1 => 1678797672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
    'file:mod_chercheur/vue/modalOffre.tpl' => 1,
    'file:mod_chercheur/vue/modalEntretien.tpl' => 1,
    'file:mod_chercheur/vue/modalResultat.tpl' => 1,
  ),
),false)) {
function content_64106b77c83b04_46523726 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <link href="mod_chercheur/assets/chercheur.css" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item pe-4">
                    <form method="post" action="index.php" name="formNavOffres">
                        <input type="hidden" name="gestion" value="visiteur">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavProfil">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_profil">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavDashboard">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_dashboard">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                    </form>
                </li>
                <li class="nav-item px-4">
                    <form method="post" action="index.php" name="formNavCV">
                        <input type="hidden" name="gestion" value="chercheur">
                        <input type="hidden" name="action" value="generer_fiche_cv">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                        <p class="nav-link" onclick="submitFormNavCV()">CV</p>
                    </form>
                </li>
            </ul>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                    data-bs-target="#modalDeconnexion">Déconnexion
            </button>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mt-5">
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Favoris
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offresFavories']->value, 'offre');
$_smarty_tpl->tpl_vars['offre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offre']->value) {
$_smarty_tpl->tpl_vars['offre']->do_else = false;
?>
                    <div class="card-body" name="cardFavori">
                        <div class="border-radius highlight" onclick="showModalFavori(<?php echo $_smarty_tpl->tpl_vars['offre']->value['off_id'];?>
)">
                            <input type="hidden" name="cardFavoriToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                            <h5 class="text-center mb-0 pt-2">
                                <?php echo $_smarty_tpl->tpl_vars['offre']->value['off_intitule'];?>

                            </h5>
                            <div class="row align-items-center">
                                <div class="col-2 mx-2">
                                    <img src="../int/documents/2/logo.png" class="w-100">
                                </div>
                                <div class="col-9 pb-2">
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['offre']->value['ent_nom'];?>
</p>
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['offre']->value['vil_nom'];?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="card-footer text-muted">
                    Nombre d'offres = <?php echo count($_smarty_tpl->tpl_vars['offresFavories']->value);?>

                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Candidatures
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeCandidatures']->value, 'candidature');
$_smarty_tpl->tpl_vars['candidature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['candidature']->value) {
$_smarty_tpl->tpl_vars['candidature']->do_else = false;
?>
                    <div class="card-body">
                        <div class="border-radius highlight" <?php if ($_smarty_tpl->tpl_vars['candidature']->value['can_statut'] == 0) {?>style="background-color: #f00020"<?php }?> onclick="showModalCandidature(<?php echo $_smarty_tpl->tpl_vars['candidature']->value['off_id'];?>
)">
                            <input type="hidden" name="cardCandidatureToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                            <h5 class="text-center mb-0 pt-2">
                                <?php echo $_smarty_tpl->tpl_vars['candidature']->value['off_intitule'];?>

                            </h5>
                            <div class="row align-items-center">
                                <div class="col-2 mx-2">
                                    <img src="../int/documents/2/logo.png" class="w-100">
                                </div>
                                <div class="col-9 pb-2">
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['candidature']->value['ent_nom'];?>
</p>
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['candidature']->value['vil_nom'];?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="card-footer text-muted">
                    Nombre de candidatures = <?php echo count($_smarty_tpl->tpl_vars['listeCandidatures']->value);?>

                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Entretiens
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeEntretiens']->value, 'entretien');
$_smarty_tpl->tpl_vars['entretien']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entretien']->value) {
$_smarty_tpl->tpl_vars['entretien']->do_else = false;
?>
                    <div class="card-body">
                        <div class="border-radius highlight" <?php if ($_smarty_tpl->tpl_vars['entretien']->value['ent_statut'] == 3) {?>style="background-color: #f00020"<?php }?> onclick="showModalEntretien(<?php echo $_smarty_tpl->tpl_vars['entretien']->value['off_id'];?>
)">
                            <input type="hidden" name="cardEntretienToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                            <h5 class="text-center mb-0 pt-2">
                                <?php echo $_smarty_tpl->tpl_vars['entretien']->value['off_intitule'];?>

                            </h5>
                            <div class="row align-items-center">
                                <div class="col-2 mx-2">
                                    <img src="../int/documents/2/logo.png" class="w-100">
                                </div>
                                <div class="col-9 pb-2">
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['entretien']->value['ent_nom'];?>
</p>
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['entretien']->value['vil_nom'];?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="card-footer text-muted">
                    Nombre d'entretiens = <?php echo count($_smarty_tpl->tpl_vars['listeEntretiens']->value);?>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Résultats d'entretien
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeResultats']->value, 'resultat');
$_smarty_tpl->tpl_vars['resultat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['resultat']->value) {
$_smarty_tpl->tpl_vars['resultat']->do_else = false;
?>
                    <div class="card-body">
                        <div class="border-radius highlight" onclick="showModalResultat(<?php echo $_smarty_tpl->tpl_vars['resultat']->value['off_id'];?>
)" <?php if ($_smarty_tpl->tpl_vars['resultat']->value['ent_reponse'] == 1) {?>style="background-color: darkorange"<?php } elseif ($_smarty_tpl->tpl_vars['resultat']->value['ent_reponse'] == 2) {?>style="background-color: forestgreen"<?php } else { ?>style="background-color:#f00020"<?php }?>>
                            <input type="hidden" name="cardResultatToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                            <h5 class="text-center mb-0 pt-2">
                                <?php echo $_smarty_tpl->tpl_vars['resultat']->value['off_intitule'];?>

                            </h5>
                            <div class="row align-items-center">
                                <div class="col-2 mx-2">
                                    <img src="../int/documents/2/logo.png" class="w-100">
                                </div>
                                <div class="col-9 pb-2">
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['resultat']->value['ent_nom'];?>
</p>
                                    <p class="m-0"><?php echo $_smarty_tpl->tpl_vars['resultat']->value['vil_nom'];?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="card-footer text-muted">
                    Nombre de résultats = <?php echo count($_smarty_tpl->tpl_vars['listeResultats']->value);?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalDeconnexion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalOffre.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalEntretien.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:mod_chercheur/vue/modalResultat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>


<!--Bootstrap JS-->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"><?php echo '</script'; ?>
>

<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function showModalFavori(off_id) {
        var myModal = new bootstrap.Modal(document.getElementById('modalOffre'));
        myModal.show();


        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                "gestion": "chercheur",
                "action": "get_offre",
                "off_id": off_id,
                "token": $("input[name='cardFavoriToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#logo_entreprise").attr("src", "../int/documents/"+ response.off_entreprise +"/logo.png");
            $("#modalFavoriTitre").text(response.off_intitule);

            $("#off_entreprise").text(response.off_nom_entreprise);
            $("#off_ville").text(response.off_ville);
            $("#off_secteur_activite").text(response.off_secteur);
            $("#off_type_contrat").text(response.off_contrat);

            if(response.off_duree != null){
                $("#modalFavoriDuree").removeClass("d-none");
                $("#off_duree").text(response.off_duree);
            }else{
                $("#modalFavoriDuree").addClass("d-none");
            }


            $("#off_salaire").text(response.off_salaire);
            $("#off_date_prise_poste").text(response.off_date_prise_poste);
            $("#off_descriptif").text(response.off_descriptif);

            $("#btnCandidature").addClass("btn-success");
            $("#btnCandidature").val("Déposer sa candidature");
            $("#modalOffre_action").val("candidater_offre");
            $("#modalOffre_off_id").val(off_id);

        });


    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function showModalCandidature(off_id) {
        var myModal = new bootstrap.Modal(document.getElementById('modalOffre'));
        myModal.show();


        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                "gestion": "chercheur",
                "action": "get_offre",
                "off_id": off_id,
                "token": $("input[name='cardCandidatureToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#logo_entreprise").attr("src", "../int/documents/"+ response.off_entreprise +"/logo.png");
            $("#modalOffreTitre").text(response.off_intitule);

            $("#off_entreprise").text(response.off_nom_entreprise);
            $("#off_ville").text(response.off_ville);
            $("#off_secteur_activite").text(response.off_secteur);
            $("#off_type_contrat").text(response.off_contrat);

            if(response.off_duree != null){
                $("#modalOffreDuree").removeClass("d-none");
                $("#off_duree").text(response.off_duree);
            }else{
                $("#modalOffreDuree").addClass("d-none");
            }


            $("#off_salaire").text(response.off_salaire);
            $("#off_date_prise_poste").text(response.off_date_prise_poste);
            $("#off_descriptif").text(response.off_descriptif);

            $("#btnCandidature").addClass("btn-danger");
            $("#btnCandidature").val("Retirer sa candidature");
            $("#modalOffre_action").val("retirer_candidature_offre");
            $("#modalOffre_off_id").val(off_id);

        });


    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function showModalEntretien(off_id) {
        var myModal = new bootstrap.Modal(document.getElementById('modalEntretien'));
        myModal.show();


        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                "gestion": "chercheur",
                "action": "get_entretien",
                "off_id": off_id,
                "token": $("input[name='cardEntretienToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#modalEntretien_date_entretien").text(response.ent_date_entretien);
            $("#modalEntretien_modalites").text(response.ent_modalites);

            $("#modalEntretien_logo_entreprise").attr("src", "../int/documents/"+ response.off_entreprise +"/logo.png");
            $("#modalEntretienTitre").text(response.off_intitule);

            $("#modalEntretien_off_entreprise").text(response.off_nom_entreprise);
            $("#modalEntretien_off_ville").text(response.off_ville);
            $("#modalEntretien_off_secteur_activite").text(response.off_secteur);
            $("#modalEntretien_off_type_contrat").text(response.off_contrat);

            if(response.off_duree != null){
                $("#modalEntretienDuree").removeClass("d-none");
                $("#modalEntretien_off_duree").text(response.off_duree);
            }else{
                $("#modalEntretienDuree").addClass("d-none");
            }


            $("#modalEntretien_off_salaire").text(response.off_salaire);
            $("#modalEntretien_off_date_prise_poste").text(response.off_date_prise_poste);
            $("#modalEntretien_off_descriptif").text(response.off_descriptif);

            $("#modalEntretien_off_id").val(off_id);
            $("#modalEntretien_off_id2").val(off_id);

        });


    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function showModalResultat(off_id) {
        var myModal = new bootstrap.Modal(document.getElementById('modalResultat'));
        myModal.show();


        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                "gestion": "chercheur",
                "action": "get_resultat",
                "off_id": off_id,
                "token": $("input[name='cardResultatToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            $("#modalResultat_logo_entreprise").attr("src", "../int/documents/"+ response.off_entreprise +"/logo.png");
            $("#modalResultatTitre").text(response.off_intitule);

            if(response.ent_reponse == 0){
                $("#modalResultat_reponse").text("Défavorable");
            }else if(response.ent_reponse == 1){
                $("#modalResultat_reponse").text("En attente de décision");
            }else{
                $("#modalResultat_reponse").text("Favorable");
            }

            $("#modalResultat_commentaire").text(response.ent_commentaire);

            $("#modalResultat_off_entreprise").text(response.off_nom_entreprise);
            $("#modalResultat_off_ville").text(response.off_ville);
            $("#modalResultat_off_secteur_activite").text(response.off_secteur);
            $("#modalResultat_off_type_contrat").text(response.off_contrat);

            if(response.off_duree != null){
                $("#modalResultatDuree").removeClass("d-none");
                $("#modalResultat_off_duree").text(response.off_duree);
            }else{
                $("#modalResultatDuree").addClass("d-none");
            }


            $("#modalResultat_off_salaire").text(response.off_salaire);
            $("#modalResultat_off_date_prise_poste").text(response.off_date_prise_poste);
            $("#modalResultat_off_descriptif").text(response.off_descriptif);


        });


    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    function submitFormNavOffres()
    {
        $("form[name='formNavOffres']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavProfil()
    {
        $("form[name='formNavProfil']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavDashboard()
    {
        $("form[name='formNavDashboard']").submit();
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function submitFormNavCV()
    {
        $("form[name='formNavCV']").submit();
    }
<?php echo '</script'; ?>
>


</html><?php }
}
