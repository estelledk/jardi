<?php
// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.
// $pro_id = $_GET["pro_id"];

//requête pour afficher toutes les col relatives à un prod visible 
$select = 'SELECT * FROM produits WHERE pro_id=' . $_POST['pro_id'];
$requete = $db->query($select);  //méthode query() fait passer en argument notre requête SQL et on stocke le résultat dans une var 
$fetch = $requete->fetch(PDO::FETCH_OBJ);  //méthode fetch() (="chercher") ; paramètre PDO::FETCH_OBJ pour obtenir le résultat sous forme d'objet
    //méthode fetchAll() pour un affichage de plusieurs lignes de la bdd
    
?>