<?php
include ('connexionBase.php');
?>

<?php
$select = 'SELECT * FROM `produits`';
$requete = $db->prepare($select);
// $requete->bindValue(...).
$requete->execute();

while ( $ligne = $requete->fetch() )
{
    echo $ligne['pro_libelle'].'<br>';
}
?>