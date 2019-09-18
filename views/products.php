<?php 
include ('header1headSession.php'); ?>
	<title>produits</title>
    <?php
include ('header2bodyImg.php');
include ('header3Navbar.php');

include ('../controler/connexionBase.php');  // lance la fonction connexionBase qui est dans le fichier connexion_bdd :
include ('../model/modProducts.php'); //requêtes du formulaire, include noté après include de la connexion bdd

// var_dump($_SESSION);
?>


<div class="container-fluid bg-dark">
    <!-- class="container-fluid bg-dark" : marge à gauche + tableau large + fond noir -->
    <br><br>

<!-- si présence du POST submit -->
    <?php 
    if (isset($_POST['submit']) && count($formError) == 0) 
    { ?>
    <p>Formulaire validé</p>
    <?php 
    } ?>

    <div class="table table-responsive">
        <!-- table table-responsive : affiche barre défilement horizontale si réduction page -->   
        <br>
        <?php 
        if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
        { ?>
<!-- admin/ajout -->
            <div class="text-center">
                <a href="formulaireCreate.php" class="btn btn-info btn-lg">ajouter un produit</a>
                <br><br><br>
            </div>
            <?php 
        } ?>
        <table class="container table table-bordered table-striped table-sm table-hover">  
        <!-- <table> : initialise le tableau -->
            <!-- container : col ajustées -->
            <!-- table-bordered : bordures -->
            <!-- table-striped : lignes grisées 1/2 -->
            <!-- table-hover : mise en évidence au passage de la souris --> 
            <thead class="thead-light">
                <!-- thead-light : titre sur fond gris -->
                <tr>
                    <th class="text-center">Photo</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Référence</th>
                    <th class="text-center">Libellé</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Couleur</th>
                    <th class="text-center">Ajout</th>
                    <?php 
                    if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
                        { ?>
                        <th class="text-center">Modif</th>
                        <th class="text-center">Bloqué</th>
                        <th class="text-center">Sélection</th>
                        <th class="text-center">Suppression</th>
                        <?php 
                        } ?>
                </tr>
            </thead>

            <tbody>
            <?php 
                foreach($fetchProduits as $prod)  //boucle foreach(){} permet de parcourir chaque colonne de chaque ligne
                { ?>  <!-- renommer la variable avec AS car cela ne doit concerner que la variable présente dans le foreach -->
                    <tr>
<!-- photo -->		    <td><a href="formulaireUpdate.php?pro_id=<?php echo $prod->pro_id ?>">  <!-- href="fichierDeBase.php?colSouhaitée=" -->
                            <img class="img-thumbnail" height="80px" width="80px" src="../assets/img/<?php echo $prod->pro_id . "." . $prod->pro_photo ?>"></a></td>  
<!-- ID -->			    <td><?php echo $prod->pro_id ?></td>
<!-- categorie -->      <td><?php echo $prod->cat_nom ?></td>
<!-- reference -->	    <td><?php echo $prod->pro_ref ?></td>
<!-- libelle -->	    <td><?php echo $prod->pro_libelle ?></td>
<!-- prix -->		    <td class="text-right"><?php echo $prod->pro_prix ?>€</td>  
<!-- stock -->		    <td class="text-right"><?php echo $prod->pro_stock ?></td>  
<!-- couleur -->	    <td><?php echo $prod->pro_couleur ?></td>  
<!-- date ajout -->		<td><?php echo $prod->pro_d_ajout ?></td>
                        <?php 
                        if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
                        { ?>
<!-- admin/date modif -->   <td><?php echo $prod->pro_d_modif ?></td>
<!-- admin/bloqué -->       <td><?php 
                            if ($prod->pro_bloque == 1) 
                            {
                                echo "Oui";
                            } ?></td>
<!-- admin/modif -->        <td><a href="formulaireUpdate.php?pro_id=<?php echo $prod->pro_id ?>" title="Lien pour modifier la ligne" class="btn btn-success btn-sm">modifier la ligne</a></td>
<!-- admin/suppr -->        <td><a href="msgProductDelete1.php?pro_id=<?php echo $prod->pro_id ?>" title="Lien pour supprimer la ligne" class="btn btn-danger btn-sm">supprimer la ligne</a></td>
                        <!-- <td><a href="../controler/ctrlFormDelete.php?pro_id=<?php echo $prod->pro_id; ?>" title="Lien pour supprimer la ligne"><input name="button2" type="button" class="btn btn-danger btn-sm" value="supprimer la ligne" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée ?'));"></a> -->
                            <?php 
                        } ?>
                    </tr>
                    <?php 
                } ?>
            </tbody>
        </table>
        <?php 
        if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) 
        { ?>
<!-- admin/ajout -->
            <br><br>
            <div class="text-center">
                <a href="formulaireCreate.php" class="btn btn-info btn-lg">ajouter un produit</a>
                <br><br><br>
            </div>
            <?php 
        } ?>
    </div><br>
</div>

<?php 
$requeteProduits->closeCursor();

include ('footer.php'); ?>	

</body>
</html>