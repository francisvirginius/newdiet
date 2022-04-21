<?php
            require_once '../picture/picture.php' ;
$titre = $_POST['poste'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>recettes</title>
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
       <strong>recettes</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<body>
  <div class="text-center">

    <div >
        <img id="img"src="<?php echo $randomPicture ?>" alt="">
    </div>
        <?php
            require_once '../database/pdo.php';
                foreach($pdo->query("SELECT titre,description ,etape,temps_preparation,temps_cuisson, type_regime ,etoile,avis,ingredient,onlyAdmin,allergie_1,allergie_2,allergie_3 FROM diet WHERE titre = '{$titre}'") as $diet){
                  $dom = new DOMDocument('1.0', 'utf-8');
                  $description = $diet['description'] ;
                  $temps_preparation = $diet['temps_preparation'] ;
                  $temps_cuisson = $diet['temps_cuisson'] ;
                  $etape = $diet['etape'] ;
                  $type_regime = $diet['type_regime'] ;
                  $onlyAdmin = $diet['onlyAdmin'] ;
                  $etoile = $diet['etoile'] ;
                  $avis = $diet['avis'] ;
                  $allergie_1 = $diet['allergie_1'] ;
                  $allergie_2 = $diet['allergie_2'] ;
                  $allergie_3 = $diet['allergie_3'] ; 
                  $ingredient = $diet['ingredient'] ; 

              
                    $div = $dom->createElement('div');
                        $h1 = $dom->createElement('h1',$titre);
                        $div->appendChild($h1);
                        $classh1 = $dom->createAttribute('class'); 
                        $classh1->value = 'fs-2';
                        $h1->appendChild($classh1);
                        $p1 = $dom->createElement('p',"$temps_preparation min");
                        $div->appendChild($p1);
                        $p2 =$dom->createElement('p',"$temps_cuisson min");
                        $div->appendChild($p2);
                        $h2 = $dom->createElement('h2','Les ingredients');
                        $div->appendChild($h2);
                        $classh2 = $dom->createAttribute('class'); 
                        $classh2->value = 'fs-2';
                        $h2->appendChild($classh2);
                        $p3 = $dom->createElement('p',$ingredient);
                        $div->appendChild($p3);
                        $h4 = $dom->createElement('h4','Les etape');
                        $div->appendChild($h4);
                        $classh4 = $dom->createAttribute('class'); 
                        $classh4->value = 'fs-2';
                        $h4->appendChild($classh4);

                        $p4 = $dom->createElement('p',$etape);
                        $div->appendChild($p4);
                        $h5 = $dom->createElement('h5','les allergie');
                        $div->appendChild($h5);
                        $classh5 = $dom->createAttribute('class'); 
                        $classh5->value = 'fs-2';
                        $h5->appendChild($classh5);
                        $ul = $dom->createElement('ul');
                        $div->appendChild($p4);
                        $div->appendChild($ul);
                        $class = $dom->createAttribute('class'); 
                        $class->value = 'fs-5';


                          $li1 = $dom->createElement('li',$allergie_1);
                          $ul->appendChild($li1);
                          $li2 = $dom->createElement('li',$allergie_2);
                          $ul->appendChild($li2);
                          $li3 = $dom->createElement('li',$allergie_3);
                          $ul->appendChild($li3);
                          $dom->appendChild($div);
                  $dom->appendChild($div);
              
              /** send to dom  */
              echo $dom->saveXML();
              
                    
                  
}
              ?>
              <form method="POST" action="./addRecipes.php">
            <input name="titre" type="hidden" value="<?php echo $titre ?>"></input>
              <button class="btn btn-secondary btn-lg">Ajouter a mon suivi </button>
              </form>

</div>
<hr>

<h1 class="h1">Avis des utilisateurs</h1>
<div class="bodyMessage">
  <div>
  <?php
            require_once '../database/pdo.php';
                foreach($pdo->query("SELECT nom,titreRecette ,avis ,etoile FROM avisEtoile ") as $avisEtoile){
                  $dom = new DOMDocument('1.0', 'utf-8');
                  $nom = $avisEtoile['nom'] ;
                  $avis = $avisEtoile['avis'] ;
                  $etoile = $avisEtoile['etoile'] ;

                  if(isset($nom)){

                  
                  $divMessage = $dom->createElement('div');
                  $attribute1 = $dom->createAttribute('class'); 
                        $attribute1->value = 'card card1 ';
                        $divMessage->appendChild($attribute1);

                    $h1Message = $dom->createElement('h3',$nom);
                    $attribute2 = $dom->createAttribute('class'); 
                        $attribute2->value = 'text-center ';
                        $h1Message->appendChild($attribute2);


                    $divMessage->appendChild($h1Message);
                    $pMessage = $dom->createElement('p',$avis);

                    $attribute3 = $dom->createAttribute('class'); 
                        $attribute3->value = 'text-center';
                        $pMessage->appendChild($attribute3);

                    $divMessage->appendChild($pMessage);
                    $etoile = $dom->createElement('p',"$etoile etoile");
                    $divMessage->appendChild($etoile);

                    $dom->appendChild($divMessage);
                   /** send to dom  */
                echo $dom->saveXML();
              }else{
                echo 'Il n\'y a pour le moment aucune avis ' ;
              }
                }
                  ?>
  </div>
</div>

<h2 class="text-center">Ajouter un commentaire</h2>
<form method="POST" action="./formComments.php">
<div>
<div class="row g-3 ">
          
              <select class="form-select" id="country" name="select" required>
                <option value="">Notez la rectte </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>

            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description"></textarea>
              <label for="floatingTextarea">Ajouter une description</label>
            </div>
            <input name="titre" type="hidden" value="<?php echo $titre ?>"></input>
            <button class="btn btn-lg">Envoyer mon avis</button>
</form>
</div>
</body>
    </html>