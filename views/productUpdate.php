<?php
include('header1headSession.php');
include('header3Navbar.php'); 
include('../controler/ctrlProductUpdate.php');  //inclut connexion bdd
?>
<title>produits</title>
<link rel="stylesheet" href="../assets/css/msg.css">


<div class="bgcss">
	<?php
	if (isset($_POST['submit']) && count($formError) == 0)   //si POST présent et pas d'erreurs, msg de confirmation de création
	{ ?>
		<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">
			<h4 class="text-warning pt-2 pb-5">Le produit a été modifié</h4>
			<a href="products.php" title="Retour à la liste de produits" class="btn btn-info">Retour à la liste de produits</a>
		</div> 
	<?php
	} 
	else //sinon affichage formulaire
	{ ?>

		<form action="" method="POST" enctype="multipart/form-data">

			<div class="row container offset-2"> <!-- 1ère ligne -->
				<div class="col-lg-12">										<!-- titre -->
					<h2 class="text-warning text-center">Modification du produit <?php echo $fetchProd_whereProId->pro_libelle ?></h2><br>
				</div>
			</div>

			<div class="row container offset-2"> <!-- 2ème ligne -->
				<div class="col-lg-6 col-xs-12"> <!-- colonne de gauche -->
					<img id="img" src="" /><br>								<!-- photo -->
					<input name="pro_photo" id="pro_photo" type="file" class="btn btn-outline-warning" size="60"><br>Au format : .gif, .jpg, .jpeg, .pjpeg, .png
						<span class="error" id="errorPro_photo"><?php echo isset($formError['pro_photo']) ? $formError['pro_photo'] : '' ?></span> <!-- type="file" -->
						<br><br>

					<label for="pro_couleur">Couleur</label> 				<!-- couleur -->
						<input id="pro_couleur" name="pro_couleur" type="text" class="form-control col-lg-11" value="<?php echo isset($_POST['pro_couleur']) ? $_POST['pro_couleur'] : $fetchProd_whereProId->pro_couleur ?>">
						<span id="errorPro_couleur" class="error"><?php echo isset($formError['pro_couleur']) ? $formError['pro_couleur'] : '' ?></span><br><br>
				</div>

				<div class="col-lg-6 col-xs-12"> <!-- colonne de droite -->
					<label for="pro_id">ID</label><br>						<!-- ID -->
						<input id="pro_id" name="pro_id" type="text" class="form-control" value="<?php echo $fetchProd_whereProId->pro_id ?>" readonly="readonly"><br><br>

					<label for="pro_ref">Référence</label> 					<!-- reference -->
						<input id="pro_ref" name="pro_ref" type="text" class="form-control" value="<?php echo isset($_POST['pro_ref']) ? $_POST['pro_ref'] : $fetchProd_whereProId->pro_ref ?>"> <!-- récupération de la valeur postée -->
						<span id="errorPro_ref" class="error"><?php echo isset($formError['pro_ref']) ? $formError['pro_ref'] : '' ?></span><br><br>

					<label for="pro_cat_id">Catégorie</label> 				<!-- categorie -->
						<select id="pro_cat_id" name="pro_cat_id" class="form-control"> <?php
							foreach ($fetchCat as $row) 
							{ ?>
								<option value="<?php echo $row->cat_id ?>" <?php echo isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] == $row->cat_id || $row->cat_id == $fetchProd_whereProId->pro_cat_id  ? 'selected' : '' ?>>
									<?php echo $row->cat_nom ?>
								</option> <?php
							} ?> 
						</select><br>
					
					<label for="pro_libelle">Libellé</label> 				<!-- libelle -->
						<input id="pro_libelle" name="pro_libelle" type="text" class="form-control" value="<?php echo isset($_POST['pro_libelle']) ? $_POST['pro_libelle'] : $fetchProd_whereProId->pro_libelle ?>">
						<span id="errorPro_libelle" class="error"><?php echo isset($formError['pro_libelle']) ? $formError['pro_libelle'] : '' ?></span><br><br>

					<label for="pro_prix">Prix au format .00</label> 		<!-- prix -->
						<input id="pro_prix" name="pro_prix" type="text" class="form-control" value="<?php echo isset($_POST['pro_prix']) ? $_POST['pro_prix'] : $fetchProd_whereProId->pro_prix ?>">
						<span id="errorPro_prix" class="error"><?php echo isset($formError['pro_prix']) ? $formError['pro_prix'] : '' ?></span><br><br>

					<label for="pro_stock">Stock</label> 					<!-- stock -->
						<input id="pro_stock" name="pro_stock" type="text" class="form-control" value="<?php echo isset($_POST['pro_stock']) ? $_POST['pro_stock'] : $fetchProd_whereProId->pro_stock ?>">
						<span id="errorPro_stock" class="error"><?php echo isset($formError['pro_stock']) ? $formError['pro_stock'] : '' ?></span><br><br>

					<label for="bloque1">Bloqué </label> 					<!-- bloque -->
						<input id="pro_bloque1" name="pro_bloque" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->
						<span>Oui</span>
						<label for="pro_bloque2"></label>
						<input id="pro_bloque2" name="pro_bloque" type="radio" value="2"> <!-- value déterminée pour la BDD -->
						<span>Non</span><br>
				</div><br><br>
			</div><br>

			<div class="row container offset-2"> <!-- 3ème ligne -->
				<div class="col-lg-12">										<!-- description -->
					<label for="pro_description">Description</label>
						<textarea id="pro_description" name="pro_description" class="form-control" cols="150" rows=auto><?php echo isset($_POST['decription']) ? $_POST['pro_description'] : $fetchProd_whereProId->pro_description ?></textarea>
						<span id="errorPro_description" class="error"><?php echo isset($formError['pro_description']) ? $formError['pro_description'] : '' ?></span><br>
				</div>
			</div><br>

			<div class="row container offset-2"> <!-- 4ème ligne -->				
				<div class="col-lg-6 col-xs-12">							<!-- date d ajout -->
					<label for="pro_d_ajout">Date d'ajout</label>
						<input id="pro_d_ajout" name="pro_d_ajout" class="form-control" value="<?php echo $fetchProd_whereProId->pro_d_ajout ?>" readonly="readonly"><br>
				</div>
				<div class="col-lg-6 col-xs-12">							<!-- date modif -->
					<label for="pro_d_modif">Date de modif (se notera automatiquement)</label>
						<input id="pro_d_modif" name="pro_d_modif" class="form-control" value="<?php echo isset($_POST['pro_d_modif']) ? $_POST['pro_d_modif'] : $fetchProd_whereProId->pro_d_modif ?>" readonly="readonly">
						<span id="errorPro_d_modif" class="error"><?php echo isset($formError['pro_d_modif']) ? $formError['pro_d_modif'] : '' ?></span><br>
				</div>
			</div>

			<div class="row container offset-2"> <!-- 5ème ligne -->
				<div class="col-lg-4">										<!-- submit -->
					<input name="submit" type="submit" class="btn btn-warning btn-lg text-center" value="modification du produit"><br>
				</div>
			</div><br>

		</form> <br><br>

	<?php
	}
	include('footer.php');
	?>

</div>
<script src="../assets/js/loadImg.js"></script>		<!-- lien js pour affichage photo -->
<script src="../assets/js/ctrlProductJQ.js"></script>  <!-- validation côté client -->

</body>

</html>