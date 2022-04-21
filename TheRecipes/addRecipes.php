<?php
require_once '../database/pdo.php';
session_start() ; 
if(!isset($_SESSION['email'])){
    return header('Location:../ToConnect/Connect.php'); 
      }
var_dump($_POST);
$titre = $_POST['titre'] ;
$nomUsers = $_SESSION['email'] ;




           $diet = ':diet_3' ;
$statement = $pdo->prepare("INSERT INTO dietusers (id_users,diet_1 ) VALUES (:idUsers,:diet_1)");
$statement->bindValue(':idUsers', $nomUsers);
$statement->bindValue(':diet_1', $titre);

if ($statement->execute()) {
    $message ='L\'utilisateur a bien été créé, mais doit être vérifié par notre équipe ';
} else {
    $message = 'Impossible de créer l\'utilisateur';
}
header('Location:../profil/profil.php'); 

?>