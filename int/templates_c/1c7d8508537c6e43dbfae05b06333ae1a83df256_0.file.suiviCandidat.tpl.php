<?php
/* Smarty version 4.2.1, created on 2023-03-06 10:24:31
  from 'C:\wamp64\www\jobs_finder\int\mod_entreprise\vue\suiviCandidat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6405bf5f33b972_01924983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c7d8508537c6e43dbfae05b06333ae1a83df256' => 
    array (
      0 => 'C:\\wamp64\\www\\jobs_finder\\int\\mod_entreprise\\vue\\suiviCandidat.tpl',
      1 => 1678098267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6405bf5f33b972_01924983 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

    <link href="../../mod_entreprise/assets/entreprise.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

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
            <div class="row pt-5">
                <div class="col-lg-3 pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                        <p>Liste de vos offres</p>
                        </div>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeOffres']->value, 'offres');
$_smarty_tpl->tpl_vars['offres']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offres']->value) {
$_smarty_tpl->tpl_vars['offres']->do_else = false;
?>
                            <div class="card-body">
                                <span><?php echo $_smarty_tpl->tpl_vars['offres']->value['off_intitule'];?>
</span>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
                <div class="col-lg-3 pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <span>card2</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3  pb-5 pb-lg-0">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <span>card3</span>
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

</body>

</html><?php }
}
