<?php
/* Smarty version 4.2.1, created on 2023-03-09 07:48:44
  from 'C:\wamp64\www\jobs_finder\int\mod_authentification\vue\modalDeconnexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64098f5cc18457_07105042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2374ac7879be5679be60c2a526883451074c1d3d' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_authentification\\vue\\modalDeconnexion.tpl',
      1 => 1678348116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64098f5cc18457_07105042 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalDeconnexion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalDeconnexionTitre" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeconnexionTitre">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row m-2 mb-0">
                <div class="alert alert-danger d-none" role="alert" id="message">
                    <p id="messageContent"></p>
                </div>
            </div>
            <form method="post" action="index.php" name="formDeconnexion" class="mt-0">
                <div class="modal-body">
                    <input type="hidden" name="gestion" value="authentification">
                    <input type="hidden" name="action" value="deconnexion">

                    <p>Voulez-vous vraiment vous déconnecter ?</p>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Confirmer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="">Annuler</button>
                </div>
            </form>


        </div>
    </div>
</div><?php }
}
