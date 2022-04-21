<?php
require_once '../DataBase/pdo.php';


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Demande de création de compte  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="./Connect.css" rel="stylesheet" type="text/css" />
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
        <strong>Demande de création de compte </strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

 
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row g-5">
      >
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Demande de création de compte </h4>
        <form class="needs-validation" method="POST" action="./formToRequest.php">
          <div class="row g-3 ">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="name" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastname" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Allergie 1</label>
              <input type="text" class="form-control" id="allergie_1" name="allergie_1">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Allergie 2</label>
              <input type="text" class="form-control" id="allergie_2" name="allergie_2">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Pourquoi vouloir nous rejoindre ?</label>
              <input type="text" class="form-control" id="why" name="why"  required>
              <div class="invalid-feedback"
                Please enter hi follow -up.
              </div>
            </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>

</body>
 
</html>