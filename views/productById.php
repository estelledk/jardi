<?php
include('header1headSession.php');
include('header3Navbar.php');
?> <title>produits</title> <?php
include('../controler/ctrlProductById.php');
?>

<div class="bgcss">

	<div class="container row offset-lg-2 offset-md-1">
		<!-- titre -->
		<div class="col-lg-12">
			<br>
			<h2 class="text-info text-center">Détail du produit <?php echo $fetchProdJoinCat->pro_libelle ?> :</h2><br>
		</div>
	</div>

	<div class="container row offset-lg-2 offset-md-1">
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"><br>	<!-- image -->
			<img src="../../ci/assets/img/<?php echo $fetchProdJoinCat->pro_id . "." . $fetchProdJoinCat->pro_photo ?>" alt="image de <?php echo $fetchProdJoinCat->pro_libelle ?>" class="imgDetailcss"><br><br>
			<label for="pro_couleur">Couleur</label> <!-- couleur -->
			<input type="text" name="pro_couleur" class="form-control col-lg-11" value="<?php echo $fetchProdJoinCat->pro_couleur; ?>" disabled>
		</div>

		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<label for="pro_id">ID</label>			 <!-- ID -->
			<input id="pro_id" type="text" name="pro_id" class="form-control" disabled value="<?php echo $fetchProdJoinCat->pro_id; ?>" readonly="readonly"><br>

			<label for="pro_ref">Référence</label> <!-- reference -->
			<input type="text" name="pro_ref" class="form-control" value="<?php echo $fetchProdJoinCat->pro_ref; ?>" disabled><br>

			<label for="pro_cat_id">Catégorie</label> <!-- categorie -->
			<select id="pro_cat_id" type="text" name="pro_cat_id" class="form-control" disabled>
				<option value="<?php echo $fetchProdJoinCat->pro_cat_id ?>">
					<?php echo $fetchProdJoinCat->cat_nom ?>
				</option>
			</select><br>

			<label for="pro_libelle">Libellé</label> <!-- libelle -->
			<input type="text" name="pro_libelle" class="form-control" value="<?php echo $fetchProdJoinCat->pro_libelle; ?>" disabled>
			<!-- disabled value="<php echo set_value('pro_libelle') != NULL ? set_value('pro_libelle') : $produits->pro_libelle ?>"> --><br>

			<label for="pro_prix">Prix</label> <!-- prix -->
			<input type="text" name="pro_prix" class="form-control" value="<?php echo $fetchProdJoinCat->pro_prix; ?>" disabled><br>

			<label for="pro_stock">Stock</label> <!-- stock -->
			<input type="text" name="pro_stock" class="form-control" value="<?php echo $fetchProdJoinCat->pro_stock; ?>" disabled><br>

			<label>Bloque </label> <!-- bloque -->
			<label>
				<input name="pro_bloque" type="radio" value="1" <?php echo $fetchProdJoinCat->pro_bloque == 1 ? 'checked' : '' ?> disabled>
				<span>Oui</span>
			</label>
			<label>
				<input name="pro_bloque" type="radio" value="2" <?php echo ($fetchProdJoinCat->pro_bloque == NULL) || ($fetchProdJoinCat->pro_bloque == 2) ? 'checked' : '' ?> disabled>
				<span>Non</span>
			</label>
		</div><br><br>
	</div>

	<br>
	<div class="container row offset-lg-2 offset-md-1 offset-xs-1">	<!-- description -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="pro_description">Description</label>
			<textarea name="pro_description" class="form-control" cols="150" rows=auto disabled><?php echo $fetchProdJoinCat->pro_description; ?></textarea><br>
		</div>
	</div>

	<div class="container row offset-lg-2 offset-md-1 offset-xs-1"> 		
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">	<!-- date d ajout -->
			<span name="pro_d_ajout" class="form-control" readonly="readonly"><?php echo "Date d'ajout : " . $fetchProdJoinCat->pro_d_ajout; ?></span><br>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">	<!-- date modif -->
			<span name="pro_d_modif" class="form-control" readonly="readonly"><?php echo "Date de modification : " . $fetchProdJoinCat->pro_d_modif; ?></span><br>
		</div>
	</div><br>


	<a href="products.php" class="d-flex justify-content-center"> 	<!-- valider -->
		<input name="retour" type="button" class="btn btn-info" value="retour à la liste de produits"></a>
	<!-- class="d-flex justify-content-center"> : pour centrer -->

	<br><br>

	<?php
	include('footer.php');
	?>

</div>
</body>

</html>