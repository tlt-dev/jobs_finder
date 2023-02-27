<?php
/* Smarty version 4.2.1, created on 2023-02-27 09:48:56
  from '/Applications/MAMP/htdocs/jobs_finder/int/mod_visiteur/vue/accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63fc7c88ebf325_94722281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91ce735bb8dd1cb12f8146da355631df047bf8ef' => 
    array (
      0 => '/Applications/MAMP/htdocs/jobs_finder/int/mod_visiteur/vue/accueil.tpl',
      1 => 1677491335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mod_authentification/vue/modalAuthentification.tpl' => 1,
  ),
),false)) {
function content_63fc7c88ebf325_94722281 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <button class="btn btn-outline-light" data-bs-toggle="modal"
                       data-bs-target="#modalAuthentification" value="Login">Login</button>

        </div>
    </div>

    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="entreprise">

        <input type="text" name="ent_id" value="">
        <input type="submit" class="btn btn-danger" value="Entreprise">
    </form>
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
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
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
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
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
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                        the
                        <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                        exciting
                        happening here in terms of content, but just filling up the space to make it look, at least at
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
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="visiteur">
                        <input type="hidden" name="action" value="recherche_poste">

                        <label for="poste_recherche">Poste recherché</label>
                        <input type="text" class="form-control" placeholder="Futur select recherchable" value="">

                        <input type="submit" class="btn btn-primary" value="Rechercher">
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                            <div class="card-header"> Offre n°1</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">CourbonSoftware</h5>
                                <p class="card-text">Recherche ingénieur informatique full-stack H/F</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item m-auto">
                        <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                            <div class="card-header"> Offre n°1</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">CourbonSoftware</h5>
                                <p class="card-text">Recherche ingénieur informatique full-stack H/F</p>
                            </div>
                        </div>
                    </div>


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

    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../mod_authentification/vue/modalAuthentification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
    $("form[name='formAuthentificationModal']").submit(function (e) {
        e.preventDefault(); //empêcher une action par défaut

        var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
        var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

        $.ajax({
            url: form_url,
            type: form_method,
            data: form_data,
            dataType: 'JSON'
        }).done(function (response) {
            console.log(response);
        });
    });
    })
    ;
<?php echo '</script'; ?>
>

</html><?php }
}
