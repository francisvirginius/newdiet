<?php
 require_once '../database/pdo.php';
session_start();
var_dump($_POST);
$nom = $_SESSION['email'] ;
$select = $_POST['select'];
$etoile = intval($select);
$description = $_POST['description'];
$titre = $_POST['titre'];

if($nom === null){
    $nom ='Utilisateur non connecté';
}
$statement = $pdo->prepare('INSERT INTO avisEtoile(nom, titreRecette, avis,etoile ) VALUES (:nom, :titreRecette, :avis, :etoile)');
$statement->bindValue(':nom', $nom);
$statement->bindValue(':titreRecette', $titre);
$statement->bindValue(':avis', $description);
$statement->bindValue(':etoile', $etoile);


if ($statement->execute()) {
    $message ='L\'utilisateur a bien été créé, mais doit être vérifié par notre équipe ';
} else {
    $message = 'Impossible de créer l\'utilisateur';
}

 header('Location:./AllRecipes.php'); 

?>