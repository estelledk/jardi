<?php
include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

//requête pour afficher toutes les col relatives à un prod visible 
$pro_id = $_POST['pro_id']; 

$selectProd_whereProId = 'SELECT * FROM produits
						WHERE pro_id ='.$pro_id;
$resultProd_whereProId = $db->query($selectProd_whereProId);
$fetchProd_whereProId = $resultProd_whereProId->fetch(PDO::FETCH_OBJ);  

?>