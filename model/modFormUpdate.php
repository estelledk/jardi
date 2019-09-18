<?php
//requête pour afficher toutes les col relatives à un prod visible 
$pro_id = $_GET['pro_id']; //récupère la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET


$selectProd = 'SELECT * FROM produits
			WHERE pro_id ='.$pro_id;
$reponseProd = $db->query($selectProd);
$fetchProd = $reponseProd->fetch(PDO::FETCH_OBJ);  //avoir toutes les valeurs sous forme objet


//requete pour liste déroulante pro_cat_id
$selectCat = 'SELECT cat_id, cat_nom FROM categories 
			ORDER BY cat_nom ASC'; 
$reponseCat = $db->query($selectCat);
$fetchCat = $reponseCat->fetch(PDO::FETCH_OBJ);
?>