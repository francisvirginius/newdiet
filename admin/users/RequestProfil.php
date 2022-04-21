<?php
require_once '../../DataBase/pdo.php';



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Les demande de creation de compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="./RequestProfil.css" rel="stylesheet" type="text/css" />
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
            <li><a href="../../index.php" class="text-white">Accueil</a></li>
            <li><a href="../../ToConnect/Connect.php" class="text-white">Se Connecter</a></li>
            <li><a href="../../Profil/profil.php" class="text-white">Mon profil</a></li>
            <li><a href="../../TheRecipes/AllRecipes.php" class="text-white">Toute les recettes</a></li>
            <li><a href="../../ToContactUs/ContactUs.php" class="text-white">Nous Contacter</a></li>
            <li><a href="../../LegalNoticeAndPoliticalOfConfidentiality/LegalNotice.php" class="text-white">Mentions légales</a></li>
            <li><a href="../../LegalNoticeAndPoliticalOfConfidentiality/PoliticalOfConfidentiality.css" class="text-white">Politique de confidentialité</a></li>
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
        <strong>Les demande de creation de compte</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<body>
<h1 class="Resquest">Demande de création d'utilisateur </h1>
  <?php
foreach($pdo->query('SELECT email ,name ,lastname ,allergie_1,allergie_2, why FROM requestUsers ') as $users){
  $dom = new DOMDocument('1.0', 'utf-8');
  $email = $users['email'] ;
  $lastname = $users['lastname'] ;
  $firstname = $users['name'] ;
  $allergie_1 = $users['allergie_1'] ;
  $allergie_2 = $users['allergie_2'] ;
  $why = $users['why'] ;

      $divparentUsers = $dom->createElement('div');
      /** Title announcement */
            $h1email = $dom->createElement('h1', "$email");
            $divparentUsers->appendChild($h1email);
      /** first name and last name  */
            $divdescriptionName = $dom->createElement('div');
            $divparentUsers->appendChild($divdescriptionName);
                $pfirtname = $dom->createElement('p',"Prenom: $firstname");
                $divdescriptionName->appendChild($pfirtname);
                $plastname =  $dom->createElement('p',"Nom: $lastname");
                $divdescriptionName->appendChild($plastname);
                $pallergie1 = $dom->createElement('p',"Allergie 1: $allergie_1");
                $divdescriptionName->appendChild($pallergie1);
                $pallergie2 = $dom->createElement('p',"Allergie 2: $allergie_2");
                $divdescriptionName->appendChild($pallergie2);
                $pwhy = $dom->createElement('p',"Pourquoi : $why");
                $divdescriptionName->appendChild($pwhy);
      $dom->appendChild($divparentUsers);
      $hr = $dom->createElement('hr');
      $dom->appendChild($hr);

    /** send to dom  */
    echo $dom->saveXML();
    

  }
?>
  </body>
</html>