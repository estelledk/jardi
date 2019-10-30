<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
include('../controler/ctrlProductAdd.php'); 
?>
<title>produits</title>
<link rel="stylesheet" href="../assets/css/msg.css">


<div class="bgcss">
	<?php 
	if(isset($_POST['submit']) && count($formError) === 0)   //si POST présent et pas d'erreurs, msg de confirmation de création
	{ ?> 
		<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">  
				<h4 class="pt-2 pb-5">Le produit a été ajouté</h4>
				<a href="products.php" title="Retour à la liste de produits" class="btn btn-info">Retour à la liste de produits</a>
		</div> <?php
	} 
	else //sinon affichage formulaire
	{ ?>
		<form action="" method="POST" enctype="multipart/form-data">
			
			<div class="row container offset-3 text-center"> <!-- 1è ligne -->		<!-- titre -->   <!-- offset décale les colonnes -->
				<h1 class="text-info pb-4">Nouveau produit</h1>
			</div>
			
			<div class="row container offset-2 pb-2">  <!-- 2ème ligne -->
				<div class="col-lg-6 col-xs-12">  <!-- colonne de gauche -->		               
				<img id="img" src=""/><br>										<!-- photo --> 	
					<input name="pro_photo" id="pro_photo" type="file" class="btn btn-outline-info" size="70"><br>Au format : .gif, .jpg, .jpeg, .pjpeg, .png
					<span id="errorPro_photo" class="error pb-5"><?php echo isset($formError['pro_photo']) ? $formError['pro_photo'] : '' ?></span><br>
						<!-- fichier js en lien avec l'affichage de la photo -->
						
					<span id="errorPro_couleur" class="error pb-3"><?php echo isset($formError['pro_couleur']) ? $formError['pro_couleur'] : '' ?></span>
					<label for="pro_couleur" class="pt-2"> Couleur</label>						<!-- couleur -->  <!-- form-control arrondit les input -->
					<input id="pro_couleur" name="pro_couleur" type="text" class="form-control col-lg-11" value="<?php echo isset($_POST['pro_couleur']) ? $_POST['pro_couleur'] : '' ?>" required>
				</div>    
				
				<div class="col-lg-6 col-xs-12 pb-4">  <!-- colonne de droite -->	
					<span id="errorPro_ref" class="error pt-2 pb-3"><?php echo isset($formError['pro_ref']) ? $formError['pro_ref'] : '' ?></span>		
					<label for="pro_ref">Référence</label>										<!-- reference -->
					<input id="pro_ref" name="pro_ref" type="text" class="form-control" value="<?php echo isset($_POST['pro_ref']) ? $_POST['pro_ref'] : '' ?>" required> <!-- récupération de la valeur postée -->

					<!-- <span id="errorPro_cat_id" class="error pb-3"><php echo isset($formError['pro_cat_id']) ? $formError['pro_cat_id'] : '' ?></span> -->
					<label for="pro_cat_id" class="pt-2">Catégorie</label>						<!-- categorie -->
					<select id="pro_cat_id" name="pro_cat_id" class="form-control"> <!--liste déroulante--> 
							<?php foreach($fetchCat as $row) { ?><option value="<?php echo $row->cat_id ?>"><?php echo $row->cat_nom ?></option><?php } ?>
					</select>

					<span id="errorPro_libelle" class="error pt-2 pb-3"><?php echo isset($formError['pro_libelle']) ? $formError['pro_libelle'] : '' ?></span>	
					<label for="pro_libelle" class="pt-2">Libellé</label>						<!-- libelle -->
					<input id="pro_libelle" name="pro_libelle" type="text" class="form-control" value="<?php echo isset($_POST['pro_libelle']) ? $_POST['pro_libelle'] : '' ?>" required> 
					<!-- disabled value="<php echo set_value('pro_libelle') != NULL ? set_value('pro_libelle') : $produits->pro_libelle ?>"> -->

					<span id="errorPro_prix" class="error pb-3"><?php echo isset($formError['pro_prix']) ? $formError['pro_prix'] : '' ?></span>			
					<label for="pro_prix" class="pt-2">Prix</label>								<!-- prix -->
					<input id="pro_prix" name="pro_prix" type="text" class="form-control" value="<?php echo isset($_POST['pro_prix']) ? $_POST['pro_prix'] : '' ?>" required>		
																
					<span id="errorPro_stock" class="error pb-3"><?php echo isset($formError['pro_stock']) ? $formError['pro_stock'] : '' ?></span>
					<label for="pro_stock" class="pt-2">Stock</label>							<!-- stock -->
					<input id="pro_stock" name="pro_stock" type="text" class="form-control" value="<?php echo isset($_POST['pro_stock']) ? $_POST['pro_stock'] : '' ?>" required>
						
					<label for="pro_bloque1" class="pt-2 pb-2">Bloqué </label>			<!-- bloque -->					
							<input id="pro_bloque1" name="pro_bloque" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->
							<span>Oui</span>
						<label for="pro_bloque2"></label>
							<input id="pro_bloque2" name="pro_bloque" type="radio" value="2">  <!-- value déterminée pour la BDD -->
							<span>Non</span>
				</div>
			</div>

			<div class="row container offset-2 pb-2">  <!-- 3ème ligne -->			
				<div class="col-lg-12 pb-2"><!-- description -->
				<span id="errorPro_description" class="error"><?php echo isset($formError['pro_description']) ? $formError['pro_description'] : '' ?></span>
					<label for="pro_description">Description</label> 	
						<textarea id="pro_description" name="pro_description" class="form-control" cols="150" rows=auto value="<?php echo isset($_POST['pro_description']) ? $_POST['pro_description'] : '' ?>" required></textarea><br>
				</div>	
			</div>	

			<div class="row container offset-2 pb-4">  <!-- 4ème ligne -->
				<div class="col-lg-12">												<!-- submit -->
					<input name="submit" type="submit" class="btn btn-info btn-lg text-center" value="création du nouveau produit">
				</div>
			</div>
			
		</form> 
	<?php
	} 
	include('footer.php');
	?>
</div>

<script src='../assets/js/loadImg.js'></script>
<script src='../assets/js/ctrlProductJQ.js'></script>  <!-- validation côté client -->


</body>
</html>