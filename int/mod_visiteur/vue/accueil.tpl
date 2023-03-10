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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            {if $chercheurConnected}
                <ul class="navbar-nav">
                    <li class="nav-item pe-4">
                        <form method="post" action="index.php" name="formNavOffres">
                            <input type="hidden" name="gestion" value="visiteur">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link" onclick="submitFormNavOffres()">Offres</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavProfil">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_profil">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link" onclick="submitFormNavProfil()">Profil</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavDashboard">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_dashboard">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link" onclick="submitFormNavDashboard()">Tableau de bord</p>
                        </form>
                    </li>
                    <li class="nav-item px-4">
                        <form method="post" action="index.php" name="formNavCV">
                            <input type="hidden" name="gestion" value="chercheur">
                            <input type="hidden" name="action" value="generer_fiche_cv">
                            <input type="hidden" name="token" value="{$token}">

                            <p class="nav-link" onclick="submitFormNavCV()">CV</p>
                        </form>
                    </li>
                </ul>
            {/if}
            {if $chercheurConnected || $entrepriseConnected}
                <button class="btn btn-outline-danger" data-bs-toggle="modal" id="btnDisconnect"
                        data-bs-target="#modalDeconnexion">D??connexion</button>
            {else}
                <button class="btn btn-outline-light" data-bs-toggle="modal" id="btnLogin"
                        data-bs-target="#modalAuthentification" value="Login">Login</button>
            {/if}


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

                        <label for="poste_recherche">Poste recherch??</label>
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
                            <div class="card-header"> Offre n??1</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">CourbonSoftware</h5>
                                <p class="card-text">Recherche ing??nieur informatique full-stack H/F</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item m-auto">
                        <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                            <div class="card-header"> Offre n??1</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">CourbonSoftware</h5>
                                <p class="card-text">Recherche ing??nieur informatique full-stack H/F</p>
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

{include file="../../mod_authentification/vue/modalAuthentification.tpl"}
{include file="../../mod_authentification/vue/modalInscription.tpl"}
{include file="../../mod_authentification/vue/modalDeconnexion.tpl"}

</body>


<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

<script>
    $("form[name='formAuthentification']").submit(function(e){
        e.preventDefault();

        var form_url = $(this).attr("action"); //r??cup??rer l'URL du formulaire
        var form_method = $(this).attr("method"); //r??cup??rer la m??thode GET/POST du formulaire
        var form_data = $(this).serialize(); //Encoder les ??l??ments du formulaire pour la soumission


        $.ajax({
            url: form_url,
            type: form_method,
            data:form_data,
            dataType: 'JSON'
        }).done(function(response) {
            console.log(response);

            if(response.message != '')
                {

                    $("#messageContent").text(response.message);
                    $("#message").removeClass("d-none");

                }
            else if(response.gestion == 'entreprise')
                {
                    window.location.replace("index.php?gestion=" + response.gestion);
                }
            else
                {
                    window.location.replace("index.php?gestion=visiteur");
                }
        });

    });
</script>

<script>
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
</script>

<script>
    function submitFormNavOffres()
    {
        $("form[name='formNavOffres']").submit();
    }
</script>
<script>
    function submitFormNavProfil()
    {
        $("form[name='formNavProfil']").submit();
    }
</script>
<script>
    function submitFormNavDashboard()
    {
        $("form[name='formNavDashboard']").submit();
    }
</script>
<script>
    function submitFormNavCV()
    {
        $("form[name='formNavCV']").submit();
    }
</script>

</html>