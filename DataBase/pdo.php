<?php
// Database settings
try{
    $db ='mysql:host=localhost;dbname=nutritionApp';
    $pdo =  new PDO($db,username:'root',password:'') ;
   
}catch(PDOException $PDOException){
    echo 'Problème de connexion avec la base de donnes, nous fessons tout notre possible pour rétablir la connexion !' ;
   
};
?>

