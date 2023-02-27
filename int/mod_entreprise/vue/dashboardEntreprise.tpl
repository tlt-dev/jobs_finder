<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Accueil</title>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

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
        <form class="d-flex" method="post" action="index.php">
          <input type="hidden" name="gestion" value="entreprise">
          <input type="hidden" name="action" value="consulter_profil">
          <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
          <input type="submit" class="btn btn-outline-light" value="Profil">
        </form>
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
              data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
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
              <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                {foreach $listeCompetence as $competence}                  
                    <option value="{$competence['com_id']}">{$competence['com_libelle']}
                    </option>
                {/foreach}
              </select>

              <input type="submit" class="btn btn-primary" value="Rechercher">
            </form>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            {foreach $listeChercheurEmploi as $chercheurEmploi}
              {if $chercheurEmploi@first}
                <div class="carousel-item active">
                  <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                    <div class="card-header"> Offre n°2</div>
                    <div class="card-body text-dark">
                      <h5 class="card-title">CourbonSoftware</h5>
                      <p class="card-text">Recherche ingénieur informatique full-stack H/F</p>
                    </div>
                  </div>
                </div>
              {else}
                <div class="carousel-item m-auto">
                  <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                    <div class="card-header"> Offre n°1</div>
                    <div class="card-body text-dark">
                      <h5 class="card-title">CourbonSoftware</h5>
                      <p class="card-text">Recherche ingénieur informatique full-stack H/F</p>
                    </div>
                  </div>
                </div>
              {/if}
            {/foreach}
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


</body>

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>



<script>
$( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
</script>

</html>