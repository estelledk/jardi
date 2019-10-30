<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
?><title>produits</title><?php

include('../controler/ctrlProducts.php');
?>

<div class="table table-responsive"> <?php  //table table-responsive : affiche barre défilement horizontale si réduction page   
    
    if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?>  <!-- si l'utilisateur est l'admin ['use_rol_id'] == 1 (=admin) --> 
    <!-- admin/btn ajout -->
        <a href="productAdd.php" class="btn btn-info btn-lg">ajouter un produit</a> <?php 
    } ?>

    <table class="container table table-bordered table-striped table-sm table-hover">  
        <!-- <table> : initialise le tableau ;  table-bordered : bordures ;  table-striped : lignes grisées 1/2 ;  table-hover : mise en évidence au passage de la souris --> 
        <thead class="thead-light"> <!-- thead-light : titre sur fond gris -->
            <tr>
                <th class="text-center">Précision</th>
                <th class="text-center">Photo</th>
                <th class=...                     >      A COPIER
                <?php 

                if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?>  <!-- si ['use_rol_id'] == 1 (=admin) -->
                    <th class="text-center">Modif</th>
                    <th class="text-center">Bloqué</th>
                    <th colspan="2"class="text-center">Gestion des produits</th> <?php 
                } ?>
            </tr>
        </thead>

        <tbody> <?php 
            foreach($fetchProdJoinCat as $row) { ?>     <!-- boucle foreach(){} permet de parcourir chaque colonne de chaque ligne -->
              <!-- renommer la variable avec AS car cela ne doit concerner que la variable présente dans le foreach -->
                <tr>
<!-- details -->	<td><a href="productById.php?pro_id=<?php echo $row->pro_id ?>" title="Lien pour afficher la fiche produit" class="btn btn-outline-secondary btn-sm">fiche produit</a></td>
<!-- photo -->		<td><a href="productById.php?pro_id=<?php echo $row->pro_id ?>"><img class="img-thumbnailcss" src="../../ci/assets/img/<?php echo $row->pro_id . "." . $row->pro_photo ?>"></a></td>  
                        <!-- href="fichierDeBase.php?colSouhaitée=" -->
<!-- ID -->			<td><?php echo $row->pro_id ?></td>
<!-- categorie -->  <td><?php echo $row->cat_nom ?></td>
                	<td><?php echo $row->A_COPIER     ?></td>               <!-- A COPIER -->
                    <?php 

                    if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?>    <!-- si ['use_rol_id'] == 1 (=admin) -->
<!-- admin/d_modif -->      <td><?php echo $row->pro_d_modif ?></td>           
<!-- admin/bloque  -->      <td><?php if ($row->pro_bloque == 1) { echo "Oui"; } ?></td>                                       <!-- admin/modif -->
<!-- admin/btn modif -->    <td><a href="productUpdate.php?pro_id=<?php echo $row->pro_id ?>" title="modification" class="btn-outline-info">modification</a></td>
<!-- admin/btn suppr -->    <td><a href="productDelete.php?pro_id=<?php echo $row->pro_id ?>" title="suppression" class="btn-outline-danger">suppression</a></td> <?php 
                    } ?>
                </tr> <?php 
            } ?>
        </tbody>
    </table> <?php 

    if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?>   <!-- si l'utilisateur est l'admin ['use_rol_id'] == 1 (=admin) -->
<!-- admin/btn ajout -->
        <a href="productAdd.php" class="btn btn-info btn-lg">ajouter un produit</a> <?php 
    } ?>

</div><br>

<?php 
include('footer.php'); ?>	

</body>
</html>

<?php
// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlProducts.php
// include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

// $selectProdJoinCat = 'SELECT * FROM `produits`
//                     INNER JOIN `categories`
//                     ON produits.pro_cat_id = categories.cat_id';

// $resultProdJoinCat = $db->query($selectProdJoinCat);  //___on fait appel à la méthode query() de l'objet $db en faisant passer en argument la reqête SQL. Le résultat est stocké dans la variable $requeteProduits
// $fetchProdJoinCat = $resultProdJoinCat->fetchAll(PDO::FETCH_OBJ); //___on va chercher(fetch();  fetchAll() permet d'afficher plusieurs lignes) pour obtenir le résultat sous forme d'objet avec l'utilisation du paramètre PDO::FETCH_OBJ

// return $fetchProdJoinCat;
// ------------------------------------------------------------------------------------------------------------------------------------------
?>