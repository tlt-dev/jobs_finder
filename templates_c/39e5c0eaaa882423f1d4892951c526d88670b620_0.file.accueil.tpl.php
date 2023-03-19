<?php
/* Smarty version 4.2.1, created on 2023-03-19 22:10:52
  from '/Applications/MAMP/htdocs/jobs_finder/mod_visiteur/vue/accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6417886c449304_19532756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39e5c0eaaa882423f1d4892951c526d88670b620' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_visiteur/vue/accueil.tpl',
      1 => 1679263848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalAuthentification.tpl' => 1,
    'file:../../mod_authentification/vue/modalInscription.tpl' => 1,
    'file:../../mod_authentification/vue/modalDeconnexion.tpl' => 1,
  ),
),false)) {
function content_6417886c449304_19532756 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <?php if ($_smarty_tpl->tpl_vars['chercheurConnected']->value) {?>
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
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['chercheurConnected']->value || $_smarty_tpl->tpl_vars['entrepriseConnected']->value) {?>
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                        data-bs-target="#modalDeconnexion">Déconnexion</button>
                <?php } else { ?>
                    <button class="btn btn-outline-light" data-bs-toggle="modal" id="btnLogin"
                        data-bs-target="#modalAuthentification" value="Login">Login</button>
                <?php }?>


            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-2">
            <h3>Filtres</h3>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the
                            <code>.accordion-flush</code> class. This is the first item's accordion body.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the
                            <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine
                            this
                            being filled with some actual content.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the
                            <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                            exciting
                            happening here in terms of content, but just filling up the space to make it look, at least
                            at
                            first
                            glance, a bit more representative of how this would look in a real-world application.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="offset-1 col-6">
            <div class="row justify-content-center">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">Recherche</div>
                    <div class="card-body">
                        <form method="post" action="index.php" name="rechercheOffre">
                            <input type="hidden" name="gestion" value="visiteur">
                            <input type="hidden" name="action" value="recherche_poste">
                            <input type="hidden" name="token" id="formRechercheOffre_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

                            <label for="poste_recherche">Poste recherché</label>
                            <select class="form-select" name="off_poste" id="multiple-select-field"
                                data-placeholder="Choose anything" multiple>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePoste']->value, 'poste');
$_smarty_tpl->tpl_vars['poste']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['poste']->value) {
$_smarty_tpl->tpl_vars['poste']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['poste']->value['pos_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['poste']->value['pos_libelle'];?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <input type="submit" class="btn btn-primary" value="Rechercher">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeOffre']->value, 'offre');
$_smarty_tpl->tpl_vars['offre']->index = -1;
$_smarty_tpl->tpl_vars['offre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offre']->value) {
$_smarty_tpl->tpl_vars['offre']->do_else = false;
$_smarty_tpl->tpl_vars['offre']->index++;
$_smarty_tpl->tpl_vars['offre']->first = !$_smarty_tpl->tpl_vars['offre']->index;
$__foreach_offre_1_saved = $_smarty_tpl->tpl_vars['offre'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['offre']->first) {?>
                                <div class="carousel-item active">
                                    <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                                        <div class="card-header"><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_intitule"];?>
</div>
                                        <p class="idOffre" hidden><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_id"];?>
</p>
                                        <div class="card-body text-dark">
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['offre']->value["vil_nom"];?>
</h5>
                                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_descriptif"];?>
</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item m-auto">
                                    <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                                        <div class="card-header"><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_intitule"];?>
</div>
                                        <p class="idOffre" hidden><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_id"];?>
</p>
                                        <div class="card-body text-dark">
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['offre']->value["vil_nom"];?>
</h5>
                                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['offre']->value["off_descriptif"];?>
</p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['offre'] = $__foreach_offre_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="container-fluid">
                    <div class="container">
                        <!-- Main content -->
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card mb-4">
                                    <p>Intitulé du poste : <label name="off_intitule"></label></p>
                                </div>
                                <div class="card mb-4">
                                    <p>Secteur d'activité : <label name="off_secteur"></label></p>
                                </div>
                                <div class="card mb-4">
                                    <p>Ville : <label name="off_ville"></label></p>

                                </div>
                                <div class="card mb-4">
                                    <p>Date de prise de poste : <label name="off_date_prise_poste"></label></p>
                                </div>
                                <div class="card mb-4">
                                    <p>Salaire : <label name="off_salaire"></label></p>

                                </div>
                                <div class="card mb-4">
                                    <p>Type de contrat : <label name="off_type_contrat"></label></p>
                                </div>
                                <div name="duree_contrat" class="card mb-4">
                                    <p>Durée contrat : <label name="off_duree_contrat"></label> mois</p>
                                </div>
                                <div class="card mb-4">
                                    <p>Description : <label name="off_description"></label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalAuthentification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalInscription.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalDeconnexion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>


<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"><?php echo '</script'; ?>
>
<!-- Latest compiled and minified JavaScript -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"><?php echo '</script'; ?>
>
<!--Bootstrap JS-->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $("#modalAuthentification_token").val($("#formRechercheOffre_token").val());
    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formAuthentification']").submit(function(e) {
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function(response) {
            console.log(response);

            if (response.message != '') {

                $("#messageContent").text(response.message);
                $("#message").removeClass("d-none");

            } else if (response.gestion == 'entreprise') {
                window.location.replace("index.php?gestion=" + response.gestion + "&token=" + $("#formRechercheOffre_token").val());
            } else {
                window.location.replace("index.php?gestion=visiteur&token=" + $("#formRechercheOffre_token").val());
            }
        });

    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("input[name='usr_est_chercheur_emploi']").on('click', function(e) {
        if ($("#type_1").is(":checked")) {
            $("#ent_nom").addClass("d-none");
            $("#label_ent_nom").addClass("d-none");
            $("#che_prenom").removeClass("d-none");
            $("#label_prenom").removeClass("d-none");
            $("#che_nom").removeClass("d-none");
            $("#label_che_nom").removeClass("d-none");
        } else {
            $("#che_prenom").addClass("d-none");
            $("#label_prenom").addClass("d-none");
            $("#che_nom").addClass("d-none");
            $("#label_che_nom").addClass("d-none");
            $("#ent_nom").removeClass("d-none");
            $("#label_ent_nom").removeClass("d-none");
        }
    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $('#multiple-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='rechercheOffre']").submit(function(e) {
        e.preventDefault(); //empêcher une action par défaut
        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        // Récupérer toutes les valeurs sélectionnées dans le champ de formulaire multiple
        var off_poste = $('select[name="off_poste"]').val();
        // Sérialiser les champs de formulaire en une chaîne de requête
        var form_data = $(this).serialize();
        // Ajouter les valeurs sélectionnées dans la chaîne de requête
        $.each(off_poste, function(index, value) {
            form_data += '&off_poste[]=' + encodeURIComponent(value);
        });
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'json'
        }).done(function(response) {
            console.log(response);
            $("#carouselExampleControls").children("div").remove();
            $.each(response, function(index, value) {
                console.log(value);
                if (index == 0) {
                    $("#carouselExampleControls").append(
                        '<div class="carousel-item active"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                        value.off_intitule + '</div><p class="idOffre" hidden>' + value
                        .off_id +
                        '</p><div class="card-body text-dark"><h5 class="card-title">' +
                        value.vil_nom + '</h5><p class="card-text">' + value
                        .off_descriptif + '</p></div></div></div>'
                    );
                } else {
                    $("#carouselExampleControls").append(
                        '<div class="carousel-item m-auto"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
                        value.off_intitule + '</div><p class="idOffre" hidden>' + value
                        .off_id +
                        '</p><div class="card-body text-dark"><h5 class="card-title">' +
                        value.vil_nom + '</h5><p class="card-text">' + value
                        .off_descriptif + '</p></div></div></div>'
                    );
                }
            });

        });
    });

    $('#carouselExampleControls').bind('slid.bs.carousel', function(e) {
        descOffre();
    });

    window.onload = function() { descOffre(); }

    function descOffre() {
        var form_url = "index.php" //récupérer l'URL du formulaire
        var form_method = "post" //récupérer la méthode GET/POST du formulaire
        // Récupérer toutes les valeurs sélectionnées dans le champ de formulaire multiple
        var off_id = $('div.carousel-item.active p.idOffre')[0].innerText;
        var form_data = "gestion=visiteur&action=get_current_offre&off_id=" + off_id;
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'json',
        }).done(function(response) {
            document.getElementsByName("off_intitule")[0].innerText = response.off_intitule;
            document.getElementsByName("off_secteur")[0].innerText = response.off_secteur;
            document.getElementsByName("off_ville")[0].innerText = response.off_ville;
            document.getElementsByName("off_date_prise_poste")[0].innerText = response.off_date_prise_poste;
            document.getElementsByName("off_salaire")[0].innerText = response.off_salaire;
            if (response.off_type_contrat == "CDI") {
                document.getElementsByName("duree_contrat")[0].style.display = "none";
            } else {
                document.getElementsByName("duree_contrat")[0].style.display = "inline";
                document.getElementsByName("off_duree_contrat")[0].innerText = response.off_duree_contrat;
            }
            document.getElementsByName("off_type_contrat")[0].innerText = response.off_type_contrat;
            document.getElementsByName("off_description")[0].innerText = response.off_description;
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
