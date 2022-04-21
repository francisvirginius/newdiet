<?php
session_start();

// recuper les donner de la page recipe 


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Toute les recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="./AllRecipes.css" rel="stylesheet" type="text/css" />
  </head>
   
  <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container" id="navbarToHide">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <ul class="list-unstyled">
            <li><a href="../index.php" class="text-white">Accueil</a></li>
            <li><a href="../Connect.php" class="text-white">Se Connecter</a></li>
            <li><a href="../Profil/profil.php" class="text-white">Mon profil</a></li>
            <li><a href="../TheRecipes/AllRecipes.php" class="text-white">Toute les recettes</a></li>
            <li><a href="../ToContactUs/ContactUs.php" class="text-white">Nous Contacter</a></li>
            <li><a href="../LegalNoticeAndPoliticalOfConfidentiality/LegalNotice.php" class="text-white">Mentions légales</a></li>
            <li><a href="../LegalNoticeAndPoliticalOfConfidentiality/PoliticalOfConfidentiality.css" class="text-white">Politique de confidentialité</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="navbar navbar-dark bg-dark shadow-sm" id="navbar">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-egg-fill me-2" viewBox="0 0 16 16" >
          <path d="M14 10a6 6 0 0 1-12 0C2 5.686 5 0 8 0s6 5.686 6 10z"/>
        </svg>
       <strong>Toute les recettes</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<body>
<?php
            require_once '../database/pdo.php';
                foreach($pdo->query("SELECT titre,description ,temps_preparation, type_regime ,onlyAdmin FROM diet") as $diet){
                  $dom = new DOMDocument('1.0', 'utf-8');
                  $titre = $diet['titre'] ;
                  $description = $diet['description'] ;
                  $temps_preparation = $diet['temps_preparation'] ;
                  $onlyAdmin = $diet['onlyAdmin'] ; 
                  $type_regime = $diet['type_regime'] ;
              

                    /** title of announcement  */
              $div = $dom->createElement('div');
              $divId = $dom->createAttribute('id'); 
              $divId->value = 'card';
              $div->appendChild($divId);
              $dom->appendChild($div);
                  $divCard = $dom->createElement('div');
                  $div->appendChild($divCard);
                      $form = $dom->createElement('form');
                      $divCard->appendChild($form);
                      $formAttribute = $dom->createAttribute('method'); 
                      $formAttribute->value = 'POST';
                      $form->appendChild($formAttribute);
                      $formAttribute2 = $dom->createAttribute('action'); 
                      $formAttribute2->value = './form.php';
                      $form->appendChild($formAttribute2);
                          $divShadow = $dom->createElement('div');
                          $form->appendChild($divShadow);
                          $divShadowAttribute = $dom->createAttribute('class'); 
                          $divShadowAttribute->value = 'card mb-4 rounded-3 shadow-sm text-center';
                          $divShadow->appendChild($divShadowAttribute);
                                  $divH4 = $dom->createElement('div');
                                  $divShadow->appendChild($divH4);
                                  $divH4Attribute = $dom->createAttribute('class'); 
                                  $divH4Attribute->value = 'card-header py-3';
                                      $h4 = $dom->createElement('h4',$titre);
                                      $divH4->appendChild($h4);
                                      $h4Attribute = $dom->createAttribute('class');
                                      $h4Attribute->value = 'my-0 fw-normal';
                                      $h4->appendChild($h4Attribute);

                                  $divCardBody = $dom->createElement('div');
                                  $divShadow->appendChild($divCardBody);
                                  $divCardBodyAttribute = $dom->createAttribute('class'); 
                                  $divCardBodyAttribute->value = 'card-body';
                                  $divCardBody->appendChild($divCardBodyAttribute);
                                      $h1 = $dom->createElement('h1',"$temps_preparation min");
                                      $divCardBody->appendChild($h1);
                                      $h1Attribute = $dom->createAttribute('class'); 
                                      $h1Attribute->value = 'fw-light';
                                      $h1->appendChild($h1Attribute);
                                      $h2 = $dom->createElement('h1',$type_regime);
                                      $divCardBody->appendChild($h2);
                                      $h2Attribute = $dom->createAttribute('class'); 
                                      $h2Attribute->value = 'fw-light';
                                      $h2->appendChild($h2Attribute);
                                  $p = $dom->createElement('p',$description);
                                  $divShadow->appendChild($p);
                                  $input = $dom->createElement('input');
                                  $divShadow->appendChild($input);
                                  $inputAttribute = $dom->createAttribute('name'); 
                                  $inputAttribute->value = 'poste';
                                  $input->appendChild($inputAttribute);
                                  $inputAttribute2 = $dom->createAttribute('value'); 
                                  $inputAttribute2->value = $titre;
                                  $input->appendChild($inputAttribute2);
                                  $inputAttribute3 = $dom->createAttribute('hidden');
                                  $input->appendChild($inputAttribute3);
                                  $button = $dom->createElement('button','Voir la recette');
                                  $divShadow->appendChild($button);
                                  $buttonyAttribute = $dom->createAttribute('class'); 
                                  $buttonyAttribute->value = 'w-100 btn btn-lg btn-outline-primary';
                                  $buttonAttribute2 =$dom->createAttribute('type');
                                  $buttonAttribute2->value = 'submit';
                                  $button->appendChild($buttonAttribute2);
                                  $button->appendChild($buttonyAttribute);
                  $dom->appendChild($div);
              
              /** send to dom  */
              echo $dom->saveXML();
              
                    
                  
}



              ?>

</body>
</html>