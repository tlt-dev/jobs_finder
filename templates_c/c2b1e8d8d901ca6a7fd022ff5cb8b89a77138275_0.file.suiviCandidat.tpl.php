<?php
/* Smarty version 4.2.1, created on 2023-03-19 20:00:20
  from '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/suiviCandidat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_641769d4317f35_81473509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2b1e8d8d901ca6a7fd022ff5cb8b89a77138275' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/mod_entreprise/vue/suiviCandidat.tpl',
      1 => 1679252549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:mod_entreprise/vue/modalEntretien.tpl' => 1,
  ),
),false)) {
function content_641769d4317f35_81473509 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <link rel="stylesheet" href="mod_entreprise/assets/entreprise.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>

<body>
    <section id="price-section">
        <div class="container-fluid">
            <div class="row justify-content-center gapsectionsecond">
                <div class="col-lg-7 text-center">
                    <div class="title-big pb-3 mb-3">
                        <h3>SUIVI CANDIDATURE</h3>
                    </div>
                    <p class="description-p text-muted pe-0 pe-lg-0">
                        Suivi des candidatures pour gérer les entretients etc....
                    </p>
                </div>
            </div>
            <div class="offset-5 col-2">
                <div class="row justify-content-center">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">Recherche</div>
                        <div class="card-body">
                            <form method="post" action="index.php" name="rechercheCandidat">
                                <input type="hidden" name="gestion" value="entreprise">
                                <input type="hidden" name="action" value="recherche_Candidat">
                                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                                <label for="candidat_recherche">Poste recherché</label>
                                <select class="form-select" name="offreMultiSelect[]" id="multiple-select-field"
                                    data-placeholder="Choose anything" multiple>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeOffres']->value, 'offres');
$_smarty_tpl->tpl_vars['offres']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offres']->value) {
$_smarty_tpl->tpl_vars['offres']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['offres']->value['off_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['offres']->value['off_intitule'];?>

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
            </div>
            <div class="row pt-5">
                <div class="col-lg-3 pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <p>Liste des candidat(s)</p>
                        </div>
                        <div class="card-body" id="CardCandidat">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <p>Proposition d'entretien</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="index.php" name="formAddEntretien">
                                <input type="hidden" name="token" id="formAddEntretienToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                                <input type="submit" class="btn btn-outline-dark" value="Ajouter un entretien">
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3  pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                        <p>Réponse du candidat</p>
                        </div>
                        <div class="card-body">
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['EntretienStatut']->value[0]['ent_statut'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == "1") {?>
                            <span> Attente de la réponse </span>
                      
                        <?php }?>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['EntretienStatut']->value[0]['ent_statut'];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == "2") {?>
                            <span> Accepté </span>
                      
                        <?php }?>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['EntretienStatut']->value[0]['ent_statut'];
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3 == "3") {?>
                            <span> Refusé </span>
                      
                        <?php }?>
                        <form method="post" action="index.php" name="formAddEntretienReponse">
                        <input type="hidden" name="token" id="formAddEntretienReponseToken" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                        <input type="submit" class="btn btn-outline-dark" value="Ajouter une réponse">
                    </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <span>card4</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $_smarty_tpl->_subTemplateRender("file:mod_entreprise/vue/modalEntretien.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
    function showModalEntretien(can_chercheur, can_offre) {

        $("#formEntretien_offre").val(can_offre);
        $("#formEntretien_chercheur").val(can_chercheur);

        var myModal = new bootstrap.Modal(document.getElementById('modalEntretien'));
        myModal.show();


        /*$.ajax({
            url: "index.php",
            type: "POST",
            data: {
                "gestion": "entreprise",
                "can_chercheur": can_chercheur,
                "can_off": can_off,
                "token": $("input[name='cardEntretienToken']").val()
            },
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);

            

        });*/

        



    }
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    $("form[name='rechercheCandidat']").submit(function(e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function(response) {
            console.log(response.listeCandidats);

            $.each(response.listeCandidats, function(index, value) {

                $("#CardCandidat").append(



                    '<div class="border-radius highlight" onclick="showModalEntretien('+value.can_chercheur + ',' + value.can_offre +')"><input type="hidden" name="cardEntretienToken" value="'+value.token+'"><h5 class="text-center mb-0 pt-2">'+value.che_nom + ' ' + value.che_prenom+'</h5> <div class="row align-items-center"><div class="col-9 pb-2"> <p class="m-0">'+value.che_mail+'</p><p class="m-0">'+value.che_telephone+'</p></div></div></div>'
                );
                
            });

            
                                
                            

        });

        $("#modalEntretienTitre").text("Ajout d'une proposition d'entretien");
        $("#formEntretien_action").val('add_entretien');
        $("#formEntretien_token").val($("#formAddEntretienToken").val());
        $("#formEntretienButton").val('Ajouter');
    });
<?php echo '</script'; ?>
>



</html><?php }
}
