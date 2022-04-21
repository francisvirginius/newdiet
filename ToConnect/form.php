<?PHP
require_once '../database/pdo.php';

$email = $_POST['email'];
$password = $_POST['password'];

$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$statement->bindValue(':email',$email);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
if($user === false){
    $message1 =  'erreur de connection !';
}else{
    if(password_verify($password,$user['password'])){
        session_start();
        $_SESSION['email'] = $email ; 
    
          foreach($pdo->query("SELECT admin ,nom,prenom, allergie, suivi_1,suivi_2 FROM users WHERE email IN ('{$email}');") as $info){
          $_SESSION['admin'] = $info['admin']  ;
          $_SESSION['nom'] = $info['nom']  ;
          $_SESSION['allergie'] = $info['allergie']  ;
          $_SESSION['suivi_1'] = $info['suivi_1']  ;
          $_SESSION['suivi_2'] = $info['suivi_2']  ;

        } ;
        if($_SESSION['admin'] === 'oui'){
          header('Location:../admin/profil.php');    
        }else{
          header('Location:../index.php');  
        }
          
        }
      
        
        
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>création de recette</title>
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
        <strong>création de recette</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<body>
    <h1 class="messageError"><?php echo $message1 ?></h1>
</body>

</html>