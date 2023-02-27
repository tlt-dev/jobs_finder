<?php
/* Smarty version 4.2.1, created on 2023-02-27 08:17:22
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/formAuthentification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63fc6712e9f344_35614633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3153c4dd738a35fdd66038e2f1491beed9f0a3d' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/formAuthentification.tpl',
      1 => 1677485052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fc6712e9f344_35614633 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<h1>Authentification</h1>

<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="authentification">
    <input type="hidden" name="action" value="verifier_utilisateur">

    <label for="email">Adresse mail : </label>
    <input type="text" id="email" name="usr_email" value="">

    <label for="mdp">Mot de passe :</label>
    <input type="text" id="mdp" name="usr_mot_de_passe" value="">

    <input type="submit" class="btn btn-primary" value="Se connecter">
</form>

<h1>Inscription</h1>

<form method="post" action="index.php">
    <input type="hidden" name="gestion" value="authentification">
    <input type="hidden" name="action" value="inscription">

    <fieldset>
        <legend>Qui êtes-vous ?</legend>

        <input type="radio" id="type_1" name="usr_est_chercheur_emploi" value="1" checked>
        <label for="type_1">Chercheur d'emploi</label>

        <input type="radio" id="type_2" name="usr_est_chercheur_emploi" value="0">
        <label for="type_2">Entreprise</label>
    </fieldset>

    <label for="che_nom" id="label_che_nom">Nom :</label>
    <input type="text" name="che_nom" id="che_nom" value="">

    <label for="ent_nom" id="label_ent_nom">Nom :</label>
    <input type="text" name="ent_nom" id="ent_nom" value="">

    <label for="che_prenom" id="label_prenom">Prénom</label>
    <input type="text" name="che_prenom" id="che_prenom" value="">

    <label for="usr_email">Adresse mail :</label>
    <input type="text" name="usr_email" id="usr_email" value="">

    <label for="usr_mot_de_passe">Mot de passe :</label>
    <input type="password" name="usr_mot_de_passe" id="usr_mot_de_passe" value="">

    <input type="submit" class="btn btn-success" value="S'inscrire">

</form>



</body>
<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("input[name='usr_est_chercheur_emploi']").on('click', function(e){
       if($("#type_1").is(":checked"))
           {
               $("#ent_nom").addClass("d-none");
               $("#label_ent_nom").addClass("d-none");
               $("#che_prenom").removeClass("d-none");
               $("#label_prenom").removeClass("d-none");
               $("#che_nom").removeClass("d-none");
               $("#label_che_nom").removeClass("d-none");
           }
       else
           {
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

<!--Bootstrap JS-->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"><?php echo '</script'; ?>
>



</html><?php }
}
