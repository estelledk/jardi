<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
?><title>produits</title><?php

include('../controler/ctrlProducts.php');
?>

<div class="container-fluid bgcss pb-3">
    <div class="table table-responsive pt-5 pb-2">  <!-- table table-responsive : affiche barre défilement horizontale si réduction page -->   
        
        <?php 
        if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si l'utilisateur est l'admin ['use_rol_id'] == 1 (=admin) 
        { ?>
<!-- admin/btn ajout -->
            <div class="text-center pt-2 pb-5">
                <a href="productAdd.php" class="btn btn-info btn-lg">ajouter un produit</a>
            </div> <?php 
        } ?>

        <table class="container table table-bordered table-striped table-sm table-hover">  
            <!-- <table> : initialise le tableau ;  table-bordered : bordures ;  table-striped : lignes grisées 1/2 ;  table-hover : mise en évidence au passage de la souris --> 
            <thead class="thead-light"> <!-- thead-light : titre sur fond gris -->
                <tr>
                    <th class="text-center">Précision</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Référence</th>
                    <th class="text-center">Libellé</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Couleur</th>
                    <th class="text-center">Ajout</th><?php 

                    if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
                        { ?>
                            <th class="text-center">Modif</th>
                            <th class="text-center">Bloqué</th>
                            <th colspan="2"class="text-center">Gestion des produits</th> <?php 
                        } ?>
                </tr>
            </thead>

            <tbody> <?php 
                foreach($fetchProdJoinCat as $row)  //boucle foreach(){} permet de parcourir chaque colonne de chaque ligne
                { ?>  <!-- renommer la variable avec AS car cela ne doit concerner que la variable présente dans le foreach -->
                    <tr>
<!-- details -->		<td><a href="productById.php?pro_id=<?php echo $row->pro_id ?>" title="Lien pour afficher la fiche produit" class="btn btn-outline-secondary btn-sm">fiche produit</a></td>
<!-- photo -->		    <td><a href="productById.php?pro_id=<?php echo $row->pro_id ?>"><img class="img-thumbnailcss" src="../../ci/assets/img/<?php echo $row->pro_id . "." . $row->pro_photo ?>"></a></td>  
                            <!-- href="fichierDeBase.php?colSouhaitée=" -->
<!-- ID -->			    <td><?php echo $row->pro_id ?></td>
<!-- categorie -->      <td><?php echo $row->cat_nom ?></td>
<!-- reference -->	    <td><?php echo $row->pro_ref ?></td>
<!-- libelle -->	    <td><?php echo $row->pro_libelle ?></td>
<!-- prix -->		    <td class="text-right"><?php echo $row->pro_prix ?>€</td>  
<!-- stock -->		    <td class="text-right"><?php echo $row->pro_stock ?></td>  
<!-- couleur -->	    <td><?php echo $row->pro_couleur ?></td>  
<!-- date ajout -->		<td><?php echo $row->pro_d_ajout ?></td> <?php 

                        if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
                        { ?>
<!-- admin/d_modif -->      <td><?php echo $row->pro_d_modif ?></td>           
<!-- admin/bloque  -->      <td><?php if ($row->pro_bloque == 1) { echo "Oui"; } ?></td>                                       <!-- admin/modif -->
<!-- admin/btn modif -->    <td><a href="productUpdate.php?pro_id=<?php echo $row->pro_id ?>" title="Lien pour modifier la ligne" class="btn btn-outline-info btn-sm">modification</a></td>
<!-- admin/btn suppr -->    <td><a href="productDelete.php?pro_id=<?php echo $row->pro_id ?>" title="Lien pour supprimer la ligne" class="btn btn-outline-danger btn-sm">suppression</a></td>
                            <!-- <td><a href="../controler/ctrlProductDelete.php?pro_id=<php echo $row->pro_id; ?>" title="Lien pour supprimer la ligne"><input name="button2" type="button" class="btn btn-danger btn-sm" value="supprimer la ligne" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée ?'));"></a> -->
                            <?php 
                        } ?>
                    </tr> <?php 
                } ?>
            </tbody>
        </table> <?php 

        if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si l'utilisateur est l'admin ['use_rol_id'] == 1 (=admin) 
        { ?>
<!-- admin/btn ajout -->
            <div class="text-center pt-4 pb-5"> 
                <a href="productAdd.php" class="btn btn-info btn-lg">ajouter un produit</a>
            </div> <?php 
        } ?>

    </div><br>
</div>

<?php 
// $resultProdJoinCat->closeCursor();
include('footer.php'); ?>	

</body>
</html>