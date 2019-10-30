<?php
include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

$pro_id = $_GET['pro_id'];

//requete pour liste déroulante jointure tables produits et categories
$selectProdJoinCat = 'SELECT * FROM `produits`
                     INNER JOIN `categories`
                     ON produits.pro_cat_id = categories.cat_id
                     WHERE pro_id =' . $pro_id;
$resultProdJoinCat = $db->query($selectProdJoinCat);  //___on fait appel à la méthode query() de l'objet $db en faisant passer en argument la reqête SQL. Le résultat est stocké dans la variable $requeteProduits
$fetchProdJoinCat = $resultProdJoinCat->fetch(PDO::FETCH_OBJ); //___on va chercher(fetch();  fetchAll() permet d'afficher plusieurs lignes) pour obtenir le résultat sous forme d'objet avec l'utilisation du paramètre PDO::FETCH_OBJ

return $fetchProdJoinCat;
?>