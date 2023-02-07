<?php
/* Smarty version 4.2.1, created on 2023-02-07 15:08:39
  from '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/listeEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e269779a80f7_00429586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f74561fee34a3a9071caacb6eca6b3e5343e16b0' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder-matthieu/int/mod_entreprise/vue/listeEntreprise.tpl',
      1 => 1675782517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./modalEntreprise.tpl' => 1,
  ),
),false)) {
function content_63e269779a80f7_00429586 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Titre</th>
        <th></th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeEntreprises']->value, 'entreprise');
$_smarty_tpl->tpl_vars['entreprise']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entreprise']->value) {
$_smarty_tpl->tpl_vars['entreprise']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_nom();?>
</td>

                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="form_modifier_entreprise">
                        <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">

                        <button type="submit" class="btn btn-primary" value="Modifier">Modifier</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php" name="formModifierEntreprise">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="form_modifier_entreprise_modal">
                        <input type="hidden" name="ent_id" id="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">

                        <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEntreprise" value="Modifier">
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="supprimer_entreprise">
                        <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">
                        <button type="submit" class="btn btn-danger" value="Supprimer">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>


<?php $_smarty_tpl->_subTemplateRender('file:./modalEntreprise.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $("form[name='formModifierEntreprise']").submit(function(e){
        e.preventDefault();

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission


        $.ajax({
            url: form_url,
            method: form_method,
            data:form_data,
            dataType: 'JSON'
        }).done(function(response) {
            console.log(response);
            $("#action_modal").val(response.action);
            $("#id_modal").val(response.ent_id);
            $("#titre_modal").val(response.ent_nom);
            $("#modalEntrepriseLabel").text(response.titre);
            $("#button_modal").val(response.button);
        })

    });
<?php echo '</script'; ?>
>

</body>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
</html><?php }
}
