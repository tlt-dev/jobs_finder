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
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <img class="navbar-brand" style="max-width: 50px;" src="mod_entreprise/documents/{$entreprise->getEnt_id()}/logo.png"></img>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" method="post" action="index.php">
          <input type="hidden" name="gestion" value="entreprise">
          <input type="hidden" name="action" value="consulter_profil">
          <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
          <input type="hidden" name="token" value="{$token}">
          <input type="submit" class="btn btn-outline-light" value="Profil">
        </form>
        <form class="d-flex" method="post" action="index.php">
          <input type="hidden" name="gestion" value="entreprise">
          <input type="hidden" name="action" value="consulter_suivi">
          <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
          <input type="hidden" name="token" value="{$token}">
          <input type="submit" class="btn btn-outline-light" value="Suivi">
        </form>
        <form class="d-flex" method="post" action="index.php">
          <input type="hidden" name="gestion" value="entreprise">
          <input type="hidden" name="action" value="generer_liste_offre">
          <input type="hidden" name="ent_id" value="{$entreprise->getEnt_id()}">
          <input type="submit" class="btn btn-outline-light" value="Offres">
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
            <form method="post" action="index.php" name="rechercheEmploi">
              <input type="hidden" name="gestion" value="entreprise">
              <input type="hidden" name="action" value="recherche_chercheur_emploi">
              <label for="poste_recherche">Poste recherché</label>
              <select class="form-select" name="competenceMultiSelect[]" id="multiple-select-field"
                data-placeholder="Choose anything" multiple>
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
  $('#multiple-select-field').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
  });
</script>

<script>
  $("form[name='rechercheEmploi']").submit(function(e) {
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
      console.log(response);
      $.each(response.listeChercheurEmploiFilter, function(index, value) {
        if (index == 0) {
          $("#carouselExampleControls").append(
            '<div class="carousel-item active"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
            value.che_nom + " " + value.che_prenom +
            '</div><div class="card-body"><img style="max-width: 50px;" src="../mod_utilisateur/documents/' +
            value.che_id +
            '/photo.png"></img><p class="card-text">Recherche ingénieur informatique full-stack H/F</p></div></div><div class="row justify-content-center"><img style="max-width: 450px;" src="../int/mod_utilisateur/documents/' +
            value.che_id + '/cv.png"></img></div></div>'
          );
        } else {
          $("#carouselExampleControls").append(
            '<div class="carousel-item"><div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;"><div class="card-header">' +
            value.che_nom + " " + value.che_prenom +
            '</div><div class="card-body"><img style="max-width: 50px;" src="../mod_utilisateur/documents/' +
            value.che_id +
            '/photo.png"></img><p class="card-text">Recherche ingénieur informatique full-stack H/F</p></div></div>  <div class="row justify-content-center"><img style="max-width: 450px;" src="../int/mod_utilisateur/documents/' +
            value.che_id + '/cv.png"></img></div></div>'
          );
        }
      });
    });
  });
</script>

</html>