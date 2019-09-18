<?php
//AFFICHAGE LISTE DEROULANTE
$select = 'SELECT distinct cat_nom, cat_id FROM categories';  //requête pour liste déroulante pro_cat_id
$requete = $db->query($select);
?>