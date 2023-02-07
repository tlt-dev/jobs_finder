<?php
/* Smarty version 3.1.29, created on 2023-02-06 18:11:59
  from "/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/formAuthentification.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_63e142ef3a3224_41633175',
  'file_dependency' => 
  array (
    '5f97ceef66b60dfe931b352f8f95c572ab30dfc1' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_authentification/vue/formAuthentification.tpl',
      1 => 1675707112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e142ef3a3224_41633175 ($_smarty_tpl) {
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

        <input type="radio" id="type" name="type_utilisateur" value="1" checked>
        <label for="type">Chercheur d'emploi</label>

        <input type="radio" id="type" name="type_utilisateur" value="0">
        <label for="type">Entreprise</label>
    </fieldset>

    <label for="che_nom">Nom :</label>
    <input type="text" name="che_nom" id="che_nom" value="">

    <label for="che_prenom">Prénom</label>
    <input type="text" name="che_prenom" id="che_prenom" value="">

    <label for="usr_email">Adresse mail :</label>
    <input type="text" name="usr_email" id="usr_email" value="">

    <label for="usr_mot_de_passe">Mot de passe :</label>
    <input type="password" name="usr_mot_de_passe" id="usr_mot_de_passe" value="">

</form>



</body>
<!--AJAX-->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("#type").on('click', function(e){
       if($("#type").val() == 1)
           {

               $("#che_prenom").removeClass("d-none");

           }
       else
           {

               $("#che_prenom").addClass("d-none");

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
