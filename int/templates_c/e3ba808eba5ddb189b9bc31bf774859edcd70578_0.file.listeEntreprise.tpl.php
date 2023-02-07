<?php
/* Smarty version 4.2.1, created on 2023-02-07 13:53:09
  from 'C:\wamp64\www\jobs_finder\int\mod_entreprise\vue\listeEntreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63e257c557d932_94478221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3ba808eba5ddb189b9bc31bf774859edcd70578' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_entreprise\\vue\\listeEntreprise.tpl',
      1 => 1675777948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./modalEntreprise.tpl' => 1,
  ),
),false)) {
function content_63e257c557d932_94478221 (Smarty_Internal_Template $_smarty_tpl) {
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
            </form>
                <td>
                    <form method="post" action="index.php" name="formModifierEntrepriseModal" id="toto">

                        <input type="hidden" name="gestion" value="entreprise">
                        <input type="hidden" name="action" value="form_modifier_entreprise_modal">
                        <input type="hidden" name="ent_id" value="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value->getEnt_id();?>
">

                        <input type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEntreprise" value="Modifier modal">
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
    $("form[name='formModifierEntrepriseModal']").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#toto").get(0));
        console.log(formData);
         $.ajax({
            type:'POST',
            url:'index.php',
            contentType: !1,
            cache: !1,
            processData: !1,
            data: formData,
            success:function(data){
                 $('#modal-item').html(data);
                    var isValid = $('#isFormValid').val() == 'True';
                    if (isValid) {
                        $('#modal-item').modal('toggle');
                        $('#formPopup').trigger("reset");
                        location.reload();
                        //refreshAlert();
                    } else {
                         $("#buttonValidate").click(function(){
                    Update(id);
            });
                    }
        }});
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
