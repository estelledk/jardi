<?php
// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.
// $pro_id = $_GET["pro_id"];

//requête pour afficher toutes les col relatives à un prod visible 
$select = "SELECT * FROM produits WHERE pro_id=" . $_POST['pro_id'];
$requete = $db->query($select);
    //__on fait ensuite appel à la méthode query() de l'objet $db en faisant passer en argument notre requête SQL
    //__on stocke le résultat dans une variable "$requete"
$fetch = $requete->fetch(PDO::FETCH_OBJ);  //méthode fetch() (="chercher")  ; (PDO::FETCH_OBJ) pour obtenir le résultat sous forme d'objet 
    //on utilise méthode fetchAll() pour un affichage de plusieurs lignes de la bdd
    
?>